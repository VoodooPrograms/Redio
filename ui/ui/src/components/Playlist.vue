<template>
  <div class="song-card" v-for="song in songs" v-bind:key="song">
    <img :src="song.yt_uri">
    <div>
      <p class="song-card-author">{{ song.songData.author }}</p>
      <p class="song-card-songname">{{ song.songData.title }}</p>
    </div>
  </div>
</template>

<script>
import authHeader from "@/services/auth-header";
import {HTTP} from "@/services/http.service";

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
      HTTP.request({
        method: 'get',
        url: '/api/songs/' + this.playlist_id,
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
  width: 300px;
}

.song-card .song-card-author {
  font-weight: bold;
  font-size: 18px;
}


.song-card .song-card-songname {
  font-size: 14px;
}

.song-card div{
  padding: 0 20px;
}
</style>