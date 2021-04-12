<template>
  <HomeView>
    <Register></Register>
  </HomeView>
</template>

<script>
import HomeView from "@/views/HomeView";
import Register from "@/components/Register";
export default {
name: "RegisterView" ,
  components: {HomeView, Register}
}
</script>

<style scoped>

</style>