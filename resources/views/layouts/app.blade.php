<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            form {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-family: sans-serif;
                font-size: 16px;
                width: 500px;
                margin: 0 auto;
            }
            
            div {
                margin-bottom: 1em;
                width: 100%;
            }
        
            label {
                display: block;
                margin-bottom: 0.5em;
                font-weight: bold;
            }
        
            input, select, textarea {
                width: 100%;
                padding: 0.5em;
                border-radius: 5px;
                border: 1px solid #ccc;
            }
        
            textarea {
                height: 150px;
            }
        
            button[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 0.5em;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
        
            button[type=submit]:hover {
                background-color: #3e8e41;
            }
            .alert-danger {
                color: #721c24;
                background-color: #f8d7da;
                border-color: #f5c6cb;
            }
            .alert {
                position: relative;
                padding: 0.75rem 1.25rem;
                margin-bottom: 1rem;
                border: 1px solid transparent;
                border-radius: 0.25rem;
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
