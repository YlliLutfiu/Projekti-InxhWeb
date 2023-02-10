<?php

    include('connection.php');

    $stmt_oral_care = $conn->prepare("SELECT * FROM products WHERE product_category = 'Oral Care'");

    $stmt_oral_care->execute();

    $products_oral_care = $stmt_oral_care->get_result(); // <- Array []


    $stmt_personal_care = $conn->prepare("SELECT * FROM products WHERE product_category = 'Personal Care'");

    $stmt_personal_care->execute();

    $products_personal_care = $stmt_personal_care->get_result(); // <- Array []


    $stmt_bundles = $conn->prepare("SELECT * FROM products WHERE product_category = 'Bundles'");

    $stmt_bundles->execute();

    $products_bundles = $stmt_bundles->get_result(); // <- Array []


    $stmt_gift_sets = $conn->prepare("SELECT * FROM products WHERE product_category = 'Gift Sets'");

    $stmt_gift_sets->execute();

    $products_gift_sets = $stmt_gift_sets->get_result(); // <- Array []


?>