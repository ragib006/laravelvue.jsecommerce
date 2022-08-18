/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//vuex
import Vuex from 'vuex'
Vue.use(Vuex)


import storeData from "./store/index.js"
const store = new Vuex.Store(

      storeData

)




//view router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//path
import {routes} from './routes.js';


//v-form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

//moment.js support
import moment from 'moment';
moment().format();
//vue filter

Vue.filter('timeformat',(arg) =>{

return moment(arg).format("MMM Do YY")
//return moment().format('l');


})


//long description short


Vue.filter('shortlength',(text,length,suffix) => {

  return text.substring(0,length)+suffix;


})

//pagination register

Vue.component('pagination', require('laravel-vue-pagination'));










//sweet alert

import Swal from 'sweetalert2'
window.Swal = Swal

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;








const router = new VueRouter({
//  mode:'history',
   mode: 'history',
 // mode:'hash',
  routes // short for `routes: routes`
})





window.Fire = new Vue();




//window.Fire = new Vue();

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('deshboard-header', require('./components/Dashboardheader.vue').default);
// Vue.component('header-component', require('./frontend/BlogHeader.vue').default);


const app = new Vue({
    el: '#app',
    router,
    store,


    // data:{
    //
    //   search:'',
    //
    // },
    //
    // methods:{
    //
    // searchit(){
    //
    //   Fire.$emit('searching');
    //
    // }
    //
    //
    // }
});
