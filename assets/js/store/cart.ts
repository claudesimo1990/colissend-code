import axios from "axios";

const cart = {

    namespaced: true,

    state: () => ({
        cart: null,
        content: {},
        total: Array
    }),
    mutations: {

        fetchContent: function (state: any) {
            axios.get('/shop/cart/content').then((response) => {
                state.content = response.data;
            }).catch((error) => {
                console.log(error)
            });
        },

        total: function (state: any) {
            axios.get('/shop/cart/total').then((response) => {state.total = response.data;}).catch((error) => {
                console.log(error)
            });
        },

        increase: function (state: any, payload: number) {
            axios.put('/shop/cart/increase/' + payload).then((response) => {}).catch((error) => {
                console.log(error)
            });
        },

        decrease: function (state: any, payload: number) {
            axios.put('/shop/cart/decrease/' + payload).then((response) => {}).catch((error) => {
                console.log(error)
            });
        },
    },
    actions: {

        fetchContent ({ commit} : any) {
            commit('fetchContent');
        },

        total ({ commit} : any) {
            commit('total');
        },

        increase ({ commit} : any, payload: number) {
            commit('increase', payload);
            commit('total');
            commit('fetchContent');
        },

        decrease ({ commit} : any, payload: number) {
            commit('decrease', payload);
            commit('total');
            commit('fetchContent');
        },
    },
    getters: {

        getContent (state: any) {
            return state.content;
        },

        total (state: any) {
            return state.total;
        },
    }
}

export default cart;
