<template>
  <main>
<!--    <div id="nav">-->
<!--      <router-link to="/">Home</router-link> |-->
<!--      <router-link to="/about">About</router-link>-->
<!--    </div>-->
    <router-view />
  </main>
</template>

<script>

export default {
  name: 'App',
  components: {
  }
}

</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
}

body {
  margin: 0 auto;
}

main {
  margin: 0 auto;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}

:root {
  --primary-color: #D11828;
  --grey: #707070;
  --white: #ffffff;
  --black: #030303;
  --bg-color: #0F0F0F;
}

@font-face {
  font-family: "Bahnschrift";
  src: url('./fonts/Bahnschrift/BAHNSCHRIFT.TTF');
}
@font-face {
  font-family: "Segoe UI";
  src: url('./fonts/segoe-ui/SEGOEUI.TTF');
}
</style>
