<template>
  <div class="accordion accordion-flush my-2" id="faq-group-1">
    <div class="accordion-item my-2" v-for="(message, index) in notifications" :id="message.id">
      <h2 class="accordion-header p-1" :class="message.read === 0 ? 'bg-success-light' : 'bg-secondary-light' ">
        <button class="accordion-button collapsed d-flex gap-5 text-center" :data-bs-target="'#faqsOne-' + message.id" type="button" data-bs-toggle="collapse" aria-expanded="false">
          <img :src="message.user.avatar" :alt="'avatar-' + message.user.firstname"  class="rounded-circle" width="30px">
          <span class="fw-bold">Message de {{ message.user.firstname + ' ' + message.user.lastname }}</span>
          <span class="text-muted pt-2">{{ message.created_at | ago }}</span>
        </button>
      </h2>
      <div :id="'faqsOne-' + message.id" class="accordion-collapse collapse p-1" data-bs-parent="#faq-group-1" style="">
        <div class="accordion-body pt-2">
          <p>{{ message.content }}</p>
          <div class="d-flex justify-content-between">
            <div></div>
            <div class="d-flex justify-content-between">
              <a href="#" @click.prevent="response(message)" type="submit" class="btn btn-link text-success">Repondre</a>
              <a  href="#" @click.prevent="markAsRead(message)" type="submit" class="btn btn-link text-info">Marquer comme lus</a>
              <a  href="#" @click.prevent="remove(message, index)"type="button" class="btn btn-link text-danger">Supprimer</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <book-message v-if="!hideChat" :to="to" :from="from"></book-message>
  </div>
</template>

<script lang="ts">

import {Vue, Component, Prop} from 'vue-property-decorator';
import axios from "axios";
import BookMessage from "../chat/BookMessage.vue";
import store from "../../../store/store";

@Component({
  components: {
    BookMessage
  }
})
export default class Messages extends Vue {

  @Prop() messages!: any;
  @Prop() auth!: any;

  notifications: any = this.messages;
  to: object = this.$props.auth;
  from: object = this.$props.auth;
  hideChat = true;

  response(message: any) {
    this.to = message.user;
    this.from = this.$props.auth;

    this.hideChat = false;
    store.dispatch('message/openChat', true)
  }

  markAsRead(message: any) {
    axios.post('/user/profile/messages/' + message.id, {}).then((response) => {
      message.read = true;
    }).catch(function (error) {
      console.log(error)
    })
  }

  remove(message: any, index: number) {
    axios.post('/user/profile/messages/delete/' + message.id, {}).then((response) => {
      this.notifications.splice(index, 1);
    }).catch(function (error) {
      console.log(error)
    })
  }

  mounted () {
    this.hideChat = true;
  }

}
</script>