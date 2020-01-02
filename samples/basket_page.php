
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<h2>Iyzico API Altyapısı ile Ödeme Entegrasyonu</h2>
<p>Doldurulan alanlar ile iyzico API'ı kullanılarak ödeme gerçekleştirilir. Sandbox üzerinden kontrol edilir.</p>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="initialize_checkout_form.php" method="post">

                <div class="row">

                    <div class="col-50">
                        <h3>Ödeme Adresi</h3>
                        <label for="fname"><i class="fa fa-user"></i> Ad</label>
                        <input type="text" id="fname" name="firstname" placeholder="Okan">
                        <label for="fname"><i class="fa fa-user"></i> Soyad</label>
                        <input type="text" id="sname" name="surname" placeholder="Bişgin">
                        <label for="email"><i class="fa fa-envelope"></i> Eposta</label>
                        <input type="text" id="email" name="email" placeholder="john@example.com">
                        <label for="adr"><i class="fa fa-address-card-o"></i> Adres</label>
                        <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                        <label for="city"><i class="fa fa-institution"></i> Şehir</label>
                        <input type="text" id="city" name="city" placeholder="New York">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Ülke</label>
                                <input type="text" id="state" name="state" placeholder="NY">
                            </div>
                            <div class="col-50">
                                <label for="zip">Posta Kodu</label>
                                <input type="text" id="zip" name="zip" placeholder="10001">
                            </div>
                        </div>
                    </div>

                    <div class="col-25">
                        <div class="container">
                            <h4>Kart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>3</b></span></h4>
                            <p><a href="#">Accessories</a> <span class="price">15TL</span> Gül Sepeti</p>
                            <p><a href="#">Online Game Items</a> <span class="price">5TL</span> John's market</p>
                            <p><a href="#">Usb / Cable</a> <span class="price">8TL</span> Parfüm Sepeti</p>
                            <hr>
                            <p>Total <span class="price" style="color:black"><b>28TL</b></span></p>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Ödeme</h3>
                        <label for="fname">Kabul Edilebilir Kartlar</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>
                        <label for="cname">Kart Üzerindeki İsim</label>
                        <input type="text" id="cname" name="cardname" placeholder="Okan">
                        <label for="cname">Kart Üzerindeki Soy</label>
                        <input type="text" id="csname" name="cardsurname" placeholder="Deneme">
                        <label for="ccnum">Kart Numarası</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                        <label for="expmonth">Kartın Son Kullanma Ayı</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September">
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Kartın Son Kullanma Yılı</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2018">
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV Kodu</label>
                                <input type="text" id="cvv" name="cvv" placeholder="352">
                            </div>
                        </div>
                    </div>

                </div>
                <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Faturam bu adrese yollansın
                </label>
                <input type="submit" value="Ödemeye devam et" class="btn">
            </form>
        </div>
    </div>

</div>

</body>