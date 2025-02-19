import { createRouter, createWebHistory } from 'vue-router';
import DeleteTask from '../components/DeleteTask.vue'; // Import your welcome component

const routes = [
    { path: '/', name: 'welcome', component: DeleteTask },
    // Other routes...
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
