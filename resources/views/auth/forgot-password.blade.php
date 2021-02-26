    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets')}}/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{asset('assets')}}/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{asset('assets')}}/vendor/font-awesome/css/fontawesome-all.min.css"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="{{asset('assets')}}/stylesheets/custom.css">
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add loading class to html immediately
      document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
  </head>
  <body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <!-- form -->
        <form class="auth-form auth-form-reflow" method="POST" action="{{ route('password.request') }}">
        @csrf

            <div class="text-center mb-4">
            <div class="mb-4">
                <img class="rounded" src="{{asset('assets')}}/apple-touch-icon.png" alt="" height="72">
            </div>
            <h1 class="h3"> Reset Your Password </h1>
            </div>
            <p class="mb-4"> Tempora iusto officia magnam fugiat sequi aliquam cum consectetur aperiam beatae, rerum obcaecati ea. </p><!-- .form-group -->
            <div class="form-group mb-4">
            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label> -->

            <label class="d-block text-left" for="email">{{ __('Email') }}</label> 
            <p class="text-muted">
                <!-- <small>We'll send password reset link to your email.</small> -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </p>
            </div><!-- /.form-group -->
            <!-- actions -->
            <div class="d-block d-md-inline-block mb-2">
            <button class="btn btn-lg btn-block btn-primary" type="submit"> {{ __('Submit') }} </button>
            </div>
            <div class="d-block d-md-inline-block">
            <a href="{{ route('login') }}" class="btn btn-block btn-light">Return to signin</a>
            </div>
        </form><!-- /.auth-form -->
      <footer class="auth-footer mt-5"> © 2018 All Rights Reserved. Loper is Responsive Admin Theme build on top of latest Bootstrap 4. <a href="#">Privacy</a> and <a href="#">Terms</a>
      </footer>
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/popper/popper.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{asset('assets')}}/javascript/theme.min.js"></script> <!-- END THEME JS -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116692175-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-116692175-1');
    </script>
  </body>
