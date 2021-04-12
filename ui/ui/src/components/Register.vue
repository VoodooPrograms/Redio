<template>
  <div class="login-box">
    <h2>Register</h2>
    <form>
      <div class="user-box">
        <input type="text" name="" required="">
        <label>Email</label>
      </div>
      <div class="user-box">
        <input type="text" name="" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Password</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Confirm password</label>
      </div>
      <div class="flex-line">
        <router-link to="/">
          <Button msg="Register" color="primary-color"></Button>
        </router-link>
        <router-link to="/">
          <Button msg="Go back"></Button>
        </router-link>
      </div>
    </form>
  </div>
</template>

<script>
import Button from "@/components/Button";
export default {
  name: "Register" ,
  components: {Button}
}
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