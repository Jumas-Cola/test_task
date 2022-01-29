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
