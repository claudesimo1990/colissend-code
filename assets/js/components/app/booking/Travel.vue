<template>
  <div>
    <div v-if="success" class="alert alert-success text-center" role="alert">
      {{ message }}
    </div>
    <div class="card info-card sales-card">
      <div class="card-body mt-2">
        <div class="row">
          <div class="card-body">
            <h6 class="card-title-info my-2">Details du voyages</h6>
            <div class="list-group">
              <div class="list-group-item">
                <div class="d-flex justify-content-between">
                  <div class="d-flex justify-content-between fw-bold">
                    <i class="bx bxs-plane-take-off large-icon"></i>
                    <div class="text-muted pt-2 ps-1 text-justify">{{ post.from }} du {{
                        post.dateFrom | formatDate
                      }}
                    </div>
                  </div>
                  <div class="d-flex justify-content-between fw-bold">
                    <i class="bx bxs-plane-land large-icon"></i>
                    <div class="text-muted pt-2 ps-1 text-justify">{{ post.to }} du {{ post.dateTo | formatDate }}</div>
                  </div>
                </div>
              </div>
              <div class="list-group-item">
                <div class="d-flex justify-content-between fw-bold">
                  <div class="text-muted pt-2 ps-1 mx-3 text-wrap">Kilos disponibles:</div>
                  <div class="text-muted pt-2 ps-1 mx-2 text-wrap">{{ post.kilo }} Kg</div>
                </div>
              </div>
              <div class="list-group-item">
                <div class="d-flex justify-content-between fw-bold">
                  <div class="text-muted pt-2 ps-1 mx-3 text-wrap">Prix/Kg:</div>
                  <div class="text-muted pt-2 ps-1 mx-2 text-wrap">{{ post.price }}<i
                      class="text-muted bi bi-currency-euro mt-2 text-black fw-bold"></i></div>
                </div>
              </div>
              <div v-if="post.objects.courrier.status" class="list-group-item">
                <div class="d-flex justify-content-between fw-bold">
                  <div class="d-flex justify-content-between fw-bold">
                    <div class="text-muted pt-2 mx-3 ps-1 text-wrap">Courriers acceptés:</div>
                  </div>
                  <div class="text-muted pt-2 ps-1 mx-2 text-wrap">{{ post.objects.courrier.number }} <i
                      class="bi bi-envelope mt-2 text-success"></i></div>
                </div>
              </div>
              <div v-if="post.objects.courrier.status" class="list-group-item">
                <div class="d-flex justify-content-between fw-bold">
                  <div class="text-muted pt-2 ps-1 mx-3 text-wrap">Prix/courrier:</div>
                  <div class="text-muted pt-2 ps-1 mx-2 text-wrap">{{ post.objects.courrier.price }}<i
                      class="text-muted bi bi-currency-euro mt-2 text-black fw-bold"></i></div>
                </div>
              </div>
              <div v-if="post.objects.notDesired" class="list-group-item">
                <div class="d-flex justify-content-between fw-bold">
                  <div class="text-muted pt-2 ps-1 mx-3 text-wrap">Objects pas acceptés:</div>
                  <div class="text-muted pt-2 ps-1 mx-2 text-wrap">Cigarettes, Liquides</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="card-body">
            <h6 class="card-title-info my-2">Procéder á votre reservation</h6>
            <ValidationObserver v-slot="{ handleSubmit }">
              <form ref="form" class="row g-3" method="post" @submit.prevent="handleSubmit(send)">
                <div class="list-group">
                  <div class="list-group-item">
                    <div class="row">
                      <div class="col-lg-5">
                        <ValidationProvider v-slot="{ errors }" rules="required|integer">
                          <input id="kilo" v-model="booking.kilo" :max="post.kilo" class="form-control" min="0"
                                 placeholder="Combien de kilos voulez-vous reserver ?" type="number">
                          <span class="invalid-feedback d-block" role="alert">
                            <small>{{ errors[0] }}</small>
                          </span>
                        </ValidationProvider>
                      </div>
                      <div class="col-lg-4">
                        <div class="form-check">
                          <label class="form-check-label" for="gridCheck1">
                            Avez-vous des courriers ?
                          </label>
                          <input id="gridCheck1" v-model="courrier" class="form-check-input" type="checkbox">
                        </div>
                      </div>
                      <div v-if="shoHasCourrier" class="col-lg-3">
                        <ValidationProvider v-slot="{ errors }" rules="required">
                          <input type="number" id="courrier.number" v-model="booking.objects.courrier.number" class="form-control" name="price" placeholder="Combien ?">
                          <span class="invalid-feedback d-block" role="alert">
                          <small>{{ errors[0] }}</small>
                        </span>
                        </ValidationProvider>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <div class="text my-4">
                      <h6>Infos sur le destinataire</h6>
                    </div>
                    <div class="row">
                      <div class="col-lg-3">
                        <ValidationProvider v-slot="{ errors }" rules="required">
                          <input id="name" class="form-control" v-model="booking.objects.recipient.name" name="name" placeholder="Nom" type="text">
                          <span class="invalid-feedback d-block" role="alert">
                          <small>{{ errors[0] }}</small>
                        </span>
                        </ValidationProvider>
                      </div>
                      <div class="col-lg-3">
                        <ValidationProvider v-slot="{ errors }" rules="required">
                          <input id="cni" v-model="booking.objects.recipient.cni" class="form-control" name="cni"
                                 placeholder="N° CNI" type="text">
                          <span class="invalid-feedback d-block" role="alert">
                            <small>{{ errors[0] }}</small>
                          </span>
                        </ValidationProvider>
                      </div>
                      <div class="col-lg-3">
                        <ValidationProvider v-slot="{ errors }" rules="required">
                          <input id="phone" v-model="booking.objects.recipient.phone" class="form-control"
                                 name="number" placeholder="Numéro de telephone" type="text">
                          <span class="invalid-feedback d-block" role="alert">
                            <small>{{ errors[0] }}</small>
                          </span>
                        </ValidationProvider>
                      </div>
                      <div class="col-lg-3">
                        <ValidationProvider v-slot="{ errors }" rules="required">
                          <input id="place" v-model="booking.objects.recipient.place" class="form-control" name="place"
                                 placeholder="Lieux de rencontre"
                                 type="text">
                          <span class="invalid-feedback d-block" role="alert">
                          <small>{{ errors[0] }}</small>
                        </span>
                        </ValidationProvider>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item">
                    <textarea v-model="booking.message" class="form-control" placeholder="Laisser un message ..."
                              type="text"></textarea>
                  </div>
                  <div class="mt-4 d-flex justify-content-between">
                    <input class="form-control btn btn-success" type="submit" value="Reserver">
                    <div v-if="show" class="spinner-grow" role="status">
                      <span class="visually-hidden">chargement...</span>
                    </div>
                  </div>
                </div>
              </form>
            </ValidationObserver>
          </div>
        </div>
      </div>
    </div>
    <book-message :to="post.user" :from="auth"></book-message>
  </div>
