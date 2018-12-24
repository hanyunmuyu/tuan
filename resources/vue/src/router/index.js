import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/admin/Index'
import Home from '../components/admin/Home'
import Login from '../components/admin/Login'
import School from '../components/admin/School'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      component: Admin,
      children: [
        {
          path: '',
          component: Home
        },
        {
          path: 'school',
          component: School
        }
      ]
    },
    {
      path: '/login',
      component: Login
    }
  ]
})
