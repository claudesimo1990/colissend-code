<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to === contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text">
                    {{ message.content }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script lang="ts">

import {Vue, Component, Watch} from 'vue-property-decorator';

@Component({
    props: {
        messages: [],
        contact: Object,
    }
})
export default class extends Vue {

    scrollToBottom() {
        setTimeout(() => {
            let feed: any = this.$refs['feed'];
            feed.scrollTop = feed.scrollHeight - feed.clientHeight;
        }, 50);
    }

    @Watch('contact')
    scrollContact(contact) {
        this.scrollToBottom();
    }
    scrollMessages(messages) {
        this.scrollToBottom();
    }

}
</script>

<style lang=scss>
.feed {
    height: 100%;
    max-height: 400px;
    overflow: scroll;

    ul {
        list-style-type: none;
        padding: 5px;
        li {
            &.message {
                margin: 5px 0;
                width: 100%;
                .text {
                    max-width: 200px;
                    border-radius: 20px;
                    font-size: 12px;
                    padding: 6px;
                    display: inline-block;
                }
                &.received {
                    text-align: right;
                    .text {
                        background: #b2b2b2;
                    }
                }
                &.sent {
                    text-align: left;
                    .text {
                        background: #81c4f9;
                    }
                }
            }
        }
    }
}
</style>
