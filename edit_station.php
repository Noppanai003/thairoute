<?php
include 'asset/template/header.php';
if ($_GET) {

    $sql_query = "SELECT
        " . $config['route']['station'] . "." . $config['route']['station'] . "_id as id,
        " . $config['route']['station'] . "." . $config['route']['station'] . "_subject as subject,
        " . $config['route']['station'] . "." . $config['route']['station'] . "_hour as hour,
        " . $config['route']['station'] . "." . $config['route']['station'] . "_minute as minute
    
        FROM
        " . $config['route']['station'] . "
        WHERE
        " . $config['route']['station'] . "_id = " . decodeStr($_GET['id']) . "
        ";
    $result = db_query($conn, $sql_query);
    $row = mysqli_fetch_assoc($result);
}

if ($_POST) {
    $sql_query = "UPDATE " . $config['route']['station'] . "
    
        SET
        " . $config['route']['station'] . "_subject = '" . $_POST['input_subject'] . "',
        " . $config['route']['station'] . "_hour = '" . $_POST['input_hour'] . "',
        " . $config['route']['station'] . "_minute = '" . $_POST['input_minute'] . "',
        " . $config['route']['station'] . "_lastdate = NOW()

        WHERE
        " . $config['route']['station'] . "_id = " . decodeStr($_POST['input_id']) . "
        ";
    $result = db_query($conn, $sql_query);
    header('location:station.php?id=' . $_POST['input_id']);
}

?>

<body>

    <div class="jumbotron text-center">
        <h1><?php echo $config['name']['website']; ?></h1>
    </div>

    <div class="container">
        <h2>แก้ไขสถานี <span class="text-danger">" <?php echo $row['subject']; ?> "</span></h2>
        <form action="edit_station.php" method="post">
            <input type="hidden" name="input_id" value="<?php echo encodeStr($row['id']); ?>">
            <div class="form-group">
                <label for="text">ชื่อสถานี <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="input_subject" name="input_subject" value="<?php echo $row['subject']; ?>" required>
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
                    <a class="btn btn-default" href="javascript:window.history.back()">กลับ</a>
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