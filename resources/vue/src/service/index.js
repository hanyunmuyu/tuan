import axios from 'axios'
import router from '../router'
import store from '../store'
var instance = axios.create({
  baseURL: 'http://127.0.0.1:88'
})
instance.interceptors.response.use(function (response) {
  // Do something with response data
  if (response.data.code === 4000) {
    localStorage.clear()
    store.dispatch('logout')
    router.push('/login')
  }
  return response
  // return response
}, function (error) {
  // Do something with response error
  return Promise.reject(error)
})
function get (url, params = {}) {
  return instance.get(url, {params: params})
}
function post (url, params) {
  let param = new URLSearchParams()
  for (let p in params) {
    param.append(p, params[p])
  }
  return instance.post(url, param)
}
function getSchoolList (page) {
  return get('/admin/school', {page: page})
    .then((v) => {
      return v.data
    }).then((v) => {
      return v.data
    })
}
function login (params) {
  return post('/admin/login', params).then((v) => {
    return v.data
  }).then((v) => {
    return v.data
  })
}
function getCommunityList (page) {
  return get('/admin/community', {page: page}).then((v) => {
    return v.data
  }).then((v) => {
    return v.data
  })
}
export {getSchoolList, login, getCommunityList}
