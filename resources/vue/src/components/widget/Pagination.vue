<template>
    <ul class="pagination pagination-sm no-margin center-block">
        <li @click.prevent="goBack(url)"><a href="#">上一页</a></li>
        <li v-for="index in parseInt(totalPage)" :class="{active:parseInt(currentPage)===index}" :key="index">
            <router-link :to="{path:url,query:{page:index}}">{{index}}</router-link>
        </li>
        <li @click.prevent="forward(url)"><a href="#">下一页</a></li>
    </ul>
</template>

<script>
export default {
  name: 'Pagination',
  data: function () {
    return {
      currentPage: 1
    }
  },
  props: {
    totalPage: {
      type: Number
    },
    url: {
      type: String
    }
  },
  methods: {
    goBack (path) {
      let p = parseInt(this.$data.currentPage) - 1
      this.$data.currentPage = p
      if (p < 1) {
        this.$data.currentPage = 1
        return
      }
      this.$router.push({path: path, query: {page: p}})
    },
    forward: function (path) {
      let p = parseInt(this.$data.currentPage)
      p++
      this.$data.currentPage = p
      if (p > parseInt(this.$props.totalPage)) {
        this.$data.currentPage = parseInt(this.$props.totalPage)
        return
      }
      this.$router.push({path: path, query: {page: p}})
    }
  },
  mounted () {
    this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
  },
  watch: {
    $route (to, from) {
      this.$data.currentPage = this.$route.query.page === undefined ? 1 : this.$route.query.page
    }
  }
}
</script>

<style scoped>

</style>
