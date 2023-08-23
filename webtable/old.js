  //-----------restaurant----------------
          //-----------restaurant----------------
            //-----------restaurant----------------

            var foodTypeOptionsR = "";
            var foodTypeSelectedR = "";
            var res_name = res_name;
    
            // ดึงข้อมูลจากฐานข้อมูล
            $.ajax({
        type: 'POST',
        url: '/get-res-name.php',
        success: function(data) {
            // ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
            var res = JSON.parse(data);
            // วนลูปเพื่อสร้าง options ของ dropdown
            for (var i = 0; i < res.length; i++) {
                var optionValueR = res[i].res_email;
                var optionTextR = res[i].res_name;
                if (optionTextR === res_name) {
                    // if the current optionText matches the type_name variable,
                    // set the foodTypeSelected variable to the current optionValue
                    foodTypeSelectedR = optionValueR;
                }
                foodTypeOptionsR += '<option value="' + optionValueR + '">' + optionTextR + '</option>';
            }
            // แทรก options ใน dropdown
            $('#res_name').html(foodTypeOptionsR);
            // set the selected option to the foodTypeSelected variable
            $('#res_name').val(foodTypeSelectedR);
        },
                error: function() {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Failed to get food type options.',
                        icon: 'error',
                        confirmButtonColor: '#d33'
                    });
                }
            });
    
              //-----------restaurant----------------
                //-----------restaurant----------------
                  //-----------restaurant----------------