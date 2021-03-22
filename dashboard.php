<?php

include_once 'source/session.php';

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