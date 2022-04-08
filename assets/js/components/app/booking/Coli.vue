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
        <h4 class="text-white fw-bold">Poids des colis estimé à : {{ post.kilo }} Kilo(s)</h4>
      </div>
    </div>
    <div class="py-2">
      Objects à transporter :
      <span v-for="object in objects" :key="object.name">
          <span class="badge rounded-pill rounded mx-1" :class="'bg-' + object.color">{{ object.name }} {{ object.count > 0 ? 'x' + object.count : '' }}</span>
      </span>
    </div>
    <div class="my-3">
      <contact-component :auth="auth"  :user="post.user"></contact-component>
    </div>
    <div class="row">
      <div class="py-2">
        Que pouvez vous transporter :
        <div class="form-check form-check-inline" v-for="obj in trueSelectedObjects()">
          <div class="align-center">
            <label class="form-check-label" :for="obj.name">{{ obj.name }}</label>
            <input class="form-check-input" :name="obj.name" v-model="obj.value" type="checkbox" :id="obj.name">
          </div>
        </div>
      </div>
      <ValidationObserver v-slot="{ handleSubmit }">
        <form method="post" class="row g-3" @submit.prevent="handleSubmit(send)" ref="form">
          <ValidationProvider rules="required|integer" v-slot="{ errors }">
          <div class="form-floating my-2">
            <select class="form-select" id="floatingSelect" v-model="booking.travel" aria-label="State">
              <option class="text-black-50 small" v-for="travel in auth.travels" :key="travel.id" :value="travel.id">{{ travel.from }} - {{ travel.to }}</option>
            </select>
            <label class="" for="floatingSelect">Quel est le voyage avec le quel vous vous proposer ?</label>
            <span class="invalid-feedback d-block" role="alert">
                <small>{{ errors[0] }}</small>
            </span>
          </div>
          </ValidationProvider>
          <div class="my-2">
            <ValidationProvider rules="required|numeric" v-slot="{ errors }">
              <input type="text" class="form-control" id="kilo" v-model="booking.kilo" placeholder="A combien estimez vous le poids en Kg">
              <span class="invalid-feedback d-block" role="alert">
                  <small>{{ errors[0] }}</small>
              </span>
            </ValidationProvider>
          </div>
          <div class="my-2">
            <ValidationProvider rules="required|integer" v-slot="{ errors }">
                <input type="text" class="form-control" id="price" v-model="booking.price" placeholder="A combien estimez vous la somme à payer en Euro">
                <span class="invalid-feedback d-block" role="alert">
                    <small>{{ errors[0] }}</small>
                </span>
            </ValidationProvider>
          </div>
          <div class="my-2">
            <textarea type="text" class="form-control" v-model="booking.message"  placeholder="Laisser un message"></textarea>
          </div>
          <div class="my-3 pb-4 d-flex justify-content-between">
            <input type="submit" class="form-control btn btn-success" value="reserver">
            <div class="spinner-grow" role="status" v-if="show">
              <span class="visually-hidden">chargement...</span>
            </div>
          </div>
        </form>
      </ValidationObserver>
    </div>
  </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator'
import ContactComponent from "../shared/ContactComponent.vue";
import axios from "axios";
import {ValidationProvider, ValidationObserver} from 'vee-validate';

@Component({
  components: { ContactComponent, ValidationProvider, ValidationObserver},
  props: {
    post: {},
    auth: {}
  }
})
export default class Coli extends Vue {

    error: boolean = false;
    show: boolean = false;
    errors: any = [];
    objects: any = [];

    objs: any = this.trueSelectedObjects();

    booking: any = {
      message: '',
      objects: {},
      price: '',
      kilo: '',
      travel: ''
    }

    trueSelectedObjects() {
      return this.$props.post.objects.filter(function (obj){ return obj.value === true });
    }

    send(): void {

      this.show = true;

      this.booking.objects = JSON.stringify(this.objs);

      axios.post('/post/booking/' + this.$props.post.id, this.booking).then((response) => {

        location.reload();

        this.show = false;

      }).catch((error) => {
        this.errors = error.response.data.errors;
        this.show = false;
      })
    }

    mounted(): void {
      this.objects = this.trueSelectedObjects();
    }

  }
</script>