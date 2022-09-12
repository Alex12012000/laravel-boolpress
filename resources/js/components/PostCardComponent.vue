<template>
    <div class="container">
        <h1>Post List: </h1>
        <div class="row row-cols-3">
            <!-- Single Card -->
            <div class="col mt-4" v-for="post in posts" :key="post.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">
                            {{ slice(post.content) }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Axios from "axios";
export default {
    name: "PostCardComponent",
    data() {
        return {
            posts: [],
        };
    },
    methods: {
        getPosts: function () {
            Axios.get("/api/posts").then((result) => {
                // console.log(result)
                const postsData = result.data.posts;
                this.posts = postsData;
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
        this.getPosts();
    },
};
</script>