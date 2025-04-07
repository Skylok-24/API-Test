<?php

// API GET test

//print_r($jsObj);



function deleteProduct()
{
    send("products/17","DELETE");
}

function updateProduct()
{
    send("products/17","POST",[
        'id'=> 1,
        'title'=> "Lokman Louka Brahmia",
        'price'=> 109.95,
        'description'=> "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
        'category' => "men's clothing",
        'image' => "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg"
    ]);
}

function createProduct()
{
    send("products","POST",[
        'id'=> 1,
        'title'=> "Lokman Louka Brahmia",
        'price'=> 109.95,
        'description'=> "Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday",
        'category' => "men's clothing",
        'image' => "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg"
    ]);
}
function getAll()
{
    $responce = send("products","GET");
    $products = json_decode($responce);
    foreach($products as $product) {
        echo $product->id ."</br>";
        echo $product->title ."</br>";
        echo "<img src='".$product->image ."' width='100px'></br>";
    }

    //if (curl_errno($curl)) {
//    echo 'Curl error: ' . curl_error($curl);
//} else {
//    $data = json_decode($response, true);
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
//}
}


function send($endPoint,$method,$data = null)
{
    $url = "https://fakestoreapi.com/".$endPoint;

    $headers = [
        "Content-Type: application/json"
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_POSTFIELDS => json_decode($data)
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

$products = json_decode(send("products","GET"));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Products</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            direction: rtl;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .product-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: 0.3s;
        }

        .product-card:hover {
            transform: scale(1.03);
        }

        .product-image {
            width: 100%;
            height: 200px;
            background-color: #ddd;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .product-title {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0 5px;
            text-align: center;
            color: #222;
        }

        .product-category {
            font-size: 14px;
            color: #777;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 16px;
            color: #008060;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>API Market Products</h1>

<div class="container">

    <?php
    foreach ($products as $product) {
    ?>
    <div class="product-card">
        <div class="product-image">
            <img src="<?= $product->image ?>" alt="">
        </div>
        <div class="product-title"><?= $product->title ?></div>
        <div class="product-category"><?= $product->category ?></div>
        <div class="product-price"><?= $product->price ?>DA</div>
    </div>
    <?php } ?>
</div>

</body>
</html>

