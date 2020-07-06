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
                <a class="btn btn-info" href="add_fare.php?id=<?php echo $_GET['id']; ?>">+ เพิ่มราคาค่าโดยสาร</a>
            </div>
        </div>
        <?php
        $id = decodeStr($_GET['id']);
        $sql_query = "SELECT
                    " . $config['route']['fare'] . "." . $config['route']['fare'] . "_id as id,
                    " . $config['route']['fare'] . "." . $config['route']['fare'] . "_start as start,
                    " . $config['route']['fare'] . "." . $config['route']['fare'] . "_stop as stop,
                    " . $config['route']['fare'] . "." . $config['route']['fare'] . "_price as price,
                    " . $config['route']['fare'] . "." . $config['route']['fare'] . "_distance as distance,
                    (SELECT " . $config['route']['station'] . "." . $config['route']['station'] . "_subject FROM " . $config['route']['station'] . " WHERE " . $config['route']['station'] . "_id = " . $config['route']['fare'] . "_start) as startname,
                    (SELECT " . $config['route']['station'] . "." . $config['route']['station'] . "_subject FROM " . $config['route']['station'] . " WHERE " . $config['route']['station'] . "_id = " . $config['route']['fare'] . "_stop) as stopname
                
                    FROM
                    " . $config['route']['fare'] . "
                    WHERE
                    
                    " . $config['route']['fare'] . "_route_id = " . $id . "
                ";
        $result = db_query($conn, $sql_query);
        ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">รหัส</th>
                    <th scope="col">สถานีต้นทาง</th>
                    <th scope="col">สถานีปลายทาง</th>
                    <th class="text-center" scope="col">ระยะทาง (กิโลเมตร)</th>
                    <th class="text-center" scope="col">ราคา</th>
                    <th scope="col">เส้นทาง</th>
                    <th scope="col" colspan="4" class="text-center">จัดการข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($result as $lists) {
                    $count++;
                ?>
                    <tr>
                        <td scope="row"><?php echo $count; ?></td>
                        <td><?php echo $lists['startname']; ?></td>
                        <td><?php echo $lists['stopname']; ?></td>
                        <td class="text-center"><?php echo number_format($lists['distance']); ?> กิโลเมตร</td>
                        <td class="text-center"><?php echo number_format($lists['price']); ?> บาท</td>
                        <td><?php echo $row['subject']; ?></td>
                        <td class="text-center"><a class="btn btn-info" href="edit_fare.php?id=<?php echo encodeStr($lists['id']); ?>">แก้ไข</a></td>
                        <td class="text-center"><button type="button" class="btn btn-danger delete_fare" data-id="<?php echo encodeStr($lists['id']);  ?>">ลบ</button></td>
                    </tr>
                <?php }

                ?>

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