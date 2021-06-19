<?php
include_once 'dbconfig.php';
if (isset($_POST['sub'])) {
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['amount'] = $_POST['amount'];
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
    <?php

    $jsonurl = "https://api.covid19api.com/summary";
    $json = file_get_contents($jsonurl);
    echo '<pre>';
    $arr = json_decode($json);
    echo '</pre>';


    ?>
    <br><br>
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="progress ">

            <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>

    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            
            <div class="col-12 col-lg-4">
            <h3>please choose country/amount</h3><br><br>
                <form action="pricing.php" method="POST" class="register-form">
                
                    <select name="country" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Open to choose Country</option>
                        <?php for ($i = 0; $i < 190; $i++) { ?>
                            <option value="<?php echo $arr->Countries[$i]->Country; ?>"><?php echo $arr->Countries[$i]->Country; ?></option>
                        <?php } ?>
                    </select>
                    <br><br>
                    <input type="number" id="quantity" name="amount" min="1" max="500" placeholder="amount">
                    <input type="submit" name="sub" value="Submit" class="btn btn-success btn-lg active" aria-pressed="true">
                    <br><br>


                </form>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>