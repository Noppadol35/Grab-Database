var foodTypeOptionsT = "";
var foodTypeSelectedT = "";
var status_name = status_name;

// ดึงข้อมูลจากฐานข้อมูล
$.ajax({
type: 'POST',
url: '/get-status.php',
success: function(data) {
// ใช้ JSON.parse เพื่อแปลงข้อมูลที่ได้รับมาจาก php ให้กลายเป็น Object
var statusT = JSON.parse(data);
// วนลูปเพื่อสร้าง options ของ dropdown

for (var i = 0; i < statusT.length; i++) {
    var optionValueT = statusT[i].status_ID;
    var optionTextT = statusT[i].status_name;
    if (optionTextT === status_name) {
        console.log("optionTextT: " + optionTextT);
        // if the current optionText matches the type_name variable,
        // set the foodTypeSelected variable to the current optionValue
        foodTypeSelectedT = optionValueT;
    }
    foodTypeOptionsT += '<option value="' + optionValueT + '">' + optionTextT + '</option>';
}
// แทรก options ใน dropdown
$('#status_name').html(foodTypeOptionsT);
// set the selected option to the foodTypeSelected variable
$('#status_name').val(foodTypeSelectedT);

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

Swal.fire({
    title: 'Edit Data',
    html: '<form id="edit-form" class="form">' +
    '<div class="form-group">' +
                '<label for="status_name" class="label font-weight-medium text-dark">Status :</label>' +
                '<select id="status_name" name="status_name" class="form-control">' +
                foodTypeOptionsT +
                '</select>' +
                '</div>' +
                '</form>'
                ,
    showCancelButton: true,
    confirmButtonText: 'Save',
    showLoaderOnConfirm: true,
    allowOutsideClick: () => !Swal.isLoading()
}).then((result) => {
    if (result.isConfirmed) {
        Swal.fire({
            title: `${result.value.status_name}`,
            icon: 'success'
        })
    }
}
);

