

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

<h2>Pazaryeri Üyelik</h2>
<p>Doldurulan alanlar ile altüye işyeri üyeliği gerçekleştirilir.</p>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="create_sub_merchant.php" method="post">

                <div class="row">
                    <div class="col-50">
                        <h3>Ödeme Adresi</h3>
                        <label for="fname"><i class="fa fa-envelope"></i> Altüye İşyeri İsmi</label>
                        <input type="text" id="sname" name="sname" >
                        <label for="fname"><i class="fa fa-user"></i> Ad</label>
                        <input type="text" id="fname" name="cname" placeholder="İsim">
                        <label for="fname"><i class="fa fa-user"></i> Soyad</label>
                        <input type="text" id="sname" name="csurname" placeholder="Soyisim">
                        <label for="fname"><i class="fa fa-envelope"></i> Iban</label>
                        <input type="text" id="iban" name="iban" >
                        <label for="email"><i class="fa fa-envelope"></i> Eposta</label>
                        <input type="text" id="email" name="email" placeholder="ex@example.com">
                        <label for="phone"><i class="fa fa-envelope"></i> Telefon</label>
                        <input type="number" id="phone" name="phone" >
                        <label for="adr"><i class="fa fa-address-card-o"></i> Adres</label>
                        <input type="text" id="adr" name="address" >
                        <label for="city"><i class="fa fa-institution"></i> Şehir</label>
                        <input type="text" id="city" name="city" placeholder="İstanbul">

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Ülke</label>
                                <input type="text" id="state" name="state" placeholder="Türkiye">
                            </div>
                            <div class="col-50">
                                <label for="zip">Posta Kodu</label>
                                <input type="text" id="zip" name="zip" placeholder="34000">
                            </div>
                        </div>
                    </div>
                    <?php checkIban(isset($string));?>
                </div>
                <input type="submit" value="Kaydet" class="btn">
            </form>
        </div>
    </div>
</div>



</body>

<?php
function checkIban($string){
    $string = isset($_POST['iban']);
    $to_check = substr($string, 4).substr($string, 0,4);
    $converted = '';
    for ($i = 0; $i < strlen($to_check); $i++){
        $char = strtoupper($to_check[$i]);
        if(preg_match('/[0-9A-Z]/',$char)){
            if(!preg_match('/\d/',$char)){
                $char = ord($char)-55;
            }
            $converted .= $char;
        }
    }
    print_r("okan");
}
?>