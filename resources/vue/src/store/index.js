import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
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
  login (state, params) {
    let param = new URLSearchParams()
    for (let p in params) {
      param.append(p, params[p])
    }
    axios.post('http://127.0.0.1:8000/admin/login', param).then((v) => {
      return v.data
    }).then((v) => {
      console.log()
      let user = JSON.stringify(v.data)
      state.user = v.data
      localStorage.setItem('user', user)
      // window.location.href = '/'
    })
  },
  logout (state) {
    state.user = null
    localStorage.clear()
    // window.location.href = '/'
  }
}

const store = new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})

export default store
