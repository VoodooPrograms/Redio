<template>
  <div class="song-card" v-for="item in items" v-bind:key="item">
    <img :src="item.imgSrc">
    <div>
      <p class="song-card-author">{{ item.author }}</p>
      <p class="song-card-songname">{{ item.song }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "Playlist",
  data() {
    return {
      items: [
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
        {imgSrc: '../assets/stonedjesus.png' , author: 'Stoned Jesus' , song: 'I am the mountain'} ,
      ]
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