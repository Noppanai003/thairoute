<?php 
    include 'asset/template/header.php';
    $sql_route = "SELECT
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_id as id,
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_start as start,
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_stop as stop,
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_distance as distance,
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_price as price,
        " . $config['route']['fare'] . "." . $config['route']['fare'] . "_route_id as route_id,
        (SELECT " . $config['route']['station'] . "." . $config['route']['station'] . "_subject FROM " . $config['route']['station'] . " WHERE " . $config['route']['station'] . "_id = " . $config['route']['fare'] . "_start) as startname,
        (SELECT " . $config['route']['station'] . "." . $config['route']['station'] . "_subject FROM " . $config['route']['station'] . " WHERE " . $config['route']['station'] . "_id = " . $config['route']['fare'] . "_stop) as stopname

    
        FROM
        " . $config['route']['fare'] . "
        WHERE
        
        " . $config['route']['fare'] . "_id = ".decodeStr($_GET['id'])."
    ";
    $result = db_query($conn , $sql_route);
    $row = mysqli_fetch_assoc($result);
    
    
    $sql_station = "SELECT
        " . $config['route']['station'] . "." . $config['route']['station'] . "_id as id,
        " . $config['route']['station'] . "." . $config['route']['station'] . "_subject as subject
    
        FROM
        " . $config['route']['station'] . "
        WHERE
        
        " . $config['route']['station'] . "_route_id = ".$row['route_id']."
    ";
    
    $result_station = db_query($conn , $sql_station);
    

    if($_POST){
        $sql_query = "UPDATE " . $config['route']['fare'] . "
    
        SET
        " . $config['route']['fare'] . "_start = '".decodeStr($_POST['input_start'])."',
        " . $config['route']['fare'] . "_stop = '".decodeStr($_POST['input_stop'])."',
        " . $config['route']['fare'] . "_distance = '".$_POST['input_distance']."',
        " . $config['route']['fare'] . "_price = '".$_POST['input_price']."',
        " . $config['route']['fare'] . "_lastdate = NOW()

        WHERE
        " . $config['route']['fare'] . "_id = ". decodeStr($_POST['input_id'])."
        ";
        
        $result = db_query($conn , $sql_query);
        header( 'location:fare.php?id='.$_POST['input_route_id'] );
    }
?>
    <body>
    
        <div class="jumbotron text-center">
            <h1><?php echo $config['name']['website'];?></h1>
        </div>

        <div class="container">
            <h2>แก้ไขข้อมูลราคาค่าโดยสาร <span class="text-danger">"<?php echo $row['startname']; ?>" ถึง "<?php echo $row['stopname']; ?>"</span></h2>
            <form action="edit_fare.php" method="post" >
                
            <input type="hidden" class="form-control" id="input_id" name="input_id" value="<?php echo $_GET['id']; ?>" required>
            <input type="hidden" class="form-control" id="input_route_id" name="input_route_id" value="<?php echo encodeStr($row['route_id']); ?>" required>
                
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
                                    <option value="<?php echo encodeStr($lists['id']);?>" <?php if($row['start'] == $lists['id']){ echo 'selected';}?>><?php echo $lists['subject'];?></option>
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
                                    <option value="<?php echo encodeStr($lists['id']);?>" <?php if($row['stop'] == $lists['id']){ echo 'selected';}?>><?php echo $lists['subject'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">ระยะทาง (กิโลเมตร) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="input_distance" name="input_distance" value="<?php echo $row['distance'] ?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="text">ค่าโดยสาร <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="input_price" name="input_price" value="<?php echo $row['price'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default" href="fare.php?id=<?php echo encodeStr($row['route_id']); ?>" >กลับ</a>
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

