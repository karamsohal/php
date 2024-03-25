<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body class="antialiased">
<ul><?php
        foreach ($items as $item){
            echo "<li>$item</li>";
        }
    ?></ul>
</body>
</html>
