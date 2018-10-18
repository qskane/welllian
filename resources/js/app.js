require('./bootstrap');

require('./global');

window.Vue = require('vue');

Vue.component('tree-menu', require('./components/tree_menu/TreeMenu.vue'));

const app = new Vue({
  el: '#app',
  data: function () {
    let data = JSON.parse(document.getElementById('storage').innerText);
    if (!_.isObject(data)) {
      data = {};
    } else {
      if (_.isArray(data)) {
        data = {};
      }
    }
    return data;
  }
});
