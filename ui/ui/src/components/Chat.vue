<template>

  <div class="chat-list">
    <div class="chat-element" v-for="m in messages" v-bind:key="m">
      {{ m.message }}
    </div>
    <form class="message-form" @submit.prevent="handleSendMessage">
      <div class="user-box">
        <input type="text" required=""
               v-model="chat.message"
               class="message-input"
               name="message"
               placeholder="Type your message..."
        >
      </div>
      <Button class="message-submit" msg="Submit" color="primary-color"></Button>
    </form>
  </div>

</template>

<script>
import Button from "@/components/Button";
import Message from "@/models/message";
import {HTTP} from "@/services/http.service";

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
      HTTP.get('/push', {
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

.chat-list {
  width: 600px;
  height: 300px;
  background-color: var(--bg-color);
  position: relative;
}

.chat-list .chat-element {
  color: var(--white);
}

.message-form {
  width: 600px;
  height: 40px;
  bottom: 0;
  position: absolute;
}

.message-form .message-input {
  width: 600px;
  height: 40px;
  padding: 0;
  box-sizing: border-box;
}

</style>