<template>
  <div class='tag-input'>
    <div v-for='(tag, index) in tags' :key='tag' class='tag-input__tag'>
      <span @click='removeTag(index)'>x</span>
      {{ tag }}
    </div>
    <input
        type='text'
        placeholder="Enter a Tag"
        class='tag-input__text'
        @keydown.enter='addTag'
        KeyboardEvent.188='addTag'
    />
  </div>
</template>
<script>
export default {
  data () {
    return {
      tags: []
    }
  },
  props: {
    getTags: Function
  },
  methods: {
    addTag (event) {
      event.preventDefault()
      let val = event.target.value.trim()
      if (val.length > 0) {
        this.tags.push(val)
        event.target.value = ''
      }
      this.getTags(this.tags);
    },
    removeTag (index) {
      this.tags.splice(index, 1)
    }
  }
}
</script>
<style scoped>
.tag-input {
  width: 100%;
  border: 1px solid #eee;
  background-color: var(--bg-color);
  font-size: 0.9em;
  height: 50px;
  box-sizing: border-box;
  padding: 0 10px;
}

.tag-input__tag {
  height: 30px;
  float: left;
  margin-right: 10px;
  background-color: var(--grey);
  margin-top: 10px;
  line-height: 30px;
  padding: 0 5px;
  border-radius: 5px;
}

.tag-input__tag > span {
  cursor: pointer;
  opacity: 0.75;
}

.tag-input__text {
  color: var(--white);
  border: none;
  outline: none;
  font-size: 0.9em;
  line-height: 50px;
  background: none;
}
</style>