<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR scanner</title>

    <script>
        import('https://cdnjs.cloudflare.com/ajax/libs/qr-scanner/1.0.0/qr-scanner.min.js').then((module) => {
            const QrScanner = module.default;
            QrScanner.WORKER_PATH = '/worker.js';

            const videoElem = document.getElementById('video');
            const qrScanner = new QrScanner(videoElem, result => console.log('decoded qr code:', result));

            const scanLink = document.getElementById('scan');
            scanLink.addEventListener('click', function (event) {
                event.preventDefault();
                qrScanner.start().then(result => {
                    alert(result);
                }).catch(e => console.log(e));
            });
        });
    </script>
</head>
<body>
<video id="video"></video>

<a href="#" id="scan">Scan QR Code</a>
</body>
</html>
