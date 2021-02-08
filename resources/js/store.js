import Vue from 'vue'
import Vuex from 'vuex'
import post from './store/post'
import gymstart from './store/gymstart'
import bookpost from './store/bookpost'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import Vuelidate from "vuelidate/src";

// import gymstartfuture from "./store/gymstartfuture";
//import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)
Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(Vuelidate)


let store = new Vuex.Store({
    // plugins: [createPersistedState()],
    modules:{
        post,
        gymstart,
        bookpost,
    //
    }

});

export default store;

