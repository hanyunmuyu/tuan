<template>
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
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
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" @click="doLogin" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                {{$store.state.token}}
        </div>
        <!-- /.login-box-body -->
    </div>
</template>

<script>
export default {
  name: 'Login',
  data: function () {
    return {
      username: '',
      password: ''
    }
  },
  methods: {
    doLogin () {
      this.$store.dispatch('login', {'username': this.$data.username, 'password': this.$data.password})
    }
  },
  mounted () {
    if (this.$store.state.token === null) {
      this.$router.push('/login')
    } else {
      this.$router.push('/')
    }
  }
}
</script>

<style scoped>

</style>
