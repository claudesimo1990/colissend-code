<template>
    <div class="form-floating composer">
        <textarea class="form-control" v-model="message" @keydown.enter="send" placeholder="Leave a comment here" id="test-3" style="height: 100px;"></textarea>
        <label>Message...</label>
    </div>
</template>

<script lang="ts">

import { Vue, Component } from 'vue-property-decorator'

@Component
export default class extends Vue {

    message: String = '';

    //TODO add typing from whisper

    send(e) {
        e.preventDefault();

        if (this.message == '') {
            return;
        }
        this.$emit('send', this.message);
        this.message = '';
    }

}
</script>

<style lang="scss">
    .composer textarea {
        resize: none;
    }
</style>
