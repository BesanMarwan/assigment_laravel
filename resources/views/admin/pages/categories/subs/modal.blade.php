<!--begin::Modal-->
<div class="modal modalCat fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('category.add_category')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="categoryForm" class="kt-form">
                    @csrf
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">{{__('category.category_name_ar')}}<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name">
                        <small class="name_error form-text text-danger"></small>

                    </div>

                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">{{__('category.category_name_en')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name_en" name="name_en">
                                <small class="name_en_error form-text text-danger"></small>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="submit btn btn-primary" id="">{{__('category.save')}}</button>
                <button type="button" class=" btn btn-danger" id="close" data-dismiss="modal">{{__('category.close')}}</button>

            </div>
        </div>
    </div>
</div>

<!--end::Modal-->
