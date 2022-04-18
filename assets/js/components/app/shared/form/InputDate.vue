<template>
    <div>
        <ValidationProvider rules="" v-slot="{ errors }">
            <datetime
                type="datetime"
                v-model="date"
                :placeholder="title"
                input-class="form-control"
                value-zone="Europe/Paris"
                zone="Europe/Paris"
                :format="{ year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: '2-digit' }"
                :phrases="{ ok: 'Continue', cancel: 'Exit' }"
                :min-datetime="minDate.toString()"
                :week-start="7"
                use24-hour
                auto
            ></datetime>
            <span class="invalid-feedback d-block" role="alert">
                <small>{{ errors[0] }}</small>
            </span>
        </ValidationProvider>
    </div>
</template>

<script lang="ts">

import {Vue, Component, Watch} from 'vue-property-decorator';
import { Datetime } from 'vue-datetime';
import 'vue-datetime/dist/vue-datetime.css';
import * as moment from 'moment';
import {ValidationObserver, ValidationProvider} from "vee-validate";

@Component({
    components: {
        Datetime,
        ValidationProvider: ValidationProvider,
        ValidationObserver: ValidationObserver
    },
    props: {
        field: String,
        title: String,
        fieldClass: String,
        format: {},
        type: String
    }
})
export default class InputDate extends Vue {

    aktDate: any = '';
    minDate: any = new Date();

    model: any = this.aktDate;

    date: any = '';
    label: any = '';

    @Watch('date')
    public setDate(val) {
        if (this.model != ''){
            this.$emit('dateValue', { field: this.$props.field, value: moment(val).format('YYYY-MM-DD HH:mm:ss') });
        }
    }

    public mounted () {
        this.label = this.$props.title;
        this.model = this.$props.field;

        this.aktDate = moment(new Date).format('DD.MM.YYYY' + ' à ' +  'HH:mm:ss');
        this.minDate = new Date();
    }

}
</script>
