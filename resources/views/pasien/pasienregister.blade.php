<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <title>Pasien Register</title>
</head>

<body class="h-full ">
    <div class="min-h-full flex items-center justify-center">

        <main class="">
            <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto h-10 w-auto"
                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registrasi
                        Pasien
                    </h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('pasien.register') }}" method="POST">
                        @csrf
                        <div>
                            <label for="nama_pasien" class="block text-sm font-medium leading-6 text-gray-900">Nama
                                Lengkap</label>
                            <div class="mt-2">
                                <input id="nama_pasien" name="nama_pasien" type="text" autocomplete="off" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tahun
                                dan Tanggal Lahir</label>
                            <div class="mt-2">
                                <input id="tanggal_lahir" name="tanggal_lahir" type="date" autocomplete="off"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="alamat"
                                class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                            <div class="mt-2">
                                <input id="alamat" name="alamat" type="text" autocomplete="off" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="nomor_telepon" class="block text-sm font-medium leading-6 text-gray-900">Nomor
                                Telepon</label>
                            <div class="mt-2">
                                <input id="nomor_telepon" name="nomor_telepon" type="text" autocomplete="off"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div>
                            <label for="username"
                                class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="text" autocomplete="off" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password"
                                    class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                <div class="text-sm">
                                </div>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 p-3 sm:text-sm sm:leading-6">
                            </div>
                            <div class="pt-3">
                                <p class=" text-xs text-gray-500">*Username dan password akan digunakan ketika
                                    login.</p>
                            </div>

                        </div>



                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Registrasi</button>
                        </div>


                    </form>

                    <p class="mt-10 text-center text-sm text-gray-500">
                        Sudah memiliki akun?
                        <a href="/" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login
                            disini</a>
                    </p>
                </div>
            </div>
    </div>
    </main>
    </div>

</body>

</html>
