<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Klinik Taufik | Pasien Artikel</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>
        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    Artikel
                </h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="mt-6 flex items-center justify-between gap-x-6">
                    <div class="sm:col-span-4">
                        <div class="mt-2">
                            <article>
                                @foreach ($artikels as $artikel)
                                    <div class="pb-8 pt-4 px-3 border-b-2 ">
                                        <a href="/pasienartikel/{{ $artikel['id'] }}">
                                            <h1 class=" text-2xl font-bold">{{ $artikel['judul'] }}</h1>
                                        </a>
                                        <p class=" text-sm text-gray-500 pb-2">{{ $artikel['penulis'] }} | 1 Januari
                                            2024</p>
                                        <p class="pb-2">{{ Str::limit($artikel['isi'], 150) }}</p>
                                        <a href="/pasienartikel/{{ $artikel['id'] }}" class=" hover:underline">Baca
                                            selengkapnya &rarr;</a>
                                    </div>
                                @endforeach
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
