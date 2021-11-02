<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Not Found 404</title>
  <link rel="icon" href="<?= base_url('asset/img/logo.png') ?>">
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      color: #f25252;
      background-image: url(<?= base_url('asset/img/background.jpg') ?>);
    }

    h1 {
      font-size: 11rem;
      position: absolute;
      transform: translate(-50%, -50%);
      margin: 0;
    }

    h1:nth-of-type(1) {
      animation: range 4s infinite;
    }

    h1:nth-of-type(2) {
      left: 50%;
      top: 50%;
      animation: size 4s infinite;
    }

    h1:nth-of-type(3) {
      animation: range2 4s infinite;
    }

    @keyframes range {
      0% {
        left: 42%;
        top: 50%;
        font-size: 11rem;
      }

      25% {
        left: 50%;
        top: 40%;
        font-size: 4.5rem;
      }

      50% {
        left: 58%;
        top: 50%;
        font-size: 11rem;
      }

      75% {
        left: 50%;
        top: 60%;
        font-size: 4.5rem;
      }

      100% {
        left: 42%;
        top: 50%;
        font-size: 11rem;
      }
    }

    @keyframes range2 {
      0% {
        left: 58%;
        top: 50%;
        font-size: 11rem;
      }

      25% {
        left: 50%;
        top: 60%;
        font-size: 4.5rem;
      }

      50% {
        left: 42%;
        top: 50%;
        font-size: 11rem;
      }

      75% {
        left: 50%;
        top: 40%;
        font-size: 4.5rem;
      }

      100% {
        left: 58%;
        top: 50%;
        font-size: 11rem;
      }
    }

    @keyframes size {
      0% {
        font-size: 11rem;
      }

      25% {
        font-size: 26rem;
      }

      50% {
        font-size: 11rem;
      }

      75% {
        font-size: 26rem;
      }

      100% {
        font-size: 11rem;
      }
    }
  </style>
</head>

<body>
  <h1>4</h1>
  <h1>0</h1>
  <h1>4</h1>
  <div style="position: absolute; margin-left: auto; margin-right: auto; left: 0; right: 0;text-align: center;">
    <a href="<?= base_url() ?>Home"><img src="<?= base_url('asset/img/logo.png') ?>" alt="Badriah Collection" width=170px height="150px"></a>
  </div>
</body>

</html>