import { createRouter, createWebHistory } from 'vue-router';
import FichaList from '../components/FichaList.vue';
import FichaForm from '../components/FichaForm.vue';

const routes = [
    { path: '/mis-fichas', component: FichaList },
    { path: '/crear-ficha', component: FichaForm },
    { path: '/editar-ficha/:id', component: FichaForm, props: true },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
