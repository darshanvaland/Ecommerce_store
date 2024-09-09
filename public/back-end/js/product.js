$(document).ready(function () {
    console.log("radey")

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "product",
        columns: [
            {data: 'product_name', name: 'product_name'},
            {data: 'product_price', name: 'product_price'},
            {data: 'product_desc', name: 'product_desc'},
            {
                data: 'product_image',
                name: 'product_image',
                render: function(data, type, full, meta) {
                    return '<img src=/' + data + ' height="50"/>';
                }
            },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $("#product_form_save").on('click',function () {

        if(validate_propduct_name() & validate_price() & validate_propduct_category() & validate_product_image( )){
            var id = $("#product_id").val();
            if($("#product_id").val() == ''){
                var url = 'product/store';
            }else{
                var url =  "product/update/" + id
            }
            var formData = new FormData($('#product_form')[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#product_model").modal('hide');
                    console.log(response.status);
                    $('#category_form_save').val("Save");
                    $("#product_form")[0].reset();
                    table.draw();
                }
            });
                return true
        }else{
          return false
        }
    })

    $(document).on('click', '#product_edit', function() {
        var id = $(this).data('products_id');
        // alert(id)
        $("#product_model").modal('show');
        $('#product_form_save').val("Update");
        // alert(id)
        $.ajax({
            type: "Get",
            url: "product/show/" + id,
            success: function (response) {
                $("#product_category").val(response.category_id);
                console.log(response.category_id)
                $("#product_id").val(response.products_id);
                $("#product_name").val(response.product_name);
                $("#product_price").val(response.product_price);
                $("#product_desc").val(response.product_desc);
                if (response.product_image) {
                    // Set image preview and hidden input value
                    $("#image_value").val(response.product_image);
                    $("#product_image_preview").attr("src", "/" + response.product_image);
                } else {
                    // Clear image preview and hidden input value
                    $("#image_value").val("");
                    $("#product_image_preview").attr("src", "");
                }

              
            }
        });
    });
    
    $(document).on('click', '#prodcut_delete', function() {
        var id = $(this).data('products_id');
        var confim = confirm("Are you sure want  to delete?")
        if(confim){
            $.ajax({
                type: "Delete",
                url: "product/destroy/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response.status)
                    table.draw();
                }
            });
        }else{
            table.draw();
        }
        // alert(id)
        
    });
});
function validate_propduct_category(){
    if($("#product_category").val() =='0'){
        $("#product_category_span").text("This Filed is requried")
        return false;
    }else{
        $("#product_category_span").text(" ")
        return  true;
    }
}

function validate_propduct_name(){
    if($("#product_name").val() ==''){
        $("#product_name_span").text("This Filed is requried")
        return false;
    }else{
        $("#product_name_span").text(" ")
        return  true;
    }
}

function validate_price(){
    var price = $("#product_price").val();
    var priceSpan = $("#product_price_span");
    
    if(price == ''){
        priceSpan.text("This field is required");
        return false;
    } else if (!/^\d+(\.\d{1,2})?$/.test(price)) {
        priceSpan.text("Only numbers are allowed");
        return false;
    } else {
        priceSpan.text("");
        return true;
    }
}
function validate_product_image() {
    var fileInput = $("#product_image").prop('files')[0];
    var imagePreview = $("#product_image_preview");
    var image_val = $("#image_value").val();
    var imageSpan = $("#product_image_span");

    if (!fileInput & !image_val) {
        imageSpan.text("This Field is required");
        return false;
    } else if( fileInput){
        var reader  =  new  FileReader();
        reader.onload  = function(e){
            imagePreview.attr('src', e.target.result)
        };
        reader.readAsDataURL(fileInput);
        imageSpan.text("")
        return true 
    }else{
        imageSpan.text("")
        return true
    }
}
