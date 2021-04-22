<template>
  <form @submit.prevent="handleSendMessage">
    <div class="user-box">
      <input type="text" required=""
             v-model="chat.message"
             class="form-control"
             name="message">
    </div>
      <Button msg="Submit" color="primary-color"></Button>
  </form>

  <ul>
    <li v-for="m in messages" v-bind:key="m">
      {{ m.message }}
    </li>
  </ul>

</template>

<script>
import Button from "@/components/Button";
import Message from "@/models/message";
import axios from "axios";

export default {
  name: "Chat",
  components: {Button},
  data() {
    return {
      messages: [],
      chat: new Message(''),
    }
  },
  created() {
    this.setupStream();
  },
  methods: {
    setupStream() {
      const eventSource = new EventSource('http://localhost:9090/.well-known/mercure?topic=' + encodeURIComponent('https://example.com/chat'));
      console.log("Connected...");
      eventSource.onmessage = event => {
        console.log(JSON.parse(event.data));
        let data = JSON.parse(event.data);
        console.log(this.messages);
        this.messages.push(data);
        if (this.messages.length > 20) this.messages.shift();
      }
    },
    handleSendMessage() {
      console.log(this.chat);
      axios
          .get('http://localhost:7000/push', {
            params: {
              message: this.chat.message
            }
          })
          .then(response => (this.info = response))
      }
    }
}
</script>

<style scoped>

</style>