<template>
    <div>
        <header>
            <PageHeader/>
        </header>
        <main class="mt-5">
            <router-view></router-view>
        </main>
    </div>
</template>


<script>
import PageHeader from "../components/PageHeader.vue";
export default {
    name: "App",
    components: {
        PageHeader,
    },
}
</script>

<style>

</style>