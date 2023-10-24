<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Product</title>
  </head>
  <body>
    <div class="container" >
        <div class="row" style="text-align: center; padding:10px; margin:30px;">
            <h1 style="background-color: green; color: white;">Product Details</h1>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6"></div>
            <div class="col-3">
                <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> Create New Product</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelHeading"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="productForm" name="productForm" class="form-horizontal">
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label"><b>Name</b></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name of Product" value="" maxlength="50" required="">
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><b>Details</b></label>
                                <div class="col-sm-12">
                                    <textarea id="detail" name="detail" required="" placeholder="Provide Details of Product" class="form-control"></textarea>
                                </div>
                            </div>
                
                            <div class="col-sm-offset-2 col-sm-10" style="padding: 10px;">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  </body>
  <script type="text/javascript">
    $(function () { 
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        //Render DataTable

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('home') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });


        //Creating Product - Show Model
        $('#createNewProduct').click(function () {
            $('#saveBtn').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("Create New Product");
            $('#ajaxModel').modal('show');
        });
        //Creating Product
        $('#saveBtn').click(function(e){
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
            
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    console.log(data);
                    table.draw();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        //Edit Product

        $('body').on('click','.editProduct',function(){
            var product_id = $(this).data('id');
            $.get("{{ route('home') }}" +'/' + product_id +'/edit', function (data)
            {
                $('#modelHeading').html("Edit Product");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#detail').val(data.detail);
            })
        });

        //Delete Product

        $('body').on('click', '.deleteProduct', function () {  
        var product_id = $(this).data("id");
        confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "{{ route('store') }}"+'/'+product_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

  </script>
</html>