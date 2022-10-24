<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" >
        <script src="{{ mix('js/app.js') }}" defer></script>

        <title>Blood Donation</title>


        
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="navbar-brand">Blood Donation Charity</a>
            <form class="form-inline">              
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
          </nav>
        <div class="container-fluid">
            <h1>Welcome!</h1>
        </div>
        
    </body>
</html>
