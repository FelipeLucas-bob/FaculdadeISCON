<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> BobDev | @yield('title')</title>

        <!-- Styles -->
        <style>
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
                background: linear-gradient(to bottom, #a8edea 0%, #fed6e3 100%);
                font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
                color: #2c3e50;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .container {
                text-align: center;
                padding: 2rem;
                max-width: 500px;
                width: 90%;
            }

            .title {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .subtitle {
                font-size: 1.25rem;
                color: #555;
                margin-bottom: 2rem;
            }

            .btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                background-color: #3490dc;
                color: #fff;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                transition: background-color 0.3s ease;
            }

            .btn:hover {
                background-color: #2779bd;
            }

            @media (max-width: 600px) {
                .title {
                    font-size: 2rem;
                }

                .subtitle {
                    font-size: 1rem;
                }

                #mini-text{
                    font-size: 10rem;
                }
            }
        </style>
    </head>
    <body>
        <div class="container">
            <img src="{{Vite::asset('resources/images/error.svg')}}" alt="avatar">

            <p class="mini-text" style="font-size: 40pt; font-weight: bold; color: #3490dc;">Ooops!</p>
            <h1 class="error-number" style="font-size: 20pt;"> @yield('code') | @yield('title') </h1>
            <p class="error-text mb-5 mt-1" style="font-size: 20pt;">@yield('message')</p>
            <a href="{{getRouterValue()}}painel" class="btn btn-dark mt-5">
                Ir para o Início
            </a>
        </div>
    </body>
</html>
