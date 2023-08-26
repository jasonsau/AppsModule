import {createRouter, createWebHashHistory} from 'vue-router';


const routes = [
    {
        path: '/about',
        name: "About",
        component: () => import('./Components/About.vue'),
    }
]

const router = createRouter({
    base: '/apps/ToDoList',
    history: createWebHashHistory(),
    routes,
})

export {router}
