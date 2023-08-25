git<?php include 'includes/Header.php'; ?>
<?php include 'includes/Navbar.php'; ?>
  <!-- ======= Hero Section ======= -->
  
  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- ======= Hero Section ======= -->
<section id="hero">
  <!-- Slider Section -->

  <div class="slider_body">
    
    <!-- Slider Wrapper -->
    <div class="css-slider-wrapper">
          <input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
          <input type="radio" name="slider" class="slide-radio2" id="slider_2">
          <input type="radio" name="slider" class="slide-radio3" id="slider_3">
          <input type="radio" name="slider" class="slide-radio4" id="slider_4">
    
          <!-- Slider Pagination -->
          <div class="slider-pagination">
            <label for="slider_1" class="page1"></label>
            <label for="slider_2" class="page2"></label>
            <label for="slider_3" class="page3"></label>
            <label for="slider_4" class="page4"></label>
          </div>
    
          <!-- Slider #1 -->
          <div class="slider slide-1">
            <img src="assets/img/model-3.png" alt="">
            <div class="slider-content">
              <h4>New Product</h4>
              <h2>Denim Longline T-Shirt Dress With Split</h2>
              <button type="button" class="buy-now-btn" name="button">$130</button>
            </div>
            <div class="number-pagination">
              <span>1</span>
            </div>
          </div>
    
          <!-- Slider #2 -->
          <div class="slider slide-2">
            <img src="assets/img/6e12f64b19b2540a5bf3a9d4e433019e-removebg-preview.png" alt="">
            <div class="slider-content">
              <h4>New Product</h4>
              <h2>Denim Longline T-Shirt Dress With Split</h2>
              <button type="button" class="buy-now-btn" name="button">$130</button>
            </div>
            <div class="number-pagination">
              <span>2</span>
            </div>
          </div>
    
          <!-- Slider #3 -->
          <div class="slider slide-3">
            <img src="assets/img/model-4.png" alt="">
            <div class="slider-content">
              <h4>New Product</h4>
              <h2>Denim Longline T-Shirt Dress With Split</h2>
              <button type="button" class="buy-now-btn" name="button">$130</button>
            </div>
            <div class="number-pagination">
              <span>3</span>
            </div>
          </div>
    
          <!-- Slider #4 -->
          <div class="slider slide-4">
            <img src="assets/img/1ac277881d0343baaf8e775016530f99-removebg-preview.png" alt="">
            <div class="slider-content">
              <h4>New Product</h4>
              <h2>Denim Longline T-Shirt Dress With Split</h2>
              <button type="button" class="buy-now-btn" name="button">$130</button>
            </div>
            <div class="number-pagination">
              <span>4</span>
            </div>
          </div>
        </div>
    </div>
  <!-- Slider Section End -->  
</section>
<!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Products</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="921" data-purecounter-duration="1" class="purecounter"></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
            <p>Sell Products</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
            <p>Hard Workers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->


  
  
  <!-- categories Section -->
  <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Categories</h2>
        </div>
        
        <div class="row">
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
        ?> 
        <?php
        // Create a MySQL connection
        $conn = mysqli_connect('localhost', 'root', '', 'urban_gents');

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

          $query = " select * from categories ";
          $result = mysqli_query($conn, $query);

          while ($data = mysqli_fetch_row($result)) {
        ?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <?php echo '<a href="Specific_Product.php?category_name=' . $row['category_name'] . '">';?>
                <img src="assets/img/collection/<?php echo $data[2]; ?>" class="img-fluid-main" alt="">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4><?php echo $data[1]; ?></h4>
                <span>categories</span>
              </div>
              <?php echo'</a>';?>
            
            </div>
          </div>
          <?php
              }
            ?>
        <?php
        }
      } else {
          echo 'No categories found';
      }

      mysqli_close($conn);
      ?>

        </div>
      </div>
    </section>
  <!-- End categories Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>
  <!-- End Contact Section -->


<?php include 'includes/Footer.php'; ?>
</body>
<?php include 'includes/Scripts.php'; ?>
</html>
