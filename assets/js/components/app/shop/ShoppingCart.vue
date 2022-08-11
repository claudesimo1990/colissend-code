<template>
  <div class="card mb-4">
    <div class="card-header py-3">
      <h5 class="mb-0">{{ Object.keys(content).length }} Articles</h5>
    </div>
    <div class="card-body py-2" v-for="item in content" :key="item.id">
      <div class="row">
        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
          <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">

            <span v-html="item.product.image"></span>

            <a href="#!">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
            </a>
          </div>
        </div>

        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
          <p><strong>{{ item.name }}</strong></p>
          <p class="small">{{ item.description }}</p>
          <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                  title="Remove item">
            <i class="bx bx-trash"></i>
          </button>
          <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"
                  title="Move to the wish list">
            <i class="bx bx-heart"></i>
          </button>
        </div>

        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
          <div class="d-flex mb-4 justify-content-between" style="max-width: 300px">
            <button class="btn btn-success px-3 me-2" @click="decrementQuantity(item.id)">
              <i class="bx bx-minus"></i>
            </button>

            <div class="form-outline">
              <input id="form1" min="0" name="quantity" :value="item.quantity" type="text" class="form-control" />
            </div>

            <button class="btn btn-success px-3 ms-2" @click="incrementQuantity(item.id)">
              <i class="bx bx-plus"></i>
            </button>
          </div>
          <p class="text-start text-md-center">
            <strong>{{ item.total|formattedPrice }}</strong>
          </p>
        </div>
      </div>
      <hr class="my-4" />
    </div>
  </div>
</template>

<script lang="ts">

import { Vue, Component } from 'vue-property-decorator';
import store from "../../../store/store";

@Component({
  props: {}
})
export default class ShoppingCart extends Vue {

  product: any = {}

  get content () {
    return store.getters["cart/getContent"];
  }

  get quantity () {
    return store.getters["cart/quantity"];
  }

  get price () {
    return store.getters["cart/price"];
  }

  public incrementQuantity(id: number) {
    store.dispatch("cart/increase", id).then(() => {
      store.dispatch("cart/fetchContent");
    });
  }

  public decrementQuantity(id: number) {
    store.dispatch("cart/decrease", id).then(() => {
      store.dispatch("cart/fetchContent");
    });
  }

  mounted() {

    this.product = this.$props.item

    store.dispatch("cart/fetchContent");

  }

}

</script>
