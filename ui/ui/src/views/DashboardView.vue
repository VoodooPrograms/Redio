<template>
  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <div class="tabs-view">
        <Tabs v-model="active">
          <Tab title="Lists of playlists">
            <div v-if="!isFetching">
              <div v-for="playlist in playlists" v-bind:key="playlist" class="playlist">
                  <img :src="playlist.image_uri" />
                  <div class="playlist-info">
                    <router-link :to="{ name: 'Playlist', params: { id: playlist.id }}">
                      <p class="playlist-title">{{ playlist.name }}</p>
                    </router-link>
                    <div class="playlist-tags">
                      <span class="playlist-tag" v-for="tag in playlist.tags" v-bind:key="tag">{{ tag }}</span>
                    </div>
                  </div>
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
import {HTTP} from "@/services/http.service";
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
      HTTP.request({
        method: 'get',
        url: '/api/playlists',
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

.playlist {
  display: flex;
  width: 500px;
  margin: 20px 0;
}

.playlist-info {
  display: flex;
  flex-direction: column;
}

.playlist-info .playlist-title {
  font-weight: bold;
  font-size: 18px;
  color: var(--white);
}

.playlist-info .playlist-tags {
  display: inline-block;
}

.playlist-info .playlist-tags .playlist-tag {
  font-size: 14px;
  background-color: var(--grey);
  border-radius: 5px;
  padding: 4px;
  margin: 2px 5px;
}

.playlist img {
  width: 200px;
}

@media only screen and (max-width: 768px) {
  .col-10 {
    width: 100%;
  }
}
</style>