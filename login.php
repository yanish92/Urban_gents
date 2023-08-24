<?php include 'includes/conn.php'; ?>
<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $firstname = $_POST['firstname'];
    $password = $_POST['password'];
    
    
    // Perform login authentication
    $sql = "SELECT * FROM users WHERE firstname ='$firstname' AND password='$password'";
    $result = mysqli_query($conn, $sql);
   
    session_start();
    if (mysqli_num_rows($result) == 1) {
      // Store username in the session
      $_SESSION['firstname'] = $firstname;
  
      // Redirect to the home page after successful login
      header('Location: Index.php');
      exit;
  }
    
    // Close the connection
    mysqli_close($conn);
}

?>

<?php include 'includes/Header.php'; ?>
<body>
  <div class="bg_login">
    <div class="login">
      <div class="login-box">
        <h2>Login</h2>
        <form action="" method="POST">
          <div class="user-box">
            <input type="text" name="firstname" required>
            <label>Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required>
            <label>Password</label>
          </div>
          <button id="Submit" href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Submit
          </button>
          <a href=""><p>I forgot my password</p></a>
          <a href="Signup.php"><p>Register a new membership</p></a>
          <a href="Index.php"><i class="bi bi-house-door-fill"> </i>Home</a>
        </form>
      </div>
    </div>
  </div>
</body>

<?php include 'includes/Scripts.php' ?>
</html>