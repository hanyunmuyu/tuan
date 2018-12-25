import Vue from 'vue'
import Vuex from 'vuex'
import router from '../router'

Vue.use(Vuex)

// 数据
var state = {
  user: JSON.parse(localStorage.getItem('user'))
}

// 获取数据
var getters = {

}

// 异步动作
const actions = {
  login ({commit}, param) {
    commit('login', param)
  },
  logout ({commit}) {
    commit('logout')
  }
}

// 同步动作
const mutations = {
  login (state, user) {
    state.user = user
    localStorage.setItem('user', JSON.stringify(user))
    router.push('/')
  },
  logout () {
    state.user = null
    localStorage.clear()
    router.push('/login')
  }
}

const store = new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})

export default store
