<footer>

</footer>
<!-- Core -->
<script type="text/javascript" src="<?php echo _URL; ?>asset/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo _URL; ?>asset/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo _URL; ?>asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo _URL; ?>asset/js/validator.min.js"></script>
<script type="text/javascript" src="<?php echo _URL; ?>js/bootstrap-timepicker.min.js"></script>
<!-- Main -->
<script src="<?php echo _URL; ?>asset/js/main.js"></script>
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>

<!-- <script type="text/javascript">
    $("#btnSearch").click(function() {
        var itemname = $("#itemname").val();
        var path = $("base").attr("href");
        $.ajax({
            url: path + "/search.php",
            type: "post",
            data: {
                itemname: itemname
            },
            success: function(data) {
                if(data == 'success'){
                    alert('ค้นหาสำเร็จ');
                    header( "location: search.php" );
                    exit(0);
                }else{
                    alert('เกิดข้อผิดพลาด');
                    header( "location: search.php" );
                    exit(0);
                }
            }
        });
    });
    $("#searchform").on("keyup keypress", function(e) {
        var code = e.keycode || e.which;
        if (code == 13) {
            $("#btnSearch").click();
            return false;
        }
    });
</script> -->