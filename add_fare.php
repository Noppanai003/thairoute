<?php 
    include 'asset/template/header.php';
    $sql_route = "SELECT
        " . $config['route']['db'] . "." . $config['route']['db'] . "_id as id,
        " . $config['route']['db'] . "." . $config['route']['db'] . "_subject as subject
    
        FROM
        " . $config['route']['db'] . "
        WHERE
        
        " . $config['route']['db'] . "_id = ".decodeStr($_GET['id'])."
    ";
    $result = db_query($conn , $sql_route);
    $row = mysqli_fetch_assoc($result);
    
    $sql_station = "SELECT
        " . $config['route']['station'] . "." . $config['route']['station'] . "_id as id,
        " . $config['route']['station'] . "." . $config['route']['station'] . "_subject as subject
    
        FROM
        " . $config['route']['station'] . "
        WHERE
        
        " . $config['route']['station'] . "_route_id = ".decodeStr($_GET['id'])."
    ";
    $result_station = db_query($conn , $sql_station);
    

    if($_POST){
        $data = array();
        $data[$config['route']['fare'] . "_route_id"] = "'" . decodeStr($_POST["input_route_id"]) . "'";
        $data[$config['route']['fare'] . "_start"] = "'" . decodeStr($_POST["input_start"]) . "'";
        $data[$config['route']['fare'] . "_stop"] = "'" . decodeStr($_POST["input_stop"]) . "'";
        $data[$config['route']['fare'] . "_distance"] = "'" . changeQuot($_POST["input_distance"]) . "'";
        $data[$config['route']['fare'] . "_price"] = "'" . changeQuot($_POST["input_price"]) . "'";
        $data[$config['route']['fare'] . "_credate"] = "NOW()";

        $sql_query = "INSERT INTO " . $config['route']['fare'] . "(" . implode(',', array_keys($data)) . ")VALUES(" . implode(',', array_values($data)) . ")";
        $result = db_query($conn , $sql_query);
        header( 'location:fare.php?id='.$_POST["input_route_id"] );
    }
?>
    <body>
    
        <div class="jumbotron text-center">
            <h1><?php echo $config['name']['website'];?></h1>
        </div>

        <div class="container">
            <h2>เพิ่มราคาค่าโดยสาร <span class="text-danger">"<?php echo $row['subject']; ?>"</span></h2>
            <form action="add_fare.php" method="post" >
                
                <input type="hidden" class="form-control" id="input_route_id" name="input_route_id" value="<?php echo $_GET['id']; ?>" required>
                
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">สถานีต้นทาง <span class="text-danger">*</span></label>
                            <select class="form-control"  id="input_start" name="input_start"  required>">
                                <option value="">เลือกสถานีต้นทาง</option>
                                <?php 
                                    $count = 0;
                                    foreach($result_station as $lists){ 
                                    $count++;
                                ?>
                                    <option value="<?php echo encodeStr($lists['id']);?>"><?php echo $lists['subject'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">สถานีปลายทาง <span class="text-danger">*</span></label>
                            <select class="form-control"  id="input_stop" name="input_stop"  required>
                                <option  value="">เลือกสถานีปลายทาง</option>
                                <?php 
                                    $count = 0;
                                    foreach($result_station as $lists){ 
                                    $count++;
                                ?>
                                    <option value="<?php echo encodeStr($lists['id']);?>"><?php echo $lists['subject'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">ระยะทาง (กิโลเมตร) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="input_distance" name="input_distance" value="" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">ค่าโดยสาร <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="input_price" name="input_price" value="" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default" href="fare.php?id=<?php echo $_GET['id']; ?>" >กลับ</a>
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

