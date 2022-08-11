import axios from "axios";

const post = {

    namespaced: true,

    state: () => ({
        posts: {},
        results: {},
        searchedPost: {},
        searchCount: 0,
        modal: false
    }),
    mutations: {
        setPosts(state: any, payload: any) {
            if (payload) {
                state.posts = state.searchedPost;
                state.modal = true;
                return;
            }
            axios.get('/api/posts').then((response) => {
                state.posts = response.data.data;
            }).catch((error) => {
                console.log(error)
            });
      },

        searchPostWithKeys(state: any, payload: string) {
            axios.post('/api/posts', payload).then((response) => {
                state.searchCount = response.data.data.length;
                state.searchedPost = response.data.data;
            }).catch((error) => {
                console.log(error)
            });
        },

        results(state: any, payload: any) {
            axios.get('/api/posts/' + payload).then((response) => {
                state.results = response.data.data;
            }).catch((error) => {
                console.log(error)
            });
        }
    },
    actions: {
        fetchPosts ({ commit} : any, payload: string ) {
            commit('setPosts', payload);
          },

        paginateResults({ commit} : any, payload: string ) {
            commit('results', payload);
        },

        searchPost ({ commit} : any, payload: string ) {
            commit('searchPostWithKeys', payload);
        },
        updatePosts ({ commit} : any, payload: string ) {
            commit('setPosts', payload);
        }
    },
    getters: {
        posts (state: any) {
            return state.posts;
        },
        getSearchCount(state: any) {
            return state.searchCount;
        },
        getModal(state: any) {
            return state.modal;
        },
        results(state: any) {
            return state.results;
        }
    }
  }

export default post;
