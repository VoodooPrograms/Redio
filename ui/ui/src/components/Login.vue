<template>
  <div class="login-box">
    <h2>Login</h2>
    <form @submit.prevent="handleLogin">
      <div class="user-box">
        <input type="text" required=""
               v-model="user.username"
               class="form-control"
               name="username">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="password" required=""
               v-model="user.password"
               class="form-control"
               name="password">
        <label>Password</label>
      </div>
      <div class="flex-line">
          <Button msg="Submit" color="primary-color"></Button>
        <router-link to="/">
          <Button msg="Go back"></Button>
        </router-link>
      </div>
    </form>
  </div>
</template>

<script>
import Button from "@/components/Button";
import User from '../models/user';

export default {
name: "Login" ,
  components: {Button},
  data() {
    return {
      user: new User('', ''),
      loading: false,
      message: ''
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    }
  },
  created() {
    if (this.loggedIn) {
      this.$router.push('/profile');
    }
  },
  methods: {
    handleLogin() {
      this.loading = true;
        if (this.user.username && this.user.password) {
          this.$store.dispatch('auth/login', this.user).then(
              () => {
                this.$router.push('/profile');
              },
          );
        }
    }
  }
};
</script>

<style scoped>

.login-box {
  width: 400px;
  padding: 40px;
  margin: 0 auto;
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: var(--primary-color);
  font-size: 12px;
}

.flex-line {
  display: flex;
  justify-content: space-between;
}

</style>