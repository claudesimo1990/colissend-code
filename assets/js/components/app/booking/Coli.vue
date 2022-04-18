<template>
  <div>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto aspernatur atque blanditiis consectetur, dignissimos, eaque esse expedita illo maiores maxime minima minus possimus quisquam ratione recusandae reprehenderit saepe tempora.‚‚
<!--    <div class="plane d-flex justify-content-between">
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
    <div class="mt-5">
      <div class="row">
        <h3 class="fw-bolder">Objects à transporter :</h3>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4" v-for="object in post.objects" :key="object.id">
              <div class="row g-0">
                <div class="col-md-4">
                  <i v-if="object.type === 'Bagages'" class="bi bi-box-seam text-success fw-bolder large-icon"></i>
                  <i v-if="object.type === 'Courrier'" class="bi bi-envelope text-success fw-bolder large-icon"></i>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h3 class="card-title">{{ object.name }} x{{ object.quantity }}</h3>
                    <strong class="card-text d-block">Poids: {{ object.weight }}Kg</strong>
                    <strong class="card-text d-block">Prix: {{ object.price }}<i class="bi bi-currency-euro text-dark fw-bolder"></i>/Kg</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-6">
        <contact-component :auth="auth"  :user="post.user"></contact-component>
      </div>
    </div>
    <div class="row mt-3" v-show="getShowSumme()">
      <div class="col-md-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Avec cette reservation vous percevrez une somme de: <span class="fw-bolder">{{ calSummeToPay() }}<i class="bi bi-currency-euro text-dark fw-bolder"></i></span>
          <button type="button" @click.prevent="removeShowSumme()" class="btn-close"></button>
        </div>
      </div>
    </div>
    <div class="row border mt-3">
      <div class="py-2">
        Que pouvez vous transporter :
        <div class="form-check form-check-inline" v-for="(obj, index) in objects" :id="objects[index].id">
          <div class="align-center mx-3">
            <label class="form-check-label" :for="objects[index].name">{{ obj.name }}</label>
            <input class="form-check-input" name="travel" @change="bookObject(objects[index])" type="radio" :id="objects[index].name">
          </div>
        </div>
        <div class="form-check form-check-inline">
          <div class="align-center mx-3">
            <label class="form-check-label" for="all">Tous transporter</label>
            <input class="form-check-input" name="travel" @change="bookObject('all')" type="radio" id="all">
          </div>
        </div>
      </div>
      <ValidationObserver v-slot="{ handleSubmit }">
        <form method="post" class="row g-3" @submit.prevent="handleSubmit(send)" ref="form">
          <ValidationProvider rules="required|integer" v-slot="{ errors }">
          <div class="my-2">
            <label class="" for="floatingSelect">Quel est le voyage avec le quel vous vous proposer ?</label>
            <select class="form-select" id="floatingSelect" v-model="booking.travel" aria-label="State">
              <option class="text-black-50 small" v-for="travel in auth.travels" :key="travel.id" :value="travel.id">{{ travel.from }} - {{ travel.to }}</option>
            </select>
            <span class="invalid-feedback d-block" role="alert">
                <small>{{ errors[0] }}</small>
            </span>
          </div>
          </ValidationProvider>
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
    </div>-->
  </div>
</template>

<script lang="ts">

import {Vue, Component, Watch} from 'vue-property-decorator'
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

    objs: any = [];
    showSumme: boolean = false;

    booking: any = {
      message: '',
      objects: {},
      bookedObjects: {},
      price: '',
      kilo: '',
      travel: ''
    }

    bookObject(object: any): void {
      if (object === 'all') {
        this.objs = [];
        this.objs = this.objects;
        this.showSumme = true;
        return;
      }
      this.objs = [];
      this.objs.push(object);
      this.showSumme = true;
    }

    getShowSumme() {
      return this.showSumme;
    }

  removeShowSumme() {
      this.showSumme = false;
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

    calSummeToPay() {
      let summe: any = 0;
      this.objs.forEach(function (obj) {
        summe += (obj.quantity * obj.price);
      })

      return summe;
    }

    mounted(): void {
      this.objects = this.$props.post.objects;
    }

  }
</script>

<style lang="scss" scoped>
  .large-icon {
    font-size: 60px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }
</style>