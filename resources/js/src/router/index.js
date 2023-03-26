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
    meta: { requiresAuth: true , roles: 0 }
  },
  {
    path: '/keywords',
    name: 'keywords',
    component: () => import('../views/Keywords/Keywords.vue'),
    meta: { requiresAuth: true , roles:0 }
  },
  {
    path: '/testWorkstask',
    name: 'testWorkstask',
    component: () => import('../views/testWorkstask/testWorkstask.vue'),
    meta: { requiresAuth: true , roles: 0 }
  },
  {
    path: '/saveemail',
    name: 'saveemail',
    component: () => import('../views/SaveEmail/SaveEmail.vue'),
    meta: { requiresAuth: true , roles: 0 }
  },
  {
    path: '/pages/login',
    name: 'pages-login',
    component: () => import('../views/pages/Login.vue'),
    meta: {
      layout: 'blank',
    },
  },
  // Admin
  {
    path: '/admin/users',
    name: 'adminusers',
    component: () => import('../views/Admin/users/Dashboard.vue'),
    meta: { requiresAuth: true, roles: 1 }
  },
  {
    path: '/admin/settings',
    name: 'adminsettings',
    component: () => import('../views/Admin/settings/AccountSettings.vue'),
    meta: { requiresAuth: true , roles: 1}
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

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  const currentUser = {name: localStorage.getItem('username'), role: localStorage.getItem('role')};
  const roles = to.meta.roles;
 
  console.log(!!(requiresAuth && currentUser)); 
  if (requiresAuth && currentUser.name === '') {
    next('/login')
  } else if (requiresAuth && currentUser) {
    console.log("auth");
    if (roles <= currentUser.role) {
      next();
    } else {
      next('/error-404')
    }
  } else {
    next(); // public pages
  }
})
export default router
