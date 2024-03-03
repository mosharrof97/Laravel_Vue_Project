import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

import Login from '../components/auth/Login.vue'
import Register from '../components/auth/Register.vue'
import AddProduct from '../components/product/AddProduct.vue'
import Productlist from '../components/product/ProductList.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: Login,
      meta:{public:true}
    },
    {
      path: '/register',
      name: 'Register',
      component: Register,
      meta:{public:true}
    },
    {
      path: '/add-product',
      name: 'AddProduct',
      component: AddProduct,
      meta:{public:false}
    },
    {
      path: '/product-list',
      name: 'Productlist',
      component: Productlist,
      meta:{public:false}
    },

    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
  ]
})

router.beforeEach((to, from, next)=>{
  const isAuthentication = !!localStorage.getItem('token');
  if(!to.meta.public && !isAuthentication){
    next({name:'Login'});
  }else{
    next();
  }
})


export default router
