import Vue from 'vue';

import SearchComponent from "../components/app/shared/SearchComponent.vue";
import Posts from "./../components/app/post/Posts.vue";
import PostBookingComponent from "./../components/app/post/PostBookingComponent.vue";
import MessageComponent from "../components/app/nav/MessageComponent.vue";
import NotificationComponent from "../components/app/nav/NotificationComponent.vue";
import TravelComponent from "../components/app/post/create/Travel.vue";
import ColiComponent from "../components/app/post/create/Coli.vue";
import ChatComponent from "../components/app/chat/ChatComponent.vue";
import MessagesComponent from "../components/app/user/Messages.vue";
import CookieComponent from "../components/app/CookieComponent.vue";
import ShoppingCart from "../components/app/shop/ShoppingCart.vue";
import TotalToPay from "../components/app/shop/TotalToPay.vue";

require("../../js/utilities/validator");

import filters from "../utilities/filters";
Vue.use(filters)

const app = new Vue({
    components: {
        searchComponent: SearchComponent,
        Posts: Posts,
        PostBookingComponent: PostBookingComponent,
        MessageComponent: MessageComponent,
        NotificationComponent: NotificationComponent,
        TravelComponent: TravelComponent,
        ColiComponent: ColiComponent,
        ChatComponent: ChatComponent,
        MessagesComponent: MessagesComponent,
        CookieComponent: CookieComponent,
        ShoppingCart: ShoppingCart,
        TotalToPay: TotalToPay
    }
}).$mount('#app');
