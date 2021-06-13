<template>
  <div class="add-playlist">
      <form class="add-playlist-form" @submit.prevent="handleAddPlaylist" enctype="multipart/form-data">
        <input type="text" v-model="playlist.name" placeholder="Playlist Name"/>
        <input type="file" id="file" ref="file" @change="uploadFile"/>
        <TagInput :getTags="getTags"></TagInput>
        <Button class="message-submit" msg="Submit" color="primary-color"></Button>
      </form>
  </div>
</template>

<script>
import Button from "@/components/Button";
import axios from "axios";
import authHeader from "@/services/auth-header";
import TagInput from "@/components/TagsInput/TagInput";

export default {
  name: "AddPlaylist",
  components: {Button, TagInput},
  data() {
    return {
      files: null,
      playlist: {
        name: '',
        image: '',
        tags: []
      },
    }
  },
  methods: {
    uploadFile(event) {
      this.files = event.target.files;
    },
    getTags(tags) {
      this.playlist.tags = tags;
    },
    handleAddPlaylist() {
      let data = new FormData();
      data.append('name', this.playlist.name);
      data.append('image_uri', this.files.[0]);
      for (let i = 0; i < this.playlist.tags.length; i++) {
        data.append('tags[]', this.playlist.tags[i]);
      }

      axios({
        method: 'post' ,
        url: 'http://localhost:7000/api/playlists',
        headers: authHeader(),
        data: data
      }).then(response => (this.info = response))
    }
  }
}
</script>

<style scoped>

.add-playlist-form {
  display: block;
}

.add-playlist-form > input {
  width: 100%;
  margin: 10px 0;
  background-color: var(--bg-color);
  border: none;
  line-height: 30px;
  color: var(--white);
}



</style>