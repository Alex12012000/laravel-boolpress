<template>
    <div>
        <a href="/admin">Area Privata</a>
        <PostCardComponent/>
    </div>
</template>


<script>
import PostCardComponent from "../components/PostCardComponent.vue";
export default {
    name: "App",
    components: {
        PostCardComponent,
    },
}
</script>

<style>

</style>