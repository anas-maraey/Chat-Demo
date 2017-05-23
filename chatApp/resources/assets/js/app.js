
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import EchoLibrary from "laravel-echo"
 //
 // window.Echo = new EchoLibrary({
 //     broadcaster: 'pusher',
 //     key: '7f79e85163b287fe29c2'
 // });

 window.Echo = new EchoLibrary({
     broadcaster: 'pusher',
     key: '7f79e85163b287fe29c2',
     cluster: 'eu',
     encrypted: true
 });


Vue.component('example', require('./components/Example.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));


const app = new Vue({
    el: '#app',
    data: {
      messages: []
    },
    methods:{
      addMessage(message){
        //Add message  to messages array
        console.log('mess',message);
        this.messages.push(message);

        //Storing Messages in Database
        axios.post('/messages',message).then(response => {

        });
        console.log('message added');
      }
    },
    created(){
      axios.get('/messages').then(response => {
        this.messages = response.data;
      });

      Echo.join('chatroom')
          // .here()
          // .joining()
          // .leaving()
          .listen('MessagePosted',(e) => {
            console.log('message_event',e);
          });
    }
});
