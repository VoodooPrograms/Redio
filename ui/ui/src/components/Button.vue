<template>
  <button class="button" :style="style">
    <div class="button-text">{{ msg }}</div>
  </button>
</template>

<script>
export default {
  name: "Button",
  props: {
    msg: String,
    color: String
  },
  computed: {
    style () {
      return 'background-color: var(--' + (this.color ?? 'grey') + ')';
    }
  },
}
</script>

<style scoped>

.button {
  width: 150px;
  height: 61px;
  background: 0 0 no-repeat padding-box;
  border-radius: 4px;
  border: none;
  cursor: pointer;
}

.button .button-text {
  text-align: center;
  font: normal normal bold 18px/30px Arial;
  letter-spacing: 0;
  color: #E9DDDE;
  opacity: 1;
}

@media only screen and (max-width: 768px) {
  .button {
    width: 150px;
  }
}
</style>