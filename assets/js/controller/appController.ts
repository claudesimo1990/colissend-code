import Vue from 'vue';

import SearchComponent from "../components/app/shared/SearchComponent.vue";
import PostComponent from "./../components/app/post/PostComponent.vue";
import PostBookingComponent from "./../components/app/post/PostBookingComponent.vue";
import MessageComponent from "../components/app/nav/MessageComponent.vue";
import NotificationComponent from "../components/app/nav/NotificationComponent.vue";
import TravelComponent from "../components/app/post/TravelComponent.vue";
import ColiComponent from "../components/app/post/ColiComponent.vue";
import ChatComponent from "../components/app/chat/ChatComponent.vue";
import CookieComponent from "../components/app/CookieComponent.vue";

import { extend } from 'vee-validate';
import {required, integer, max, min, numeric, image} from 'vee-validate/dist/rules';


//vee-validate rules
extend('required', {
    ...required,
    message: 'Ce champs est obligatoire'
});
extend('integer', {
    ...integer,
    message: 'Ce champs est un entier'
});
extend('numeric', {
    ...numeric,
    message: 'Ce champs est numeric'
});
extend('max', {
    ...max,
    message: 'La valeur taper est trop grande'
});
extend('min', {
    ...min,
    message: 'La valeur taper est trop petite'
});

extend('image', {
    ...image,
    message: 'Ce champs est doit etre une image'
});

import filters from "../utilities/filters";

Vue.use(filters)

const app = new Vue({
    components: {
        searchComponent: SearchComponent,
        PostComponent: PostComponent,
        PostBookingComponent: PostBookingComponent,
        MessageComponent: MessageComponent,
        NotificationComponent: NotificationComponent,
        TravelComponent: TravelComponent,
        ColiComponent: ColiComponent,
        ChatComponent: ChatComponent,
        CookieComponent: CookieComponent
    }
}).$mount('#app');
