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
  background-color: black;
}

main {
  margin: 0 auto;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
}

:root {
  --primary-color: #D11828;
  --grey: #707070;
  --white: #ffffff;
  --black: #030303;
  --bg-color: #0F0F0F;
}

::placeholder {
  color: var(--primary-color);
  font-style: italic;
  opacity: 1;
}

a {
  text-decoration: none;
}

/* nprogress */
#nprogress .bar {
  background: var(--primary-color) !important;
}

#nprogress .peg {
  box-shadow: 0 0 10px var(--primary-color), 0 0 5px var(--primary-color) !important;
}

#nprogress .spinner-icon {
  border-top-color: var(--primary-color) !important;
  border-left-color: var(--primary-color) !important;
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
