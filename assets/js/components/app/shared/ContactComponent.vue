<template>
    <div>
      <a type="button" data-bs-toggle="modal" data-bs-target="#verticalycentered" class="btn btn-success">
        <i class="bi bi-chat text-white"></i>
        Contacter {{ user.name }} pour plus de details sur son annonce.
      </a>
        <div class="modal fade" id="verticalycentered" tabindex="-1" ref="my_modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert" v-show="sended">
                        Message transmis avec success!
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="modal-header">
                      <img v-if="user.thumb || user.avatar" :src="thumb ? user.thumb : user.avatar" class="rounded-circle" width="50px" alt="user avatar">
                      <img v-if="user.thumb === '' && user.avatar === ''" src="/images/colissend/default.svg" class="rounded-circle" width="50px" alt="user avatar">
                      <span class="d-none d-md-block ps-2">{{ user.name }}</span>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <textarea class="form-control" v-model="message" id="exampleFormControlTextarea1" placeholder="Tapez votre message" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">arreter</button>
                        <button class="btn btn-success" v-if="show" type="button" disabled="" @click.prevent="send">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        <button type="button" @click.prevent="send()" v-else class="btn btn-success">envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">

import { Vue, Component, Prop } from 'vue-property-decorator'
import store from "../../../store/store";
import User from '../../types/User';

@Component
export default class ContactComponent extends Vue {

    @Prop() user!: User;
    @Prop() auth!: User;

    message: any = '';
    show: boolean = false;
    sended: boolean = false;
    channel: any;

    get status () {
        return store.getters['message/sendStatus']
    }

    public send(): void {

        this.show = true;
        const myThis = this;

        store.dispatch('message/storeMessage', {from: this.auth.id, to: this.user.id , content: this.message }).then(() => {

            setTimeout(function() {
                myThis.message = '';
                myThis.show = false;
                myThis.sended = true;

            }, 1000);
        });
    }
}

</script>
