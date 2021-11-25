@extends('admin.layouts.admin')
@section('title')
    {{__('category.category')}}
@stop
@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{__('category.show_category')}}</h3>
            </div>

            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <a class="addCat btn btn-primary" >
                        {{__('category.add_category')}}
                    </a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div id="categories">
         @include('admin.pages.categories.subs.table')
            </div>
        </div>
    </div>

        @include('admin.pages.categories.subs.modal')
        @include('admin.pages.categories.subs.modal-update')
        @include('admin.pages.categories.subs.modal-delete')
    <!--end::Card-->
{{--{--    <!-- end:: Content -->--}}

@endsection
@push('scripts')
    <script>

        function fetchRecords() {
            $.ajax({
                url: '{{route('admin.categories.index')}}',
                type: 'get',
            }).done(function (data){
                $('#categories').empty().html(data);
            });
        }

        $(document).on('click','.addCat',function(e){
            e.preventDefault();
            $('.modalCat').modal('show');
            $('input:not([type="hidden"])').val('');
            $('.submit').attr('id','saveCat');
        });
        $(document).on('click','#editCat',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $.get('categories/show/' + id , function (data) {
                $('.modalUpdateCat').modal('show');
                $('input:not([type="hidden"])').val('');
                $('.id').attr('value',data.id);
                $('.name').val(data.name.ar);
                $('.name_en').val(data.name.en);
                $('.submit').attr('id','updateCat');
            });
        });
        $(document).on('click','#delCat',function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('.modDelete').modal('show');
            $('#id').text(id);
            $('.delete_btn').attr('cat_id',id);
        });

        /********************** add category with ajax ****************************/
        $(document).on('click', '#saveCat', function (e) {
            e.preventDefault();
            var formData = new FormData($('#categoryForm')[0]);
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('admin.categories.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    fetchRecords();
                    if(data.status==true){
                        $('.modalCat').fadeOut().modal('hide');
                        toastr.success(data.success);}
                    else
                        toastr.error(data.error);
                    $('#categoryForm')[0].reset();
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("." + key + "_error").text(val[0]);
                    });                }
            });
        });

        /*************************************** edit categories with ajax *****************************************/
        $(document).on('click', '#updateCat', function (e) {
            e.preventDefault();
            let myForm = document.getElementById('categoryF');
            var formData = new FormData(myForm);
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('admin.categories.update')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $('.modalUpdateCat').modal('hide');
                    fetchRecords();
                    if(data.status==true)
                        toastr.success(data.success);
                    else
                        toastr.error(data.error);
                    $('#categoryForm')[0].reset();
                    $('.image').detach();
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("." + key + "_error").text(val[0]);
                    });
                }
            });
        });


        /*************************************** delete categories with ajax *****************************************/
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault();
            var id = $(this).attr('cat_id');
            $.ajax({
                type: 'POST',
                url: "{{route('admin.categories.delete')}}",
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


    </script>
@endpush
