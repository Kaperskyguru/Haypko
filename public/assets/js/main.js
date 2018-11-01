$(document).ready(function() {
    var key = 'pk_test_58ab90adc79aae5a3580784b716109a1c5a8c307';

    var getProduct = {

        getChoosenProducts :function(){
            //array of products
            let prod = [];
            $('.single-prod').each(function(index){
                //grab the value of the item
                let id = index+1;
                prodName = $('select#products'+id).val();
                litreValue= $('.single-prod #litre'+id).val();
                priceValue= $('.single-prod #price'+id).val();

                //create product
                let product = {
                    name:prodName,
                    litre:litreValue,
                    price:priceValue,
                }
                prod.push(product);
            });
            return prod ;
        }
    }

    $('#cart').click(function(e) {
        e.preventDefault();
        $('.fo').fadeOut(400);
        var id = $('#customer_id').val();
        var amount = $('#amount').val();
        var email = $('#email').val();
        var phone = $('#Mobile_number').val();
        var product = $('#code').val();
        var district = $('#district').val();
        payWithPaystack(id, email, parseInt(amount * 100), phone, district, product);
    });

    $('#checkout').click(function() {
        var email = $('#email').val();
        var Name = $('#fullname').val();
        var Phone = $('#tel').val();
        var address = $('#deliveryadd').val();
        var district = $('#partner_id').val();
        alert(Phone);
        $.ajax({
            url: 'index',
            method: 'POST',
            data: {
                email: email,
                Name: Name,
                Phone: Phone,
                address: address,
                district: district,
                products: getProduct.getChoosenProducts(),
            },
            success: function(data) {
                $('.cart').html(data);
                $(".fo").fadeIn(400);
            }
        });
    });

    function payWithPaystack(id, email, amount, Phone, district, product) {
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
                saveTransaction(id, product, amount, response.reference, district);
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
                // $('.footer').html(data);
                window.location = "http://localhost/Enyopay/"
            },
            onerror: function(err) {
                alert(err);
            }
        });
    }

    function saveTransaction(id, product, amount, reference, district) {
        $.ajax({
            method: 'POST',
            url: 'Pages/save',
            data: {
                reference: reference,
                id: id,
                product:product,
                amount:amount,
                partner_id:district
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
