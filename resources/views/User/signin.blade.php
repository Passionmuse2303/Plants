<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Evara - eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/user/imgs/theme/favicon.svg">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/assets/user/css/main.css?v=3.4">
</head>

<body>
    <main class="main">

        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <div class="row">
                            <!-- logo -->
                            <div class="aside-top text-center">
                                <a href="#" class="brand-wrap">
                                    <img src="/assets/user/imgs/theme/logo.png" class="logo" alt="Evara Dashboard">
                                </a>

                            </div>

                            <div class="heading_s1 my-5">
                                <h2 style="color: #292D32; font-size: 22px;">Welcome User!</h2>
                                <p class="mt-3" style="color: #5F5F5F;">Enter your Email address and Password and enjoy
                                    our app</p>
                            </div>


                            <div class="col-lg-12 mt-5">
                                <div
                                    class="login_wrap widget-taber-content background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">

                                        <form method="POST" action="/user/authenticate">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Your Email">
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password"
                                                    placeholder="Password">
                                            </div>
                                            <div class="login_footer form-group">
                                                <div class="chek-form">

                                                </div>
                                                <a class="" style="color: #50C878;" href="#">Forgot password?</a>
                                            </div>
                                            <div class="form-group submit">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up"
                                                    name="login">Log in
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @if(Session::has('login_flash_error'))
    <script>
    alert('The Email or the password is invalid. Please try again.');
    </script>
    @elseif(Session::has('validation_flash_error'))
    @php
    $error = $errors->all();
    @endphp
    <script>
    var errors = @json($error);
    if (errors.length > 0) {
        alert('Validation Error!\n' + errors.join('\n'));
    }
    </script>
    @endif

    <!-- Essential Vendor JS -->
    <script src="/assets/user/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/user/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Template JS -->
    <script src="/assets/user/js/main.js?v=3.4"></script>
</body>

</html>