<template>
  <div class="add-song">
    <img :src="photos.yt_photo" />
    <div>
      <p class="add-song-row">Here you can add a song by passing URL address from youtube</p>
      <form class="add-song-row" @submit.prevent="handleAddSong">
        <input type="text" v-model="song.yt_uri" placeholder="Youtube link"/>
        <Button class="message-submit" msg="Submit" color="primary-color"></Button>
      </form>
    </div>
  </div>


  <div class="add-song">
    <img :src="photos.file_photo" />
    <div>
      <p class="add-song-row">Or you can upload your audio files here</p>
      <form class="add-song-row" @submit.prevent="handleUploadSong">
        <input type="text"/>
        <Button class="message-submit" msg="Submit" color="grey" disabled></Button>
      </form>
    </div>
  </div>
</template>

<script>
import Button from "@/components/Button";
import axios from "axios";
import authHeader from "@/services/auth-header";

export default {
  name: "AddSong",
  components: {Button},
  data() {
    return {
      song: {
        playlist_id: this.$route.params.id,
        yt_uri: ''
      },
      photos: {
        yt_photo: '../assets/youtube.png',
        file_photo: '../assets/file.png',
      }
    }
  },
  methods: {
    handleAddSong() {
      let data = this.song;
      axios({
        method: 'post',
        url: 'http://localhost:7000/api/song',
        headers: authHeader(),
        data: data
      }).then(response => (this.info = response))
    },
    handleUploadSong() {

    }
  }
}
</script>

<style scoped>
.add-song {
  display: flex;
  align-items: center;
}

.add-song img {
  width: 200px;
}

.add-song .add-song-row {
  padding: 0 20px;
}

.add-song input {
  width: 400px;
  height: 61px;
  background-color: var(--grey);
  border-radius: 4px;
  border: none;
  padding: 0;
  margin-right: 10px;
}
</style>