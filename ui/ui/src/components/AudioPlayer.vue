<template>
  <div class="player" v-bind:style="{backgroundImage: backImg}">
    <div class="player-controls">
      <div class="player-controls-40">Weezer - Island in the sun</div>
      <div class="player-controls-20">
        <img src="@/assets/headphones.svg"><span>86</span>
        <PlayButton></PlayButton>
      </div>
      <div class="player-controls-40">cos tu bedzie</div>
    </div>
  </div>
</template>

<script>
import PlayButton from "@/components/PlayButton";

export default {
  name: "AudioPlayer",
  components: {PlayButton},
  data() {
    return {
      backImg: `url(${require('@/assets/radio-card-player.png')})`
    }
  }
}
</script>

<style scoped>
.player {
  width: 600px;
  height: 450px;
  background-size: cover;

  color: var(--white);
  font: normal normal normal 18px Segoe UI;
}

.player-controls {
  width: 100%;
  height: 80%;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: flex-end;
}

.player-controls > div {
  text-align: center;
}

.player-controls .player-controls-20 {flex-basis: 20%;}
.player-controls .player-controls-40 {flex-basis: 40%;}
</style>