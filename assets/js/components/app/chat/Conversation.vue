<template>
    <div class="conversation">
        <div class="time-ago my-1 text-end">
            <span>{{ contact ? contact.name : 'Select a Contact' }}, last see: 20/02/2021</span>
        </div>
        <MessagesFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';
import MessagesFeed from "./MessagesFeed.vue";
import MessageComposer from "./MessageComposer.vue";
import store from "../../../store/store";
import axios from "axios";

@Component({
    props: {
        contact: Object,
        messages: []
    },
    components: {
        MessagesFeed: MessagesFeed,
        MessageComposer: MessageComposer
    }
})
export default class Conversation extends Vue {

  user: any = (window as any).auth;

  created() {
    store.dispatch('echo/initEcho');
    this.updateMessages();
  }

  get echo () {
    return store.getters['echo/echo'];
  }

  updateMessages() {
    this.echo.private(`messages-${this.user.id}`).listen('.new-message',  (e) => {
      store.dispatch('message/getMessagesWith', this.$props.contact.id);
      store.dispatch('message/getMessages', this.$props.contact.id);
    })
  }

    sendMessage (message) {
        if (this.$props.contact) {
            store.dispatch('message/storeMessage',{from: this.user.id, to: this.$props.contact.id, content: message}).then((response) =>{
              this.updateMessages()
            });
        }
    }

}
</script>

<style lang=scss>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    .time-ago {
        font-size: 13px;
        margin-bottom: 3px;
        color: #919191;
    }
}
</style>
