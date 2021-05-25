<?php
    require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing Page</title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <style type="text/css">
        .container {
            margin-top: 100px;
        }

        .card {
            width: 300px;
        }

        .card:hover {
            -webkit-transform: scale(1.05);
            -moz-transform: scale(1.05);
            -ms-transform: scale(1.05);
            -o-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .list-group-item {
            border: 0px;
            padding: 5px;
        }

        .price {
            font-size: 72px;
        }

        .currency {
            position: relative;
            font-size: 25px;
            top: -31px;
        }
    </style>
</head>
<body>


<div>

<!-- start headers -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">

    <img src="img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""/>
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
     </div>
     </div>
 </nav>
</div>










<div class="container">
    <?php
        $colNum = 1;
        foreach ($products as $productID => $attributes) {
            if ($colNum == 1)
                echo '<div class="row">';

            echo '
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2 class="price"><span class="currency">€</span>'.($attributes['price']/100).'</h2>
                        </div>
                        <div class="card-body text-center">
                            <div class="card-title">
                                <h2>'.$attributes['title'].'</h2>
                            </div>
                            <ul class="list-group">
                            ';

                            foreach($attributes['features'] as $feature)
                                echo '<li class="list-group-item">'.$feature.'</li>';

                        echo '
                            </ul>
                            <br>
                            <form action="stripeIPN.php?id='.$productID.'" method="POST">
                              <script
                                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="'.$stripeDetails['publishableKey'].'"
                                data-amount="'.$attributes['price'].'"
                                data-name="'.$attributes['title'].'"
                                data-description="Widget"
                                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                data-locale="auto">
                              </script>
                            </form>
                        </div>
                    </div>
                </div>
            ';

            if ($colNum == 3) {
                echo '</div><br>';
                $colNum = 0;
            } else
                $colNum++;
        }
    ?>
</div>
</body>
</html>