<!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__content">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="table-active">
                        <th>#</th>
                        <th>{{__('product.product_name')}}</th>
                        <th>{{__('product.product_parent')}}</th>
                        <th>{{__('product.product_image')}}</th>
                        <th>{{__('product.product_price')}}</th>
                        <th>{{__('product.product_quantity')}}</th>
                        <th>{{__('product.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                        @php
                            $cat = json_decode($product->category_name);
                            $cat = (array) $cat;
                            $category = $cat[App::getLocale()];
                        @endphp

                        <tr class="kt-datatable__row">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$product->name }}</td>
                            <td>{{$category}}</td>
                            @if($product->image_path)
                                <td><img src="{{asset($product->image_path)}}" height="100px" width="100px" alt="Image Product-{{$product->name}}"></td>
                            @else
                                <td>{{__('product.no-image')}}</td>
                            @endif
                            <td>{{$product->price }}</td>
                            <td>{{$product->quantity }}</td>
                            <td nowrap="">
                                <div class="btn-group" role="group"
                                     aria-label="Basic example">
                                    <a href="" class="btn btn-outline-primary btn-min-width box-shadow-3 ml-2 mb-1" data-id="{{$product->id}}" id="editProduct">{{__('category.update')}}</a>
                                    @if($product->deleted_at == null)
                                    <a href=""
                                       class="btn btn-outline-danger btn-min-width box-shadow-3 ml-2 mb-1"  data-id="{{$product->id}}" id="delProduct">{{__('category.delete')}}</a>
                                    @else
                                    <a href=""
                                       class="btn btn-outline-warning btn-min-width box-shadow-3 ml-2 mb-1"  data-id="{{$product->id}} "id="activate">
                                            {{__('product.activate')}}
                                    </a>
                                    @endif
                                </div>

                            </td>
                        </tr>
                    @empty
                        <p></p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>



<!--end::Portlet-->


<div class="d-flex justify-content-center">
    {!! $products->render() !!}
</div>
