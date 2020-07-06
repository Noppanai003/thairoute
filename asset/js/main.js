$('.delete_route').on('click',function (e) {
    var btnconfirm = confirm("ยืนยันลบข้อมูล");
    if (btnconfirm == true) { 
        var id = $(this).attr("data-id");
        var path = $("base").attr("href");
        $.ajax({
            url: path + "/delete.php",
            type: 'post',
            data: { id: id},
            success: function(data) {
                if(data == 'success'){
                    alert('ลบข้อมูลสำเร็จ');
                    location.reload();
                }else{
                    alert('เกิดข้อผิดพลาด');
                }
            }
        });
    }
})

$('.delete_station').on('click',function (e) {
    var btnconfirm = confirm("ยืนยันลบข้อมูล");
    if (btnconfirm == true) { 
        var id = $(this).attr("data-id");
        var path = $("base").attr("href");
        $.ajax({
            url: path + "/delete_station.php",
            type: 'post',
            data: { id: id},
            success: function(data) {
                if(data == 'success'){
                    alert('ลบข้อมูลสำเร็จ');
                    location.reload();
                }else{
                    alert('เกิดข้อผิดพลาด');
                }
            }
        });
    }
})

$('.delete_fare').on('click',function (e) {
    var btnconfirm = confirm("ยืนยันลบข้อมูล");
    if (btnconfirm == true) { 
        var id = $(this).attr("data-id");
        var path = $("base").attr("href");
        $.ajax({
            url: path + "/delete_fare.php",
            type: 'post',
            data: { id: id},
            success: function(data) {
                if(data == 'success'){
                    alert('ลบข้อมูลสำเร็จ');
                    location.reload();
                }else{
                    alert('เกิดข้อผิดพลาด');
                }
            }
        });
    }
})

$(document).ready(function(){
});

// $("#btnSearch").click(function() {
//     var itemname = $(this).$("#itemname").val();
//     var path = $("base").attr("href");
//     $.ajax({
//         url: path + "/search.php",
//         type: "post",
//         data: {
//             itemname: itemname
//         },
//         success: function(data) {
//             $("#list-data").html(data);
//         }
//     });
// });
// $("#searchform").on("keyup keypress", function(e) {
//     var code = e.keycode || e.which;
//     if (code == 13) {
//         $("#btnSearch").click();
//         return false;
//     }
// });
