<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <title>Klinik Taufik | Admin Buat Perjanjian Baru</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-adminnav></x-adminnav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Buat Perjanjian Baru</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form class="px-3" action="{{ route('perjanjian.submit') }}" method="post">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <!-- Nama Pasien -->
                                <div class="sm:col-span-4">
                                    <label for="nama_pasien"
                                        class="block text-sm font-medium leading-6 text-gray-900">Nama Pasien</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="nama_pasien" id="nama_pasien"
                                            autocomplete="nama_pasien"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            value="{{ $pasien->nama_pasien }}">
                                    </div>
                                </div>

                                <!-- No RM Pasien -->
                                <div class="sm:col-span-4">
                                    <label for="nomor_rm" class="block text-sm font-medium leading-6 text-gray-900">No
                                        RM Pasien</label>
                                    <div class="mt-2">
                                        <input disabled type="text" name="nomor_rm" id="nomor_rm"
                                            autocomplete="nomor_rm"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                            value="{{ $pasien->nomor_rm }}">
                                    </div>
                                </div>
                                <!-- Dropdown untuk Jadwal -->
                                <div class="sm:col-span-3">
                                    <label for="country"
                                        class="block text-sm font-medium leading-6 text-gray-900">Jadwal
                                        Perjanjian Tersedia</label>
                                    <div class="mt-2">
                                        <select id="jadwal_id" name="jadwal_id" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
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

                                <!-- Hidden input untuk Dokter ID -->
                                <input type="hidden" name="dokter_id" id="dokter_id" value="">
                                <!-- Hidden input untuk Pasien ID -->
                                <input type="hidden" name="pasien_id" id="pasien_id" value="{{ $pasien->id }}">
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat
                                Perjanjian</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>

</body>

</html>

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
