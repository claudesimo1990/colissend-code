<template>
    <div>
        <ValidationProvider :rules="required ? 'required' : ''" v-slot="{ errors }">
            <input type="text" :name="field" v-model="data" :placeholder="title" :id="field" class="form-control" :ref="field">
            <span class="invalid-feedback d-block" role="alert">
                <small>{{ errors[0] }}</small>
            </span>
        </ValidationProvider>
    </div>
</template>

<script lang="ts">

import { Vue, Component, Watch } from 'vue-property-decorator';
import {ValidationProvider, ValidationObserver} from 'vee-validate';
import * as moment from "moment";

@Component({
    props: {
        field: String,
        title: String,
        required: Boolean,
    },
    components: {
        ValidationProvider: ValidationProvider,
        ValidationObserver: ValidationObserver
    }
})
export default class InputLocation extends Vue {

    input: any = '';
    label: any = '';
    data: any = '';

  @Watch('data')
  public setData(val) {
    if (this.data != ''){
      this.$emit('location', { 'field': this.$props.field, 'value': this.data })
    }
  }

    public mounted() {

        /*this.input = this.$refs[this.$props.field];
        this.label = this.$props.title;

        const location = new google.maps.places.Autocomplete(
            this.input,
            {
                bounds: new google.maps.LatLngBounds(
                    new google.maps.LatLng(51.1657, 10.4515)
                )
            }
        );

        location.addListener('place_changed', () => {
          alert(this.data)
            //this.$emit('location', { 'field': this.$props.field, 'value': location.getPlace().formatted_address })
            this.$emit('location', { 'field': this.$props.field, 'value': this.data })
        });*/

    }

}
</script>
