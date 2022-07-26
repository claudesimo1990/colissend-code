<template>
  <div>
    <div id="about" class="">
      <div class="row">
        <div class="col-lg-12 text-center my-4">
          <h2 class="fw-bold">Envoyer vos colis</h2>
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
          <form method="post" class="row" @submit.prevent="handleSubmit(onSubmit)" ref="form">
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
                <input-date field="dateTo" type="datetime" format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }" title="Date d'arrivée" field-class="form-label" @dateValue="initFiled"></input-date>
              </div>
            </div>
            <div class="row my-4">
              <div class="border py-2">
                <div class="col-md-4 d-flex">
                  <div class="mx-2 mt-2 fw-bold">Ajouter un coli</div>
                  <button type="button" class="btn btn-success" @click="addColi"><i class="bi bi-plus-circle text-white"></i></button>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-12 mt-2">
                  <div class="row">
                    <div class="col-md-5 mx-4 position-relative pt-1" v-for="(obj, index) in form.transportedObjects" :id="index">
                      <div class="row border p-3">
                        <div class="col-md-5">
                          <ValidationProvider rules="required" v-slot="{ errors }">
                            <div class="form-group">
                              <label for="quantity" class="form-label">Quantité</label>
                              <input type="number" v-model="form.transportedObjects[index].quantity" class="form-control" id="quantity" placeholder="Quantité" name="Quantité">
                                <span class="invalid-feedback d-block" role="alert">
                                  <small>{{ errors[0] }}</small>
                                </span>
                            </div>
                          </ValidationProvider>
                        </div>
                        <div class="col-md-7">
                          <ValidationProvider rules="required" v-slot="{ errors }">
                            <div class="row">
                              <label for="name" class="form-label small">Nom de l'objet</label>
                              <input type="text" v-model="form.transportedObjects[index].name" class="form-control" @click.prevent="displayBlock(index)" id="name" placeholder="Valise, sac ..." name="name">
                              <span class="invalid-feedback d-block" role="alert">
                                <small>{{ errors[0] }}</small>
                              </span>
                            </div>
                          </ValidationProvider>
                          <div class="row mt-2" v-if="form.transportedObjects[index].showBlock">
                            <div class="col-md-12">
                              <ValidationProvider rules="required" v-slot="{ errors }">
                                <label class="" for="floatingSelect">Category</label>
                                <select class="form-select" id="floatingSelect" v-model="form.transportedObjects[index].type" aria-label="State">
                                  <option class="text-black-50 small" v-for="typ in types" :key="typ.id" :value="typ.name">{{ typ.name }}</option>
                                </select>
                                <span class="invalid-feedback d-block" role="alert">
                                <small>{{ errors[0] }}</small>
                              </span>
                              </ValidationProvider>
                            </div>
                            <div class="col-md-4">
                              <label for="length" class="form-label small">Longueur</label>
                              <input type="number" v-model="form.transportedObjects[index].length" class="form-control" id="length" placeholder="Cm" name="length">
                            </div>
                            <div class="col-md-4">
                              <label for="Width" class="form-label small">Largeur</label>
                              <input type="number" v-model="form.transportedObjects[index].width" class="form-control" id="Width" placeholder="Cm" name="width">
                            </div>
                            <div class="col-md-4">
                              <label for="Height" class="form-label small">Hauteur</label>
                              <input type="number" v-model="form.transportedObjects[index].height" class="form-control" id="Height" placeholder="Cm" name="height">
                            </div>
                          </div>
                          <div class="row mt-2" v-if="form.transportedObjects[index].type">
                              <div class="col-md-6" v-if="form.transportedObjects[index].type === 'Bagages'">
                                <ValidationProvider rules="required" v-slot="{ errors }">
                                  <label for="weight" class="form-label small" v-html="">Poids total</label>
                                  <input type="number" v-model="form.transportedObjects[index].weight" class="form-control" id="weight" :placeholder="form.transportedObjects[index].type === 'Bagages' ? 'Kg' : ''" name="weight">
                                  <span class="invalid-feedback d-block" role="alert">
                                    <small>{{ errors[0] }}</small>
                                  </span>
                                </ValidationProvider>
                              </div>
                              <div class="col-md-6">
                                <ValidationProvider rules="required" v-slot="{ errors }">
                                  <label for="weight" class="form-label small" v-html="form.transportedObjects[index].type === 'Bagages' ? 'Prix/Kilo' : 'Prix/Unité'"></label>
                                  <input type="number" v-model="form.transportedObjects[index].price" class="form-control" id="prix" placeholder="Prix" name="prix">
                                  <span class="invalid-feedback d-block" role="alert">
                                    <small>{{ errors[0] }}</small>
                                  </span>
                                </ValidationProvider>
                              </div>
                          </div>
                          <a href="" class="text-danger removeButton rounded-circle">
                            <i class="bi bi-trash-fill text-danger pointer" @click.prevent="removeItem(form.transportedObjects[index].id)"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 my-3">
                <textarea class="form-control" v-model="form.message" placeholder="Laissez un message..." id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
            </div>
            <div class="col-md-12 my-2">
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
            <input type="submit" class="btn btn-success d-flex justify-content-center align-items-center" value="Poster votre annonce">
          </form>
        </ValidationObserver>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

  import {Vue, Component, Watch} from 'vue-property-decorator'
  import InputDate from "../../shared/form/InputDate.vue";
  import InputLocation from "../../shared/form/InputLocation.vue";
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
export default class Coli extends Vue {

    form: any = {
      from: null,
      to: null,
      dateFrom: null,
      dateTo: null,
      kilo: null,
      price: null,
      coliImg: null,
      message: null,
      privacy: null,
      transportedObjects: []
    };
    types: any = [
      {id: 1, name: 'Electronique'},
      {id: 2, name: 'Courrier'},
      {id: 3, name: 'Bagages'}
    ];
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
      formData.append('coli',  this.form.coliImg);
      formData.append('objects',  JSON.stringify(this.form.transportedObjects));
      formData.append('payment',  JSON.stringify({}));

      axios.post('/post/coli/create', formData , config)
          .then((response)  => {
            this.$toast.success(response.data, {
              timeout: 2000
            });
            setTimeout(function() {
              window.location.reload();
            }, 2000);
          })
          .catch((error)  => {
            if(error.response.data){
              this.$toast.error(error.response.data.errors, {
                timeout: 2000
              });
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

    displayBlock(index: any) {
      this.form.transportedObjects[index].showBlock = !this.form.transportedObjects[index].showBlock;
    }

    removeItem(id: Number) {
      this.form.transportedObjects = this.form.transportedObjects.filter(function(ele){
        return ele.id != id;
      });
    }

    public addColi() {
      this.form.transportedObjects.push({
        id: Object.keys(this.form.transportedObjects).length + 1,
        name: null,
        type: null,
        quantity: null,
        price: null,
        width: null,
        height: null,
        length: null,
        showBlock: false,
        weight: null
      });
    }

    public mounted() {
      this.posted = false;
      this.addColi();
    }
  }
</script>

<style lang="scss">
  .removeButton {
    position: absolute;
    top: 4px;
    right: 4px;
  }
</style>
