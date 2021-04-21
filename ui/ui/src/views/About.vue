<template>
  <h1>About Page</h1>
  <a class="nav-link" href @click.prevent="logOut">LogOut</a>
</template>

<script>
export default {
  name: 'About',
  methods: {
    logOut() {
      this.$store.dispatch('auth/logout');
      this.$router.push('/login');
    }
  }
};

</script>

<style>


</style>