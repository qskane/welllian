(function () {
  const http = require('./http');
  const config = require('../config');

  const routes = {
    create: function (value) {
      http.get(`${config.api}/api/media/${value}`, (response) => {
        const schemes = JSON.parse(response).data;
        if (schemes.length === 0) {
          return;
        }

        schemes.map(function (scheme) {
          const container = document.getElementById(scheme.container);
          if (container !== null) {
            container.innerHTML = scheme.template;
          }
        });
      });
    }
  };

  window.league.q.map(function (job) {
    const args = [...job];
    args.shift();
    routes[job[0]](...args);
  });

})();
