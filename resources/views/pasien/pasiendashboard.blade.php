<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <title>Dashboard Pasien</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Formulir Pendaftaran Perjanjian Klinik</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form class="px-3" action="{{ route('pasien.pasientambahperjanjian') }}" method="post">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                {{-- input ID pasien --}}
                                <div class="sm:col-span-4 hidden">
                                    <label for="pasien_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">ID</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="pasien_id" id="pasien_id"
                                                value={{ Auth::guard('pasien')->user()->id }} autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- input ID dokter --}}
                                <div class="sm:col-span-4 hidden">
                                    <label for="dokter_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">ID</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="dokter_id" id="dokter_id" value=""
                                                autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- input Nama Pasien --}}
                                <div class="sm:col-span-4">
                                    <label for="nama_pasien"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nama</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input disabled type="text" name="nama_pasien" id="nama_pasien"
                                                value={{ Auth::guard('pasien')->user()->nama_pasien }}
                                                autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- input No RM --}}
                                <div class="sm:col-span-4">
                                    <label for="no_rm" class="block text-sm font-medium leading-6 text-gray-900">No.
                                        Rekam Medis</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input disabled type="text" name="no_rm" id="no_rm"
                                                value={{ Auth::guard('pasien')->user()->nomor_rm }} autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                <!-- Dropdown untuk Jadwal -->
                                <div class="sm:col-span-3">
                                    <label for="country"
                                        class="block text-sm font-medium leading-6 text-gray-900">Jadwal
                                        Perjanjian Tersedia</label>
                                    <div class="mt-2">
                                        <select id="jadwal_id" name="jadwal_id" autocomplete="off" required
                                            class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @php
                                                use Carbon\Carbon;
                                            @endphp
                                            @foreach ($jadwals as $jadwal)
                                                @if ($jadwal->status_aktif == 1 && !$jadwal->pasien_limit)
                                                    @php
                                                        $tanggal = Carbon::parse($jadwal['tanggal'])
                                                            ->locale('id')
                                                            ->translatedFormat('l, j F Y');
                                                    @endphp
                                                    <option value="{{ $jadwal->id }}"
                                                        data-dokter="{{ $jadwal->dokter->id }}">
                                                        {{ $tanggal }} |
                                                        {{ \Carbon\Carbon::parse($jadwal['jam_mulai'])->format('H:i') }}
                                                        -
                                                        {{ \Carbon\Carbon::parse($jadwal['jam_selesai'])->format('H:i') }}
                                                        |
                                                        {{ $jadwal->dokter->nama_dokter }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat
                                Perjanjian</button>
                        </div>
                </form>
            </div>
        </main>
    </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen select jadwal
        const jadwalSelect = document.getElementById('jadwal_id');
        // Ambil elemen input dokter_id
        const dokterInput = document.getElementById('dokter_id');

        // Tambahkan event listener untuk perubahan pada select jadwal
        jadwalSelect.addEventListener('change', function() {
            // Ambil dokter_id dari atribut data-dokter option yang dipilih
            const selectedOption = jadwalSelect.options[jadwalSelect.selectedIndex];
            const dokterId = selectedOption.getAttribute('data-dokter');

            // Set nilai dokter_id pada input hidden
            dokterInput.value = dokterId;
            pasienInput.value = pasienId
        });
    });
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

<script>
    @if (session('error'))
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{ session('error') }}", "Gagal", {
            timeOut: 12000
        });
    @endif
</script>

</html>
