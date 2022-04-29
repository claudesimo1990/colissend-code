<template>
  <div class="container" ref="box">
    <div class="row">
      <div class="chatbox chatbox22" :class="displayChat ? '' : 'chatbox--tray'">

          <a href="" @click.prevent="openChat()">
            <div class="chatbox__title text-white"><h5>Contacter {{ to.firstname + ' ' + to.lastname }}</h5></div>
          </a>
        <div class="chatbox__body" id="message-box" v-chat-scroll>
          <div v-for="message in conversations" :id="message.id" :class="message.from.id === from.id ? 'chatbox__body__message chatbox__body__message--right' : 'chatbox__body__message chatbox__body__message--left'">

            <div class="chatbox_timing">
              <ul>
                <li><a href="#"><i class="fa fa-calendar"></i>{{ message.created_at | formatDate }}</a></li>
              </ul>
            </div>

            <img :src="message.user.avatar ? message.user.avatar : '/images/colissend/default.svg'" alt="Picture">

            <div class="clearfix"></div>
            <div class="ul_section_full">
              <ul class="ul_msg">
                <li><strong>{{ message.from.name }}</strong></li>
                <li>{{ message.content }}</li>
              </ul>
              <div class="clearfix"></div>
              <ul class="ul_msg2">
                <li><a href="#"><i class="fa fa-pencil"></i> </a></li>
                <li><a href="#"><i class="fa fa-trash chat-trash"></i></a></li>
              </ul>
            </div>

          </div>
        </div>
        <div class="panel-footer">
          <div class="list-group-item" style="background-color: #012970">
            <div class="my-2">
              <textarea type="text" class="form-control" v-model="message" @keyup.enter.prevent="sendMessage()"  placeholder="Laisser un message ..."></textarea>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script lang="ts">

import {Vue, Component, Ref} from 'vue-property-decorator';
import store from "../../../store/store";
import ContactComponent from "../shared/ContactComponent.vue";

@Component({
  components: { ContactComponent },
  props: {
    to: Object,
    from: Object
  }
})
export default class BookMessage extends Vue {

  message: String = '';

  get displayChat(): boolean {
    return store.getters["message/chatStatus"];
  }

  openChat() {
    store.dispatch('message/openChat', !this.displayChat)
  }

  get conversations() {
    return store.getters["message/conversation"];
  }

  sendMessage () {
    if (this.message.length > 0) {
      store.dispatch('message/storeMessage',{ from: this.$props.from.id, to: this.$props.to.id, content: this.message });
      store.dispatch('message/getMessagesWith', this.$props.to.id);
      this.message = '';
    }
  }

  mounted() {
    store.dispatch('message/getMessagesWith', this.$props.to.id);
  }

}
</script>

<style lang="scss" scoped>
  @import "assets/sass/app/chat";
</style>