<template>
  <div class="card-footer pt-0 border-top-0 bg-transparent">
    <div class="text-center">
      <button class="btn btn-outline-dark mt-auto" @click="addToCart">Ajouter au panier</button>
    </div>
  </div>
</template>

<script lang="ts">

import { Vue, Component } from 'vue-property-decorator';
import axios from "axios";

@Component({
  props: {
    productId: {}
  }
})
export default class AddToCart extends Vue {

  public addToCart() {
    axios.get('/sanctum/csrf-cookie').then((res) => {
      axios.get('/api/user').then((res) => {
        this.addProduct(this.$props.productId);
        console.log(res)
      }).catch((error) => {
        console.log(error)
      })
    }).catch((error) => {
      console.log(error)
    })
  }
   addProduct(productId: any) {
     console.log(window)
  }

}

</script>
