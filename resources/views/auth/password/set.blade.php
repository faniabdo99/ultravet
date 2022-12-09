@include('layout.header', [
    'PageTitle' => 'Set New Password',
    'PageDescription' => 'Enter the new password you want to use in your account',
])
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="auth-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center">Set New Password</h1>
                            <p class="text-center">Enter the new password you want to use in your account</p>
                            <form class="auth-form" action="{{route('user.postSetPassword',[$TheUser->id, md5($TheUser->id)])}}" method="POST">
                                @csrf
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_password">Email<sup>*</sup></label>
                                    <input id="input_password" type="password" name="password" placeholder="Type Your Password">
                                </div>
                                <div class="form_item mb-4">
                                    <label class="input_title" for="input_password_confirmation">Email<sup>*</sup></label>
                                    <input id="input_password_confirmation" type="password" name="password_confirmation" placeholder="Type Your Password (Again)">
                                </div>
                                <button type="submit" class="btn btn_primary"><i class="fas fa-paw"></i> Update Password</button>
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
