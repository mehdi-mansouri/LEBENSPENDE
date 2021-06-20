<?php
require_once('dbconfig.php');
if (isset($_REQUEST['del'])) {
    $UserId = intval($_GET['del']);
    $sql = 'DELETE FROM user WHERE id=:id';
    $query = $conn->prepare($sql);
    $query->bindParam(':id', $UserId, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('record delete succsessfuly');</script>";
    echo "<script>window.location.href='admin.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>my admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
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
                <h3 class="p-3 pt-5">Admin LEBEN SPENDE</h3>
                <hr />
                <a href="insert.php"><button class="btn btn-primary font-16 m-3">insert new User</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $conn->prepare('SELECT * FROM user');
                            $sql->execute();
                            $rows = $sql->fetchAll(PDO::FETCH_OBJ);
                            $count = 1;
                            foreach ($rows as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo  $count++; ?>
                                    </td>
                                    <td>
                                        <?php echo  $row->username; ?>
                                    </td>

                                    <td>
                                        <?php echo  $row->email; ?>
                                    </td>
                                    <td>
                                        <?php echo  $row->phone; ?>
                                    </td>

                                    <td><a href="update.php?id=<?php echo $row->id;  ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                                    <td><a href="admin.php?del=<?php echo $row->id; ?>"><button class="btn btn-danger" onClick="return confirm('are you sure to delete');"><span class="glyphicon glyphicon-trash"></span></button></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>