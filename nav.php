<head>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item mx-5">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>

            <?php

            if (isset($_SESSION['user_id'])) {
            ?>
              <li class="nav-item mx-5">
                <a class="nav-link" href="profile.php">My Profile</a>
              </li>



              <!-----------------------------will be appeared for only admins ----------------------------->
              <li class="nav-item mx-5">
                <a class="nav-link" href="display.php">Show all users</a>
              </li>




              <li class="nav-item mx-5">
                <a class="nav-link" href="logout.php">Log out</a>
              </li>
            <?php
            }
            if (!isset($_SESSION['user_id'])) {
            ?>
              <li class="nav-item mx-5">
                <a class="nav-link active" aria-current="page" href="index.php">Login</a>
              </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </nav>
  </header>

</body>

<?php

?>