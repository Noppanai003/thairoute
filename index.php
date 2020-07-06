<?php include 'asset/template/header.php'; ?>

<body>
    <div class="jumbotron text-center">
        <h1><?php echo $config['name']['website']; ?></h1>
    </div>

    <div class="container">
        <div class="row manage-top">
            <div class="col-sm-8 text-left">
                <form class="form-inline" name="searchform" id="searchform" action="search.php" method="get">
                    <div class="form-group">
                        <input type="text" name="itemname" id="itemname" class="form-control" value="" placeholder="" autocomplete="off">
                        <button type="submit" form="searchform" class="btn btn-primary" id="btnSearch">
                            ค้นหา
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-info" href="add.php">+ เพิ่มเส้นทาง</a>
            </div>
        </div>
        <?php
        $sql_query = "SELECT
                    " . $config['route']['db'] . "." . $config['route']['db'] . "_id as id,
                    " . $config['route']['db'] . "." . $config['route']['db'] . "_subject as subject,
                    " . $config['route']['db'] . "." . $config['route']['db'] . "_distance as distance,
                    (SELECT COUNT(" . $config['route']['station'] . "." . $config['route']['station'] . "_id) FROM " . $config['route']['station'] . " WHERE " . $config['route']['station'] . "_route_id = " . $config['route']['db'] . "_id) as station
                
                    FROM
                    " . $config['route']['db'] . "
                ";
        $result = db_query($conn, $sql_query);
        ?>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ชื่อเส้นทาง</th>
                    <th scope="col" class="text-center">ระยะทาง</th>
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
                        <td><?php echo $lists['subject']; ?></td>
                        <td class="text-center"><?php echo number_format($lists['distance']); ?> กิโลเมตร</td>
                        <td class="text-center"><a class="btn btn-primary" href="station.php?id=<?php echo encodeStr($lists['id']); ?>">กำหนดจุดรับ-ส่ง (<?php echo number_format($lists['station']); ?>)</a></td>
                        <td class="text-center"><a class="btn btn-success " href="fare.php?id=<?php echo encodeStr($lists['id']); ?>">กำหนดราคา</a></td>
                        <td class="text-center"><a class="btn btn-info" href="edit.php?id=<?php echo encodeStr($lists['id']); ?>">แก้ไข</a></td>
                        <td class="text-center"><button type="button" class="btn btn-danger delete_route" data-id="<?php echo encodeStr($lists['id']);  ?>">ลบ</button></td>
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