<template>
    <div class="container">
        <div v-if="post">
            <h1>{{post.title}}</h1>
            <div>
                <p>{{post.content}}</p>
            </div>
            <!-- Category -->
            <div class="category">
                
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
                console.log(response.data.post)
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