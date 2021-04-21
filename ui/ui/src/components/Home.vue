<template>
  <div class="full-screen-line">
    <div class="header-h1"><span class="color-red">RED</span><span class="color-grey">IO</span></div>
    <div class="logo"></div>
  </div>
  <div class="full-screen-line">
    <p class="header-excerpt">
      Create your own audio station in minutes
    </p>
  </div>
  <div class="full-screen-line btn-collection">
    <router-link to="/login">
      <Button msg="Login" color="primary-color"></Button>
    </router-link>
    <router-link to="/register">
      <Button msg="Register"></Button>
    </router-link>
  </div>
</template>

<script>
import Button from "@/components/Button";

export default {
  name: "Home",
  components: {
    Button
  }
}
</script>

<style scoped>
.full-screen .full-screen-right-side .full-screen-line {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 80%;
  margin-top: 2%;
}

.header-h1 {
  margin: 0;
  width: 180px;
  height: 80px;
  text-align: center;
  font: normal normal bold 64px Bahnschrift;
}

.header-excerpt {
  width: 474px;
  height: 255px;
  text-align: left;
  font: normal normal normal 64px/85px Segoe UI;
  color: #707070;
}

.logo {
  width: 147px;
  height: 120px;
  background: transparent url('../assets/logo.png') 0 0 no-repeat padding-box;
  background-size: cover;
}

.color-red {
  color: var(--primary-color);
}
.color-grey {
  color: var(--grey);
}

.full-screen .full-screen-right-side .btn-collection {
  justify-content: space-evenly;
}

@media only screen and (max-width: 768px) {
  .full-screen .full-screen-right-side .full-screen-line {
    width: 100%;
  }

  .header-excerpt {
    text-align: center;
    font: normal normal normal 48px Segoe UI;
  }
}
</style>