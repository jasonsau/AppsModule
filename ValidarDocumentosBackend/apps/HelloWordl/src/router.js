import {createRouter, createWebHashHistory} from 'vue-router';


const routes = [
    {
        path: '/test',
        name: "Home",
        component: () => import('./Components/About.vue')
    }, {
        path: '/about',
        name: "About",
        component: () => import('./Components/About.vue'),
    }
]

const router = createRouter({
    base: '/apps/HelloWordl',
    history: createWebHashHistory(),
    routes,
})

export {router}
