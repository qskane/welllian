require('./bootstrap');

require('./global');

window.Vue = require('vue');

Vue.component('tree-menu', require('./components/tree_menu/TreeMenu.vue'));

const app = new Vue({
  el: '#app'
});
