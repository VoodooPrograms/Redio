<template>
<!--  <iframe id="ytplayer" ref="audioplayer" type="text/html" width="640" height="360"-->
<!--          src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1"-->
<!--          allow="autoplay"-->
<!--          frameborder="0"/>-->
    <button class='play-button' v-bind:class="{paused: playing}" v-on:click="handlePlay"></button>
</template>

<script>
export default {
  name: "PlayButton",
  data() {
    return {
      playing: false
    };
  },
  methods: {
    handlePlay() {
      this.playing = !this.playing;
      // this.$refs.audioplayer.src = this.$refs.audioplayer.src.slice(0, -1) + '0';
    }
  }
}
</script>

<style scoped>

.play-button {
  background: transparent;
  box-sizing: border-box;
  width: 0;
  height: 72px;
  border-color: transparent transparent transparent var(--white);
  transition: 100ms all ease;
  cursor: pointer;
  border-style: solid;
  border-width: 37px 0 37px 60px;
}
.play-button.paused {
  border-style: double;
  border-width: 0 0 0 60px;
}
.play-button:hover {
  border-color: transparent transparent transparent var(--primary-color);
}

#ytplayer {
  /*width: 0;*/
  /*height: 0;*/
}
</style>