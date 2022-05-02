<template>
  <div :class="branch === 'booking' ? 'card info-card sales-card' : ''" class="bg-success-light">
    <div class="card-body px-3 text-center">
      <h5 class="card-title text-center">Menbre <span> {{ user.created_at | ago }}</span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center">
          <img v-if="user.avatar" :src="user.avatar" width="50px" height="50px" alt="user avatar">
          <img v-if="user.myAvatar":src="user.myAvatar" width="50px" height="50px" alt="user avatar">
        </div>
        <div class="ps-3">
          <h6 class="card-title-info">{{ user.firstname }}</h6>
          <div class="d-flex justify-content-between">
            <i class="bx bxs-location-plus text-success"></i>
            <span class="text-muted small">{{ user.country !== null ? user.country : 'Encore vide' }}</span>
          </div>
          <div class="d-flex justify-content-between">
            <i class="bx bxs-info-circle text-success"></i>
            <span class="text-muted small">Email verifié</span>
          </div>
          <div class="d-flex justify-content-between">
            <i class="bx bxs-phone-call text-success"></i>
            <span class="text-muted small">Telephone verifié</span>
          </div>
        </div>
      </div>
      <div class="d-flex text-center">
        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center">
          <i v-if="type === 'TRAVEL'" class="bx bxs-plane" style="font-size: 2rem; color: green;"></i>
          <i v-if="type === 'PACKS'" class="bx bi-box-seam" style="font-size: 2rem; color: green;"></i>
        </div>
        <div class="pt-3 px-3">
          <span class="text-muted small pt-2">Poster {{ created }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

  import { Vue, Component, Prop } from 'vue-property-decorator';

  @Component({
    props: {
      user: {},
      type: String,
      branch: String,
      created: String
    }
  })
  export default class UserCardComponent extends Vue {
    @Prop({ default: false }) thumb;
  }
</script>
