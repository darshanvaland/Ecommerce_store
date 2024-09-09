@extends('backends.partials.main')

@section('content')

<div class="container mt-5">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Product </h3>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <button type="button" class="btn btn-primary btn-round" data-toggle="modal"
                    data-target="#product_model">Add
                    Product</button>
            </div>
        </div>
        {{-- model section --}}
        <div class="modal fade" id="product_model" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Product</h4> 
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                   

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="product_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form">
                                <input type="text" name="product_id" id="product_id" hidden>
                                <label for="product_name" class="form-label">Product Name:<span style="color: red">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control"
                                    placeholder="Product Name">
                                <span style="color: red" id="product_name_span"></span>
                            </div>

                            <div class="form">
                                <label for="product_category" class="form-label">Product Category:<span style="color: red">*</span></label>
                                <select name="product_category" id="product_category" class="form-control">
                                    <option value="0">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id  }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red" id="product_category_span"></span>
                            </div>

                            <div class="form">
                                <label for="product_price" class="form-label">Product Price:<span style="color: red">*</span></label>
                                <input type="text" name="product_price" id="product_price" class="form-control"
                                    placeholder="Product Name">
                                <span style="color: red" id="product_price_span"></span>
                            </div>
                            <div class="form"> 
                                <label for="product_image" class="form-label">Product Image:<span style="color: red">*</span></label>
                                <input type="file" name="product_image" id="product_image" class="form-control" onchange="validate_product_image()">
                                <input type="hidden" value="" id="image_value" name="image_value">
                                <img id="product_image_preview" src="/"  style="max-width: 100%; max-height: 50px;">
                                <span style="color: red" id="product_image_span"></span>
                            </div>
                            
                            <div class="form">
                                <label for="product_desc" class="form-label">Product Description:</label>
                                <textarea name="product_desc" id="product_desc" class="form-control" cols="30" rows=""
                                    placeholder="Product Desc"></textarea>
                            </div>
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="button" class="btn btn-primary btn-round" id="product_form_save" value="Save">
                        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        {{-- model section close --}}
        <!-- table section -->
        <table class="table data-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Desc</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
@endsection
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script src="{{ asset('back-end/js/product.js') }}"></script>

