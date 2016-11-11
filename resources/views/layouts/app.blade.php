 <!DOCTYPE html>
<html lang="en">
	<head>
  		
  		<title>Articulus</title>
  		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	  	<meta name="csrf-token" content="{{ csrf_token() }}">
    
	     <!--Import Google Icon Font-->
      	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}" media="screen,projection"/>
      	<link rel="stylesheet" type="text/css" href="{{ asset('css/full_site.css') }}">

		@yield('css')

	</head>
	<body>

<!-- facebook plugin integrate -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <div>
      <!-- Dropdown Structure -->
  		<ul id="dropdown1" class="dropdown-content">
          <li><a href="{{ url('/rules') }}">Rules</a></li>
  	  		<li><a href="{{ url('auth/logout') }}">Logout</a></li>
  		</ul>
      <ul id="dropdown2" class="dropdown-content">
        @foreach($categories as $category)
          <li>
            <a href="/category/{{$category->category_id}}" ref="">
              {{ $category->category_name }}
            </a>
          </li>
        @endforeach
      </ul>
  	    <nav class="white">
      		<div class="nav-wrapper container">
        			<a href="{{ url('/') }}" class="brand-logo black-text"><img src="{{ asset('img/logo1.png') }}"></a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        			
              <ul class="right hide-on-med-and-down">
                @if (!(Auth::check()))
                  <li><a class="nav-menu green-text" href="/auth/google">Sign in/Sign up</a></li>
                @else
                  <!-- Dropdown Trigger -->
        				  <li><a class="black-text" href="#!">{{ Auth::user()->username }}</a></li>
                @endif
                <li><a href="{{ url('/') }}" class="black-text">Home</a></li>
                @if (!(Auth::check()))
                  <li><a class="nav-menu black-text" href="{{ url('/rules') }}">Rules</a></li>
                @endif
                <li><a href="{{ url('/rules') }}" class="black-text">Rules</a></li>
                <li><a href="{{ url('/leaderboard') }}" class="black-text">Leaderboard</a></li>
                <li><a href="#!" class="dropdown-button black-text" data-activates="dropdown2">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Authentication Links -->
                <li><a href="{{ url('auth/logout') }}" class="black-text">Logout</a></li>
        			</ul>
              
              <ul id="mobile-demo" class="side-nav">
                @if (!(Auth::check()))
                  <li><a class="nav-menu green-text" href="/auth/google">Sign in/Sign up</a></li>
                @else
                  <!-- Dropdown Trigger -->
                  <li><a class="black-text" href="#!">{{ Auth::user()->username }}</a></li>
                @endif
                <li><a href="{{ url('/') }}" class="black-text">Home</a></li>
                @if (!(Auth::check()))
                  <li><a class="nav-menu black-text" href="{{ url('/rules') }}">Rules</a></li>
                @endif
                <li><a href="{{ url('/rules') }}" class="black-text">Rules</a></li>
                <li><a href="{{ url('/leaderboard') }}" class="black-text">Leaderboard</a></li>
                <li><a href="#!" class="dropdown-button black-text" data-activates="dropdown2">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
                <!-- Authentication Links -->
                <li><a href="{{ url('auth/logout') }}" class="black-text">Logout</a></li>
              </ul>
              
      		</div>
    		</nav>
      </div>


	    <div class="container">
        
        @yield('content')

      </div>

      <footer class="page-footer green darken-1">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <br>
                <h4 class="white-text">Other Links</h4>
                <ul>
                  <li><a href="http://gdgjss.in" class="white-text">GDG Website</a></li>
                </ul>
              </div>
              <div class="col l4 offset-l2 s12">
                &nbsp;
                <h4 class="center white-text">Categories</h4>
                <div class="collection">
                  @foreach($categories as $category)
                    <a href="/category/{{$category->category_id}}" class="collection-item" ref=""><span class="badge">{{ $category->article_count }}</span>{{ $category->category_name }}</a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="footer-copyright  green darken-2">
            <div class="container">
            <span class="">© GDG JSS Noida</span>
            <img src="{{ asset('img/gdg_logo.png') }}" class="right">
            </div>
          </div>
        </footer>

	    <!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="{{ asset('js/materialize.min.js') }}"></script>
      	<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	    @yield('js')
	</body>
</html>
