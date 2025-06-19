@foreach($category_products as $category_product)
    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
        <div class="product product-7 text-center">
            <figure class="product-media">
                @php
                    $isNew = \Carbon\Carbon::parse($category_product->created_at)->gt(\Carbon\Carbon::now()->subDays(10));
                @endphp

                @if($isNew)
                    <span class="product-label label-new">New</span>
                @endif

                <a href="{{route('product.show', ['id' => $category_product->id, 'slug' => $category_product->slug])}}">
                    <img src="{{asset($category_product->thumbnail_img)}}" alt="Product image" class="product-image">
                </a>
            </figure><!-- End .product-media -->

            <div class="product-body">
                {{-- <div class="product-cat">
                    <a href="{{route('category.product', ['id' => $category_product->category_id])}}">{{$category_product->category->category_name}}</a>
                </div><!-- End .product-cat --> --}}
                <h3 class="product-title">
                    <a href="{{route('product.show', ['id' => $category_product->id, 'slug' => $category_product->slug])}}">{{$category_product->name}}</a></h3><!-- End .product-title -->
                <div class="product-price">
                    @php
                        $newPrice = $category_product->sell_price;

                        if ($category_product->discount > 0) {
                            if ($category_product->discount_type == 2) {
                                $newPrice = $category_product->sell_price - ($category_product->sell_price * ($category_product->discount / 100));
                            } else {
                                $newPrice = $category_product->sell_price - $category_product->discount;
                            }
                        }
                    @endphp
                    <span class="new-price">&#2547;{{ number_format($newPrice, 2) }}</span>

                    @if($category_product->discount > 0)
                        <span class="old-price">&#2547;{{ number_format($category_product->sell_price, 2) }}</span>
                    @endif
                </div><!-- End .product-price -->
                <div class="ratings-container">
                    <div class="ratings">
                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                    </div><!-- End .ratings -->
                    <span class="ratings-text">( 2 Reviews )</span>
                </div><!-- End .rating-container -->
            </div><!-- End .product-body -->
        </div><!-- End .product -->
    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
@endforeach
