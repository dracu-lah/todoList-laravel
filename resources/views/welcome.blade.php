<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


</head>

<body class="antialiased">
    <div class="bg-gray-900 min-h-screen">
        <h1>Todo List</h1>
        <ul>
            @foreach ($listItems as $listItem)
            <li>
                <p>Item:{{$listItem->name}}</p>
                <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <button type="submit">Mark Complete</button>
                </form>
            </li>
            @endforeach
        </ul>
        <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <input type="text" name="listItem" placeholder="Enter Todo">

            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>