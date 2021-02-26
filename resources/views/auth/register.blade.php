
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
      <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
        <h1 class="text-white" style="font-family: Oleo Script Swash Caps, cursive;">AWANKITA </h1>
        <p> Already have an account? please <a href="{{ route('login') }}">Sign In</a>
        </p>
      </header><!-- form -->
      <!-- <form class="auth-form"> -->
            <form class="auth-form" method="POST" action="{{ route('register') }}">
                    @csrf
                <!-- .form-group -->
                <div class="form-group row">
                <div class="col">
                <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group row">
                <div class="col">
                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <!-- <input type="text" id="inputUser" class="form-control" placeholder="Username" required=""> <label for="inputUser">Username</label> -->
                </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group row">
                <div class="col">
                        <input id="phone" type="text" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""> <label for="inputPassword">Password</label> -->
                </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group row">
                <div class="col">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""> <label for="inputPassword">Password</label> -->
                </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group row">
                <div class="col">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required=""> <label for="inputPassword">Password</label> -->
                </div>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Register') }}</button>
                </div><!-- /.form-group -->
            </form>
               
        <!-- recovery links -->
        <p class="text-center text-muted mb-0"> By creating an account you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>. </p><!-- /recovery links -->
      </form><!-- /.auth-form -->
      <!-- copyright -->
      <footer class="auth-footer"> © 2018 All Rights Reserved. </footer>
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
        particlesJS.load('auth-header', '{{asset('assets')}}/javascript/pages/particles.json');
      })
    </script> <!-- END PLUGINS JS -->
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
</html>