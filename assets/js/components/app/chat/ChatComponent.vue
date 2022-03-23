<template>
    <div class="row chat d-flex">
        <div class="col-4">
            <ContactsComponent :contacts="contacts" @selected="startConversationWith"/>
        </div>
        <div class="col-8 text-dark border conversation">
            <ConversationComponent :contact="selectedContact" :messages="conversations"/>
        </div>
    </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';
import Contacts from "./Contacts.vue";
import store from "../../../store/store";
import Conversation from "./Conversation.vue";

@Component({
    components: {
        ContactsComponent: Contacts,
        ConversationComponent: Conversation
    }
})
export default class ChatComponent extends Vue {

    messages: any = [];
    selectedContact: any = null;
    allContact: any = [];

    get conversations(){
        return store.getters["message/conversation"];
    }

    get contacts() {
        return store.getters['message/messages'];
    }

    startConversationWith(contact) {
        this.updateUnreadCount(contact, true);
        store.dispatch('message/getMessagesWith',contact.id);
        this.selectedContact = contact;

    }

    saveNewMessage(message) {
        this.messages.push(message);
    }

    hanleIncoming(message) {
        if (this.selectedContact && message.from == this.selectedContact.id) {
            this.saveNewMessage(message);
            return;
        }
        this.updateUnreadCount(message.from_contact, false);
    }

    updateUnreadCount(contact, reset) {
        if (reset)
          contact.unread['count'] = 0;
        else
          contact.unread += 1;
        return contact;
    }

}
</script>

<style lang="scss" scoped>

.chat {
    height: 550px;

    .conversation {
        padding: 0 0 !important;
        margin: 0 0 !important;
    }
}

</style>
