<template>
    <div class="container">
        <div v-if="post">
            <h1>{{post.title}}</h1>

            <div class="img" v-if="post.cover">
                <img :src="post.cover" :alt="post.title">
            </div>
            <div>
                <p>{{post.content}}</p>
            </div>
        </div>
        
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data() {
        return {
            post: null,
        }
    },
    methods: {
        getPost() {
            axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data.post;
                if(response.data.success) {
                    this.post = response.data.post
                } else {
                    this.$router.push({name: 'not-found'})
                }
            })
        }
    },
    mounted() {
        this.getPost()
    },
}
</script>

<style>

</style>