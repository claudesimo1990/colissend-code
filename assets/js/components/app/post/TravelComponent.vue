<template>
    <div class="p-3">
        <div id="about" class="">
            <div class="row">
                <div class="col-lg-12 text-center my-4">
                    <h2 class="fw-bold">Poster un trajet</h2>
                </div>
            </div>
        </div>
        <div v-if="success" class="alert alert-success text-center" role="alert">
            {{ message }}
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <ValidationObserver v-slot="{ handleSubmit }">
                    <form method="post" class="row g-3" @submit.prevent="handleSubmit(onSubmit)" ref="form">
                    <div class="row">
                        <div class="col-md-3">
                            <InputLocation title="Ville de depart" :required="true" field="from" @location="setLocation"></InputLocation>
                        </div>
                        <div class="col-md-3">
                            <input-date field="dateFrom" type="dateTime" :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }" title="Date de depart" field-class="form-label" @dateValue="initFiled"></input-date>
                        </div>
                        <div class="col-md-3">
                            <InputLocation title="Ville d'arrivé" :required="true" field="to" @location="setLocation"></InputLocation>
                        </div>
                        <div class="col-md-3">
                            <input-date field="dateTo" type="dateTime" :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }" title="Date d'arrivée" field-class="form-label" @dateValue="initFiled"></input-date>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-3">
                            <label for="kilo" class="form-label">Nombre de Kilos disponibles</label>
                            <ValidationProvider rules="required|integer" v-slot="{ errors }">
                                <input type="number" name="kilo" v-model.number="form.kilo" class="form-control" id="kilo">
                                <span class="invalid-feedback d-block" role="alert">
                                    <small>{{ errors[0] }}</small>
                                </span>
                            </ValidationProvider>
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="form-label">Prix du Kilo en &euro;</label>
                            <ValidationProvider rules="required|numeric" v-slot="{ errors }">
                                <input type="number" name="price" v-model.number="form.price" class="form-control" id="price">
                                <span class="invalid-feedback d-block" role="alert">
                                    <small>{{ errors[0] }}</small>
                                </span>
                            </ValidationProvider>
                        </div>
                        <div class="col-md-3">
                          <ValidationProvider rules="required" v-slot="{ errors }">
                          <label for="fly" class="form-label">Companie aerienne</label>
                            <select class="form-select" aria-label="Default select example" v-model="form.company" id="fly">
                              <option value=""></option>
                              <option :value="company.name" v-for="company in JSON.parse(companies)" :id="company.id">{{ company.name }}</option>
                            </select>
                            <span class="invalid-feedback d-block" role="alert">
                                  <small>{{ errors[0] }}</small>
                              </span>
                          </ValidationProvider>
                        </div>
                        <div class="col-md-3">
                            <label for="ticket" class="col-form-label">Image du billet d'avion</label>
                            <div class="">
                                <ValidationProvider rules="required" ref="observer" v-slot="{ errors, validate }">
                                    <input class="form-control"  name="ticket" ref="file" accept="image/*"  @change="handleFileUpload( $event, errors)" type="file" id="ticket">
                                    <span class="invalid-feedback d-block" role="alert">
                                        <small>{{ errors[0] }}</small>
                                    </span>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="row border my-2 py-2">
                          <div class="col-md-4">
                            <div class="form-check">
                              <label class="form-check-label" for="gridCheck1">
                                J' accepte aussi les courriers
                              </label>
                              <input class="form-check-input" v-model.number="courrier" type="checkbox" id="gridCheck1">
                            </div>
                          </div>
                          <div class="col-md-4" v-show="takeCourrier">
                            <ValidationProvider rules="required|numeric" v-slot="{ errors }">
                              <label for="courrier.number" class="form-label">Combien ?</label>
                              <input type="number" name="price" v-model.number="form.transportedObjects.courrier.number" class="form-control" id="courrier.number">
                              <span class="invalid-feedback d-block" role="alert">
                              <small>{{ errors[0] }}</small>
                          </span>
                            </ValidationProvider>
                          </div>
                          <div class="col-md-4" v-show="takeCourrier">
                            <ValidationProvider rules="required|numeric" v-slot="{ errors }">
                              <label for="courrier.price" class="form-label">Prix unitaire en <i class="bi bi-currency-euro text-dark fw-bolder"></i></label>
                              <input type="number" name="price" v-model.number="form.transportedObjects.courrier.price" class="form-control" id="courrier.price">
                              <span class="invalid-feedback d-block" role="alert">
                              <small>{{ errors[0] }}</small>
                          </span>
                            </ValidationProvider>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="alert alert-info fw-bold">NB: Pour le moment nous n'acceptons que des payments avec paypal</div>
                          <label class="col-sm-12 col-form-label">Comment voulez-vous recevoir votre argent ?</label>
                          <div class="col-sm-12">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12" v-for="payment in form.payments" :id="payment.id">
                                <div class="input-group mb-3 border">
                                  <div class="form-check form-switch pt-1 mx-3">
                                    <input class="form-check-input" @change="paymentSelected(payment)" v-model="payment.value" type="checkbox" :disabled="payment.status === false" :id="'flexSwitchCheckPayment-'+ payment.id">
                                    <label class="form-check-label fw-bolder" :for="'flexSwitchCheckPayment-'+ payment.id">{{ payment.name }}</label>
                                  </div>
                                  <span v-if="payment.value" v-for="info in payment.infos" class="d-flex justify-content-between">
                                    <span :class="'input-group-text text-white bg-success'">{{ info.label }}</span>
                                    <input type="text" class="form-control" v-model="info.value" :placeholder="info.placeholder" aria-label="Server">
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <ValidationProvider rules="" v-slot="{ errors }">
                          <textarea class="form-control" v-model="form.message" placeholder="Laissez un message..." id="exampleFormControlTextarea1" rows="3"></textarea>
                          <span class="invalid-feedback d-block" role="alert">
                              <small>{{ errors[0] }}</small>
                          </span>
                        </ValidationProvider>
                      </div>
                      <div class="col-md-12 mt-2">
                        <ValidationProvider rules="required" v-slot="{ errors }">
                          <div class="form-check">
                            <input class="form-check-input" v-model="form.privacy" type="checkbox" id="gridCheck2">
                            <label class="form-check-label" for="gridCheck2">
                              En cochant sur cette case vous acceptez nos <a :href="privacy">conditions d'utlisations</a>
                            </label>
                            <span class="invalid-feedback d-block" role="alert">
                              <small>{{ errors[0] }}</small>
                            </span>
                          </div>
                        </ValidationProvider>
                      </div>
                    </div>
                      <input type="submit" class="btn btn-success d-flex justify-content-center align-items-center" value="Poster votre voyage">
                    </form>
                </ValidationObserver>
            </div>
        </div>
    </div>
