<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cocktail List</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
  <div class="container">
    <h1>Cocktail List</h1>
    @yield('content')
  </div>

  <div class="embed-design">
    {{-- <iframe style="border: 1px solid rgba(0, 0, 0, 0.1); width: 100%; height: 1000px; margin-top: 200px" src="https://www.figma.com/embed?embed_host=share&url=https%3A%2F%2Fwww.figma.com%2Ffile%2FjuMuBJCpbfRBbXOz9S5Lt1%2FUntitled%3Fnode-id%3D1%253A2" allowfullscreen></iframe> --}}
  </div>
</body>
</html>