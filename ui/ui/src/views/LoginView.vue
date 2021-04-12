<template>
  <HomeView>
    <Login></Login>
  </HomeView>
</template>

<script>
import HomeView from "@/views/HomeView";
import Login from "@/components/Login";
export default {
name: "LoginView" ,
  components: {Login , HomeView}
}
</script>

<style scoped>

</style>