</template>

<script lang="ts">

import {Vue, Component, Watch} from 'vue-property-decorator'
import InputDate from "../shared/form/InputDate.vue";
import InputLocation from "../shared/form/InputLocation.vue";
import {ValidationProvider, ValidationObserver} from 'vee-validate';

import axios from "axios";

@Component({
    components: {
        InputDate: InputDate,
        InputLocation: InputLocation,
        ValidationProvider: ValidationProvider,
        ValidationObserver: ValidationObserver
    },
  props: {
      objects: String,
      companies: String,
      payments: String,
      privacy: String
  }
})
export default class TravelComponent extends Vue {

    form: any = {
        from: null,
        to: null,
        dateFrom: null,
        dateTo: null,
        kilo: 10,
        price: 8,
        company: null,
        ticket: null,
        message: null,
        payment: {},
        transportedObjects: {
          courrier: {
            status: false,
            number: null,
            price: null
          }
        },
        payments: {},
        privacy: null
    };
    description: String = '';
    success: boolean = false;
    message: string = '';
    file: any = {};
    response: any = {};
    posted: boolean = false;
    courrier: boolean = false;

   matchOptions: any = {
     id: Number,
     name: String,
     scope: String
   };

    @Watch('form.dateFrom')
    setDateFrom(val) {
        this.form.dateFrom = val
    }

    @Watch('form.dateTo')
    setDateTo(val) {
        this.form.dateTo = val
    }

  @Watch('courrier')
  setCourrier(val) {
    this.form.transportedObjects.courrier.status = val;
    if (val === false) {
      this.form.transportedObjects.courrier.number = null;
      this.form.transportedObjects.courrier.price = null;
    }
  }

  paymentSelected(payment: any) {
      this.form.payment = payment;
  }

    public onSubmit() {

        let config = {
            headers: {
                'Content-Type': 'application/json;charset=UTF-8',
                "Access-Control-Allow-Origin": "*",
                "enctype": "multipart/form-data"
            }
        };

        let formData = new FormData();

        formData.append('company',  this.form.company);
        formData.append('from',  this.form.from);
        formData.append('to',  this.form.to);
        formData.append('dateFrom',  this.form.dateFrom);
        formData.append('dateTo',  this.form.dateTo);
        formData.append('kilo',  this.form.kilo);
        formData.append('price',  this.form.price);
        formData.append('content',  this.form.message);
        formData.append('ticket',  this.form.ticket);
        formData.append('objects',  JSON.stringify(this.form.transportedObjects));
        formData.append('payment',  JSON.stringify(this.form.payment));

        axios.post('/post/travel/create', formData , config)
            .then((response)  => {

                this.success = true;
                this.message = response.data;

              setTimeout(function() {
                window.location.reload();

              }, 2000);
            })
            .catch(function (error) {
                if(error.response.data){
                    console.log(error.response.data.errors)
                }
            });

    }

  async handleFileUpload({ target: { files } }){
      const valid = await (this.$refs.observer as any).validate(files)

      if (!valid) {
        console.log("not valid");
        return;
      }

      this.form.ticket = files[0];
    }

    initFiled(payload)  {
        if(this.form.hasOwnProperty(payload.field)) {
            this.form[payload.field] = payload.value;
        }
    }

    setLocation(payload)  {
        if(this.form.hasOwnProperty(payload.field)) {
            this.form[payload.field] = payload.value;
        }
    }

    get takeCourrier() {
      return this.courrier;
    }

    public mounted() {
        this.posted = false;
        this.form.payments = JSON.parse(this.$props.payments)
    }
}
</script>
