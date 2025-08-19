<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><x-site-name></x-site-name> - Admin Dashboard - Lock Screen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- App favicon -->
    <x-fav-icon></x-fav-icon>

    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="account-body accountbg">

    <!-- Log In page -->
    <div class="w-100 login-page ">
        <div class="row m-0 vh-100 d-flex justify-content-center">
            <div class="col-12 col-md-6 align-self-center p-0 vh-100">
                <img src="../admin/assets/images/login.png" width="100%" height="100%" class="log-img">
            </div>

            <div class="col-12 col-md-6 align-self-center p-0 vh-100"
                style="    display: flex
;
    flex-direction: column;
    width: 100%;
    justify-content: center;">
                <div class="card">
                    <div class="card-body p-0 auth-header-box">
                        <div class="text-center p-3">
                            <a class="logo logo-admin">
                                <x-logo></x-logo>
                            </a>
                            <h4 class="mt-3 mb-1 font-weight-semibold text-dark font-20"><x-site-name></x-site-name>
                                Admin Panel</h4>
                            <p class="text-dark  mb-0">Sign in to continue to <x-site-name></x-site-name>.</p>
                        </div>

                    </div><!--end card-->

                    <div class="card-body p-0">
                        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
                            <div class="tab-content">
                                <div class="alert alert-success" id="success-message" style="display: none;"></div>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger text-center" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif

                                <form method="POST" id="RequestOtpForm" action="{{ route('admin.auth.request-otp') }}"
                                    @if ($admin->id) style="display: none;" @endif>

                                    @csrf

                                    <div class="form-group col-md-12">
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password" />
                                    </div>

                                    <button type="submit" class="btn btn-primary">Request Otp</button>
                                </form>
                                <form method="POST" id="ValidateOtpForm"
                                    action="{{ route('admin.auth.validate-otp') }}"
                                    @if (!$admin->id) style="display: none;" @endif>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ encrypt($admin->id) }}" />
                                    <div class="form-group col-md-12">
                                        <p class="m-0">{{ $admin->email }} <a href="javascript:void(0)"
                                                style="color: rgb(223, 129, 68)" id="change-email">Change</a></p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="number" class="form-control" maxlength="6" name="otp"
                                            placeholder="Enter OTP" />
                                        <label style="float: right;"><a
                                                href="{{ route('admin.auth.resend-otp', [encrypt($admin->id)]) }}"
                                                class="resend-otp-btn" style="color: rgb(223, 129, 68)">Resend
                                                OTP</a></label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Verify</button>
                                </form>
                            </div>
                        </div>
                    </div><!--end card-body-->

                </div><!--end col-->
                <div class="card-body btm-text">
                    <span class="text-muted d-none d-sm-inline-block"><x-site-name></x-site-name> © {{ date('Y') }}
                        DashX. Built with passion by <a href="https://www.spiderworks.in/"
                            target="_blank">SpiderWorks.in</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
        <!-- End Log In page -->




        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>

        <script type="text/javascript">
            var validator = $('#RequestOtpForm').validate({
                ignore: [],
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Email cannot be blank",
                        email: "Enter a valid email id",
                    },
                    password: {
                        required: "Password cannot be blank",
                        // minlength: "Password must be at least 6 characters"
                    }
                },
            });

            $(function() {
                $(document).on('click', '#change-email', function() {
                    $('#RequestOtpForm').show();
                    $('#ValidateOtpForm').hide();
                })

                $(document).on('click', '.resend-otp-btn', function(event) {
                    event.preventDefault();
                    var that = $(this);
                    let url = that.attr('href');
                    that.text('Sending...').attr('href', '');
                    $.get(url, (response) => {
                        that.text('Resend OTP').attr('href', url);
                        $('#success-message').html('Otp has been sent to your email address').show();
                        $('#success-message').delay(5000).fadeOut('slow');
                    })
                })
            })
        </script>
</body>

</html>
