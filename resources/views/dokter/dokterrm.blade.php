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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Dashboard Pasien</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-dokternav></x-dokternav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Daftar Rekam Medis Pasien</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form>
                    <div class="">
                        <div class="sm:col-span-4">
                            <div class="sm:flex sm:justify-start sm:px-0 px-5">
                                <div class="py-5">
                                    <label for="" class="block text-sm font-medium leading-6 text-gray-900">Cari
                                        berdasarkan atribut</label>
                                    <label for="atribut"
                                        class="block text-sm font-medium leading-6 text-gray-900"></label>
                                    <div class="mt-2">
                                        <select id="atribut" name="atribut" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="nomor_rm">Nomor RM</option>
                                            <option value="nama">Nama</option>
                                            <option value="nomor_telepon">Nomor Telepon</option>
                                        </select>
                                    </div>

                                    <div class="mt-2 flex">
                                        <!-- Input untuk Nomor RM -->
                                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"
                                            id="searchNomorRMWrapper">
                                            <input type="search" name="searchNomorRm" id="searchNomorRm"
                                                autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900  placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Cari Nomor RM">
                                        </div>

                                        <!-- Input untuk Nama -->
                                        <div class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md hidden"
                                            id="searchNamaWrapper">
                                            <input type="search" name="searchNama" id="searchNama" autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900  placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Cari Nama">
                                        </div>

                                        <!-- Input untuk Nomor Telepon -->
                                        <div class="rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md hidden"
                                            id="searchNomorTeleponWrapper">
                                            <input type="search" name="searchNomorTelepon" id="searchNomorTelepon"
                                                autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900  placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Cari Nomor Telepon">
                                        </div>

                                        <div class="ml-3">
                                            <button type="submit"
                                                class="rounded-md bg-indigo-600 px-3 py-2  text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table
                                                class="min-w-full text-center text-sm font-light text-surface dark:text-white">
                                                <thead
                                                    class="border-b border-neutral-200 bg-gray-900 font-medium text-white dark:border-white/10">
                                                    <tr>
                                                        <th scope="col" class=" px-6 py-4">No.</th>
                                                        <th scope="col" class=" px-6 py-4">No. Rekam Medis</th>
                                                        <th scope="col" class=" px-16 py-4">Nama</th>
                                                        <th scope="col" class=" px-6 py-4">No. Telepon</th>
                                                        <th scope="col" class=" px-6 py-4">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="  text-black">
                                                    @foreach ($pasiens as $pasien)
                                                        <tr class="border-b border-neutral-200 dark:border-white/10">
                                                            <td class="whitespace-nowrap  px-6 py-4 font-medium">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td class="whitespace-nowrap  px-6 py-4">
                                                                {{ $pasien['nomor_rm'] }}</td>
                                                            <td class="whitespace-nowrap  px-6 py-4">
                                                                {{ $pasien['nama_pasien'] }}</td>
                                                            <td class="whitespace-nowrap  px-6 py-4">
                                                                {{ $pasien['nomor_telepon'] }}
                                                            </td>
                                                            <td class="whitespace-nowrap  px-6 py-4">
                                                                <a href="/dokterrmdetail/{{ $pasien->id }}">
                                                                    <button
                                                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Rekam
                                                                        Medis
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        document.getElementById('atribut').addEventListener('change', function() {
            // Sembunyikan semua input
            document.getElementById('searchNomorRMWrapper').classList.add('hidden');
            document.getElementById('searchNamaWrapper').classList.add('hidden');
            document.getElementById('searchNomorTeleponWrapper').classList.add('hidden');

            // Tampilkan input yang sesuai dengan atribut yang dipilih
            const selectedAttribute = this.value;
            if (selectedAttribute === 'nomor_rm') {
                document.getElementById('searchNomorRMWrapper').classList.remove('hidden');
            } else if (selectedAttribute === 'nama') {
                document.getElementById('searchNamaWrapper').classList.remove('hidden');
            } else if (selectedAttribute === 'nomor_telepon') {
                document.getElementById('searchNomorTeleponWrapper').classList.remove('hidden');
            }
        });

        // Inisialisasi: tampilkan input pertama saat halaman dimuat
        document.getElementById('searchNomorRMWrapper').classList.remove('hidden');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (session('message'))
            toastr.options = {
                "progressBar": true,
                "closeButton": true,


            }
            toastr.success("{{ session('message') }}", "Berhasil", {
                timeOut: 12000
            });
        @endif
    </script>


</body>

</html>
