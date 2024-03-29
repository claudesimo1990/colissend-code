import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

import post from "./post"
import message from "./message"
import notification from "./notification"
import echo from "./echo"
import cart from "./cart"

 export default new Vuex.Store({
    modules: {
        post,
        message,
        notification,
        echo,
        cart,
    }
});
