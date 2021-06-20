<?php
require_once('dbconfig.php');
if (isset($_POST['update'])) {
    echo 'bis jetz';
    $userId = intval($_GET['id']);
    $fname = $_POST['username'];
    $phone = intval($_POST['phone']);
    $email = $_POST['email'];
   
    $sql = 'UPDATE user SET username=:username,email=:email,phone=:phone WHERE id=:id';
    $query = $conn->prepare($sql);
    $query->bindParam(':username', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':phone', $phone, PDO::PARAM_STR);
     $query->bindParam(':id', $userId, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Update succsessfuly');</script>";
    echo "<script>window.location.href='admin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>PHP CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
               <h3 class="p-4">User Edit</h3>
                <hr />
            </div>
        </div>
        <?php
        $userId = intval($_GET['id']);
        $sql = "SELECT username,email,phone,id FROM user WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->bindParam(':id', $userId, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        ?>
        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo htmlentities($result->username); ?>">
                </div>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlentities($result->email); ?>">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlentities($result->phone); ?>">
            </div>
            <input type="submit" class="btn btn-success" value="update" name="update">

        </form>
    </div>
</body>
</html>