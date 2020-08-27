/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import swal from 'sweetalert';
window.swal = swal;

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('welcome-component', require('./components/WelcomeComponent.vue').default);
Vue.component('services-component', require('./components/Service.vue').default);
Vue.component('features-component', require('./components/Features.vue').default);
Vue.component('papers-component', require('./components/Papers.vue').default);
Vue.component('subject-component', require('./components/Subjects.vue').default);
Vue.component('topics-component', require('./components/Topics.vue').default);
Vue.component('checkout-component', require('./components/CheckOut.vue').default);
Vue.component('orders-component', require('./components/Orders.vue').default);
Vue.component('user-component', require('./components/Users.vue').default);
Vue.component('uploaded-component', require('./components/Uploaded.vue').default);
Vue.component('dist-component', require('./components/Dist.vue').default);
Vue.component('admin-component', require('./components/Admin.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
})