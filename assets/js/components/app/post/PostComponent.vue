<template>
  <div class="row card">
    <a :href="'/post/'+ post.slug + '?id=' + post.id" class="">
      <div class="">
        <div class="card-body post_card_body mt-2">
          <div class="row">
            <div class="col-lg-4 bg-success-light">
              <user-card-component :user="post.user" :created="post.created_at|ago" branch="post" :type="post.type" :thumb="true"></user-card-component>
            </div>
            <div class="col-lg-8">
              <Travel v-if="post.type === 'TRAVEL'" :post="post"></Travel>
              <Coli v-if="post.type === 'PACKS'" :post="post"></Coli>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</template>

<script lang="ts">

import {Vue, Component} from 'vue-property-decorator';
import UserCardComponent from "../shared/UserCardComponent.vue";
import Travel from "./travel.vue";
import Coli from "./coli.vue";
import store from "../../../store/store";

@Component({
  components: {
    UserCardComponent,
    Travel,
    Coli
  },
  props: {
    post: {}
  }
})

export default class PostComponent extends Vue {

  get foundPosts() {
    return store.getters['post/posts'];
  }

  get getCountFound() {
    return store.getters['post/getSearchCount'];
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
