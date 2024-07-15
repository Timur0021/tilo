import Home from "../pages/Home.vue";

const routes = [
    {
        path: '/',
        name: Home,
        component: () => import('../pages/Home.vue')
    }
]
export default  routes;
