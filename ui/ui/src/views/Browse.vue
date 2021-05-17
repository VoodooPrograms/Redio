<template>
  <div class="grid-container">
    <Navigation></Navigation>
    <div class="col-10">
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
      <RadioCard></RadioCard>
    </div>

  </div>
</template>

<script>
import Navigation from "@/components/Navigation";
import RadioCard from "@/components/RadioCard";

export default {
  name: "Browse",
  components: {RadioCard , Navigation}
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