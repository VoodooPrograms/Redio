<template>
  <nav class="col-2" v-show="!open">
    <div class="center-col">
      <div class="logo"></div>
      <div class="header-h1"><span class="color-red">RED</span><span class="color-grey">IO</span></div>
    </div>
    <div class="button-list">
      <router-link to="/">Browse</router-link>
      <router-link to="/">Dashboard</router-link>
    </div>
  </nav>
  <div id="menu-button" @click="handleHamburger">
    <img src="@/assets/hamburger.svg" />
  </div>
</template>

<script>
export default {
  name: "Navigation",
  data() {
    return {
      open: false
    };
  },
  methods: {
    handleHamburger() {
      this.open = !this.open;
    }
  }
}
</script>

<style scoped>
.center-col {
  text-align: center;
  padding: 20% 0;
}

.header-h1 {
  margin: 0;
  text-align: center;
  font: normal normal bold 64px Bahnschrift;
}

.logo {
  width: 147px;
  height: 120px;
  margin: 0 auto;
  background: transparent url('../assets/logo.png') 0 0 no-repeat padding-box;
  background-size: cover;
}

.color-red {
  color: var(--primary-color);
}
.color-grey {
  color: var(--grey);
}

nav {
  height: 100%;
  width: 16%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: var(--bg-color);
  overflow-x: hidden;
  padding-top: 20px;
}

nav > .button-list {
  width: 100%;
  padding: 1em 0.5em;
}

nav .button-list img {
  width: 1em;
  margin-right: 0.5em;
}

nav .button-list img:hover {
  fill: black;
}

nav > .button-list a {
  width: 100%;
  display: block;
  text-decoration: none;
  padding: 5px 10px;
  text-align: left;
  font: normal normal normal 32px/30px Segoe UI;
  color: var(--white);
  opacity: 1;
}

nav > .button-list a:hover {
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  color: var(--primary-color);
}

#menu-button {
  position: fixed;
  top: 10px;
  left: 10px;
  z-index: 1000;
  transition: 0.6s;
  visibility: hidden;
}

#menu-button img {
  width: 64px;
}

#menu-button.show {
  left: calc(100% - 64px - 10px);
  transition: 0.6s;
}

nav.show {
  left: 0;
  transition: 0.6s;
}

@media only screen and (max-width: 768px) {

  .col-2 {
    width: 100vw;
  }

  #menu-button {
    visibility: visible;
  }

}

</style>