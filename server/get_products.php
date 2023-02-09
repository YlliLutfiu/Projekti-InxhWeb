<?php

    include('connection.php');

    $stmt_oral_care = $conn->prepare("SELECT * FROM products WHERE product_category = 'Oral Care'");

    $stmt_oral_care->execute();

    $products_oral_care = $stmt_oral_care->get_result(); // <- Array []

?>