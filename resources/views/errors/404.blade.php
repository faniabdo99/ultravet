@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="error_section">
            <div class="container text-center">
                <h1>4 <img src="{{url('public')}}/images/pet_food_bowl.png" alt="Pet Food Bowl"> 4</h1>
                <h2>Page Not Found</h2>
                <p>The link you clicked may be broken or the page <span class="d-md-block">may have been removed</span></p>
                <a class="btn btn_primary" href="{{route('home')}}"><i class="fas fa-paw"></i> Home Page</a>
            </div>
            <ul class="social_links unorder_list_center">
                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#!"><i class="fab fa-whatsapp"></i></a></li>
            </ul>
        </section>
    </main>
    @include('layout.footer')
</div>
@include('layout.scripts')
</body>
</html>
