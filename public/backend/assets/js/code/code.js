$(function () {
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();

        var link = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "Delete This Data?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            console.log(result);
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
});

// form validation
$(document).ready(function () {
    $("#myForm").validate({
        rules: {
            property_name: {
                required: true,
            },
            property_status: {
                required: true,
            },
            lowest_price: {
                required: true,
            },
            max_price: {
                required: true,
            },
            ptype_id: {
                required: true,
            },
        },
        messages: {
            property_name: {
                required: "Please Enter Property Name",
            },
            property_status: {
                required: "Please Select Property Status",
            },
            lowest_price: {
                required: "Please Enter Lowest Price",
            },
            max_price: {
                required: "Please Enter Max Price",
            },
            ptype_id: {
                required: "Please Select Property Type",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
});
// end form validation

// thambnail
function mainThambUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#mainThamb").attr("src", e.target.result).width(100).height(80);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// end thambnail

//  multi images
$("#multiImg").on("change", function () {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var data = $(this)[0].files;

        $.each(data, function (index, file) {
            if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
                var fileRead = new FileReader();

                fileRead.onload = (function (file) {
                    return function (e) {
                        var img = $("<img/>")
                            .addClass("thamb")
                            .attr("src", e.target.result)
                            .width(100)
                            .height(80);

                        $("#preview_multi_imgs").append(img);
                    };
                })(file);

                fileRead.readAsDataURL(file);
            }
        });
    } else {
        alert("Your browser doesn't support File API!");
    }
});
//  end multi images

// add more facilities
var counter = 0;
$(document).on("click", ".addeventmore", function () {
    var whole_extra_item_add = $("#whole_extra_item_add").html();
    console.log(whole_extra_item_add);

    $(this).closest(".add_item").append(whole_extra_item_add);
    counter++;
});

$(document).on("click", ".removeeventmore", function (event) {
    $(this).closest("#whole_extra_item_delete").remove();
    counter -= 1;
});
// end add more facilities
