<template lang="html">
  <div class="chat-composer">
    <input type="text" name="" placeholder="Type Your Message..." v-model="chatMessage" v-on:keyup.enter="sendMessage">
    <button type="button" name="send" class="btn btn-primary" @click="sendMessage">Send</button>
  </div>
</template>
<script>
  export default{
    data(){
      return {
        chatMessage:''
      }
    },
    methods: {
      sendMessage(){
        this.$emit('messagesent',{
          message: this.chatMessage,
          user: {
            name: $('.navbar-right .dropdown-toggle').text()
          }
        });
        console.log('from event',this.chatMessage);
        this.chatMessage = '';
      }
    }
  }
</script>
<style lang="css">
  .chat-composer{
    display: flex;

  }
  .chat-composer input {
    flex: 1 auto;
  }
  .chat-composer button {
    border-radius: 0;
  }
</style>
