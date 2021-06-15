<?php
include_once 'dbconfig.php';
?>




<!doctype html>


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

<title>Lebenspende</title>




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
          <a class="nav-link active" aria-current="page" href="#start">Start</a>
        </li>

        <?php
        if (isset($_SESSION['login'])) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              User Acount
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"><?php echo $_SESSION['username']; ?></a></li>
              <li><a class="dropdown-item" href="#"><?php echo $_SESSION['email']; ?></a></li>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1">Wellcome <?php echo $_SESSION['username']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" tabindex="-1">Logout</a>
          </li>
      </ul>

      <a href="pricing.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Spenden</a>
    <?php  } else { ?>
      <li class="nav-item">
        <a class="nav-link" href="register.php">register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php" tabindex="-1">Login</a>
      </li>
      </ul>
      <a href="login.php" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Spenden</a>
    <?php  }  ?>
    <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->




    </div>
  </div>
</nav>
<section id="start" class="section-padding">
  <div class="container-fluid ">
    <div class="container">

      <img class="mx-auto d-block " src="img/spende.png" style="width: 18rem;" alt="alt" />
      <blockquote class="blockquote">
        <p class=" text-center">81% der Corona-Impfstoffe ist nur für reiche Länder verfügbar </p>
        <footer class="blockquote-footer text-center mt-2 ">Quelle:WHO</footer>

      </blockquote>

    </div>
  </div>
</section>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/Lebenspende1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/Lebenspende6.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/Lebenspende8.png" class="d-block w-100" alt="...">
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php


$jsonurl = "https://api.covid19api.com/summary";
$json = file_get_contents($jsonurl);
echo '<pre>';
$arr = json_decode($json);
echo '</pre>'; ?>
<section id="dinstleistung" class="section-padding">
  <div class="container-fluid ">

    <div class="container">
      <h1 class="title text-uppercase fw-bolder">6 arme Länder der Welt</h1>
      <div class="row">

        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['27']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['27']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['27']->TotalConfirmed; ?> </p>
          </div>
        </div>
        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['159']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['159']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['159']->TotalConfirmed; ?> </p>
          </div>
        </div>
        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['102']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['102']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['102']->TotalConfirmed; ?> </p>
          </div>
        </div>
        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['117']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['117']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['117']->TotalConfirmed; ?> </p>
          </div>
        </div>
        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['0']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['0']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['0']->TotalConfirmed; ?> </p>
          </div>
        </div>
        <div class="title col col-12 col-sm-6 col-lg-4">
          <div class="box bg-light">
            <h1 class="title"><strong><?php echo $arr->Countries['39']->Country; ?></strong></h1>
            <p class="lead">Total Deaths : <?php echo $arr->Countries['39']->TotalDeaths; ?> </p>
            <p class="lead">Total Confirmed : <?php echo $arr->Countries['39']->TotalConfirmed; ?> </p>
          </div>
        </div>
      </div>




    </div>

  </div>


</section>


<?php


$jsonurl = "https://api.covid19api.com/summary";
$json = file_get_contents($jsonurl);
echo '<pre>';
$arr = json_decode($json);
echo '</pre>'; ?>
<table class="table table-hover">
  <tr>
    <th>Number</th>
    <th>Country</th>
    <th>Total Confirmed</th>
    <th>Total Deaths</th>
  </tr>

  <?php
  for ($i = 0; $i < 190; $i++) {
  ?>
    <tr>
      <td><?php echo $i + 1 ?></td>
      <td><?php echo $arr->Countries[$i]->Country; ?></td>
      <td><?php echo $arr->Countries[$i]->TotalConfirmed; ?></td>
      <td><?php echo $arr->Countries[$i]->TotalDeaths ?></td>
    </tr>
  <?php } ?>
</table>
<!--            echo $arr->Countries[$i]->Country.'  '.$arr->Countries[$i]->TotalDeaths.'</br>';
          }
//        for ($index = 0; $index < count($arr); $index++) {
//            echo $arr[$index].'</br>';
//          }
        ?>-->




<div class="weather-container">


  <p class="country"></p>
  <p class="deathe"></p>
  <p class="astraZeneca"></p>
</div>




<!--      <?php
          echo '<pre>';
          var_dump($deat);
          echo '</pre>';
          ?>
      -->
<div class="container-fluid bg-main py-5">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-3 nb-3 text-center">
        <img class="d-inline-block align-top" src="img/impfung.jpg" width="100" height="100" alt="" />
      </div>
      <div class="col-12 col-md-9">
        <h1 class="display-3 text-center"></h1>
      </div>
    </div>
  </div>


</div>

<script src="js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>