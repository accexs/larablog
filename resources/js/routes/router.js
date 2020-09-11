import Vue from 'vue'
import routeList from "./routeList";
import VueRouter from 'vue-router';
import {isLoggedIn} from "../shared/utils/auth";

const routes = [...routeList]

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

router.beforeEach((to, from, next) => {

    if (to.matched.some(record => record.meta.auth) && !isLoggedIn()) {
        next('/login')
        return
    }
    next()
})

export default router
