<template>
  <div class="card" v-bind:style="{backgroundImage: 'url(' + backImg + ')'}" v-bind:data-uuid="uuid" v-on:click="handleRedirect">
    <p class="card-title">{{ title }}</p>
    <div class="card-excerpt">
      <img src="@/assets/headphones.svg">
      <span>86</span>
    </div>
  </div>
</template>

<script>
import router from "@/routes";

export default {
  name: "RadioCard",
  data() {
    return {
      // backImg: `url(${require('@/assets/radio-card.png')})`
    }
  },
  props: {
    title: String,
    backImg: String,
    uuid: Number,
  },
  methods: {
    handleRedirect() {
      router.push({ name: 'Live', params: { uuid: event.target.getAttribute('data-uuid') } });
    }
  }
}
</script>

<style scoped>
.card {
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
}
.card {
  height: 200px;
  width: 600px;
  flex-basis: 40%;
  margin: 20px 0;
  color: var(--white);
  font: normal normal normal 24px Segoe UI;
  background-size: cover;
  filter: grayscale(100%);
  -webkit-filter: grayscale(100%);
  box-shadow: inset 300px 0 200px 20px black;
}

.card:hover {
  cursor: pointer;
  filter: grayscale(0%);
  -webkit-filter: grayscale(0%);
}

.card .card-title {
}

.card .card-excerpt {
  position: relative;
  bottom: -80px;
}

.card .card-excerpt img {
  margin-right: 10px;
}

@media only screen and (max-width: 768px) {
  .card {
    flex-basis: 100%;
    padding: 10px;
  }
}

</style>