/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */



require('./bootstrap');

window.Vue = require('vue');

import store from "./store";


Vue.component('ramka1-component',require('./components/ramka1Component').default);
Vue.component('aj-component',require('./components/ajComponent').default);
Vue.component('exercise-component',require('./components/exerciseComponent').default);
Vue.component('cart-component',require('./components/gymstart/cartComponent').default);
Vue.component('choise-component',require('./components/choiseComponent').default);
Vue.component('gymstart-component',require('./components/gymstart/gymstartComponent').default);
Vue.component('gymmini-component',require('./components/gymstart/gymminiComponent').default);
Vue.component('result-component',require('./components/gymstart/resultComponent').default);

Vue.component('posts-component',require('./components/book/postsComponent').default);
Vue.component('post-component',require('./components/book/postComponent').default);
Vue.component('book-component',require('./components/book/bookComponent').default);
Vue.component('sidebar-component',require('./components/book/sidebarComponent').default);
Vue.component('popular-posts-component',require('./components/book/sidebar/popularPostsComponent').default);
Vue.component('featured-posts-component',require('./components/book/sidebar/featuredPostsComponent').default);
Vue.component('categories-component',require('./components/book/sidebar/categoriesComponent').default);
Vue.component('profile-component',require('./components/book/user/profileComponent').default);


const app = new Vue({
    el: '#app',
    store

});
