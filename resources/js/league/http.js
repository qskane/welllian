const http = {
  get: function (url, onSuccess, onError) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.onload = function () {
      if (xhr.status === 200) {
        onSuccess(xhr.response, xhr);
      } else {
        if (typeof onError !== 'undefined') {
          onError(xhr.response, xhr);
        }
      }
    };
    xhr.send();
  }
};

module.exports = http;
