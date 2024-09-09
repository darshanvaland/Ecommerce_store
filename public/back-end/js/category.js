$(document).ready(function () {
    console.log("radey")

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "backend",
        columns: [
            {data: 'category_name', name: 'category_name'},
            {data: 'category_desc', name: 'category_desc'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $("#category_form_save").on('click',function () {
        if(validate_category_name()){
            var id = $("#category_id").val();
            if($("#category_id").val() == ''){
                var url = 'backend/store';
            }else{
                var url =  "backend/update/" + id
            }
                $.ajax({
                    type: "POST",
                    url:url,
                    data: $("#category_form").serialize(),
                    success: function (response) {
                        $("#category_model").modal('hide');
                        console.log(response.status)
                        $('#category_form_save').val("Save");
                        $("#category_form")[0].reset();
                        table.draw();
                    }
                });
                return true
        }else{
            return false
        }
    })

    $(document).on('click', '.edit_category', function() {
        var id = $(this).data('category_id');
        $("#category_model").modal('show');
        $('#category_form_save').val("Update");
        // alert(id)
        $.ajax({
            type: "Get",
            url: "backend/show/" + id,
            success: function (response) {
                $("#category_id").val(response.category_id);
                $("#category_name").val(response.category_name);
                $("#category_desc").val(response.category_desc);
            }
        });
    });
    
    $(document).on('click', '.delete_category', function() {
        var id = $(this).data('category_id');
        var confim = confirm("Are you sure want  to delete?")
        if(confim){
            $.ajax({
                type: "Delete",
                url: "backend/destroy/" + id,
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
function validate_category_name(){
    if($("#category_name").val() ==''){
        $("#category_name_span").text("This Filed is requried")
        return false;
    }else{
        $("#category_name_span").text(" ")
        return  true;
    }
}

