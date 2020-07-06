<?php
include 'asset/template/header.php';
$sql_route = "SELECT
        " . $config['route']['db'] . "." . $config['route']['db'] . "_id as id,
        " . $config['route']['db'] . "." . $config['route']['db'] . "_subject as subject
    
        FROM
        " . $config['route']['db'] . "
        WHERE
        
        " . $config['route']['db'] . "_id = " . decodeStr($_GET['id']) . "
    ";
$result = db_query($conn, $sql_route);
$row = mysqli_fetch_assoc($result);

if ($_POST) {
    $data = array();
    $data[$config['route']['station'] . "_subject"] = "'" . changeQuot($_POST["input_subject"]) . "'";
    $data[$config['route']['station'] . "_route_id"] = "'" . decodeStr($_POST["input_route_id"]) . "'";
    $data[$config['route']['station'] . "_hour"] = "'" . $_POST["input_hour"]. "'";
    $data[$config['route']['station'] . "_minute"] = "'" . $_POST["input_minute"].  "'";
    $data[$config['route']['station'] . "_credate"] = "NOW()";

    $sql_query = "INSERT INTO " . $config['route']['station'] . "(" . implode(',', array_keys($data)) . ")VALUES(" . implode(',', array_values($data)) . ")";
    $result = db_query($conn, $sql_query);
    header('location:station.php?id=' . $_POST["input_route_id"]);
}
?>

<body>

    <div class="jumbotron text-center">
        <h1><?php echo $config['name']['website']; ?></h1>
    </div>

    <div class="container">
        <h2>เพิ่มสถานีเส้นทาง <span class="text-danger">"<?php echo $row['subject']; ?>"</span></h2>
        <form action="add_station.php" method="post">

            <input type="hidden" class="form-control" id="input_route_id" name="input_route_id" value="<?php echo $_GET['id']; ?>" required>
            <div class="form-group">
                <label for="text">ชื่อสถานี <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="input_subject" name="input_subject" required>
                <br>
                <div class="row">
                    <div class="col-auto">
                        <label for="text">เวลาที่ใช้เดินทาง <span class="text-danger">*</span></label>
                        <select class="form-control" id="input_hour" name="input_hour" required="">"&gt;
                            <option value="">ชั่วโมง</option>
                            <?php for ($x = 0; $x <= 23; $x++) {
                                echo '<option value="' . $x . '">' . $x . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto">
                        <label style="visibility: hidden;" for="text">เวลาที่ใช้เดินทาง <span class="text-danger">*</span></label>
                        <select class="form-control" id="input_minute" name="input_minute" required="">"&gt;
                            <option value="">นาที</option>
                            <?php for ($t = 0; $t <= 59; $t++) {
                                echo '<option value="' . $t . '">' . $t . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-default" href="station.php?id=<?php echo $_GET['id']; ?>">กลับ</a>
                </div>
                <div class="col-sm-6" style="text-align:right;">
                    <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                </div>
            </div>
        </form>
    </div>

    <?php include 'asset/template/footer.php'; ?>
</body>

</html>