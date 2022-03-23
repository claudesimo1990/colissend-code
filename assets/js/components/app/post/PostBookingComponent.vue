<template>
  <div>
    <h1 class="text-center fw-bold" v-html="post.type === 'TRAVEL' ? 'Reserver vos kilos !' : 'Je me propose !'"></h1>
    <div class="card mt-4">
      <div class="card-body pb-0">
        <div class="pub">
          <div class="row">
            <div class="col-md-4">
              <user-card-component :user="post.user"></user-card-component>
            </div>
            <div class="col-md-8">
              <travel v-if="post.type === 'TRAVEL'" :post="post" :auth="auth"></travel>
              <coli v-if="post.type === 'PACKS'" :post="post" :auth="auth"></coli>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

import {Vue, Component, Prop, Watch} from 'vue-property-decorator'
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

  .plane-icon
  {
      font-size: 4rem;
  }
</style>
