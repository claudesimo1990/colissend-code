import { VueConstructor } from 'vue/types/umd'
import * as moment from "moment";

export default {

    install (Vue: VueConstructor) {

        Vue.filter('preview', function preview(value) {
            if (!value) {
                return ''
            }
            return value.substring(0, 300) + '...'
        })

        Vue.filter('max', function max(value) {
            if (!value) {
                return ''
            }
            return value.substring(0, 30) + '...'
        })

        Vue.filter('formatDate', function formatDate(value) {
            if (!value) {
                return ''
            }
            return moment(value).locale("fr").format('lll')
        })

        Vue.filter('ago', function ago(value) {
            if (!value) {
                return ''
            }
            return moment(value).locale("fr").fromNow();
        })

        Vue.filter('formattedPrice', function formattedPrice(value) {
            if (!value) {
                return ''
            }
            return (value/100) + '€';
        })

    }
}
