@extends('admin.layouts.admin')
@section('title')
    {{__('product.product')}}
@stop
@section('content')

    <!-- begin:: Content -->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{__('product.product')}}</h3>
            </div>

            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a class="addProduct btn btn-primary" >
                        {{__('product.add_product')}}
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div id="products">
                @include('admin.pages.products.subs.table')
            </div>
        </div>
    </div>
    </div>

    @include('admin.pages.products.subs.modal-update')
    @include('admin.pages.products.subs.modal')
    @include('admin.pages.products.subs.modal-delete')

    <!-- end:: Content -->

@endsection
@push('scripts')
   <script>

     $('#example-6').multifield({
	section: '.group',
	btnAdd:'#btnAdd-6',
	btnRemove:'.btnRemove',
     });

        function fetchRecords() {
            $.ajax({
                url: '{{route('admin.products.index')}}',
                type: 'get',
            }).done(function (data){
                $('#products').empty().html(data);
            });
        }

        $(document).on('click','.addProduct',function(e){
            e.preventDefault();
            $('.modalProduct').modal('show');
            $('input:not([type="hidden"])').val('');
            $('small').text('');
            $('textarea').text();
            $('.image').detach();
            $('.submit').attr('id','saveProduct');

        });
        $(document).on('click','#editProduct',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.get('products/show/' + id , function (data) {
                $('.modalUpdateProduct').modal('show');
                $('.image').detach();
                $(".name_error").text('');
                $(".name_en_error").text('');
                $('.id').attr('value',data.id);
                $('.name').val(data.name.ar);
                $('.name_en').val(data.name.en);
                $('.description').val(data.description.ar);
                $('.description_en').val(data.description.en);
                $('.price').val(data.price);
                $('.qty').val(data.quantity);
                if(data.image_path)
                var image ='<img src="/'+data.image_path+'" style="width:95%;height:200px;margin:5px auto"class="image mx-3"> ';
                $('#productF').prepend(image);
                $('.category'+data.category_id).attr('selected','selected');
                $('.submit').attr('id','updateProduct');
            });
        });
        $(document).on('click','#delProduct',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('.modDelete').modal('show');
            $('#id').text(id);
            $('.delete_btn').attr('product_id',id);
        });

        /********************** add product with ajax ****************************/
        $(document).on('click', '#saveProduct', function (e) {
            e.preventDefault();
            let myForm = document.getElementById('productForm');
            var formData = new FormData(myForm);
            console.log(formData);
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('admin.products.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    fetchRecords();
                    if(data.status==true) {
                        $('.modalProduct').modal('hide');
                        toastr.success(data.success);
                    }
                    else
                        toastr.error(data.error);
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("." + key + "_error").text(val[0]);
                    });                }
            });
        });
     /*************************************** edit products with ajax *****************************************/

     /********************** update product with ajax ****************************/
     $(document).on('click', '#updateProduct', function (e) {
         e.preventDefault();
         let myForm = document.getElementById('productF');
         var formData = new FormData(myForm);
         $.ajax({
             type: 'POST',
             enctype: 'multipart/form-data',
             url: "{{route('admin.products.update')}}",
             data: formData,
             processData: false,
             contentType: false,
             cache: false,
             success: function (data) {
                 fetchRecords();
                 if(data.status==true){
                     $('.modalUpdateProduct').modal('hide');
                     toastr.success(data.success);}
                 else
                     toastr.error(data.error);
                 $('#productF')[0].reset();
                 $('.image').detach();
             }, error: function (reject) {
                 var response = $.parseJSON(reject.responseText);
                 $.each(response.errors, function (key, val) {
                     $("." + key + "_error").text(val[0]);
                 });
             }
         });
     });




     /*************************************** delete with ajax *****************************************/
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).attr('product_id');
            $.ajax({
                type: 'POST',
                url: "{{route('admin.products.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id
                },
                success: function (data) {
                    $('.modDelete').modal('hide');
                    fetchRecords();
                    if(data.status==true) {
                        toastr.success(data.success);
                    }else{
                        toastr.error(data.error);
                    }
                },
                error: function (reject) {
                    toastr.error(reject.error);
                }
            });
        });


     /********************** activate product with ajax ****************************/
     $(document).on('click', '#activate', function (e) {
         e.preventDefault();
         var id = $(this).attr('data-id');
         $.ajax({
             type: 'POST',
             url: "{{route('admin.products.activate')}}",
             data: {
                 '_token': "{{csrf_token()}}",
                 'id': id
             },
             success: function (data) {
                 fetchRecords();
                 if(data.status==true)
                     toastr.success(data.success);
                 else
                     toastr.error(data.error);
             }, error: function (reject) {
                 var response = $.parseJSON(reject.responseText);
                 $.each(response.errors, function (key, val) {
                     $("." + key + "_error").text(val[0]);
                 });                }
         });
     });




   </script>



@endpush
