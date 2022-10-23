@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="auth-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">Login to UltraVet</h1>
                            <p class="text-center">Welcome back! login below</p>
                            <form class="auth-form" action="{{route('user.postLogin')}}" method="post">
                                @csrf
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_email">Email<sup>*</sup></label>
                                    <input id="input_email" type="email" name="email" placeholder="Type Your Email">
                                </div>
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_password">Password<sup>*</sup></label>
                                    <input id="input_password" type="password" name="password" placeholder="Type Your Password">
                                </div>
                                <p>Forgot your password? <a href="{{route('user.getReset')}}">Click here</a></p>
                                <button type="submit" class="btn btn_primary"><i class="fas fa-paw"></i> Login</button>
                                <div class="text-center">
                                    <p>Or you can quickly login with Google</p>
                                    <a class="btn btn-danger" href="{{route('user.socialLogin','google')}}"><i class="fab fa-google"></i> Login with Google</a>
                                </div>
                            </form>
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