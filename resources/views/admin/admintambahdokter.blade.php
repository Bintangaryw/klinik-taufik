<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <title>Klinik Taufik | Admin Registrasi Dokter</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-adminnav></x-adminnav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Buat Akun Dokter Baru</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form action="{{ route('dokter.submit') }}" method="post" class="mx-3 sm:mx-0">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    <label for="nama_dokter"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nama
                                        Dokter</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="nama_dokter" id="nama_dokter" autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="email"
                                        class="block text-sm font-medium leading-6 text-gray-900">Email Dokter</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="email" name="email" id="email" autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="nomor_telepon_dokter"
                                        class="block text-sm font-medium leading-6 text-gray-900">No.
                                        Telepon</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="nomor_telepon_dokter" id="nomor_telepon_dokter"
                                                autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-4">
                                    <label for="password"
                                        class="block text-sm font-medium leading-6 text-gray-900">Password
                                    </label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="password" name="password" id="password" autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat
                                    Akun
                                </button>
                            </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>
