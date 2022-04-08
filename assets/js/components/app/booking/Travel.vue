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
    <div class="my-3">
      <contact-component :auth="auth"  :user="post.user"></contact-component>
    </div>
    <ValidationObserver v-slot="{ handleSubmit }">
      <form method="post" class="row g-3" @submit.prevent="handleSubmit(send)" ref="form">
        <div class="mt-3">
          <ValidationProvider rules="required|integer" v-slot="{ errors }">
            <input type="text" class="form-control" id="kilo" v-model="booking.kilo" placeholder="Combien de kilos voullez vous ?">
            <span class="invalid-feedback d-block" role="alert">
              <small>{{ errors[0] }}</small>
            </span>
          </ValidationProvider>
        </div>
        <div class="my-3">
          <select class="form-select" multiple="" v-model="objs" aria-label="multiple select example">
            <option selected="">Que souhaitez vous envoyer ?</option>
            <option v-for="object in post.objects" :key="object.name" :value="object.name">{{ object.name }}</option>
          </select>
        </div>
        <div class="my-2">
          <textarea type="text" class="form-control" v-model="booking.message"  placeholder="Laisser un message ..."></textarea>
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
</template>

<script lang="ts">

import {ValidationProvider, ValidationObserver} from 'vee-validate';

import {Vue, Component} from 'vue-property-decorator'
import ContactComponent from "../shared/ContactComponent.vue";
import axios from "axios";

@Component({
  components: { ValidationProvider, ValidationObserver, ContactComponent},
  props: {
    post: {},
    auth: {}
  }
})
export default class Travel extends Vue {

  error: boolean = false;
  show: boolean = false;
  errors: any = [];
  objs: any = [];

  booking: any = {
    message: '',
    price: 0,
    travel: 0,
    objects: {},
    kilo: '',
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

}
</script>