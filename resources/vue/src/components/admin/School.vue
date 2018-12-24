<template>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">校园列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>名称</th>
                                <th>Logo</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(school,index) in schoolList.data" :key="index">
                                <td>{{school.id}}</td>
                                <td>{{school.school_name}}
                                </td>
                                <td class="col-2 col-sm-2"><img :src="school.school_logo" class="img-responsive"></td>
                                <td>{{school.created_at}}</td>
                                <td>
                                    <button class="btn btn-danger">删除</button>
                                    <button class="btn btn-warning">禁用</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="align-content-center">
                <ul class="pagination pagination-sm">
                    <li v-for="p in lastPage" :key="p"><router-link :to="{path:'/school',query:{page:p}}">{{p}}</router-link></li>
                </ul>
            </div>
        </div>
    </section>
</template>
<script>
import axios from 'axios'

export default {
  name: 'School',
  data: function () {
    return {
      'schoolList': {},
      lastPage: 1
    }
  },
  watch: {
    $route (to, from) {
      this.getSchoolList(this.$route.query.page)
    }
  },
  methods: {
    getSchoolList (page) {
      axios.get('http://127.0.0.1:8000/admin/school?page=' + page)
        .then((v) => {
          return v.data
        }).then((v) => {
          this.$data.schoolList = v.data
          this.$data.lastPage = v.data.last_page
        })
    }
  },
  mounted () {
    this.getSchoolList(this.$route.query.page === undefined ? 1 : this.$route.query.page)
  }
}
</script>

<style scoped>

</style>
