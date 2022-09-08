<template>
  <ul class="list-group list-group-flush">
    <li
        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
      Produits
      <span>{{ toPay.subTotal }}€</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
      Livraison
      <span>Gratuit</span>
    </li>
    <li
        class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
      <div>
        <strong>Total a payer</strong>
        <strong>
          <p class="mb-0">(TTC)</p>
        </strong>
      </div>
      <span><strong>{{ toPay.total }}€</strong></span>
    </li>
  </ul>

</template>

<script lang="ts">

import { Vue, Component } from 'vue-property-decorator';
import store from "../../../store/store";

@Component({
  props: {}
})
export default class TotalToPay extends Vue {

  product: any = {}

  get toPay () {
    return store.getters["cart/total"];
  }

  mounted() {
    store.dispatch("cart/fetchContent");

  }

}

</script>
