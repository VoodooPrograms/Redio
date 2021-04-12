<template>
  <div class="full-screen">
    <div class="full-screen-right-side">
      <slot></slot>
    </div>
  </div>
</template>

<script>

export default {
  name: 'HomeView',
  props: {
    msg: String
  }
};

</script>

<style scoped>
.full-screen {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: transparent url('../assets/main-banner.png') no-repeat fixed 0 0;
  background-size: cover;
  overflow: hidden;
}

.full-screen .full-screen-right-side {
  position: relative;
  width: 40%;
  height: 100vh;
  left: 60%;
  margin-top: 8%;
}



@media only screen and (max-width: 768px) {
  .full-screen {
    background: linear-gradient(
        rgba(0, 0, 0, 0.8),
        rgba(0, 0, 0, 0.8)
    ), url('../assets/main-banner.png') no-repeat fixed -100px 0;
    background-size: cover;
  }

  .full-screen .full-screen-right-side {
    width: 100%;
    left: 0;
  }

  .full-screen .full-screen-right-side .full-screen-line {
    width: 100%;
  }

  .header-excerpt {
    text-align: center;
    font: normal normal normal 48px Segoe UI;
  }
}

</style>