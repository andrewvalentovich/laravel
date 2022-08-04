<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                    <div>{{ $article->title }}</div>
                    <div>{{ $article->article_content }}</div>
                    <div>{{ $article->likes }}</div>
                @endforeach
            </div>
        </div>
    </body>
</html>
