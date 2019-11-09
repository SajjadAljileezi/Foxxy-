
require('./bootstrap');

window.Vue = require('vue');
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate);
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

import Vue from 'vue'
import VueRouter from 'vue-router'

import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';
import 'vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css';

Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);


Vue.use(VueRouter)


import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );



Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('showcomponent', require('./components/ShowComponent.vue').default);
Vue.component('callbackcomponent', require('./components/CallbackComponent.vue').default);





const routes = [
    { path: '/home', component: require('./components/HomeComponent.vue').default},
    { path: '/callback', component: require('./components/CallbackComponent.vue').default},
    { path: '/leadcallback', component: require('./components/LeadbackComponent.vue').default},
    { path: '/show/:id', component: require('./components/ShowComponent.vue').default },
    { path: '/showlead/:id', component: require('./components/ShowLeadComponent.vue').default },
    { path: '/showcloser/:id', component: require('./components/ShowCloserComponent.vue').default },
    { path: '/socialmedia', component: require('./components/SocialmediaComponent.vue').default },
    { path: '/reviewmanagment', component: require('./components/ReviewComponent.vue').default },
    { path: '/script', component: require('./components/ScriptComponent.vue').default },
    { path: '/closers', component: require('./components/CloserComponent.vue').default },
    { path: '/leads', component: require('./components/LeadComponent.vue').default },
    { path: '/cname', component: require('./components/CNameComponent.vue').default },
  ]

const router = new VueRouter({
    routes,
    mode: 'history', // short for `routes: routes`
  })

const app = new Vue({
    router,

  }).$mount('#app')
