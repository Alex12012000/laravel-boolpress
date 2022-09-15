<template>
    <div class="container">
        <h1>Post List: </h1>
        <div class="row row-cols-3">
            <!-- Single Card -->
            <div class="col mt-4" v-for="post in posts" :key="post.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <img v-if="post.cover" :src="post.cover" :alt="post.title" class="w-50">
                        <p class="card-text">
                            {{ slice(post.content) }}
                        </p>
                        <router-link :to="{name: 'single-post', params: {slug: post.slug}}" type="button" class="btn btn-primary">Read more..</router-link>
                    </div>
                </div>
            </div>

        </div>

        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination">
                <li class="page-item" :class="{'disabled': currentPage <= 1}">
                    <a class="page-link" @click="getPosts(currentPage - 1)" href="#">Previous</a>
                </li>
                <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                <li class="page-item" :class="{'disabled': currentPage >= lastPage}">
                    <a class="page-link" @click="getPosts(currentPage + 1)" href="#">Next</a>
                </li>
            </ul>
        </nav>

       
    </div>
</template>

<script>
import Axios from "axios";
export default {
    name: 'PostCardComponent',
    data() {
        return {
            posts: [],
            currentPage: 0,
            lastPage: 0
        };
    },
    methods: {
        getPosts(pageNumber) {
            Axios.get("/api/posts", {
                params: {
                    page: pageNumber
                }
            }).then((result) => {
                // console.log(result)
                const postsData = result.data.posts.data;
                this.posts = postsData;
                this.currentPage = result.data.posts.current_page;
                this.lastPage = result.data.posts.last_page;
                console.log(this.lastPage)
                // console.log(postsData)
            });
        },

        slice(text){
            if(text.length > 75) {
                return text.slice(0, 70) + '..';
            }

            return text;
        }
    },
    mounted() {
        this.getPosts(1);
    },
};
</script>

<style lang="scss" scoped>
    .card {
        height: 100%;
    }
</style>