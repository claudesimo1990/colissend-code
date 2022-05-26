<template>
  <div>
    <div class="">
      <h3 class="fw-bolder text-dark text-center">Recherche d'un transporter</h3>
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
      <h3 class="small text-black-50 fw-bolder">Objects à transporter :</h3>
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6" v-for="object in post.objects" :key="object.id">
            <i v-if="object.type === 'Bagages'" class="bi bi-box-seam text-success large-icon"></i>
            <i v-if="object.type === 'Courrier'" class="bi bi-envelope text-success large-icon"></i>
            <span class="text-black-50 small">{{ object.name }} x{{ object.quantity }} ..Poids: {{ object.weight }} ..Prix: {{ object.price }}<i class="bi bi-currency-euro text-dark fw-bolder"></i>/Unité</span>
          </div>
        </div>
      </div>
    </div>
    <p class="mb-0 mx-2 py-2 text-black-50 small">
      <i class="bx bxs-quote-alt-left fw-bold"></i>
      {{ post.content | preview }}
      <i class="bx bxs-quote-alt-right fw-bold"></i>
    </p>
  </div>
</template>

<script lang="ts">

  import {Vue, Component} from 'vue-property-decorator'

  @Component({
    props: {
      post: {}
    }
  })
  export default class Coli extends Vue {}

</script>
<style lang="scss" scoped>
.large-icon {
  font-size: 20px;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
}
</style>