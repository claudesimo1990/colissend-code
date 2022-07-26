<template>
  <div>
    <div v-if="success" class="alert alert-success text-center" role="alert">
      {{ message }}
    </div>
    <div class="description">
      <div class="d-flex gap-5">
        <h2 class="card-title-info" v-for="object in post.objects" :key="object.id">{{ object.quantity }}x {{ object.name }}</h2>
      </div>
      <p v-if="post.countReservations <= 0" class="text-info">Personne ne s'est encore proposé, soyez le premier !</p>
      <p v-else class="text-info">{{ post.countReservations }} proposition(s) en cours</p>
    </div>
    <div class="row my-2 bg-secondary-light">
      <h6 class="card-title-info my-1 mx-2">Details</h6>
      <div class="my-2">
        <div v-for="object in post.objects" :key="object.id">
          <div class="fw-bold">{{ object.quantity }}x {{ object.name }}</div>
          <div>Poids : {{ object.weight }} à {{ object.price }}/kg</div>
        </div>
        <div class="d-flex mt-4 gap-5">
          <div>
            <div class="fw-bold">Proposition de tarif</div>
            <p>{{ totalToPay }} €</p>
          </div>
          <div>
            <div class="fw-bold">Livraison souhaitée</div>
            <p>{{ post.dateFrom | formatDate }}. - {{ post.dateTo | formatDate }}.</p>
          </div>
        </div>
        <div class="d-flex mt-4 gap-5">
          <div class="from">
            <div class="title fw-bold">Lieu de départ</div>
            <p>{{ post.from }}</p>
          </div>
          <div class="to">
            <div class="title fw-bold">Lieu d'arrivée</div>
            <p>{{ post.to }}</p>
          </div>
        </div>
        <div class="row">
          <label class="fw-bold">Message: </label>
          <div class="">{{ post.content }}</div>
        </div>
        <a class="btn btn-success my-3"  @click.prevent="proposition()" v-if="!showProposal">Faire une proposition</a>
      </div>
    </div>
    <div class="row" v-if="showProposal">
      <h6 class="card-title-info">Faire ma proposition</h6>
      <div class="proposal d-flex gap-2 border py-4 my-2">
        <input class="border text-end px-2 mx-2" v-model="proposalPrice">
        <button class="btn btn-success plus" @click.prevent="decrement()">-</button>
        <button class="plus btn btn-success" @click.prevent="increment()">+</button>
      </div>
      <textarea class="form-control mb-2" type="text" rows="5" v-model="booking.message" placeholder="laisser un message..."></textarea>
      <a href="#" @click="send()" class="btn btn-success">Me proposer <span v-if="show" class="spinner-grow float-end" role="status"></span></a>
    </div>
  </div>
</template>

<script lang="ts">

import { Vue, Component } from 'vue-property-decorator'
import ContactComponent from "../shared/ContactComponent.vue";
import axios from "axios";
import { ValidationProvider, ValidationObserver } from 'vee-validate';
import toast from "vue-toastification";

Vue.use(toast, {
  transition: "Vue-Toastification__bounce",
  maxToasts: 20,
  newestOnTop: true
})

@Component({
  components: { ContactComponent, ValidationProvider, ValidationObserver},
  props: {
    post: {},
    auth: {}
  }
})
export default class Coli extends Vue {
    proposalPrice: number = 0;
    error: boolean = false;
    success: boolean = false;
    message: String = '';
    show: boolean = false;
    errors: any = [];
    objects: any = [];
    showProposal: boolean = false;

    booking: any = {
      message: '',
      objects: {},
      bookedObjects: {},
      price: '',
      kilo: '',
      travel: ''
    }

    increment() {
      this.proposalPrice++
    }

    decrement() {
    if (this.proposalPrice > 1) {
      this.proposalPrice--
    }
  }

    send(): void {

      this.show = true;

      this.booking.objects = JSON.stringify(this.objects);
      this.booking.price = this.proposalPrice;
      this.booking.kilo = this.$props.post.kilo;
      this.booking.travel = this.$props.post.id

      axios.post('/post/booking/' + this.$props.post.id, this.booking).then((response) => {

        this.show = false;

        this.$toast.success(response.data, {
          timeout: 2000
        });

        setTimeout(function() {
          window.location.reload();

        }, 2000);

      }).catch((error) => {
        if(error.response.data){
          this.$toast.error(error.response.data.message, {
            timeout: 2000
          });
          this.show = false;
        }
      })
    }

    get totalToPay() {

      let total: any = 0;

      this.objects.forEach(function (obj) {
        if (obj.type === 'Courrier'){
          total += (obj.quantity * obj.price);
        }
        total += (obj.weight * obj.price);
      })

      return total;
    }

    proposition() {
      this.showProposal = true;
      this.booking.message = "Bonjour " + this.$props.post.user.firstname + ",\n" +
          "Votre annonce m’intéresse. Je suis disponible pour effectuer cette livraison.\n" +
          "Quelles sont les disponibilités de l’expéditeur et du destinataire ?\n" +
          "Merci de votre réponse !\n" +
          "A bientôt !\n" +
          this.$props.auth.firstname + " " + this.$props.auth.lastname
    }

    mounted(): void {
      this.objects = this.$props.post.objects;
      this.proposalPrice = this.totalToPay;
      this.showProposal = false;
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

 .proposal input {
    font-size: 1.2em;
    width: 100px;
    color: black;
    font-weight: bold;
  }

</style>
