<template>
    <div>
      <img :src="user.avatar" alt="user avatar">
      <h4>{{ user.name }}</h4>
      <h4><i class="bi bi-pin-map-fill"></i> {{ user.info.street }}</h4>
      <h4 class="text-success small"><i class="bi bi-lock text-success"></i>Membre verifié</h4>
    </div>
</template>

<script lang="ts">

  import { Vue, Component, Prop } from 'vue-property-decorator';

  @Component({
    props: {
      user: {}
    }
  })
  export default class UserCardComponent extends Vue {}
</script>
