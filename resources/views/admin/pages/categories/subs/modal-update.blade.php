<!--begin::Modal-->
<div class="modal modalUpdateCat fade" id="modalUpdateCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">{{__('category.update_category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="categoryForm kt-form" id="categoryF">
                    @csrf
                    <input type="hidden" class="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">{{__('category.category_name_ar')}}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control name" id="" name="name">
                        <small class="name_error form-text text-danger"></small>

                    </div>

                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">{{__('category.category_name_en')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control name_en" id="" name="name_en">
                                <small class="name_en_error form-text text-danger"></small>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="submit btn btn-primary" id="">{{__('category.update')}}</button>
                <button type="button" class=" btn btn-danger" id="close" data-dismiss="modal">{{__('category.close')}}</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
