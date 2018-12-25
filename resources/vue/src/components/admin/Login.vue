<template>
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>莘莘</b>后台管理系统</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

                <div class="form-group has-feedback">
                    <input v-model="username" type="text" name="username" class="form-control" placeholder="用户名">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input v-model="password" type="password" name="password" class="form-control" placeholder="密码">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox">记住登录状态
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" @click="doLogin" class="btn btn-primary btn-block btn-flat">登录</button>
                    </div>
                    <!-- /.col -->
                </div>
        </div>
        <!-- /.login-box-body -->
    </div>
</template>

<script>
import {login} from '../../service'
export default {
  name: 'Login',
  data: function () {
    return {
      username: 'hanyun',
      password: '123456'
    }
  },
  methods: {
    doLogin () {
      login({'username': this.$data.username, 'password': this.$data.password}).then((v) => {
        this.$store.dispatch('login', v)
      })
    }
  },
  mounted () {
    if (this.$store.state.user === null) {
      this.$router.push('/login')
    } else {
      this.$router.push('/')
    }
  }
}
</script>

<style scoped>

</style>
