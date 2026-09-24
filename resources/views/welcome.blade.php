<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Каталог товаров</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($products as $product)
                <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $product->title }}</h2>
                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mb-3">
                        Категория: {{ $product->category->title ?? 'Без категории' }}
                    </span>
                    <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                    <div class="text-sm text-gray-500">
                        {!! $product->full_description !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
