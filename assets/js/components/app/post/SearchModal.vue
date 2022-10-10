<template>
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div v-if="location === 'home'" class="modal-dialog modal-lg text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info">{{ getCountFound }} resultat(s) trouvé(s)</h5>
                    <button type="button" @click.prevent="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-sm-12 col-md-12 pt-1 border mb-2 bg-success-light" v-for="post in foundPosts" :key="post.id">

                          <a :href="'/post/'+ post.slug + '?id=' + post.id" class="">
                            <div class="">
                              <div class="card-body post_card_body mt-2">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <Travel v-if="post.type === 'TRAVEL'" :post="post"></Travel>
                                    <Coli v-if="post.type === 'PACKS'" :post="post"></Coli>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click.prevent="closeModal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts">

import {Vue, Component, Watch} from 'vue-property-decorator';
import Travel from "./travel.vue";
import Coli from "./coli.vue";
import store from "../../../store/store";

@Component({
  components: {
    Travel: Travel,
    Coli: Coli
  },
    props: {
        location: String
    }
})
export default class SearchModal extends Vue {

    get displayModal() {
        return store.getters['post/getModal'];
    }

    get foundPosts() {
        return store.getters['post/posts'];
    }

    get getCountFound() {
        return store.getters['post/getSearchCount'];
    }

    @Watch('displayModal')
    openModal(val) {
        if(val === true && this.$props.location == 'home'){
            ($('#exampleModal') as any).modal('show');
        }
    }

    closeModal() {
        ($('#exampleModal') as any).modal('hide');
        window.location.reload();
    }

}
</script>
