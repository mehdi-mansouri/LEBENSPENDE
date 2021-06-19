<?php
$jsonurl = "https://api.covid19api.com/summary";
$json = file_get_contents($jsonurl);
echo '<pre>';
$arr = json_decode($json);
echo '</pre>';
echo $arr->Countries[4]->Country;
if(isset($_POST['sub'])){
    $data=$_POST['country'];
    var_dump($data);
    echo 'c';
    

}else{
    die;
}
require_once "test2.php";
?>
<body>
    <?php echo '<form action="test1.php" method="post">'; ?>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="">Choose a country:</label>
                <select name="country[]" class="form-select form-select-sm" aria-label=".form-select-sm example">

                    <option selected>Open this select menu</option>
                    <?php for ($i = 0; $i < 190; $i++) { ?>
                        <option value="<?php echo $arr->Countries[$i]->Country; ?>"><?php echo $arr->Countries[$i]->Country; ?></option>
                    <?php } ?>
                </select>
                <br><br>
                <input type="submit" value="Submit" class="btn btn-success btn-lg active" aria-pressed="true">
                <br><br>
            </div>
        </div>

    </form>


</body>

</html>














        