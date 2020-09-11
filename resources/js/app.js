/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import router from './routes/router';
import Index from "./Index";
import ValidationErrors from "./shared/components/ValidationErrors";
import Vuex from 'vuex';
import storeDefinition from "./store";
import moment from "moment";

require('./bootstrap');

Vue.use(Vuex);
Vue.component("v-errors", ValidationErrors);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.prototype.setDocumentTitle = function (title = "Larablog") {
    document.title = title;
};

Vue.filter("shortDate", value => {
    const date = moment(value);

    return date.format("MMM Do YYYY")
})

/**
 *
 * @type {Vuex.Store}
 */
const store = new Vuex.Store(storeDefinition);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        index: Index
    },
    beforeCreate() {
        console.log('store');
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
        console.log('store loaded');
    },
    created () {
        axios.interceptors.response.use(
            response => response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch('logout')
                }
                return Promise.reject(error)
            }
        )
    },

});
