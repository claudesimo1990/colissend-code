import axios from "axios";

const notification = {

    namespaced: true,

    state: () => ({
        notifications: {},
        status: false
    }),
    mutations: {
        setNotifications(state: any) {
            axios.get('/user/notifications').then((response) => {
                state.notifications = response.data;

            }).catch((error) => {
                console.log(error)
            });
        },

        setNotification(state: any, payload: string) {
            state.posts = payload;
        }
    },
    actions: {
        getNotifications ({ commit} : any, payload: string) {
            commit('setNotifications', payload);
        }
    },
    getters: {
        notifications (state: any) {
            return state.notifications;
        }
    }
}

export default notification;
