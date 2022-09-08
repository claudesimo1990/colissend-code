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
                axios.get('/shop/cart/total').then((response) => {state.total = response.data;}).catch((error) => {
                    console.log(error)
                });
            }).catch((error) => {console.log(error)});
        },

        increase: function (state: any, payload: number) {
            axios.put('/shop/cart/increase/' + payload).then((response) => {
                axios.get('/shop/cart/content').then((response) => {state.content = response.data;}).catch((error) => {console.log(error)});
                axios.get('/shop/cart/total').then((response) => {state.total = response.data;}).catch((error) => {
                    console.log(error)
                });
            }).catch((error) => {
                console.log(error)
            });
        },

        decrease: function (state: any, payload: number) {
            axios.put('/shop/cart/decrease/' + payload).then((response) => {
                axios.get('/shop/cart/content').then((response) => {state.content = response.data;}).catch((error) => {console.log(error)});
                axios.get('/shop/cart/total').then((response) => {state.total = response.data;}).catch((error) => {
                    console.log(error)
                });
            }).catch((error) => {
                console.log(error)
            });
        },
    },
    actions: {

        fetchContent ({ commit} : any) {
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

        total (state: any) {
            return state.total;
        },
    }
}

export default cart;
