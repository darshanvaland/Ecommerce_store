@extends('backends.partials.main')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@section('content')

<div class="container mt-5">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Category </h3>
      </div>
      <div class="ms-md-auto py-2 py-md-0">
        <button type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#category_model">Add
          Category</button>
      </div>
    </div>
    {{-- model section --}}
    <div class="modal" id="category_model">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <form action="" id="category_form" method="POST">
              @csrf
              <input type="text" name="category_id" id="category_id" hidden>
              <label for="category_name" class="form-label">Category Name:<span style="color: red">*</span></label>
              <input type="text" name="category_name" id="category_name" class="form-control"
                placeholder="Category Name">
                <span style="color: red" id="category_name_span"></span> <br>
              <label for="category_desc" class="form-label">Category Description:</label>
              <textarea name="category_desc" id="category_desc" class="form-control" cols="30" rows="10"
                placeholder="Category Desc"></textarea>
            </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="button" class="btn btn-primary btn-round" id="category_form_save" value="Save">
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
          <th>C.Name</th>
          <th>C.Desc</th>
          <th>Action</th>
        </tr>
      </thead>
   
    </table>
  </div>
</div>
@endsection
<script src="{{ asset('back-end/js/category.js')}}"></script>
<!-- DataTables CSS -->

<!-- jQuery (required for DataTables) -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
