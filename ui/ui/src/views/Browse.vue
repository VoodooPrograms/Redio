<template>
  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <RadioCard v-for="playlist in playlists" :key="playlist"
                 :title="playlist.name"
                 :uuid="playlist.id"
                 :back-img="playlist.image_uri">
      </RadioCard>
    </div>

  </div>
</template>

<script>
import Navigation from "@/components/Navigation";
import RadioCard from "@/components/RadioCard";
import {HTTP} from "@/services/http.service";
import authHeader from "@/services/auth-header";

export default {
  name: "Browse",
  components: {RadioCard , Navigation},
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

@media only screen and (max-width: 768px) {
  .col-10 {
    width: 100%;
  }
}
</style>