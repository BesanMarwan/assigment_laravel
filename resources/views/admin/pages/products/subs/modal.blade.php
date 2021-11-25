<!--begin::Modal-->
<div class="modal modalProduct fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('product.add_product')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
            </div>
            <div class="modal-body">
                <form method="POST" id="productForm" class="kt-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">{{__('product.product_name_ar')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name">
                                <small class="name_error form-text text-danger"></small>
                            </div>
                        </div>

                        <div class=" col-md-6 form-group mt-2">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_name_en')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name_en" name="name_en">
                            <small class="name_en_error form-text text-danger"></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_description_ar')}}</label>
                            <textarea class="form-control" id="description" name="description" row="5" id="message-text"></textarea>
                            <small class="description_error form-text text-danger"></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_description_en')}}</label>
                            <textarea class="form-control" id="description_en" name="description_en" row="5" id="message-text"></textarea>
                            <small class="description_en_error form-text text-danger"></small>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_image')}}</label>
                            <input type="file" class="form-control" name="file">
                            <small class="file_error form-text text-danger"></small>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.category')}}</label>
                            <select class="form-control " name="category">
                                <option value="">{{__('category.no_category')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" id="category{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            <small class="category_error form-text text-danger"></small>
                        </div>
                        <div class=" col-md-6 form-group ">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_price')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="price" name="price">
                            <small class="price_error form-text text-danger"></small>
                        </div>

                        <div class=" col-md-6 form-group ">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_quantity')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control " id="qty" name="qty">
                            <small class="qty_error form-text text-danger"></small>
                        </div>
                    </div>
                </form>
            </div>

        <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="submit btn btn-primary" id="">save</button>
            </div>
        </div>
    </div>
</div></div>
<!--end::Modal-->
