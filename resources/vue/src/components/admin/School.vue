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
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                                        删除
                                    </button>
                                    <Modal tag="modal-danger" type="danger" title="高校管理" :tooltip="'你确定要删除'+school.school_name" cancel="取消" @ok="deleteSchool"></Modal>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                                        禁用
                                    </button>
                                    <Modal tag="modal-warning" type="warning" title="高校管理" :tooltip="'你确定要删除'+school.school_name" cancel="取消" @ok="forbidden"></Modal>

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
            <Pagination :totalPage=lastPage url="/school"></Pagination>
        </div>
    </section>
</template>
<script>
import {getSchoolList as getSchoolData} from '../../service'
import Modal from '../widget/Modal'
import Pagination from '../widget/Pagination'

export default {
  name: 'School',
  components: {Pagination, Modal},
  data: function () {
    return {
      'schoolList': {},
      lastPage: 1,
      currentPage: 1
    }
  },
  watch: {
    $route (to, from) {
      this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
      this.getSchoolList(this.$data.currentPage)
    }
  },
  methods: {
    getSchoolList (page) {
      getSchoolData(page).then((v) => {
        this.$data.schoolList = v
        this.$data.lastPage = v.last_page
      })
    },
    deleteSchool (v) {
      v()
    },
    forbidden (v) {
      v()
    }
  },
  mounted () {
    this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
    this.getSchoolList(this.$data.currentPage)
  },
  comments: {Modal, Pagination},
  template: '<Modal/>,<Pagination/>'
}
</script>

<style scoped>

</style>
