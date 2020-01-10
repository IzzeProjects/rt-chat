import { checkNoAuth } from '../helpers/auth'

const routes = [
  {
    path: '/login',
    exact: true,
    beforeEnter: checkNoAuth,
    component: () => import('layouts/Default.vue'),
    children: [
      {
        name: 'login',
        path: '',
        component: () => import('pages/Login.vue')
      }
    ]
  },
  {
    path: '/',
    // beforeEnter: checkAuth,
    component: () => import('layouts/Main.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
