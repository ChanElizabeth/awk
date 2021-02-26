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

    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth auth-floated">

    <!-- .auth-announcement -->
    <div id="announcement" class="auth-announcement" style="background-image: url(assets/images/illustration/img-1.png);">
            <div class="announcement-body">
            <h2 class="announcement-title"> How to Prepare for an Automated Future </h2><a href="#" class="btn btn-warning"><i class="fa fa-fw fa-angle-right"></i> Check Out Now</a>
            </div>
      </div><!-- /.auth-announcement -->
      <!-- form -->
      <form class="auth-form" method="POST" action="{{ route('login') }}">
      @csrf

        <div class="mb-5">
          <div class="mb-3">
            <!-- <img class="rounded" src="{{asset('assets')}}/apple-touch-icon.png" alt="" height="72"> -->
            <h1 class="text-black" style="font-family: Oleo Script Swash Caps, cursive;">Awankita </h1>
          </div>
          <h1 class="h3"> Sign In </h1>
        </div>
        <p class="text-left mb-4"> Don't have a account? <a href="{{ route('register')}}">Create One</a>
        </p><!-- .form-group -->
        <div class="form-group mb-4">
          <!-- <label class="d-block text-left" for="inputUser">Username</label> <input type="text" id="inputUser" class="form-control form-control-lg" required="" autofocus=""> -->
          <label class="d-block text-left" for="phone">Phone</label>
          <input id="phone" type="text" placeholder="Phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
            @enderror
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group mb-4">
          <!-- <label class="d-block text-left" for="inputPassword">Password</label> <input type="password" id="inputPassword" class="form-control form-control-lg" required=""> -->
          <label class="d-block text-left" for="password">Password</label>
          <input id="password" type="password" placeholder="Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group mb-4">
          <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button> -->
          <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">

          <!-- <div class="form-check"> -->
            <div class="custom-control custom-control-inline custom-checkbox">

              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old("remember") ? "checked" : "" }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>   
          <!-- </div> -->
            <!-- <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
          </div> -->
        </div><!-- /.form-group -->
        <!-- recovery links -->
        <p class="py-2">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
         </p><!-- /recovery links -->
        <!-- copyright -->
        <p class="mb-0 px-3 text-muted text-center"> © 2018 All Rights Reserved. Loper is Responsive Admin Theme build on top of latest Bootstrap 4. <a href="#">Privacy</a> and <a href="#">Terms</a>
        </p>
      </form><!-- /.auth-form -->
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
      $(document).on('theme:load', () =>
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
