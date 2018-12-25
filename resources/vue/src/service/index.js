import axios from 'axios'
var instance = axios.create({
  baseURL: 'http://127.0.0.1:88'
})

function getSchoolList (page) {
  return instance.get('/admin/school?page=' + page)
    .then((v) => {
      return v.data
    }).then((v) => {
      return v.data
    })
}
export {getSchoolList}
