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
?>

<body>

    <div class="jumbotron text-center">
        <h1><?php echo $config['name']['website']; ?></h1>
    </div>

    <div class="container">
        <div class="row manage-top">
            <div class="col-sm-1 text-left">
                <a class="btn btn-default" href="index.php">กลับ</a>
            </div>
            <div class="col-sm-7 text-left">
            </div>
            <div class="col-sm-4">
                <a class="btn btn-info" href="add_station.php?id=<?php echo $_GET['id']; ?>">+ เพิ่มสถานี</a>
            </div>
        </div>
        <?php
        $id = decodeStr($_GET['id']);
        $sql_query = "SELECT
                    " . $config['route']['station'] . "." . $config['route']['station'] . "_id as id,
                    " . $config['route']['station'] . "." . $config['route']['station'] . "_subject as subject,
                    " . $config['route']['station'] . "." . $config['route']['station'] . "_hour as hour,
                    " . $config['route']['station'] . "." . $config['route']['station'] . "_minute as minute
                
                    FROM
                    " . $config['route']['station'] . "
                    WHERE
                    
                    " . $config['route']['station'] . "_route_id = " . $id . "
                ";
        $result = db_query($conn, $sql_query);
        ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อสถานี</th>
                    <th scope="col">เวลาเดินทาง</th>
                    <th scope="col">เส้นทาง</th>
                    <th scope="col" colspan="4" class="text-center">จัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($result as $lists) {
                    $count++;
                    $time = $lists['hour'] . ' ชั่วโมง' .$lists['minute'] . ' นาที';
                    if($time != ''){
                        $time = $lists['hour'] . ' ชั่วโมง ' .$lists['minute'] . ' นาที';
                    }else{
                        $time = '-';
                    }
                ?>
                    <tr>
                        <td scope="row"><?php echo $count; ?></td>
                        <td><?php echo $lists['subject']; ?></td>
                        <td><?php echo $time; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td class="text-center"><a class="btn btn-info" href="edit_station.php?id=<?php echo encodeStr($lists['id']); ?>">แก้ไข</a></td>
                        <td class="text-center"><button type="button" class="btn btn-danger delete_station" data-id="<?php echo encodeStr($lists['id']);  ?>">ลบ</button></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <?php
        if ($count != 0) {
            echo 'จำนวนทั้งหมด ' . $count . ' รายการ';
        } else {
        }
        ?>
    </div>

    <?php include 'asset/template/footer.php'; ?>
</body>

</html>