<template>
  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <div class="tabs-view">
        <Tabs v-model="active">
          <Tab title="Lists of playlists">
            <div v-if="!isFetching">
              <div v-for="playlist in playlists" v-bind:key="playlist">
                <p>{{ playlist.name }}</p>
                <p>{{ playlist.image_uri }}</p>
                <p>{{ playlist.tags }}</p>
              </div>
            </div>
          </Tab>
          <Tab title="Add a playlist">
            <AddPlaylist></AddPlaylist>
          </Tab>
        </Tabs>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import authHeader from "@/services/auth-header";
import Navigation from "@/components/Navigation";
import Tab from "@/components/Tab/Tab";
import Tabs from "@/components/Tab/Tabs";
import { ref } from "vue";
import AddPlaylist from "@/components/AddPlaylist";

export default {
  name: "DashboardView",
  components: {AddPlaylist , Navigation, Tabs, Tab},
  setup() {
    const active = ref(0);

    return { active };
  },
  data() {
    return {
      playlists: [],
      isFetching: true
    }
  },
  created () {
    this.fetchPlaylists()
  },
  methods: {
    fetchPlaylists() {
      axios({
        method: 'get',
        url: 'http://localhost:7000/api/playlists',
        headers: authHeader()
      }).then(response => {
        this.playlists = response.data;
        this.isFetching = false;
      })
    }
  }
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