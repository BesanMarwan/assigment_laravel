<!--begin::Modal-->
<div class="modal modalUpdateProduct fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('product.update_product')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
            </div>
            <div class="modal-body">
                <form method="POST" id="productF" class="kt-form" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" class="id" name="id" value="">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">{{__('product.product_name_ar')}}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control name" id="" name="name">


                            </div>
                        </div>

                        <div class=" col-md-6 form-group mt-2">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_name_en')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control name_en" id="" name="name_en">

                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_description_ar')}}</label>
                            <textarea class="form-control description" id="" name="description" row="5" id="message-text"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_description_en')}}</label>
                            <textarea class="form-control description_en" id="" name="description_en" row="5" id="message-text"></textarea>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.product_image')}}</label>
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="message-text" class="form-control-label">{{__('product.category')}}</label>
                            <select class="form-control" name="category">
                                <option value="">{{__('category.no_category')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" class="category{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" col-md-6 form-group ">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_price')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control price" id="" name="price">

                        </div>

                        <div class=" col-md-6 form-group ">
                            <label for="recipient-name" class="form-control-label">{{__('product.product_quantity')}}<span class="text-danger">*</span></label>
                            <input type="text" class="form-control qty" id="" name="qty">
                        </div>
                    </div>
                </form>
            </div>

        <div class="modal-footer">
                <button type="button" class="close btn btn-secondary" data-dismiss="modal">{{__('product.close')}}</button>
                <button type="button" class="submit btn btn-primary" id="">{{__('product.update')}}</button>
            </div>
        </div>
    </div>
</div></div>
<!--end::Modal-->
