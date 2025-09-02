import { createRouter, createWebHistory } from 'vue-router'
import Homepage from '../components/homepage.vue'
import Admin from '../components/admin.vue'
import Contact from '../components/contactt.vue'

// 🔽 i-import lang generic form
import ArtistForm from '../components/artists/ArtistForm.vue'

const routes = [
  { path: '/', name: 'Homepage', component: Homepage },
  { path: '/admin', name: 'Admin', component: Admin },
  { path: '/contactt', name: 'Contactt', component: Contact },

  // 🔽 dynamic route
  { path: '/gallery/artists/:name', name: 'ArtistForm', component: ArtistForm },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
