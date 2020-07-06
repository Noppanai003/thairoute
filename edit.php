<?php 
    include 'asset/template/header.php';
    if($_GET){

        $sql_query = "SELECT
        " . $config['route']['db'] . "." . $config['route']['db'] . "_id as id,
        " . $config['route']['db'] . "." . $config['route']['db'] . "_subject as subject,
        " . $config['route']['db'] . "." . $config['route']['db'] . "_distance as distance
    
        FROM
        " . $config['route']['db'] . "
        WHERE
        " . $config['route']['db'] . "_id = ".decodeStr($_GET['id'])."
        ";
        $result = db_query($conn , $sql_query);
        $row = mysqli_fetch_assoc($result);
    }

    if($_POST){
        $sql_query = "UPDATE " . $config['route']['db'] . "
    
        SET
        " . $config['route']['db'] . "_subject = '".$_POST['input_subject']."',
        " . $config['route']['db'] . "_distance = ".$_POST['input_distance'].",
        " . $config['route']['db'] . "_lastdate = NOW()

        WHERE
        " . $config['route']['db'] . "_id = ". decodeStr($_POST['input_id'])."
        ";
        
        $result = db_query($conn , $sql_query);
        header( 'location:index.php' );
    }

?>
    <body>
    
        <div class="jumbotron text-center">
            <h1><?php echo $config['name']['website'];?></h1>
        </div>

        <div class="container">
            <h2>แก้ไขเส้นทาง " <?php echo $row['subject']; ?> "</h2>
            <form action="edit.php" method="post" >
                <input type="hidden" name="input_id" value="<?php echo encodeStr($row['id']);?>" >
                <div class="form-group">
                    <label for="text">ชื่อเส้นทาง <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="input_subject" name="input_subject" value="<?php echo $row['subject'];?>" required>
                </div>
                <div class="form-group">
                    <label for="text">ระยะทาง (กิโลเมตร) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="input_distance" name="input_distance" value="<?php echo $row['distance'];?>" required>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a class="btn btn-default" href="index.php" >กลับ</a>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
            
        <?php include 'asset/template/footer.php';?>
    </body>
</html>

