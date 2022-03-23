<template>
  <div>
    <div class="plane d-flex justify-content-between">
      <div class="fw-bold">
        <i class="bx bxs-plane-take-off plane-icon"></i>
        <div class="label">{{ post.from }}</div>
        <div>{{ post.dateFrom  | formatDate }}</div>
      </div>
      <div class="fw-bold">
        <i class="bx bxs-plane-land plane-icon"></i>
        <div class="label">{{ post.to }}</div>
        <div>{{ post.dateTo | formatDate }}</div>
      </div>
    </div>
    <div class="my-2 text-center">
      <div class="bg-success">
        <h4 class="text-white fw-bold">{{ post.kilo }} Kilos encore disponibles!</h4>
      </div>
    </div>
    <div class="py-2">
      Objects acceptés par le voyageur :
      <span v-for="object in post.objects" :key="object.name">
          <span class="badge rounded-pill rounded mx-1" :class="'bg-' + object.color" v-if="object.value">{{ object.name }} {{ object.count > 0 ? 'x' + object.count : '' }}</span>
      </span>
    </div>
<!--    <div class="my-4">
      <div class="small">
        <contact-component :Auth="auth"  :User="post.user"></contact-component>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4">
        <label class="col-form-label">Que souhaiter vous envoyer ?</label>
      </div>
      <div class="col-md-4">
        <textarea type="text" v-model="booking.message" class="form-control"></textarea>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-4">
        <label class="col-form-label">Combien de Kilos environ ?</label>
      </div>
      <div class="col-md-4">
        <input v-model.lazy="booking.kilo"  type="text" class="form-control">
      </div>
      <div class="col-md-4">
        <input type="submit" @click.prevent="send()" class="btn btn-success" value="reserver">
        <div class="spinner-grow" role="status" v-if="show">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>-->
  </div>
</template>

<script lang="ts">

import {Vue, Component, Prop} from 'vue-property-decorator'

@Component({
  props: {
    post: {}
  }
})
export default class Travel extends Vue {

}
</script>