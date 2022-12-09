@include('layout.header', [
    'PageTitle' => 'Reset Your Password',
    'PageDescription' => 'Enter your email below and we will send you a reset link!',
])
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="auth-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">Reset Your Password</h1>
                            <p class="text-center">Enter your email below and we will send you a reset link!</p>
                            <form class="auth-form" action="{{route('user.postReset')}}" method="post">
                                @csrf
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_email">Email<sup>*</sup></label>
                                    <input id="input_email" type="email" name="email" placeholder="Type Your Email">
                                </div>
                                <button type="submit" class="btn btn_primary"><i class="fas fa-paw"></i> Send Reset Link</button>
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
