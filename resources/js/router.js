import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import HomePage from './pages/HomePage.vue'
import AboutPage from './pages/AboutPage.vue'

const router = new VueRouter({
    // short for `routes: routes`
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
    ]
})

export default router;