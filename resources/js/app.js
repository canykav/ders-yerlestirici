
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

const formatTime = (value) => {
  if (value == "" || value == null) {
    return value;
  } else {
    value = new Date(value).toLocaleTimeString('tr-TR', {hour: '2-digit', minute:'2-digit'});
    return value;
  }
}
Vue.filter('formatTime', formatTime);


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