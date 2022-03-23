import Echo from "laravel-echo";

const echo = {

    namespaced: true,

    state: () => ({
        echo: Echo
    }),
    mutations: {
        setEcho(state: any) {
            state.echo = new Echo({
                broadcaster: 'pusher',
                key: process.env.MIX_PUSHER_APP_KEY,
                cluster: process.env.MIX_PUSHER_APP_CLUSTER,
                forceTLS: false,
                wsHost: window.location.hostname,
                wsPort: 6001,
                disableStats: false,
                enabledTransports: ['ws', 'wss']
            });
        }
    },
    actions: {
        initEcho ({ commit} : any) {
            commit('setEcho');
        }
    },
    getters: {
        echo (state: any) {
            return state.echo;
        }
    }
}

export default echo;
