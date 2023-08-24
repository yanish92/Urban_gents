<?php include 'includes/Header.php'; ?>
<?php include 'includes/Navbar.php'; ?>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


<?php
$conn = mysqli_connect('localhost', 'root', '', 'urban_gents');


$user = $_SESSION['firstname'];

if(!isset($user)){
   header('login.php');
};

if(isset($_GET['logout'])){
   unset($user);
   session_destroy();
   header('login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];
   $product_discription = $_POST['product_discription'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name' AND username = '$user'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart` (username, product_name, price, quantity, product_discription, product_image, product_id) VALUES ('$user', '$product_name', '$product_price', '$product_quantity', '$product_discription', '$product_image','$product_id')") or die('Query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE username = '$user'") or die('query failed');
   header('location:index.php');
}

?>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<!--  -->

<form method="post" id="team" class="team section-bg">
   <div class="container">
      <div class="section-title">
      <h2>CART</h2>
      </div>
   </div>

   <div class="shopping-cart"> 

   <div class="column-labels">
      <label class="product-image">Image</label>
      <label class="product-details">Product</label>
      <label class="product-price" color="#ff5e14">Price</label>
      <!-- <label class="product_discription">Discription</label> -->
      <label class="product-quantity">Quantity</label>
      <label class="product-removal">Remove</label>
   </div>
   <?php
      $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE username = '$user'") or die('query failed');
      $grand_total = 0;
      if(mysqli_num_rows($cart_query) > 0){
         while($fetch_cart = mysqli_fetch_assoc($cart_query)){
   ?>
   <div class="product">
      <div class="product-image">
         <img src="assets/img/collection/<?php echo $fetch_cart['product_image']; ?>" >
      </div>
      <div class="product-details">
         <div class="product-title"><?php echo $fetch_cart['product_name']; ?></div>
         <p class="product-description"><?php echo $fetch_cart['product_discription']?></p>
      </div>
      <div class="product-price" color="#ff5e14"><?php echo $fetch_cart['price']; ?></div>
      <div class="product-quantity">
      <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['ID']; ?>">
      <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
      </div>
      <div class="product-removal">
      <input type="submit" name="update_cart" value="update" class="option-btn">
      </div>
      <div class="product-removal">
         <button class="remove-product" >
         <a href="add_to_cart.php?remove=<?php echo $fetch_cart['ID']; ?>" class="delete-product" onclick="return confirm('remove item from cart?');">Remove
         </button>
      </div>
      <div class="product-line-price"><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</div>
   </div>

   <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
      }
   ?>

   <div class="totals">
       <!-- <div class="totals-item">
         <label>Subtotal</label>
         <div class="totals-value" id="cart-subtotal"></div>
      </div> -->
      <!-- <div class="totals-item">
         <label>Tax (5%)</label>
         <div class="totals-value" id="cart-tax"></div>
      </div>
      <div class="totals-item">
         <label>Shipping</label>
         <div class="totals-value" id="cart-shipping"></div>
      </div> -->
      <div class="totals-item totals-item-total">
         <label>Grand Total</label>
         <div class="totals-value" id="cart-total"><?php echo $grand_total; ?>/-</div>
      </div>
   <!-- </div>
         
         <button class="checkout">Checkout</button>

   </div> -->
   <!-- partial -->
   </form>  
<?php include 'includes/Footer.php'; ?>
<?php include 'includes/Scripts.php'; ?>
