<template>
  <HomeView>
    <Home></Home>
  </HomeView>
</template>

<script>
import HomeView from "@/views/HomeView";
import Home from "@/components/Home";
export default {
name: "EntryView" ,
  components: {Home , HomeView}
}
</script>

<style scoped>

</style>