<template>

  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <div class="live-grid">
        <AudioPlayer></AudioPlayer>
        <div class="tabs-view">
          <Tabs v-model="active">
            <Tab title="Upcoming Songs">Upcoming Songs</Tab>
            <Tab title="Played Songs">Played Songs</Tab>
          </Tabs>
        </div>
        <Chat></Chat>
      </div>
    </div>
  </div>

</template>

<script>
import Navigation from "@/components/Navigation";
import AudioPlayer from "@/components/AudioPlayer";
import Chat from "@/components/Chat";
import Tabs from "@/components/Tab/Tabs";
import Tab from "@/components/Tab/Tab";
import { ref } from "vue";


export default {
  name: "LiveView",
  components: {Navigation, AudioPlayer, Chat, Tabs, Tab},
  setup() {
    const active = ref(1);

    return { active };
  },
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

.live-grid {
  display: grid;
  grid-template-rows: min-content 1fr; /* adjustment */
  grid-template-columns: 60% 40%;
  grid-template-areas:
    "first main"
    "last main";
  justify-items: center;
}

.tabs-view {
  width: 100%;
}

@media only screen and (max-width: 768px) {
  .col-10 {
    width: 100%;
  }
}
</style>