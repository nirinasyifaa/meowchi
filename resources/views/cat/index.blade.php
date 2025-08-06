<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meowchi - Virtual Cat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #ffffff; /* Background putih */
        }
        .cat-img {
            transition: transform 0.3s ease;
        }
        .cat-img:hover {
            transform: scale(1.1) rotate(3deg);
        }
        /* Animasi wiggle */
        @keyframes wiggle {
            0% { transform: rotate(0deg); }
            25% { transform: rotate(3deg); }
            50% { transform: rotate(0deg); }
            75% { transform: rotate(-3deg); }
            100% { transform: rotate(0deg); }
        }
        .wiggle {
            animation: wiggle 0.6s ease-in-out;
        }
    </style>
</head>
<body class="p-4">
    <div class="container text-center">
        <h1>🐱 {{ $cat->name }} - Virtual Cat</h1>
        <p>🍖 Lapar: {{ $cat->hunger }} | 😺 Bahagia: {{ $cat->happiness }}</p>

        {{-- Tentukan gambar kucing --}}
        @php
            if($cat->happiness > 70) {
                $image = 'images/cats/happy.png';
            } elseif($cat->hunger > 70) {
                $image = 'images/cats/sad.png';
            } else {
                $image = 'images/cats/normal.png';
            }
        @endphp

        {{-- Gambar kucing --}}
        <img src="{{ asset($image) }}" width="220" class="mb-3 cat-img wiggle">

        <div class="d-flex justify-content-center gap-2 mt-3">
            <form action="{{ route('cat.feed') }}" method="POST">
                @csrf
                <button class="btn btn-success">🍖 Kasih Makan</button>
            </form>
            <form action="{{ route('cat.play') }}" method="POST">
                @csrf
                <button class="btn btn-warning">🎾 Ajak Main</button>
            </form>
        </div>
    </div>
</body>
</html>
