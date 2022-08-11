import axios from "axios";

const cart = {

    namespaced: true,

    state: () => ({
        cart: null,
        content: {}
    }),
    mutations: {
        fetchContent: function (state: any) {
            axios.get('/shop/cart/content').then((response) => {
                state.content = response.data;
            }).catch((error) => {
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
        fetchContent ({ commit} : any, payload: any) {
            commit('fetchContent');
        },

        increase ({ commit} : any, payload: number) {
            commit('increase', payload);
        },

        decrease ({ commit} : any, payload: number) {
            commit('decrease', payload);
        },
    },
    getters: {
        getContent (state: any) {
            return state.content;
        },
    }
}

export default cart;
