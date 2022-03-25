<template>
    <div class="card mt-4">
      <div class="card-body">
        <div class="pub py-2">
          <form class="row">
            <div class="col-md-3">
              <select class="form-select" v-model="searchElements.type" aria-label="Default select example">
                <option value="ALL">Type d'annonce</option>
                <option value="TRAVEL">Voyages</option>
                <option value="PACKS">Colis</option>
              </select>
            </div>
            <div class="col-md-2">
              <InputLocation title="Ville depart" v-model.lazy="searchElements.from" :required="false" field="from" @location="setLocation"></InputLocation>
            </div>
            <div class="col-md-2">
              <InputLocation title="Ville d'arrivé" v-model.lazy="searchElements.to" :required="false" field="to" @location="setLocation"></InputLocation>
            </div>
            <div class="col-md-2">
              <input-date field="dateFrom" :format="{ year: 'numeric', month: 'long', day: 'numeric' }" title="Date depart" v-model="searchElements.dateFrom" field-class="form-label" @dateValue="initFiled"></input-date>
            </div>
            <div class="col-md-3">
              <input type="button" @click.prevent="search" class="form-control btn btn-success" :value="searchCount > 0 ? searchCount + ' annonce(s) retrouvée(s)' : 'Rechercher'">
            </div>
          </form>
        </div>
      </div>
      <SearchModal :location="location"></SearchModal>
    </div>
</template>

<script lang="ts">

import { Vue, Component, Watch } from 'vue-property-decorator';
import store from "../../../store/store";
import InputDate from "../shared/form/InputDate.vue";
import InputLocation from "../shared/form/InputLocation.vue";
import SearchModal from "../post/SearchModal.vue";

@Component({
    props: {
      location: String
    },
    components: {
        InputDate: InputDate,
        InputLocation: InputLocation,
        SearchModal: SearchModal
    }
})
export default class SearchComponent extends Vue {

    searchElements: any = {
        type: 'ALL',
        from: null,
        to: null,
        dateFrom: null,
        dateTo: null,
    }

    searchedPost: any = [];

    get posts () {
        return store.getters['post/posts'];
    }

    @Watch('searchElements.type')
    searchWithType(value: string) {
        this.filterPost();
    }

    @Watch('searchElements.from')
    searchWithFrom(value: string) {
        this.filterPost();
    }

    @Watch('searchElements.to')
    searchWithTo(value: string) {
        this.filterPost();
    }

    @Watch('searchElements.dateTo')
    searchWithDateTo(value: string) {
        this.filterPost();
    }

    @Watch('searchElements.dateFrom')
    searchWithDateFrom(value: string) {
        this.filterPost();
    }

    initFiled(payload)  {
        if(this.searchElements.hasOwnProperty(payload.field)) {
            this.searchElements[payload.field] = payload.value;
        }
    }

    setLocation(payload)  {
        if(this.searchElements.hasOwnProperty(payload.field)) {
            this.searchElements[payload.field] = payload.value;
        }
    }

    public filterPost() {
        store.dispatch('post/searchPost', this.searchElements)
    }

    public search(): void {
        store.dispatch('post/updatePosts', 'foundPosts')
    }

    get searchCount() {
        return store.getters['post/getSearchCount'];
    }

    mounted(): void {
        store.dispatch('post/fetchPosts');
    }

}

</script>

<style lang="scss">

@media (max-width: 576px){
    .btn-search-component {
        width: 100%;
    }
}

</style>
