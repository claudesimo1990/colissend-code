<template>
  <div :class="branch === 'booking' ? 'card info-card sales-card' : ''" class="bg-success-light">
    <div class="card-body p-3 text-center">
      <h5 class="card-title text-center">Menbre <span> {{ user.created_at | ago }}</span></h5>
      <div class="d-flex align-items-center">
        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center">
          <img v-if="user.thumb || user.avatar" :src="thumb ? user.thumb : user.avatar" width="50px" height="50px" alt="user avatar">
          <img v-if="user.thumb === '' && user.avatar === ''" src="/images/colissend/default.svg" alt="user avatar">
        </div>
        <div class="ps-3">
          <h6 class="card-title-info">{{ user.name }}</h6>
          <div><span class="text-success small pt-1 fw-bold"><i class="bi bi-geo-alt"></i></span> <span class="text-muted small pt-2 ps-1">{{ user.info.street !== null ? user.info.street : 'Pas encore été indiqué' }}</span></div>
          <div><span class="text-success small pt-1 fw-bold"><i class="bi bi-lock text-success mr-2"></i></span> <span class="text-muted small pt-2 ps-1">Menbre verifié</span></div>
        </div>
      </div>
      <div class="my-2 d-flex text-center">
        <div class="card-icon-rounded rounded-circle d-flex align-items-center justify-content-center">
          <i v-if="type === 'TRAVEL'" class="bx bxs-plane" style="font-size: 40px; color: green;"></i>
          <i v-if="type === 'PACKS'" class="bx bi-box-seam" style="font-size: 40px; color: green;"></i>
        </div>
        <div class="pt-3 px-3">
          <span class="text-muted small pt-2 ps-1">Poster {{ created }}</span>
        </div>
      </div>
      <div class="d-flex mt-2 text-center mx-4 mb-4">
        <a href="#" class="twitter mx-2"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook mx-2"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram mx-2"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin mx-2"><i class="bi bi-linkedin"></i></a>
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
