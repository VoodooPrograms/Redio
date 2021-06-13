<template>
  <div class="song-card" v-for="song in songs" v-bind:key="song">
    <img :src="song.yt_uri">
    <div>
      <p class="song-card-author">{{ song.author }}</p>
      <p class="song-card-songname">{{ song.song }}</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import authHeader from "@/services/auth-header";

export default {
  name: "Playlist",
  data() {
    return {
      playlist_id: this.$route.params.id,
      songs: []
    }
  },
  created () {
    if (this.playlist_id !== null) {
      this.fetchSongs()
    }
  },
  methods: {
    fetchSongs() {
      axios({
        method: 'get',
        url: 'http://localhost:7000/api/song/' + this.playlist_id,
        headers: authHeader()
      }).then(response => {
        this.songs = response.data;
        this.isFetching = false;
      })
    }
  }
}
</script>

<style scoped>
.song-card {
  display: flex;
  align-items: center;
  margin: 10px 0;
}

.song-card img {
}

.song-card div{
  padding: 0 20px;
}
</style>