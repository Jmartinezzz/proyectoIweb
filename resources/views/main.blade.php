<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/ico.png') }}" />
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/pace.min.js') }}"></script>
	<script src="{{  asset('js/nicescroll.min.js') }}"></script>
	<style>
    .pace {
      -webkit-pointer-events: none;
      pointer-events: none;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    .pace-inactive {
      display: none;
    }

    .pace .pace-progress {
      background: #ffff;
      position: fixed;
      z-index: 2000;
      top: 0;
      right: 100%;
      width: 100%;
      height: 3px;
    }
    </style>
    <script>
    $(function(){
        $("body").niceScroll({
          cursorcolor:" #4f4a41 ",
          cursorwidth:"9px",
          cursorfixedheight: 200,
          cursorborder: "1px solid aquamarine",
          cursorbordercolor: "#fff",
          cursorborderradius:2
        });
    })
    </script>
</head>
<body>
	<main>
		@include('partes.nav')
		<section>
			<div class="container pt-3">
				@yield('content')
			</div>
		</section>
		@include('partes.footer')
	</main>
	
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
	
	@yield('scriptsFooter')
</body>
</html>