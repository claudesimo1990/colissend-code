<template>
  <section class="section dashboard mt-3">
    <h1 class="title text-center my-5 fw-bold" v-if="post.type === 'TRAVEL'">Reserver vos kilos</h1>
    <h1 class="title text-center my-5 fw-bold" v-if="post.type === 'PACKS'">Je me propose</h1>
    <div class="row">
      <div class="col-lg-3">
        <user-card-component :user="post.user" branch="booking" :type="post.type" :created="post.created_at|ago" :thumb="false"></user-card-component>
      </div>
      <div class="col-lg-9">
        <travel v-if="post.type === 'TRAVEL'" :post="post" :auth="auth"></travel>
        <coli v-if="post.type === 'PACKS'" :post="post" :auth="auth"></coli>
      </div>
    </div>
  </section>
</template>

<script lang="ts">

import {Vue, Component, Prop} from 'vue-property-decorator'
import UserCardComponent from "../shared/UserCardComponent.vue";
import Travel from "../booking/Travel.vue";
import Coli from "../booking/Coli.vue";

import Post from "../../types/Post";

@Component({
    components: { UserCardComponent, Travel, Coli }
})

export default class PostBookingComponent extends Vue {

    @Prop() post!: Post;
    @Prop() auth!: any;
}

</script>

<style lang="scss">

  .plane-icon {
      font-size: 4rem;
  }
</style>
