<header id="header" class="d-flex align-items-center ">
    <div class="container-fluid d-flex align-items-center justify-content-lg-between">

      <h3 class="logo me-auto me-lg-0"><a class="a-heading" href="Index.php">URBAN GENT'S<img src="assets/img/LOGO.png" alt="" class="img-fluid"></a></h3>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php#hero">HOME</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">ABOUT</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">CONTACT</a></li>
          <li>
            <a href="add_to_cart.php">Cart <i class="fa fa-shopping-cart"></i>
            <?php
            session_start(); 
            echo isset($_SESSION['cart']) ? '(' . count($_SESSION['cart']) . ')' : ''; 
            ?>
            </a>
            <ul class="cart-dropdown">
                <?php

                // Check if the user is logged in and cart data is available
                // if (isset($_SESSION['firstname']) && isset($_SESSION['cart'])) {
                //     $cartCount = count($_SESSION['cart']);

                //     echo '<li><a href="cart.php">Cart (' . $cartCount . ')</a></li>';
                //     echo '<li><a href="checkout.php">Checkout</a></li>';
                // } else {
                //    echo '<li>Your cart is empty</li>';
                // }
                ?>
            </ul>
          </li>
          <li class="dropdown">
                    <a class="nav-link scrollto" href="#team" class="dropdown-toggle" data-toggle="dropdown">CATEGORIES<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="Product.php">ALL PRODUCTS</a></li>
                        <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'urban_gents');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM categories";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                //echo '<li><a href="#">' . $row['category_name'] . '</a></li>';
                                echo '<li><a href="Specific_Product.php?category_name=' . $row['category_name'] . '">' . $row['category_name'] . '</a></li>';

                            }
                        } else {
                            echo '<li>No categories found</li>';
                        }

                        mysqli_close($conn);
                        ?>
                    </ul>
                </li>
                <?php
                if (isset($_SESSION['firstname'])) {
                    echo '<li><a href="#">' . $_SESSION['firstname'] . '</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="signup.php">Signup</a></li>';
                }
                ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>