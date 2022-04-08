<template>
  <div>
    <div class="card mt-4" v-for="post in foundPosts" :key="post.id">
      <div class="card-body">
        <div class="pub">
          <a :href="'/post/'+ post.slug + '?id=' + post.id" class="">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-4 pb-4">
                <user-card-component :user="post.user" :thumb="true"></user-card-component>
                <div class="my-2">
                  <span class="badge border-info text-black-50">
                      <i class="bx bxs-plane mx-2"
                         style="font-size: 40px;color: green"></i> poster {{ post.created_at | ago }}
                  </span>
                  <div class="ratings mx-2 my-2 bottom-0">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-8">
                <Travel v-if="post.type === 'TRAVEL'" :post="post"></Travel>
                <Coli v-if="post.type === 'PACKS'" :post="post"></Coli>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">

import axios from 'axios';
import {Vue, Component} from 'vue-property-decorator';
import UserCardComponent from "../shared/UserCardComponent.vue";
import Travel from "./travel.vue";
import Coli from "./coli.vue";
import store from "../../../store/store";

Vue.component('pagination', require('laravel-vue-pagination'));

@Component({
  components: {UserCardComponent, Travel, Coli}
})

export default class PostComponent extends Vue {

  laravelData: any = {};

  get foundPosts() {
    return store.getters['post/posts'];
  }

  get getCountFound() {
    return store.getters['post/getSearchCount'];
  }

  async getResults(page = 1) {
    await axios.get('api/posts?page=' + page)
        .then(response => {
          this.laravelData = response;
        });
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

.user-card-row {
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

  &:hover {
    text-decoration: none;
    color: black !important;
  }
}

.pagination {
  margin-bottom: 0;
}

</style>
