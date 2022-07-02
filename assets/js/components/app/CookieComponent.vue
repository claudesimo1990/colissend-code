<template>
  <footer>
    <cookie-law buttonText="accepter" message="Bienvenue sur Colissend, nous utilisons des cookies sur notre site. veuillez valider pour continuer" theme="dark-lime"></cookie-law>
  </footer>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';
import CookieLaw from 'vue-cookie-law';

@Component({
  components: { CookieLaw }
})
export default class CookieComponent extends Vue {

}
</script>

<style lang=scss>

</style>