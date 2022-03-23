<template>
  <div>
    <div class="card mt-4" v-for="post in laravelData.data" :key="post.id">
      <div class="card-body pb-0">
        <div class="pub">
          <a :href="'/post/'+ post.slug + '?id=' + post.id" class="">
            <div class="row">
              <div class="col-md-4">
                <user-card-component :user="post.user"></user-card-component>
              </div>
              <div class="col-md-8">
                  <Travel v-if="post.type === 'TRAVEL'" :post="post"></Travel>
                  <Coli v-if="post.type === 'PACKS'" :post="post"></Coli>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <pagination :data="laravelData" size="large" align="left" @pagination-change-page="getResults">
      <span slot="prev-nav">&lt; Previous</span>
      <span slot="next-nav">Next &gt;</span>
    </pagination>

  </div>
</template>

<script lang="ts">

import axios from 'axios';
import { Vue, Component } from 'vue-property-decorator';
import UserCardComponent from "../shared/UserCardComponent.vue";
import Travel from "./travel.vue";
import Coli from "./coli.vue";
Vue.component('pagination', require('laravel-vue-pagination'));

@Component({
    components: { UserCardComponent, Travel, Coli }
})

export default class PostComponent extends Vue {

  laravelData: any = {};

  async getResults(page = 1) {
    await axios.get('api/posts?page=' + page)
        .then(response => {
          this.laravelData = response;
        });
  }

  mounted (): void {
      this.getResults();
  }

}
</script>

<style lang="scss">
.user-image-box {
    margin-bottom: 0;

    .card-body {
        padding: 0;
    }
}
.user-card-row{
    padding-left: 0 !important;
}
.bi {
    color: green;
}
.map-icon {
    margin: 0.18rem;
    font-size: 2rem;
    color: red;
}
.like-icon {
    margin: 0.18rem;
    font-size: 2rem;
    color: red;
}
.route-link {
    text-decoration: none;
    color: black;

    &:hover{
        text-decoration: none;
        color: black !important;
    }
}

.pagination{
  margin-bottom: 0;
}

</style>
