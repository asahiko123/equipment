<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border-right: 2px solid;
                font-size: 26px;
                padding: 0 15px 0 15px;
                text-align: center;
            }

            .message {
                font-size: 18px;
                text-align: center;
            }

            .exit a{
                position: relative;
                text-decoration: none;
                display: flex;
                justify-content: space-around;
                align-items: center;
                margin: 0 auto;
                max-width: 240px;
                padding: 10px 25px;
                color: #313131;
                transition: 0.3s ease-in-out;
                font-weight: 600;
                background: #eee;
                overflow:hidden;
            }

            .exit a:before{
                position: absolute;
                top: 0;
                left: 0;
                width: 150%;
                height: 500%;
                content: "";
                -webkit-transition: all 0.5s ease-in-out;
                transition: all 0.5s ease-in-out;
                -webkit-transform: translateX(-95%) translateY(-15%) rotate(60deg);
                transform: translateX(-95%) translateY(-15%) rotate(60deg);
                background: #6bb6ff;
                opacity: 0.2;
            }

            .exit a:hover:before{
                -webkit-transform: translateX(-9%) translateY(-50%) rotate(60deg);
                transform: translateX(-9%) translateY(-50%) rotate(60deg);
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>

            <div class="exit" style="padding: 10px;">
                <a href="{{route('equipment.index')}}">戻る</a>
            </div>
        </div>
    </body>
</html>
