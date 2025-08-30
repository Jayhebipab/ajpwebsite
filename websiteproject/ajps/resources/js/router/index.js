import { createRouter, createWebHistory } from 'vue-router';
import Homepage from '../components/homepage.vue';
import Admin from '../components/admin.vue';
import Contact from '../components/contactt.vue';

const routes = [
  { path: '/', name: 'Homepage', component: Homepage },
  { path: '/admin', name: 'Admin', component: Admin },
  { path: '/contactt', name: 'Contactt', component: Contact }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
