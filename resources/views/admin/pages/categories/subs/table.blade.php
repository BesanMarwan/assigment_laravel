<!--begin::Section-->
        <div class="kt-section">
            <div class="kt-section__content">
{{--                <table class="table table-bordered table-hover">--}}
                <table class="table table-borderless table-vertical-center">

                <thead class="bg-success">
                    <tr class="table-active">
                        <th>#</th>
                        <th>{{__('category.category_name')}}</th>
                        <th>{{__('category.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($categories as $category)

                        <tr class="kt-datatable__row">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$category->name}}</td>
                            <td nowrap="">
                                <div class="btn-group" role="group"
                                     aria-label="Basic example">
                                    <a href=""
                                       class="btn btn-primary btn-min-width box-shadow-3 ml-2 mb-1" data-id="{{$category->id}}" id="editCat">{{__('category.update')}}</a>
                                    <a href=""
                                       class="btn btn-danger btn-min-width box-shadow-3 ml-2 mb-1"  data-id="{{$category->id}}" id="delCat">{{__('category.delete')}}</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>{{__('category.uncategories')}}</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>



<!--end::Portlet-->

<div class="d-flex justify-content-center">
    {!! $categories->render() !!}
</div>
