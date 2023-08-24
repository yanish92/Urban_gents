<?php include 'includes/Header.php'; ?>
<?php include 'includes/Navbar.php'; ?>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<section id="team" class="team section-bg">
  <div class="container">
    <div class="section-title">
      <h2>ALL PRODUCTS</h2>
    </div>
  </div>
  
  <?php
    $conn = mysqli_connect('localhost', 'root', '', 'urban_gents');

    //session_start(); // Make sure to start the session.

    $user = $_SESSION['firstname'];

    if (!isset($user)) {
      header('Location: login.php'); // Redirect to the login page if user is not logged in.
      exit(); // Stop script execution after redirect.
    }

    if (isset($_GET['logout'])) {
      unset($user);
      session_destroy();
      header('Location: login.php'); // Redirect to the login page after logout.
      exit(); // Stop script execution after redirect.
    }

    if (isset($_POST['add_to_cart'])) {
      $product_name = $_POST['product_name'];
      $product_price = $_POST['product_price'];
      $product_image = $_POST['product_image'];
      $product_quantity = $_POST['product_quantity'];
      $product_id = $_POST['product_id'];
      $product_discription = $_POST['product_discription'];


      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE username = '$user' AND product_id = '$product_id'") or die('Query failed');

      if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart!';
      } else {
        mysqli_query($conn, "INSERT INTO `cart` (username, product_name, price, quantity, product_discription, product_image, product_id) VALUES ('$user', '$product_name', '$product_price', '$product_quantity', '$product_discription', '$product_image','$product_id')") or die('Query failed');
        $message[] = 'Product added to cart!';
      }
    }

    if (isset($_POST['update_cart'])) {
      $update_quantity = $_POST['cart_quantity'];
      $update_id = $_POST['cart_id'];
      mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('Query failed');
      $message[] = 'Cart quantity updated successfully!';
    }

    if (isset($_GET['remove'])) {
      $remove_id = $_GET['remove'];
      mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('Query failed');
    }

    if (isset($_GET['delete_all'])) {
      mysqli_query($conn, "DELETE FROM `cart` WHERE username = '$user'") or die('Query failed');
      exit(); // Stop script execution after redirect.
    }

    if (isset($message)) {
      foreach ($message as $msg) {
        echo '<div class="message" onclick="this.remove();">' . $msg . '</div>';
      }
    }
  ?>
<?php
  $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('Query failed');
  if (mysqli_num_rows($select_product) > 0) {
    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
?>
  <form method="post" class="box" action="">
    <div class="product-card">
      <div class="badge">Hot</div>
      <div class="product-tumb">
        <img src="assets/img/collection/<?php echo $fetch_product['photo']; ?>" alt="">
      </div>
      <div class="product-details-cart">
        <span class="product-catagory"><?php echo $fetch_product['slug']; ?></span>
        <h4><a class="product-linking" href=""><?php echo $fetch_product['name']; ?></a></h4>
        <p><?php echo $fetch_product['description']; ?></p>
        <div class="product-bottom-details">
          <div class="product-price"><small></small>$<?php echo $fetch_product['price']; ?>.00</div>
          <div class="product-links">
            <a href=""><i class="fa fa-heart"></i></a>
			<input type="hidden" min="1" name="product_quantity" value="1">
      <input type="hidden" name="product_id" value="<?php echo $fetch_product['ID']; ?>">
			<input type="hidden" name="product_image" value="<?php echo $fetch_product['photo']; ?>">
			<input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
			<input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
			<input type="hidden" name="product_discription" value="<?php echo $fetch_product['description']; ?>">
            <button type="submit" name="add_to_cart" class="btn"><i class="fa fa-shopping-cart"></i> Buy Now</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
      }
    }
    ?>
</section>

<?php include 'includes/Footer.php'; ?>
<?php include 'includes/Scripts.php'; ?>
