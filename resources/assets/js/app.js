
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('@fortawesome/fontawesome-free/js/all.js');


window.Vue = require('vue');

require('./vendor/toastmessage');

require('./admin');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('clock-form', require('./components/ClockForm.vue'));
Vue.component('descriptions-form', require('./components/DescriptionsForm.vue'));
Vue.component('characteristics-form', require('./components/CharacteristicsForm.vue'));
Vue.component('images-form', require('./components/ImagesForm.vue'));
Vue.component('clocks-table', require('./components/ClocksTable.vue')); //Адмін таблиця годинників
Vue.component('clocks-list', require('./components/ClocksList.vue')); //Прайслист

const app = new Vue({
    el: '#app'
});





