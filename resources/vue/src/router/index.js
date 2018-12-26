import Vue from 'vue'
import Router from 'vue-router'
import Admin from '../components/admin/Index'
import Home from '../components/admin/Home'
import Login from '../components/admin/Login'
import School from '../components/admin/School'
import Community from '../components/admin/Community'
import CommunityDetail from '../components/admin/CommunityDetail'
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
        },
        {
          path: 'community',
          component: Community
        },
        {
          path: 'community/detail',
          component: CommunityDetail
        }
      ]
    },
    {
      path: '/login',
      component: Login
    }
  ]
})
