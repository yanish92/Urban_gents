<?php include 'includes/conn.php'; ?>
<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get form data
  $username = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repassword = $_POST['repassword'];
  
  
  // Insert user data into the database
  $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `repassword`) VALUES ('$username','$lastname','$email','$password','$repassword')";
  
  if (mysqli_query($conn, $sql)) {
      // Redirect to login page after successful signup
      header('Location: login.php');
      exit;
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  // Close the connection
  mysqli_close($conn);
}

?>
<?php include 'includes/header.php'; ?>
</head>
<body>
  <div class="bg_login">
    <div class="login">
      <div class="login-box">
        <h2>Signup</h2>
        <form action="" method="POST">
          <div class="user-box">
            <input type="text" name="firstname" required>
            <label for="firstname">firstname</label>
          </div>
          <div class="user-box">
              <input type="text" name="lastname" required>
              <label for="lastname">Last Name</label>
            </div>
          <div class="user-box">
              <input type="email" name="email" required>
              <label for="email">Email</label>
            </div>
          <div class="user-box">
            <input type="password" name="password" required>
            <label for="password">Password</label>
          </div>
          <div class="user-box">
              <input type="password" name="repassword" required>
              <label for="repassword">Confirm Password</label>
          </div>
          <button id="Submit" href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </button>
          <a href="login.php"><p>I already have a membership</p></a>
          <a href="Index.php"><i class="bi bi-house-door-fill"> </i>Home</a>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include 'includes/Scripts.php' ?>
</html>