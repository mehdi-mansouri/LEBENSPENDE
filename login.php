<?php
include_once 'dbconfig.php';
$successmassage = null;


if (isset($_POST['sub'])) {
  $email = $_POST['email'];
  $password = crypt($_POST['password'], '$2a$07$hashcodeforpassword$');
  $username;
  $sql = "SELECT username,email,id,password,admin_rolle,phone FROM user WHERE email=? AND password=?";
  $result = $conn->prepare($sql);
  $result->bindValue(1, $email);
  $result->bindValue(2, $password);
  $result->execute();
  if ($result->rowCount() >= 1) {
    $rows = $result->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username'] = $rows['username'];
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['login'] = true;
    $successmassage = true;
  
    if (isset($_POST['rem'])) {
      setcookie('email', $_SESSION['email'], time() + 60 * 60 * 24 * 7, '/');
      setcookie('password', $_SESSION['password'], time() + 60 * 60 * 24 * 7, '/');
    }
    
    if ($rows['admin_rolle'] == 1) {
      header('location:admin.php');
    } else {
      header('location:API.php');
    }
  } else {
    $successmassage = false;
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>weblog</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src="APIscript.js"></script>
  <link href="css/style.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <div>

    <!-- start headers -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">

          <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="" />
          LEBEN SPENDE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="API.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://www.who.int">WHO</a>
            </li>
          </ul>
          <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
        </div>
      </div>
    </nav>
  </div>
  <!-- end headers -->
  <br><br><br><br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-12 col-lg-4">
        <form method="POST" class="register-form">
          <input type="email" name="email" placeholder="email">
          <input type="password" name="password" placeholder="password"><br>
          <input type="checkbox" name="rem" class="rememberme"><label class="remembermelabel">Remember me!</label>
          <input type="submit" name="sub" value="login" class="btn btn-primary submit-register">
          <a href="register.php">now register</a>
        </form>
      </div>
      <div class="col-lg-4"></div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
<?php if ($successmassage) { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      title: 'user added successfully'
    })
  </script>
<?php } else { ?>
  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'error',
      title: 'user not fount!'
    })
  </script>
<?php } ?>
<script src="../js/jquery-3.5.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</html>