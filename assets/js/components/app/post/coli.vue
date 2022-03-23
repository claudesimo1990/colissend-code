<template>
  <div>
    <div class="text-center d-flex justify-content-between bg-success-light mb-2">
      <h4 class="m-0 p-0">Recherche d'un transporter pour mon Coli</h4>
      <span class="text-success">poids estimé á : {{ post.kilo }} Kilo(s)</span>
    </div>
    <div class="d-flex justify-content-between text-center">
      <div class="text-black-50">
        <i class="bx bxs-plane-take-off home-icon my-2"></i>
        <span class="" v-text="post.from"></span> le
        <span class="">{{ post.dateFrom | formatDate }}</span>
      </div>
      <div class="text-black-50">
        <i class="bx bxs-plane-land home-icon my-2"></i>
        <span class="" v-text="post.to"></span> le
        <span class="">{{ post.dateTo | formatDate }}</span>
      </div>
    </div>
    <div class="my-4">
      <span class="text-black-50">Objects à transporter :</span>
       <span v-for="object in post.objects" :key="object.name">
         <span class="badge rounded-pill rounded mx-1 small" :class="'bg-' + object.color" v-if="object.value">{{ object.name }} {{ object.count > 0 ? 'x' + object.count : '' }}</span>
      </span>
    </div>
    <blockquote class="blockquote-footer border rounded mt-2">
      <span class="text-black">Message de l'expediteur:</span>
      <br>
      <p class="mb-0 mx-2">
        <i class="bx bxs-quote-alt-left fw-bold"></i>
        {{ post.content | preview }}
        <i class="bx bxs-quote-alt-right fw-bold"></i>
      </p>
    </blockquote>
    <div class="text-end my-2">
      <span class="badge border-info text-black-50">
          <i class="bi bi-box-seam mx-2" style="font-size: 40px;color: green;"></i> poster {{ post.created_at | ago }}
      </span>
      <span class="badge border-success border-1 text-success"><i class="bx bx-check-circle"></i>Annonce verifiée!</span>
      <div class="ratings mx-2">
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
        <i class="bi bi-star"></i>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

import {Vue, Component, Prop} from 'vue-property-decorator'

@Component({
  props: {
    post: {}
  }
})
export default class Coli extends Vue {

}
</script>

<style lang=scss>

</style>