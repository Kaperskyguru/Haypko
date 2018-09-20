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
        var district = $('#partner_id').val();
        $.ajax({
            url: 'index',
            method: 'POST',
            data: {
                email: email,
                Name: Name,
                Phone: Phone,
                address: address,
                product: product,
            },
            success: function(data) {

                var arr = data.split('ID:');
                document.querySelector('.hero').classList.add('spinner-2');
                if (arr[0].trim() == key.trim()) {
                    setTimeout(() => {
                        document.querySelector('.hero').classList.remove('spinner-2');
                        payWithPaystack(arr[1].trim(), email, parseInt(amount * 100), product, Phone, litres, district);
                    }, 1000);
                } else {
                    document.querySelector('.hero').classList.remove('spinner-2');
                    alert(data);
                    window.location = "http://localhost/Enyopay/";
                }
            },
            onerror: function(err) {
                alert(err);
            }
        });
    });

    function payWithPaystack(id, email, amount, product, Phone, litres, district) {
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
                saveTransaction(id, product, litres, amount, response.reference, district);
            },
            onClose: function() {
                alert('Transaction cancelled');
                window.location = "http://localhost/Enyopay/";
            },

        });
        handler.openIframe();
    }

    function verifyTransaction(district, id, orderID, res) {
        $.ajax({
            method: "POST",
            url: "Pages/verify",
            data: {
                response: res,
                id: id,
                orderID:orderID,
                partner_id:district,
            },
            cache: false,
            success: function(data) {
                window.location = "http://localhost/Enyopay/"
            },
            onerror: function(err) {
                alert(err);
            }
        });
    }

    function saveTransaction(id, product, litres, amount, reference, district) {
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
                var arr = data.split('/')
                verifyTransaction(district, id, arr[1], reference);
            },
            onerror: function(err) {
                alert(err);
            }
        });
    }

    function register(name, rcnumber, email, city, state, address, mobile) {
        $.ajax({
            url:'',
            type:'POST',
            cache:false,
            data:{register:1, name:name, rcnumber:rcnumber, email:email, city:city, state:state, address:address, mobile:mobile},
            success:function (data) {
                alert(data);
            },
            onerror:function (err) {
                alert(err);
            }
        });
    }

    // $('#login').click(function (e) {
    //     e.preventDefault();
    //     let type = $('#').val();
    //     let username = $('#').val();
    //     let pass = $('#').val();
    //     login(type, username, pass);
    // });

    function login(type, username, pass) {
        $.ajax({
            url:'http://localhost/Enyopay/users/login',
            method:'POST',
            cache:false,
            data: {type:type, username:username, pass:pass},
            success:function (data) {
                $('#d').html(data);
            },
            onerror:function (err) {
                alert(err);
            }
        });
    }

});
