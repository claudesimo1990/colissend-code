<template>
    <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">{{ totalUnread }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages message-dropdown-menu">
            <li class="dropdown-header">
                vous avez {{ contacts.length }} nouveaux messages
                <a :href="path"><span class="badge rounded-pill bg-primary p-2 ms-2">voir tous</span></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="message-item position-relative" v-for="contact in contacts" :key="contact.id">
                <a href="#">
                    <img :src="contact.avatar" width="40" height="40" alt="" class="rounded-circle">
                    <div>
                        <h4>{{ contact.name }}</h4>
                        <p>{{ contact.unread['last'] | max }}</p>
                        <p>{{ contact.created_at | ago }}</p>
                    </div>
                </a>
              <span class="badge bg-secondary badge-number mx-5 mt-2">{{ contact.unread['count'] }}</span>
            </li>

            <li class="dropdown-footer">
                <a href="#">Afficher tous les messages</a>
            </li>

        </ul>

    </li>
</template>

<script lang="ts">

import { Vue, Component, Prop } from 'vue-property-decorator'
import store from "../../../store/store";
import User from '../../types/User'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

Vue.use(Toast);

@Component({
    props: {
        path: String
    }
})
export default class MessageComponent extends Vue {

  @Prop() Auth!: User;

  created() {
    store.dispatch('echo/initEcho');
    this.presenceChannelMethod();
  }

  get echo () {
    return store.getters['echo/echo'];
  }

  presenceChannelMethod() {
    this.echo.private(`messages-${this.Auth.id}`).listen('.new-message',  (e) => {
      store.dispatch('message/getMessages').then(response => {
        this.$toast.success("Nouveau message de "+`${e.message.user.name}`, {
          timeout: 5000,
          closeOnClick: true,
          pauseOnFocusLoss: true,
          pauseOnHover: true,
          draggable: true,
          draggablePercent: 0.6,
          showCloseButtonOnHover: false,
          hideProgressBar: true,
          closeButton: "button",
          rtl: false
        });
      })
    })
  }

    get contacts () {
        return store.getters['message/messages'];
    }

    get totalUnread() {
      let t = 0;
      for (let contactsKey in this.contacts) {
        t += this.contacts[contactsKey].unread['count']
      }
      return t;
    }

    mounted(): void {
            store.dispatch('message/getMessages');
        }

    }

</script>

<style lang="scss">

.message-dropdown-menu {
    max-height: 32em;
    overflow-y: auto;
}

</style>
