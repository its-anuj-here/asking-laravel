<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Under Maintainence</title>
    <style>
        
        .blink {
            animation: blinker 0.7s linear infinite;
            color: red;
            position: fixed;
            font-size: 80px;
            padding-top: 8px;
            padding-bottom: 8px;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #444;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0.2;
            }
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () {
            $('body').css('background-image', ' url("./images/nightsky.jpg")');
            $('h1').css({'color': 'white'});
        })
    </script>
</head>
<body>
    <marquee class="blink" scrollamount="20" width="100%">
        Under Maintenance, try again later, Sorry for the inconvenience.
    </marquee>
</body>
</html>