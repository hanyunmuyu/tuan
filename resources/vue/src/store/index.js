import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// 数据
var state = {
  token: localStorage.getItem('token')
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
  login (state, param) {
    state.token = param.username
    localStorage.setItem('token', param.username)
    window.location.href = '/'
  },
  logout (state) {
    state.token = null
    localStorage.clear()
    window.location.href = '/'
  }
}

const store = new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})

export default store
