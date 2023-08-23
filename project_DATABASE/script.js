$(function() {

    $(".toggle").on("click", function() {

        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
            $(this).find("a").html("<i class='fas fa-bars'></i>");
        } else {
            $(".item").addClass("active");
            $(this).find("a").html("<i class='fas fa-times'></i>");
        }
    });
});

$(document).ready(function() {

  // Upload image
  $("#uploadBtn").click(function() {
    var file = $("#fileInput").prop("files")[0];
    var imageName = $("#imageNameInput").val();

    if (file && imageName) {
      var reader = new FileReader();
      reader.onload = function(event) {
        var image = new Image();
        image.src = event.target.result;
        image.onload = function() {
          var canvas = document.createElement('canvas');
          var context = canvas.getContext('2d');

          var max_width = 400;
          var max_height = 400;
          var width = image.width;
          var height = image.height;

          if (width > height) {
            if (width > max_width) {
              height *= max_width / width;
              width = max_width;
            }
          } else {
            if (height > max_height) {
              width *= max_height / height;
              height = max_height;
            }
          }

          canvas.width = width;
          canvas.height = height;

          context.drawImage(image, 0, 0, width, height);

          var imageSrc = canvas.toDataURL(file.type);
          var html = "<div class='image'><img src='" + imageSrc + "'><div class='overlay'><span class='edit' title='Edit Image Name'><i class='fa-solid fa-edit'></i></span><span class='delete' title='Delete Image'><i class='fa-solid fa-trash'></i></span></div><div class='image-name'>" + imageName + "</div></div>";
          $("#imageContainer").append(html);
        }
      };
      reader.readAsDataURL(file);

      // Clear input fields
      $("#fileInput").val("");
      $("#imageNameInput").val("");
    } else {
      alert("Please select an image and enter an image name.");
    }
  });

  // Edit image name
  $(document).on("click", ".edit", function() {
    var imageName = $(this).closest(".image").find(".image-name").text();
    $("#editImageNameInput").val(imageName);
    $("#editModal").show();
  });

  $("#saveEditBtn").click(function() {
    var newImageName = $("#editImageNameInput").val();
    $(".image:has(.edit:visible)").find(".image-name").text(newImageName);
    $("#editModal").hide();
  });

  $(".close").click(function() {
    $("#editModal").hide();
  });

  // Delete image
  $(document).on("click", ".delete", function() {
    $(this).closest(".image").remove();
  });

});

$(document).ready(function() {
  // เมื่อกดปุ่ม "เพิ่มหมวดหมู่"
  $('#addfood').click(function() {
      $('#add-food-modal').css('display', 'block'); // แสดงโมดัล
  });

  // เมื่อกดปุ่มปิด (x) บนโมดัล
  $('.close').click(function() {
      $('#add-food-modal').css('display', 'none'); // ซ่อนโมดัล
  });
});


// $(document).ready(function() {
//   // เมื่อกดปุ่ม "เพิ่มหมวดหมู่"
//   $('#add-food').click(function() {
//       $('#add-food-modal').css('display', 'block'); // แสดงโมดัล
//   });

//   // เมื่อกดปุ่มปิด (x) บนโมดัล
//   $('.close').click(function() {
//       $('#add-food-modal').css('display', 'none'); // ซ่อนโมดัล
//   });
// });

// $(document).ready(function() {
//   var selectedFood = null;
  
//   // Add food button click event
//   $('#add-food').click(function() {
//     $('#add-food-modal').show();
//   });
  
//   // Edit food button click event
//   $('#edit-food').click(function() {
//     if (selectedFood !== null) {
//       var newName = prompt('Enter new food name:', selectedFood.text());
//       if (newName !== null && newName.trim() !== '') {
//         selectedFood.text(newName);
//       }
//     }
//   });
  
//   // Delete food button click event
//   $('#delete-food').click(function() {
//     if (selectedFood !== null) {
//       selectedFood.remove();
//       selectedFood = null;
//     }
//   });
  
//   // Close modal button click event
//   $('.close').click(function() {
//     $('#add-food-modal').hide();
//   });
  
//   // Add food form submit event
//   $('form').submit(function(event) {
//     event.preventDefault();
//     var foodName = $('#food-name').val();
//     if (foodName.trim() !== '') {
//       $('.foodtype').append('<div class="fooditem">' + foodName + '</div>');
//       $('#add-food-modal').hide();
//     }
//   });
  
//   // Food item click event
//   $('.foodtype').on('click', '.fooditem', function() {
//     if (selectedFood !== null) {
//       selectedFood.removeClass('selected');
//     }
//     selectedFood = $(this);
//     selectedFood.addClass('selected');
//   });
// });


