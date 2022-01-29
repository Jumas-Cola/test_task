<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Link Shorter</title>
    <script src="js/bundle.js"></script>
    <script>
      window.onload = function () {
        document.getElementById('button-short')
                .addEventListener('click', EntryPoint.shortifyQuery)
        document.getElementById('copy-url-btn')
                .addEventListener('click', EntryPoint.copyShortUrl)
      };
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">

        <h1 class="text-center">Укратитель ссылок</h1>

        <div class="input-group mb-3">
          <input id="url-input" type="text" class="form-control mt-1" placeholder="Введите ссылку" aria-describedby="button-short">
          <button class="btn btn-outline-secondary" type="button" id="button-short">Submit</button>
        </div>

        <div class="d-flex justify-content-between">
          <p id="short-url" class="w-100 text-center"></p>
          <button id="copy-url-btn" type="button" class="btn btn-primary btn-sm" title="" disabled>Copy</button>
        </div>

    </div>
</body>
</html>
