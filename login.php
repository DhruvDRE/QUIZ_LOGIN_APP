<?php

require_once 'source/session.php';
require_once 'source/db_connect.php';

if(isset($_POST['login-btn'])) {

    $user = $_POST['user-name'];
    $password = $_POST['user-pass'];

    try {
      $SQLQuery = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':username' => $user));

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $hashed_password = $row['password'];
        $username = $row['username'];

        if(password_verify($password, $hashed_password)) {
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          header('location: dashboard.php');
        }
        else {
          echo "Error: Invalid username or password";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

    <?php if(!isset($_SESSION['username'])): header("location: logout.php");?>

    <?php else: ?>

    <?php endif ?>

    <?php echo "<h1> Welcome ".$_SESSION['username']." To Dashboard </h1>" ?>

    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="dashboard.php" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="quiz.html">Electronics & <br>Telecommunication</a></li>
    <li class="page-item"><a class="page-link" href="quiz1.html">Microcontroller 8051</a></li>
    <li class="page-item"><a class="page-link" href="quiz2.html">Principle of <br>Communication</a></li>
      <li class="page-item"><a class="page-link" href="html_form.html">HTML FORM</a></li>
    <li class="page-item">
      <a class="page-link" href="dashboard.php" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>


    <h2><a href="logout.php">Logout</a></h2>

</body>
</html>