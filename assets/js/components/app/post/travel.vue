<template>
  <div>
    <div class="text-center d-flex justify-content-between">
      <h4 class="m-0 p-0 text-success">{{ post.kilo }} kilos encore disponibles</h4>
      <span class="text-success">{{ post.price }}&#8364;/Kilo</span>
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
      <span class="text-black-50">Objects transportables :</span>
      <span v-for="object in post.objects" :key="object.name">
        <span :class="'badge fw-bold bg-' + object.color"  v-if="object.value">{{ object.name }}{{ object.number > 0 ? ' x' . object.number  : '' }}</span>
      </span>
    </div>
    <blockquote class="blockquote-footer border rounded mt-2">
      <span class="text-black">Message du voyageur:</span>
      <br>
      <p class="mb-0 mx-2">
        <i class="bx bxs-quote-alt-left fw-bold"></i>
          {{ post.content | preview }}
        <i class="bx bxs-quote-alt-right fw-bold"></i>
      </p>
    </blockquote>
    <div class="text-end my-2">
      <span class="badge border-info text-black-50">
          <i class="bx bxs-plane mx-2" style="font-size: 40px;color: green"></i> poster {{ post.created_at | ago }}
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

  import {Vue, Component} from 'vue-property-decorator'

  @Component({
    props: {
      post: {}
    }
  })
  export default class Travel extends Vue {}

</script>