import axios from "axios";

const message = {

    namespaced: true,

    state: () => ({
        messages: [],
        navMessages: [],
        conversation: [],
        status: false,
        chat: false
    }),
    mutations: {
        setMessages(state: any) {
            axios.get('/api/messages').then((response) => {
                state.messages = response.data;
            }).catch((error) => {
                console.log(error)
            });
        },

        openChat(state: any, payload: boolean) {
            state.chat = payload;
        },

        setMessage(state: any, payload: string) {
            state.posts = payload;
        },

        postMessage(state: any, payload: string){
            axios.post('/api/messages', payload).then((response) => {
                state.sendStatus = true;
            }).catch((error) => {
                console.log(error)
            });
        },

        messagesWith(state: any, payload: number){
            axios.get('/api/messages/with/' + payload).then((response) => {
                state.conversation = response.data;
            }).catch((error) => {
                console.log(error)
            });
        },

        navMessages(state: any, payload: number){
            axios.get('/message/navMessages').then((response) => {
                state.navMessages = response.data;
            }).catch((error) => {
                console.log(error)
            });
        }
    },
    actions: {
        getMessages ({ commit} : any, payload: string) {
            commit('setMessages', payload);
        },

        openChat ({ commit} : any, payload: string) {
            commit('openChat', payload);
        },

        storeMessage({ commit } : any, payload: string) {
            commit('postMessage' , payload);
        },

        getMessagesWith({ commit } : any, payload: number) {
            commit('messagesWith' , payload);
        },

        getNavMessages({ commit } : any, payload: number) {
            commit('navMessages' , payload);
        },
    },
    getters: {
        messages (state: any) {
            return state.messages;
        },

        navMessages (state: any) {
            return state.navMessages;
        },

        sendStatus (state: any) {
            return state.sendStatus;
        },

        conversation (state: any) {
            return state.conversation;
        },

        chatStatus (state: any) {
            return state.chat;
        }
    }
}

export default message;
