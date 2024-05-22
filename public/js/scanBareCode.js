const barcodeInput = document.getElementById('barcode');
const interactiveElement = document.getElementById('interactive');

barcodeInput.addEventListener('focus', function() {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: interactiveElement
        },
        decoder: {
            readers: ["code_128_reader", "ean_reader", "ean_8_reader", "code_39_reader", "code_39_vin_reader", "codabar_reader", "upc_reader", "upc_e_reader", "i2of5_reader"]
        }
    }, function(err) {
        if (err) {
            console.log(err);
            return;
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    });

    Quagga.onDetected(function(data) {
        barcodeInput.value = data.codeResult.code;
        Quagga.stop();
    });
});

barcodeInput.addEventListener('blur', function() {
    Quagga.stop();
});

