@include('layout.header')
<!-- <div id="main">
    <section id="basic-vertical-layouts">
        <div class="row match-height mt-5">
            <div class="col-md-6 mx-auto col-12 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Register akun</h4>
                    </div>
                    <form action="loginAuth" method="post">
                        @csrf
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-vertical">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="first-name-icon">Username</label>
                                                    <div class="position-relative">
                                                        <input class="form-control" type="text" name="username" placeholder="Username" id="first-name-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group has-icon-left">
                                                    <label for="email-id-icon">Password</label>
                                                    <div class="position-relative">
                                                        <input class="form-control" type="password" name="password" placeholder="password" id="password-id-icon">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-lock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <div class="col-2 mr-1">
                                                    <a href="register" class="btn btn-success">Registrasi</a>
                                                </div>
                                                <div class="col-2 ml-1">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div> -->
<div class="container col-lg-3 col-12">
    <div class="row mx-auto mt-5 shadow-lg rounded-3">
        <div class="col mt-3">
            <h2 class="auth-title text-center">Login</h2>
            <p class="auth-subtitle mb-5  text-center">
                Log in with your data that you entered during registration.
            </p>
            <form action="index.html">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Username" />
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Password" />
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <!-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> -->
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                    Log in
                </button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p>
                    <a href="{{asset('assets')}}/auth-register.html" class="font-bold">Sign up / </a>
                    <a class="font-bold" href="{{asset('assets')}}/auth-forgot-password.html">Forgot password?</a>
                </p>
            </div>
        </div>

    </div>
</div>
@include('layout.footer')