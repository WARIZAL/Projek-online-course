@include('layout.header')
<div class="container col-lg-3 col-12">
    <div class="row mx-auto mt-5 shadow-lg rounded-3">
        <div class="col mt-3">
            <h2 class="auth-title text-center">Login</h2>
            <p class="auth-subtitle mb-5  text-center">
                Log in with your data that you entered during registration.
            </p>
            <form action="loginAuth" method="POST">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" name="username" placeholder="Username" />
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" />
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
                    <a href="register" class="font-bold">Sign up / </a>
                    <a class="font-bold" href="#">Forgot password?</a>
                </p>
            </div>
        </div>

    </div>
</div>
@include('layout.footer')