(function () {
  console.log('thrid pard js loaded');
  console.log(window.league.q);

  const http = require('./http');

  const routes = {
    create: function (value) {
      http.get('https://service.firmooinc.com/stateless/visitor/scheme', (response) => {
        console.log(response, JSON.parse(response));
      });
    }
  };


  window.league.q.map(function (job) {
    const args = [...job];
    args.shift();
    routes[job[0]](...args);
  });

})();
