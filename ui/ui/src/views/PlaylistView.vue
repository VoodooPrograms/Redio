<template>
  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <div class="tabs-view">
        <Tabs v-model="active">
          <Tab title="Playlist">
            <Playlist></Playlist>
          </Tab>
          <Tab title="Add Song">
            <AddSong></AddSong>
          </Tab>
          <Tab title="Metrics">Metrics</Tab>
        </Tabs>
      </div>
    </div>

  </div>
</template>

<script>
import AddSong from "@/components/AddSong";
import Playlist from "@/components/Playlist";
import Navigation from "@/components/Navigation";
import Tabs from "@/components/Tab/Tabs";
import Tab from "@/components/Tab/Tab";
import { ref } from "vue";

export default {
  name: "PlaylistView",
  components: {AddSong , Playlist , Navigation, Tabs, Tab},
  setup() {
    const active = ref(0);

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
  float: right;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-evenly;
}

@media only screen and (max-width: 768px) {
  .col-10 {
    width: 100%;
  }
}
</style>