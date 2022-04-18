<template>
  <div>
    <div class="mb-2">
      <h3 class="fw-bolder text-dark text-center">{{ post.kilo }} kilos encore disponibles .... {{ post.price }}&#8364;/Kilo</h3>
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
    <div class="mt-3 border px-1">
      <h3 class="small text-black-50 fw-bolder">Je transporte aussi les courriers</h3>
      <div class="col-md-12">
        <i class="bi bi-envelope text-success large-icon"></i>
        <span class="text-black-50"> ............. Quantité: {{ post.objects.courrier.number }} .......... Prix: {{ post.objects.courrier.price }}<i class="bi bi-currency-euro text-dark fw-bolder"></i>/Unité</span>
      </div>
    </div>
    <blockquote class="blockquote-footer border rounded mt-2">
      <span class="text-black">Message:</span>
      <br>
      <p class="mb-0 mx-2">
        <i class="bx bxs-quote-alt-left fw-bold"></i>
          {{ post.content | preview }}
        <i class="bx bxs-quote-alt-right fw-bold"></i>
      </p>
    </blockquote>
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