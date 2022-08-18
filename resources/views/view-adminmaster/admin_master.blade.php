<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">





</head>
<body>
<div class="wrapper" id="app">



   <router-view></router-view>






</div>





  <script src="{{ asset('js/app.js') }}" defer></script>




	<script src="{{asset('websitehome')}}/js/jquery-1.11.1.min.js"></script>




</body>
</html>
