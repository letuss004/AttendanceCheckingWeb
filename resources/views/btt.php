<!doctype html>
<head>
    <style>
        /* CSS comes here */
        body {
            padding:20px;
        }
        input {
            padding:5px;
            background-color:transparent;
            border:none;
            border-bottom:solid 4px #8c52ff;
            width:250px;
            font-size:16px;
        }

        .qr-btn {
            background-color:#8c52ff;
            padding:8px;
            color:white;
            cursor:pointer;
        }
    </style>

    <title>JavaScript QR Code Generator</title>
</head>
<body>
<h3>QR Code Generator</h3>
<div><input id="qr-text" type="text" placeholder="Text to generate QR code"/></div>
<br/>
<div>
    <button class="qr-btn" onclick="generateQRCode()">Create QR Code</button>
</div>
<br/>
<p id="qr-result">This is deault QR code:</p>
<canvas id="qr-code"></canvas>

<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
<script>
    /* JS comes here */
    var qr;
    (function() {
        qr = new QRious({
            element: document.getElementById('qr-code'),
            size: 200,
            value: 'https://studytonight.com'
        });
    })();

    function generateQRCode() {
        var qrtext = document.getElementById("qr-text").value;
        document.getElementById("qr-result").innerHTML = "QR code for " + qrtext +":";
        alert(qrtext);
        qr.set({
            foreground: 'black',
            size: 200,
            value: qrtext
        });
    }
</script>

</body>
</html>
