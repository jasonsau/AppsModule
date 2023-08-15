
import Hello from './components/HelloWorld.vue'
import { createRouter, createWebHistory } from 'vue-router';
const HelloWord = { template: '<div style = "color: white">Hello Word</div>' }

const routes = [
    { path: '/', component:  Hello },
    { path: '/hello-word', component: HelloWord}
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
})


export { router }