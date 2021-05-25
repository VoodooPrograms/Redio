<template>

  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <AudioPlayer></AudioPlayer>
      <Chat></Chat>
    </div>
  </div>

</template>

<script>
import Navigation from "@/components/Navigation";
import AudioPlayer from "@/components/AudioPlayer";
import Chat from "@/components/Chat";

export default {
  name: "LiveView",
  components: {Navigation, AudioPlayer, Chat}
}
</script>

<style scoped>
.grid-container {
  width: 100%;
  height: 100vh;
}

.col-10 {
  background-color: black;
  width: 84%;
  height: 100vh;
  float: right;
  justify-content: space-evenly;
}

@media only screen and (max-width: 768px) {
  .col-10 {
    width: 100%;
  }
}
</style>