</template>

<script lang="ts">

import {ValidationProvider, ValidationObserver} from 'vee-validate';

import {Vue, Component, Watch} from 'vue-property-decorator'
import ContactComponent from "../shared/ContactComponent.vue";
import BookMessage from "../chat/BookMessage.vue";
import axios from "axios";

@Component({
  components: {ValidationProvider, ValidationObserver, ContactComponent, BookMessage},
  props: {
    post: {},
    auth: {}
  }
})
export default class Travel extends Vue {

  error: boolean = false;
  show: boolean = false;
  hasCourrier: boolean = false;
  success: boolean = false;
  message: string = '';
  errors: any = [];
  courrier: boolean = false;

  booking: any = {
    message: '',
    kilo: '',
    price: 0,
    travel: 0,
    objects: {
      courrier: {
        status: false,
        number: null,
        price: this.$props.post.objects.courrier.price
      },
      recipient: {
        name: null,
        cni: null,
        phone: null,
        place: null
      }
    }
  }

  acceptableObjects: any = {}

  get shoHasCourrier(): boolean {
    return this.hasCourrier;
  }

  selectedTrue(objects: any): any {
    return objects.filter(function (obj) {
      return obj.value == true;
    })
  }

  @Watch('courrier')
  setCouurrier(val: any) {
    this.booking.objects.courrier.status = val;
    if (val === false) {
      this.booking.objects.courrier.number = null;
      this.booking.objects.courrier.price = null;
      this.hasCourrier = false;
      return;
    }
    this.hasCourrier = true;
  }

  send(): void {

    this.show = true;

    axios.post('/post/booking/' + this.$props.post.id, this.booking).then((response) => {

      this.show = false;
      this.success = true;
      this.message = response.data;

      setTimeout(function() {
        window.location.reload();

      }, 2000);

    }).catch((error) => {
      this.errors = error.response.data.errors;
      this.show = false;
    })
  }

}
</script>

<style lang="scss" scoped>
  .large-icon {
    font-size: 42px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }
</style>