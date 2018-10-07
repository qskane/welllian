(function () {
  console.log('thrid pard js loaded');

  const http = require('./http');

  const config = {
    root: 'http://malllian-dev.com'
  };


  const routes = {
    create: function (value) {
      http.get(`${config.root}/api/media/${value}`, (response) => {
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
