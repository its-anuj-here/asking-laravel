<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'asKing')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      html {
        scroll-behavior: smooth !important;
      }

      .banner_dis {
        background: url("{{ asset('storage/c4.png') }}") no-repeat rgb(17 24 39);
        background-position: 50rem 5rem;
      }

      .banner_ques {
        background: url("{{ asset('storage/c1.png') }}") no-repeat rgb(17 24 39);
        background-position: 50rem 5rem;
      }
      .card::after {
        content: "";
        position: absolute;
        top: 1.1rem;
        right: 1rem;
        width: 5rem;
        height: 5rem;
        background: url("{{ asset('storage/c1.png') }}") no-repeat center/contain;
      }

      .mycard:hover{
        border: 2px solid #ecd505;
      }

      .card:nth-child(2n):after {
        background: url("{{ asset('storage/c2.png') }}") no-repeat center/contain;
      }
      .card:nth-child(3n):after {
        background: url("{{ asset('storage/c3.png') }}") no-repeat center/contain;
      }
      .card:nth-child(4n):after {
        background: url("{{ asset('storage/c4.png') }}") no-repeat center/contain;
      }
      .card:nth-child(5n):after {
        background: url("{{ asset('storage/c5.png') }}") no-repeat center/contain;
      }
    </style>
    <script type="text/javascript" src="script.js"></script>
    
  </head>
  <body>
    @include('navbar')
    @yield('content')
    @include('footer')
  </body>
</html>
