<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="refresh" content="60" /> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Election - @yield('title')</title>
  </head>
  <body class="bg-light">
    <div class="container">
        @yield('content')
    </div>
    <script>
        setInterval(function () {
            var position = document.getElementById('position').value;
            console.log(position)
            if (position === "mayor") {
                location.href = "/live/" + document.getElementById('municipality').value + "/vice-mayor"
            }
            else if (position === "vice-mayor") {
                location.href = "/live/" + document.getElementById('municipality').value + "/councilor"
            }
            else{
                location.href = "/live/" + document.getElementById('municipality').value + "/mayor"
            }
        }, 60000);
    </script>
  </body>
</html>