<template>
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-lg text-dark">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info">{{ getCountFound }} resultat(s) trouvé(s)</h5>
                    <button type="button" @click.prevent="closeModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-sm-12 col-md-12 pt-1 border mb-2 bg-warning-light" v-for="post in foundPosts" :key="post.id">
                            <a :href="'/post/'+ post.slug" class="route-link">
                                <div class="text-center d-flex justify-content-between mx-4">
                                    <span class="text-success mb-2">
                                        {{ post.created_at | ago }}
                                    </span>
                                    <span>
                                        <span class="badge bg-success rounded">
                                            {{ post.kilo }} Kilos encore disponibles
                                        </span>
                                    </span>
                                    <span>
                                        {{ post.price }}&#8364;/Kilo
                                    </span>
                                </div>
                                <div class="d-flex justify-content-between text-center">
                                    <div>
                                        <div class="" v-text="post.from"></div>
                                        <div class="">{{ post.dateFrom | formatDate }}</div>
                                    </div>
                                    <div>
                                        <div class="" v-text="post.to"></div>
                                        <div class="mx-2">{{ post.dateTo | formatDate }}</div>
                                    </div>
                                </div>
                                    <blockquote class="blockquote-footer mt-2 py-3"> j'accepte:
                                    <span class="badge rounded-pill rounded bg-secondary mx-1" v-for="object in post.objects" :key="object.name">
                                        <span v-if="object.value">{{ object.name }}</span>
                                    </span>
                                    <p class="mb-0 mx-2">
                                        <i class="bx bxs-quote-alt-left fw-bold"></i>
                                        {{ post.content | preview }}
                                        <i class="bx bxs-quote-alt-right fw-bold"></i>
                                    </p>
                                </blockquote>
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
import store from "../../../store/store";

@Component({
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
