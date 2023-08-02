<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">
    <div class="bg-gray-900 min-h-screen flex flex-col justify-center items-center ">
        <h1 class="text-blue-200 font-semibold text-3xl pb-6">Todo List</h1>

        <form method="post" action="{{ route('saveItem') }}" accept-charset="UTF-8">
            {{ csrf_field() }}
            <input autocomplete="off" type="text" name="listItem" placeholder="Enter Todo" class="rounded-lg p-2 outline-none">

            <button type="submit" class="bg-gray-600 p-2 rounded-lg text-white">MakeTodo</button>
        </form>
        <ul>
            @foreach ($listItems as $listItem)
            <li class="flex  justify-start items-center p-2 gap-x-4 ">
                <p class="text-xl text-white">Item:{{$listItem->name}}</p>
                <form method="post" action="{{ route('markComplete', $listItem->id) }}" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <button type="submit" class="text-white bg-sky-900 p-2">Mark Complete</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>