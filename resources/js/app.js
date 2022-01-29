const axios = require('axios').default;

function shortifyQuery() {
  let url = document.getElementById('url-input').value

  axios.post('/', {'url': url})
    .then(function (response) {
      let shortUrl = document.getElementById('short-url')
      let copyBtn = document.getElementById('copy-url-btn')

      shortUrl.innerText = response.data?.url
      copyBtn.disabled = false
    })
    .catch(function (error) {
      alert(error);
    });
}

function copyShortUrl() {
  var shortUrl = document.getElementById('short-url').innerText

  // На случай, если navigator.clipboard не работает
  if (typeof (navigator.clipboard) == 'undefined') {
      var textArea = document.createElement("textarea");
      textArea.value = shortUrl;
      textArea.style.position = "fixed";  //avoid scrolling to bottom
      document.body.appendChild(textArea);
      textArea.focus();
      textArea.select();

      try {
          var successful = document.execCommand('copy');
          var msg = successful ? 'successful' : 'unsuccessful';
      } catch (err) {
        //
      }

      document.body.removeChild(textArea)
      return;
  }

  navigator.clipboard.writeText(shortUrl).then(function() {
    /* clipboard successfully set */
  }, function() {
    /* clipboard write failed */
  });
}

module.exports = {
  shortifyQuery,
  copyShortUrl
}
