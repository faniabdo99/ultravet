@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="auth-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">Signup to UltraVet</h1>
                            <p class="text-center">Welcome to UltraVet, Signup for exclusive deals and discounts!</p>
                            <form class="auth-form" action="{{route('user.postSignup')}}" method="post">
                                @csrf
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_name">Name<sup>*</sup></label> 
                                    <input id="input_name" type="text" name="name" placeholder="Type Your Name">
                                </div>
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_email">Email<sup>*</sup></label>
                                    <input id="input_email" type="email" name="email" placeholder="Type Your Email">
                                </div>
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_password">Password<sup>*</sup></label>
                                    <input id="input_password" type="password" name="password" placeholder="Type Your Password">
                                </div>
                                <button type="submit" class="btn btn_primary"><i class="fas fa-paw"></i> Signup</button>
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