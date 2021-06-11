import Vue from "vue";
import Vuex from 'vuex'
Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        message :"welcome SRT",
        user:{},
        authentication : false,
    },
    getters: {
        getMessage(state){
            return state.message;
        },
        getUser(state){
            return state.user;
        },
        getAuthticated(state){
            return state.authentication;
        }
    },
    mutations:{
        SET_USER(state,data){
            state.user = data;
        },
        SET_AUTHENTICATED(state,data){
            state.authentication = data;
        },
    }
});


export default store;
