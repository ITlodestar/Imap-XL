import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: 'dashboard',
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('../views/dashboard/Dashboard.vue'),
  },
  {
    path: '/keywords',
    name: 'keywords',
    component: () => import('../views/Keywords/Keywords.vue'),
  },
  {
    path: '/testWorkstask',
    name: 'testWorkstask',
    component: () => import('../views/testWorkstask/testWorkstask.vue'),
  },
  {
    path: '/admin/users',
    name: 'adminusers',
    component: () => import('../views/Admin/users/Dashboard.vue'),
  },
  // Admin
  {
    path: '/admin/settings',
    name: 'adminsettings',
    component: () => import('../views/Admin/settings/AccountSettings.vue'),
  },
  {
    path: '/saveemail',
    name: 'saveemail',
    component: () => import('../views/SaveEmail/SaveEmail.vue'),
  },
  {
    path: '/pages/login',
    name: 'pages-login',
    component: () => import('../views/pages/Login.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/error-404',
    name: 'error-404',
    component: () => import('../views/Error.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '*',
    redirect: 'error-404',
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
