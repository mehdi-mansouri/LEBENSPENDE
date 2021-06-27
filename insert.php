<?php
require_once('dbconfig.php');
if (isset($_POST['insert'])) {
    $fname = $_POST['username'];
    $phone = intval($_POST['phone']);
    $email = $_POST['email'];
    $password = crypt($_POST['password'], '$2a$07$hashcodeforpassword$');
    $sql = "INSERT INTO user(username,email,phone,password) VALUES (:username,
    :email,:phone,:password)";
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $insertlastid = $conn->lastInsertId();
    if ($insertlastid) {
        echo "<script>alert('record insert succsessfuly');</script>";
        echo "<script>window.location.href='admin.php'</script>";
    } else {
        echo "<script>alert('Error');</script>";
        echo "<script>window.location.href='admin.php'</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">

        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">Insert new user</h3>
                <hr />
            </div>
        </div>

        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>

            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="sample@sample.com">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="*******">
            </div>
            <div class="form-group">
                <label>phone</label>
                <input type="text" class="form-control" name="phone" placeholder="0111111111111">
            </div>
            <input type="submit" class="btn btn-success" value="Save" name="insert">
        </form>
    </div>
</body>

</html>