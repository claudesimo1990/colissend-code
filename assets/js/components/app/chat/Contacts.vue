<template>
    <ul class="messages message-dropdown-menu list-unstyled">
        <a href="#">
            <li class="list-group-item d-flex justify-content-between align-items-start"
                v-for="contact in contacts" :key="contacts.id"
                :id="contacts.id" @click="selectContact(contact)"
                :class="{ 'active-contact': contact === selected }">
                <img :src="contact.avatar" width="40" height="40" alt="" class="rounded-circle">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ contact.name }}</div>
                    <p class="time-ago">{{ contact.unread['last'] | max }}</p>
                    <p class="time-ago">{{ contact.created_at | ago }}</p>
                </div>
                <span class="badge bg-primary rounded-pill" v-if="contact.unread">{{ contact.unread['count'] }}</span>
            </li>
        </a>
    </ul>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator'
import store from "../../../store/store";

@Component({
    props: {
        contacts: []
    }
})
export default class Contacts extends Vue {

    selected: any = this.$props.contacts.length ? this.$props.contacts[0] : null

    public selectContact(contact) {
        this.selected = contact;
        this.$emit('selected', contact);
    }

    mounted(): void {
        store.dispatch('message/getMessages');
    }

}
</script>

<style lang="scss">

    .list-group-item:hover {
        background-color: #f6f9fe;
    }

    .active-contact {
        background-color: #f6f9fe;
    }

    h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #444444;
    }

    .time-ago {
        font-size: 13px;
        margin-bottom: 3px;
        color: #919191;
    }

</style>
