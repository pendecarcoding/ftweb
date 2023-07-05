@extends('backend.layouts.app')

@section('content')
    @php
        //CoreComponentRepository::instantiateShopRepository();
        //CoreComponentRepository::initializeCache();
    @endphp



    <div class="card">
        <form class="" id="sort_products" action="" method="GET">
            <div class="card-header row gutters-5">
                <div class="col">
                    <h5 class="mb-md-0 h6">{{ translate('All Product') }}</h5>
                </div>


                <div class="col-md-2">
                    @if (
                        $type != 'Seller' &&
                            auth()->user()->can('add_new_product'))
                        <div class="col text-right">
                            <a href="{{ route('products.create') }}" class="btn btn-circle btn-info">
                                <span>{{ translate('Add New Product') }}</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body">
                <table id="example" class="table   dataTable no-footer">
                    <thead>
                        <tr>

                            <!-- <th>
                                                    <div class="form-group">
                                                        <div class="aiz-checkbox-inline">
                                                            <label class="aiz-checkbox">
                                                                <input type="checkbox" class="check-all">
                                                                <span class="aiz-square-check"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </th> -->

                            <th data-breakpoints="lg">#</th>

                            <th>{{ translate('Name Of Product') }}</th>
                            <th>{{ translate('Car') }}</th>
                            <th>{{ translate('Make') }}</th>
                            <th>{{ translate('Model') }}</th>

                            @if ($type == 'Seller' || $type == 'All')
                                <!-- <th data-breakpoints="lg">{{ translate('Added By') }}</th> -->
                            @endif
                            <th data-breakpoints="sm">{{ translate('Info') }}</th>
                            <!-- <th data-breakpoints="md">{{ translate('Total Stock') }}</th> -->
                            <!-- <th data-breakpoints="lg">{{ translate('Todays Deal') }}</th> -->
                            <th data-breakpoints="lg">{{ translate('Published') }}</th>
                            @if (get_setting('product_approve_by_admin') == 1 && $type == 'Seller')
                                <th data-breakpoints="lg">{{ translate('Approved') }}</th>
                            @endif
                            <!-- <th data-breakpoints="lg">{{ translate('Featured') }}</th> -->
                            <th data-breakpoints="sm" class="text-right">{{ translate('Options') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <!-- if(auth()->user()->can('product_delete')) -->
                                <!-- <td>
                                                    <div class="form-group d-inline-block">
                                                        <label class="aiz-checkbox">
                                                            <input type="checkbox" class="check-one" name="id[]" value="{{ $product->id }}">
                                                            <span class="aiz-square-check"></span>
                                                        </label>
                                                    </div>
                                                </td> -->
                                <!-- else -->
                                <td>{{ $key + 1 }}</td>
                                <!-- endif -->
                                <td>
                                    <div class="row gutters-5 w-200px w-md-300px mw-100">
                                        <div class="col-auto">
                                            <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="Image"
                                                class="size-50px img-fit">
                                        </div>
                                        <div class="col">
                                            <span
                                                class="text-muted text-truncate-2">{{ $product->getTranslation('name') }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if (getcar($product->car_id) != null)
                                        {{ getcar($product->car_id)->name }}
                                    @else
                                        Car Not Found;
                                    @endif
                                </td>
                                <td>
                                    @if (make_car($product->brand_id) != null)
                                        {{ make_car($product->brand_id)->name }}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if (car_typebyCarId($product->car_id) != null)
                                        {{ car_typebyCarId($product->car_id)->type }}
                                    @else
                                    @endif
                                </td>

                                @if ($type == 'Seller' || $type == 'All')
                                    <!-- <td>{{ optional($product->user)->name }}</td> -->
                                @endif
                                <td>
                                    <strong>{{ translate('Num of Sale') }}:</strong> {{ $product->num_of_sale }}
                                    {{ translate('times') }} </br>
                                    <strong>{{ translate('Base Price') }}:</strong>
                                    {{ single_price($product->unit_price) }} </br>
                                    <!-- <strong>{{ translate('Discount Price') }}:</strong> @if (single_price($product->unit_price) != home_discounted_price($product))
    {{ home_discounted_price($product) }}
    @endif </br> -->
                                    <!-- <strong>{{ translate('Rating') }}:</strong> {{ $product->rating }} </br> -->
                                </td>
                                <!-- <td>
                                                @php
                                                    $qty = 0;
                                                    if ($product->variant_product) {
                                                        foreach ($product->stocks as $key => $stock) {
                                                            $qty += $stock->qty;
                                                            echo $stock->variant . ' - ' . $stock->qty . '<br>';
                                                        }
                                                    } else {
                                                        //$qty = $product->current_stock;
                                                        $qty = optional($product->stocks->first())->qty;
                                                        echo $qty;
                                                    }
                                                @endphp
                                                @if ($qty <= $product->low_stock_quantity)
    <span class="badge badge-inline badge-danger">Low</span>
    @endif
                                            </td> -->
                                <!-- <td>
                                                <label class="aiz-switch aiz-switch-success mb-0">
                                                    <input onchange="update_todays_deal(this)" value="{{ $product->id }}" type="checkbox" <?php if ($product->todays_deal == 1) {
                                                        echo 'checked';
                                                    } ?> >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td> -->
                                <td>
                                    <label class="aiz-switch aiz-switch-success mb-0">
                                        <input onchange="update_published(this)" value="{{ $product->id }}"
                                            type="checkbox" <?php if ($product->published == 1) {
                                                echo 'checked';
                                            } ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                @if (get_setting('product_approve_by_admin') == 1 && $type == 'Seller')
                                    <td>
                                        <label class="aiz-switch aiz-switch-success mb-0">
                                            <input onchange="update_approved(this)" value="{{ $product->id }}"
                                                type="checkbox" <?php if ($product->approved == 1) {
                                                    echo 'checked';
                                                } ?>>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                @endif
                                <!-- <td>
                                                <label class="aiz-switch aiz-switch-success mb-0">
                                                    <input onchange="update_featured(this)" value="{{ $product->id }}" type="checkbox" <?php if ($product->featured == 1) {
                                                        echo 'checked';
                                                    } ?> >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td> -->
                                <td class="text-right">

                                    @can('product_edit')
                                        @if ($type == 'Seller')
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('products.seller.edit', ['id' => $product->id, 'lang' => env('DEFAULT_LANGUAGE')]) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                                href="{{ route('products.admin.edit', ['id' => $product->id, 'lang' => env('DEFAULT_LANGUAGE')]) }}"
                                                title="{{ translate('Edit') }}">
                                                <i class="las la-edit"></i>
                                            </a>
                                        @endif
                                    @endcan
                                    <!-- @can('product_duplicate')
        <a class="btn btn-soft-warning btn-icon btn-circle btn-sm" href="{{ route('products.duplicate', ['id' => $product->id, 'type' => $type]) }}" title="{{ translate('Duplicate') }}">
                                                                            <i class="las la-copy"></i>
                                                                        </a>
    @endcan -->
                                    @can('product_delete')
                                        <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete"
                                            data-href="{{ route('products.destroy', $product->id) }}"
                                            title="{{ translate('Delete') }}">
                                            <i class="las la-trash"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $products->appends(request()->input())->links() }}
                </div>
            </div>
        </form>
    </div>
@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function update_published(el) {
            var status = 0;
            if (el.checked) {
                var status = 1;
            }
            $.post('{{ route('products.published') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    AIZ.plugins.notify('success', '{{ translate('Change Product status successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
