@include('layout.header', [
    'PageTitle' => 'My Orders',
    'PageDescription' => 'View a list of your orders',
])
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">Your Orders</h1>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img dog_image"><img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_4.png" alt="Orders Background"></div>
        </section>
        <section class="product_section section_space_lg">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Total</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                            @forelse(auth()->user()->Orders as $Order)
                                <tr>
                                    <td>{{$Order->tracking_number}}</td>
                                    <td>{{$Order->total}}$</td>
                                    <td>{{$Order->address}}</td>
                                    <td>{{$Order->status}}</td>
                                    <td>{{$Order->created_at->format('Y-m-d')}}</td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layout.footer')
</div>
@include('layout.scripts')
</body>
</html>
