<template>
  <div>
    <div id="about" class="">
      <div class="row">
        <div class="col-lg-12 text-center my-4">
          <h2 class="fw-bold">Proposer un trajet</h2>
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
                <input-date field="dateFrom" title="Date de depart" field-class="form-label" @dateValue="initFiled"></input-date>
              </div>
              <div class="col-md-3">
                <InputLocation title="Ville d'arrivé" :required="true" field="to" @location="setLocation"></InputLocation>
              </div>
              <div class="col-md-3">
                <input-date field="dateTo" title="Date d'arrivée" field-class="form-label" @dateValue="initFiled"></input-date>
              </div>
            </div>
           <div class="row mt-4 mb-3">
             <div class="col-md-6">
               <label for="kilo" class="form-label">Estimation du poids</label>
               <ValidationProvider rules="required|numeric" v-slot="{ errors }">
                 <input type="text" name="price" v-model="form.kilo" class="form-control" id="kilo">
                 <span class="invalid-feedback d-block" role="alert"><small>{{ errors[0] }}</small></span>
               </ValidationProvider>
             </div>
              <div class="col-md-6">
                <label for="coli" class="col-form-label">Ajoutez une image sur votre post</label>
                <div class="">
                  <ValidationProvider rules="" v-slot="{ errors }">
                    <input class="form-control" name="ticket" ref="file"  @change="handleFileUpload( $event )" type="file" id="coli">
                    <span class="invalid-feedback d-block" role="alert"><small>{{ errors[0] }}</small></span>
                  </ValidationProvider>
                </div>
              </div>
            </div>
            <div class="row">
              <label class="col-form-label">Que voulez-vous envoyer ?</label>
              <div class="col-md-12">
                <div class="form-check form-check-inline" v-for="obj in form.transportedObjects">
                  <div class="align-center">
                    <label class="form-check-label" :for="obj.name">{{ obj.name }}</label>
                    <input class="form-check-input" v-model="obj.value" type="checkbox" :id="obj.name">
                  </div>
                  <input class="form-control" v-if="obj.value" v-model="obj.count" type="text" :id="obj.count">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 m-3">
                <ValidationProvider rules="required" v-slot="{ errors }">
                  <textarea class="form-control" v-model="form.message" placeholder="Laissez un message..." id="exampleFormControlTextarea1" rows="3"></textarea>
                  <span class="invalid-feedback d-block" role="alert"><small>{{ errors[0] }}</small></span>
                </ValidationProvider>
              </div>
            </div>
            <div class="mt-3 text-center">
              <button type="submit" class="btn btn-success btn-lg">Poster votre annonce</button>
            </div>
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
    objects: String
  }
})
export default class ColiComponent extends Vue {

  form: any = {
    from: null,
    to: null,
    dateFrom: null,
    dateTo: null,
    kilo: null,
    price: null,
    coliImg: null,
    message: null,
    transportedObjects: {}
  };
  success: boolean = false;
  message: string = '';
  file: any = {};
  response: any = {};
  posted: boolean = false;

  @Watch('form.dateFrom')
  setDateFrom(val) {
    this.form.dateFrom = val
  }

  @Watch('form.dateTo')
  setDateTo(val) {
    this.form.dateTo = val
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

    formData.append('company',  'Air France');
    formData.append('price',  '10');

    formData.append('from',  this.form.from);
    formData.append('to',  this.form.to);
    formData.append('dateFrom',  this.form.dateFrom);
    formData.append('dateTo',  this.form.dateTo);
    formData.append('kilo',  this.form.kilo);
    formData.append('content',  this.form.message);
    formData.append('coliImg',  this.form.coliImg);
    formData.append('objects',  JSON.stringify(this.form.transportedObjects));

    axios.post('/post/coli/create', formData , config)
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

  public handleFileUpload(evt){
    this.form.coliImg = evt.target.files[0];
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

  public mounted() {
    this.posted = false;
    this.form.transportedObjects = JSON.parse(this.$props.objects)
  }
}
</script>
