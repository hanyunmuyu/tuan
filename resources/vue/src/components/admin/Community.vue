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
                                <tr v-for="(community,index) in communityList.data" :key="index">
                                    <th>{{community.id}}</th>
                                    <th>{{community.community_name}}</th>
                                    <th class="col-2 col-sm-2"><img :src="community.community_logo" class="img-responsive"></th>
                                    <th>{{community.created_at}}</th>
                                    <th>操作</th>
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
                <Pagination :totalPage=lastPage url="/community"></Pagination>
            </div>
        </div>
    </section>
</template>

<script>
import {getCommunityList} from '../../service'
import Pagination from '../widget/Pagination'

export default {
  name: 'Community',
  components: {Pagination},
  data: function () {
    return {
      'communityList': {},
      lastPage: 1,
      currentPage: 1
    }
  },
  methods: {
    getDataList (page) {
      getCommunityList(page).then((v) => {
        this.$data.communityList = v
        this.$data.lastPage = v.last_page
      })
    }
  },
  watch: {
    $route (to, from) {
      this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
      this.getDataList(this.$data.currentPage)
    }
  },
  mounted () {
    this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
    this.getDataList(this.$data.currentPage)
  },
  comments: {Pagination},
  template: '<Pagination/>'
}
</script>

<style scoped>

</style>
