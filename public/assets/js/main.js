$(document).ready(function() {
    var key = 'pk_test_58ab90adc79aae5a3580784b716109a1c5a8c307';

    $('#checkout').click(function() {
        var email = $('#email').val();
        var Name = $('#fullname').val();
        var Phone = $('#tel').val();
        var address = $('#deliveryadd').val();
        var litres = $('#litre1').val();
        var amount = $('#price1').val();
        var product = $('#products1').val();
        $.ajax({
            url: 'index',
            method: 'POST',
            data: {
                email: email,
                Name: Name,
                Phone: Phone,
                address: address
            },
            success: function(data) {
                var key2 = data.slice(0, 48);
                var id = data.slice(51, data.length);
                document.querySelector('.hero').classList.add('spinner-2');
                if (key2 == key) {
                    setTimeout(() => {
                        document.querySelector('.hero').classList.remove('spinner-2');
                        payWithPaystack(id, email, parseInt(amount * 100), product, Phone, litres);
                    }, 1000);
                } else {
                    document.querySelector('.hero').classList.remove('spinner-2');
                    alert('All fields are required');
                    window.location = "http://localhost/Enyopay/";
                }
            },
            onerror: function(err) {
                alert(err);
            }
        });
    });


    function payWithPaystack(id, email, amount, product, Phone, litres) {
        var handler = PaystackPop.setup({
            key: key,
            email: email,
            amount: amount,
            metadata: {
                custom_fields: [{
                    display_name: 'Mobile Number',
                    variable_name: 'Mobile_number',
                    value: Phone,
                }, {
                    display_name: 'Product Name',
                    variable_name: 'Product_name',
                    value: product,
                }, ],
            },
            callback: function(response) {
                //  store order to DB
                saveTransaction(id, product, litres, amount, response.reference);
            },
            onClose: function() {
                alert('Transaction cancelled');
                window.location = "http://localhost/Enyopay/";
            },

        });
        handler.openIframe();
    }

    function verifyTransaction(id, orderID, res) {
        $.ajax({
            method: "POST",
            url: "Pages/verify",
            data: {
                response: res,
                id: id,
                orderID:orderID
            },
            cache: false,
            success: function(data) {
                alert(data);
                document.querySelector('.hero').classList.add('spinner-2');
                setTimeout(() => {
                    document.querySelector('.hero').classList.remove('spinner-2');
                    window.location = "http://localhost/Enyopay/";
                }, 1000);
            },
            onerror: function(err) {
                alert(err);
            }
        });
    }

    function saveTransaction(id, product, litres, amount, reference) {
        $.ajax({
            method: 'POST',
            url: 'Pages/save',
            data: {
                reference: reference,
                id: id,
                product:product,
                amount:amount,
                litres:litres,
            },
            cache: false,
            success: function(data) {
                var orderID = data.slice(4,data.length);
                verifyTransaction(id, orderID, reference);
            },
            onerror: function(err) {
                alert(err);
            }
        });
    }

});
