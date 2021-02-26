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
      <header id="auth-header" class="auth-header" style="background-image: url({{asset('assets')}}/images/illustration/img-1.png);">
        <h1 class="text-white" style="font-family: Oleo Script Swash Caps, cursive;">AWANKITA </h1>
        <p> Don't have a account? <a href="{{ route('register')}}">Create One</a>
        </p>
      </header><!-- form -->
      <!-- <form class="auth-form"> -->
      <form class="auth-form" method="POST" action="{{ route('login') }}">
        @csrf
        <!-- .form-group -->
        <div class="form-group row">
          <!-- <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label> -->

          <div class="col text-md-right">

          <!-- <div class="form-label-group"> -->
            <!-- <input type="text" id="inputUser" class="form-control" placeholder="Username" autofocus=""> <label for="inputUser">Username</label> -->
            <input id="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
        </div><!-- /.form-group -->

        <!-- .form-group -->
        <div class="form-group row">
          <!-- <div class="form-label-group"> -->
          <div class="col text-md-right">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password"> <label for="inputPassword">Password</label> -->
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
        <!-- <form method="POST" action="{{ route('login') }}">
                        @csrf -->
          <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
          <!-- <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
          </div> -->
          <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
          </div>
        </div><!-- /.form-group -->
        <!-- recovery links -->
        <div class="text-center pt-3">
          @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
          <!-- <a href="auth-recovery-username.html" class="link">Forgot Username?</a> <span class="mx-2">·</span> <a href="auth-recovery-password.html" class="link">Forgot Password?</a> -->
        </div><!-- /recovery links -->
      </form><!-- /.auth-form -->
      <!-- copyright -->
      <footer class="auth-footer"> © 2018 All Rights Reserved. <a href="#">Privacy</a> and <a href="#">Terms</a>
      </footer>
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="{{asset('assets')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('assets')}}/vendor/popper/popper.min.js"></script>
    <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{asset('assets')}}/vendor/particles.js/particles.js"></script>
    <script>
      /**
       * Keep in mind that your scripts may not always be executed after the theme is completely ready,
       * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
       */
      $(document).on('theme:init', () =>
      {
        /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
        particlesJS.load('auth-header', "{{asset('assets')}}/javascript/pages/particles.json");
      })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="{{asset('assets')}}/javascript/theme.js"></script> <!-- END THEME JS -->
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
