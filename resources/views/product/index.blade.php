@include('layout.header', [
    'PageTitle' => 'Products',
    'PageDescription' => 'Shop all of your pets needs in one place!',
])
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">Shop</h1>
                        <p class="page_description mb-0">Shop all of your pets needs in one place!</p>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img dog_image"><img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_4.png" alt="Ultravet products"></div>
        </section>
        <section class="product_section section_space_lg">
            <div class="container">
                <div class="row">
                    @include('product.filters-sidebar')
                    <div class="col col-lg-9">
                        <div class="row">
                            @forelse($AllProducts as $Product)
                                <x-product-card :product="$Product"></x-product-card>
                            @empty
                                <p>There are no products to show at the moment</p>
                            @endforelse
                        </div>
                        {{ $AllProducts->appends(request()->query())->links('vendor.pagination.default')  }}
                    </div>

                </div>
            </div>
        </section>
    </main>
    @include('layout.footer')
</div>
@include('layout.scripts')
<script>
    inputNumber($(".input_number")), $("#slider-range").length && ($("#slider-range").slider({
        range: !0,
        min: {{$NonPaginatedProducts->min('price') ?? 0}},
        max: {{$NonPaginatedProducts->max('price') ?? 0}},
        values: [{{$NonPaginatedProducts->min('price') ?? 0}}, {{$NonPaginatedProducts->max('price') ?? 0}}],
        slide: function (o, e) {
            $("#amount").val("$" + e.values[0] + " - $" + e.values[1])
        }
    }), $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1))),
        $(".ar_top").on("click", function () {
            var o = $(this).next().attr("id"),
                o = document.getElementById(o),
                e = o.value;
            if ($(".proceed_to_checkout .update-cart").removeAttr("disabled"), isNaN(e)) return !1;
            o.value++
        })
</script>
</body>
</html>
