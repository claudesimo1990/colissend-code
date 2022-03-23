<template>
  <div class="row">
    <div class="col-xl-4 col-md-6">
      <div class="card info-card sales-card d-flex align-items-center">

        <div class="card-body">
          <h5 class="card-title">Voyages <span>| toDay</span></h5>

          <div class="d-flex align-items-center">
            <span class="font-weight-bold rounded-circle border text-info p-4">
               <dt>50</dt>
            </span>
          </div>
        </div>

      </div>
    </div>
    <div class="col-xl-4 col-md-6">
          <div class="card info-card sales-card d-flex align-items-center">

              <div class="card-body">
                  <h5 class="card-title">Voyages <span>| toDay</span></h5>

                  <div class="d-flex align-items-center">
                      <span class="font-weight-bold rounded-circle border text-info p-4">
                          <dt>50</dt>
                      </span>
                  </div>
              </div>

          </div>
      </div>
    <div class="col-xl-4 col-md-6">
          <div class="card info-card sales-card d-flex align-items-center">

              <div class="card-body">
                  <h5 class="card-title">Voyages <span>| toDay</span></h5>

                  <div class="d-flex align-items-center">
                      <span class="font-weight-bold rounded-circle border text-info p-4">
                          <dt>50</dt>
                      </span>
                  </div>
              </div>

          </div>
      </div>
  </div>
</template>

<script lang="ts">

  import { Component, Prop, Vue } from 'vue-property-decorator'

  @Component
  export default class StatsComponent extends Vue {

      exampleProperty!: string

  }
</script>
