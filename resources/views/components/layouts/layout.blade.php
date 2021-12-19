<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <!--<link rel="stylesheet" href="{{asset('assets/css/all.css')}}" >-->

      <title>Contact form</title>
      
      <style>
         .required{
            color:red;
         }
      </style>
   </head>
   <body>
      <div class="body-overlay"></div>

      @include('include.header')

      @yield('content')
      
      @include('include.footer')

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>