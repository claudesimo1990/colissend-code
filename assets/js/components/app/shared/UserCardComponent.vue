<template>
    <div>
      <img :src="thumb ? user.thumb : user.avatar" class="rounded-circle" alt="user avatar">
      <h4>{{ user.name }}</h4>
      <h4>
        <i class="bi bi-pin-map-fill mr-2"></i>
        {{ user.info.street !== null ? user.info.street : 'Pas encore été indiqué' }}
      </h4>
      <h4>
        <i class="bi bi-people-fill text-black mr-2"></i>
        Membre {{ user.created_at | ago }}
      </h4>
      <h4 class="text-success">
        <i class="bi bi-lock text-success mr-2"></i>
        Compte verifié
      </h4>
    </div>
</template>

<script lang="ts">

  import { Vue, Component, Prop } from 'vue-property-decorator';

  @Component({
    props: {
      user: {}
    }
  })
  export default class UserCardComponent extends Vue {
    @Prop({ default: false }) thumb;
  }
</script>
