
require('./bootstrap');

window.Vue = require('vue').default;
//Vue.config.devtools = false;
import VueRouter from 'vue-router';
Vue.use(VueRouter);


import 'core-js/stable'
//import App from './App'
import router from './router'
import CoreuiVue from '@coreui/vue'
import { iconsSet as icons } from './assets/icons/icons.js'
import store from './store'

Vue.config.performance = true
Vue.use(CoreuiVue)
Vue.prototype.$log = console.log.bind(console)

   Vue.component(
        'App',
        require('./App.vue').default
    );

    new Vue({
        el: '#app',
        router,
        store,
        icons,
      })