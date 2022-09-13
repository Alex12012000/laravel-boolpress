<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" href="#" :to="{name: 'home'}">LOGO</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav" >
               <li v-for="link, index in links" :key="index" class="nav-item">
                    <router-link :to="{name: link.name}" class="nav-link">{{ link.label }}</router-link>
               </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {
    
    name: 'PageHeader',
    data() {
        return {
            links: [
                {
                    name: 'home',
                    label: 'Home'
                },
                {
                    name: 'about',
                    label: 'About'
                },
                {
                    name: 'blog',
                    label: 'Blog'
                }
            ]
        }
    },
}
</script>

<style>

</style>