<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Signature pad</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="{{asset('js/signature_pad.umd.min.js')}}" type="text/javascript"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .wrapper {
            position: relative;
            width: 400px;
            height: 200px;
            border: 1px solid;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;

        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px;
            height: 200px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
    </div>
    <div>
        <button id="save">Save</button>
        <button id="clear">Clear</button>
    </div>

    <script>
        var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
        var saveButton = document.getElementById('save');
        var cancelButton = document.getElementById('clear');

        saveButton.addEventListener('click', function(event) {
            var data = signaturePad.toDataURL('image/png');

            // Send data to server instead...
            window.open(data);
        });

        cancelButton.addEventListener('click', function(event) {
            signaturePad.clear();
        });
    </script>
</body>

</html>
