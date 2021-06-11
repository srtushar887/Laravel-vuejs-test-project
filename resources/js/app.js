require('./bootstrap');
import Vue from "vue";

import routes from "./router";
import store from "./store/index";


Vue.component('app-header',require('./components/Header').default);


const app = new Vue({
    el : '#app',
    router:routes,
    store
});
