import Vue from 'vue';

import SearchComponent from "../components/app/shared/SearchComponent.vue";
import PostComponent from "./../components/app/post/PostComponent.vue";
import PostBookingComponent from "./../components/app/post/PostBookingComponent.vue";
import MessageComponent from "../components/app/nav/MessageComponent.vue";
import NotificationComponent from "../components/app/nav/NotificationComponent.vue";
import TravelComponent from "../components/app/post/create/Travel.vue";
import ColiComponent from "../components/app/post/create/Coli.vue";
import ChatComponent from "../components/app/chat/ChatComponent.vue";
import MessagesComponent from "../components/app/user/Messages.vue";
import CookieComponent from "../components/app/CookieComponent.vue";
import toast from 'vue-toastification';

require("../../js/utilities/validator");

import filters from "../utilities/filters";
import VueChatScroll from 'vue-chat-scroll';

Vue.use(VueChatScroll);
Vue.use(filters)
Vue.use(toast, {
    transition: "Vue-Toastification__bounce",
    maxToasts: 20,
    newestOnTop: true
})

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
        MessagesComponent: MessagesComponent,
        CookieComponent: CookieComponent
    }
}).$mount('#app');
