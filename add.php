<?php 
    include 'asset/template/header.php';
    if($_POST){

        $data = array();
        $data[$config['route']['db'] . "_subject"] = "'" . changeQuot($_POST["input_subject"]) . "'";
        $data[$config['route']['db'] . "_distance"] = "'" . changeQuot($_POST["input_distance"]) . "'";
        $data[$config['route']['db'] . "_credate"] = "NOW()";

        $sql_query = "INSERT INTO " . $config['route']['db'] . "(" . implode(',', array_keys($data)) . ")VALUES(" . implode(',', array_values($data)) . ")";
        $result = db_query($conn , $sql_query);

        header( 'location:index.php' );
    }
?>
    <body>
    
        <div class="jumbotron text-center">
            <h1><?php echo $config['name']['website'];?></h1>
        </div>

        <div class="container">
            <h2>เพิ่มเส้นทาง</h2>
            <form action="add.php" method="post" >
                <div class="form-group">
                    <label for="text">ชื่อเส้นทาง <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="input_subject" name="input_subject"  required>
                </div>
                <div class="form-group">
                    <label for="text">ระยะทาง (กิโลเมตร) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="input_distance" name="input_distance" required>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default" href="index.php" >กลับ</a>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="reset" class="btn btn-danger">รีเซ็ต</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
            
        <?php include 'asset/template/footer.php';?>
    </body>
</html>

