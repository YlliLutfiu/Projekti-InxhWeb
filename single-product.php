<?php

    include('server/connection.php');

    if(isset($_GET['product_Id'])){

    $product_id = $_GET['product_Id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_Id = ? ");
    $stmt->bind_param("i",$product_id);

    $stmt->execute();

    $product = $stmt->get_result();


} else {
    header('location: shop.php');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/single-product.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav id="home">
            <svg class="close" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C10.0222 2 8.08879 2.58649 6.4443 3.6853C4.79981 4.78412 3.51809 6.3459 2.76121 8.17317C2.00433 10.0004 1.8063 12.0111 2.19215 13.9509C2.578 15.8907 3.53041 17.6725 4.92894 19.0711C6.32746 20.4696 8.10929 21.422 10.0491 21.8079C11.9889 22.1937 13.9996 21.9957 15.8268 21.2388C17.6541 20.4819 19.2159 19.2002 20.3147 17.5557C21.4135 15.9112 22 13.9778 22 12C22 10.6868 21.7413 9.38642 21.2388 8.17317C20.7363 6.95991 19.9997 5.85752 19.0711 4.92893C18.1425 4.00035 17.0401 3.26375 15.8268 2.7612C14.6136 2.25866 13.3132 2 12 2V2ZM14.71 13.29C14.8037 13.383 14.8781 13.4936 14.9289 13.6154C14.9797 13.7373 15.0058 13.868 15.0058 14C15.0058 14.132 14.9797 14.2627 14.9289 14.3846C14.8781 14.5064 14.8037 14.617 14.71 14.71C14.617 14.8037 14.5064 14.8781 14.3846 14.9289C14.2627 14.9797 14.132 15.0058 14 15.0058C13.868 15.0058 13.7373 14.9797 13.6154 14.9289C13.4936 14.8781 13.383 14.8037 13.29 14.71L12 13.41L10.71 14.71C10.617 14.8037 10.5064 14.8781 10.3846 14.9289C10.2627 14.9797 10.132 15.0058 10 15.0058C9.86799 15.0058 9.73729 14.9797 9.61543 14.9289C9.49357 14.8781 9.38297 14.8037 9.29 14.71C9.19628 14.617 9.12188 14.5064 9.07111 14.3846C9.02034 14.2627 8.99421 14.132 8.99421 14C8.99421 13.868 9.02034 13.7373 9.07111 13.6154C9.12188 13.4936 9.19628 13.383 9.29 13.29L10.59 12L9.29 10.71C9.1017 10.5217 8.99591 10.2663 8.99591 10C8.99591 9.7337 9.1017 9.4783 9.29 9.29C9.47831 9.1017 9.7337 8.99591 10 8.99591C10.2663 8.99591 10.5217 9.1017 10.71 9.29L12 10.59L13.29 9.29C13.4783 9.1017 13.7337 8.99591 14 8.99591C14.2663 8.99591 14.5217 9.1017 14.71 9.29C14.8983 9.4783 15.0041 9.7337 15.0041 10C15.0041 10.2663 14.8983 10.5217 14.71 10.71L13.41 12L14.71 13.29Z" fill="black"></path>
            </svg>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>  
        <a href="homepage.html" id="bite"><h2>Bite</h2></a>
        <a id="log" href="login.php">LogIn/Register</a>
        <svg class="menu" viewBox="0 0 100 80" width="40" height="40">
            <rect width="100" height="20"></rect>
            <rect y="30" width="100" height="20"></rect>
            <rect y="60" width="100" height="20"></rect>
        </svg>
    </header>


    <section class="product-container">

        <?php while($row = $product->fetch_assoc()) { ?>

        <div class="s-p-container">
            <div class="s-p-img">
                <img src="assets/images/<?php echo $row['product_image']; ?>" alt="">
            </div>
            <div class="s-p-desc">
                <h3><?php echo $row['product_name']; ?></h3>
                <p><?php echo $row['product_description_short']; ?></p>
                <p> <?php echo $row['product_description_long']; ?></p>
                <p>$<?php echo $row['product_price']; ?></p>
                <button>Buy product</button>
            </div>
        </div>

            <?php } ?>

    </section>


    <footer>
        <hr id="hr1">
            <div class="footer-container">
                <div class="row">
                    <div class="footer-col">
                        <h3>Shop</h3>
                        <ul>
                            <li><a href="shop.php#oral-care-name">Oral Care</a></li><br><br>
                            <li><a href="shop.php#personal-care-name">Personal Care</a></li><br><br>
                            <li><a href="shop.php#bundles-name">Bundles</a></li><br><br>
                            <li><a href="shop.php#gift-sets-name">Gift Sets</a></li><br><br>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>About</h3>
                        <ul>
                            <li><a href="homepage.html#bestsellers">Bestsellers</a></li><br><br>
                            <li><a href="aboutus.html#ingredients">Ingredients</a></li><br><br>
                            <li><a href="aboutus.html#location">Location</a></li><br><br>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h3>Follow Us</h3>
                        <div class="socials">
                            <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-square-facebook"></i></a>
                            <a href="https://www.instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://twitter.com/?lang=en" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                        <br><br>
                        <div class="footer-col">
                                <div class="fo-pic">
                                <img src="https://cdn.shopify.com/s/files/1/1864/2187/files/CrueltyFree_131313.svg?v=1665790419" alt="image">
                                <img src="https://cdn.shopify.com/s/files/1/1864/2187/files/CF_Partner_2022_2C.svg?v=1665790420" alt="image">
                                <img src="https://cdn.shopify.com/s/files/1/1864/2187/files/BCorpCertified.svg?v=1665618672" alt="image">
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        <hr>
        <div class="privacy">
            <div class="rights">
                <p>© 2022 Bite. All Rights Reserved.</p>
            </div>
            <div class="email">
                <p>hello@bitetoothpastebits.com</p>
            </div>
        </div>
    </footer>


    <script>
        const menu = document.querySelector('.menu')
        const close = document.querySelector('.close')
        const nav = document.querySelector('#home')

        menu.addEventListener('click', () => {
            nav.classList.add('open-nav');
            menu.style.display = 'none';
        })

        close.addEventListener('click', () => {
            nav.classList.remove('open-nav');
            menu.style.display = 'block';
        })
    </script>
</body>
</html>