<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <title>Klinik Taufik | Pasien Detail Rekam Medis</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900"></h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form class="mx-4 sm:mx-0">
                    <div class="space-y-12">
                        <div>
                            <div>
                                <h3 class=" text-3xl font-bold">Informasi Pasien</h3>
                            </div>

                            <div>
                                <div class="mt-3 border-t border-gray-100">
                                    <dl class="divide-y divide-gray-100">
                                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Nama</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                {{ $pasien->nama_pasien }}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                {{ $pasien->tanggal_lahir }}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Nomor Telepon</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                {{ $pasien->nomor_telepon }}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Alamat</dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                {{ $pasien->alamat }}</dd>
                                        </div>
                                        <div class="px-4 py-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Nomor Rekam Medis
                                            </dt>
                                            <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                {{ $pasien->nomor_rm }}</dd>
                                        </div>

                                        <div class="sm:col-span-4 py-3">
                                            <label for="tanggal_pemeriksaan"
                                                class="block text-sm font-medium leading-6 text-gray-900">Tanggal
                                                Pemeriksaan
                                            </label>
                                            <p class=" text-xs text-gray-600 pt-2">*tanggal/bulan/tahun</p>
                                            <div class="mt-4">
                                                <div
                                                    class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                    <input type="date" name="tanggal_pemeriksaan" disabled
                                                        value="{{ $rm->tanggal_pemeriksaan }}" id="tanggal_pemeriksaan"
                                                        autocomplete="off"
                                                        class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">

                                                </div>
                                            </div>
                                        </div>
                                    </dl>
                                </div>
                            </div>


                            <div>
                                <div>
                                    <h3 class=" text-3xl font-bold mt-28">Riwayat Kesehatan</h3>
                                </div>

                                <div>
                                    <div class="sm:col-span-4 py-3 mt-3">
                                        <label for="rk_1"
                                            class="block text-sm font-bold leading-6 text-gray-900">Riwayat Kesehatan
                                            Umum </label>
                                        <div class="col-span-full">
                                            <div class="mt-2">
                                                <p class="text-sm px-3 text-justify">{{ $rm->rk_1 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4 py-3 mt-3">
                                        <label for="rk_2"
                                            class="block text-sm font-bold leading-6 text-gray-900">Riwayat Kesehatan
                                            Gigi </label>
                                        <div class="col-span-full">
                                            <div class="mt-2">
                                                <p class="text-sm px-3 text-justify">{{ $rm->rk_2 }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div>
                                        <h3 class=" text-3xl font-bold mt-28">Riwayat Pengobatan</h3>
                                    </div>

                                    <div>
                                        <div class="sm:col-span-4 py-3 mt-3">
                                            <label for="rp_1"
                                                class="block text-sm font-bold leading-6 text-gray-900">Obat-Obatan
                                                yang Sedang Dikonsumsi Pasien</label>
                                            <div class="col-span-full">
                                                <div class="mt-2">
                                                    <p class="text-sm px-3 text-justify">{{ $rm->rp_1 }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-4 py-3 mt-3">
                                            <label for="rp_2"
                                                class="block text-sm font-bold leading-6 text-gray-900">Riwayat Alergi
                                                Obat-Obatan</label>
                                            <div class="col-span-full">
                                                <div class="mt-2">
                                                    <p class="text-sm px-3 text-justify">{{ $rm->rp_2 }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            <h3 class=" text-3xl font-bold mt-28">Pemeriksaan Fisik</h3>
                                        </div>

                                        <div>
                                            <div class="sm:col-span-4 py-3 mt-3">
                                                <label for="pf_1"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Catatan
                                                    Hasil Pemeriksaan Fisik Gigi dan Mulut</label>
                                                <div class="col-span-full">
                                                    <div class="mt-2">
                                                        <p class="text-sm px-3 text-justify">{{ $rm->pf_1 }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sm:col-span-4 py-3 mt-3">
                                                <label for="pf_2"
                                                    class="block text-sm font-bold leading-6 text-gray-900">Riwayat
                                                    Alergi
                                                    Obat-Obatan</label>
                                                <div class="col-span-full">
                                                    <div class="mt-2">
                                                        <p class="text-sm px-3 text-justify">{{ $rm->pf_2 }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div>
                                            <div>
                                                <h3 class=" text-3xl font-bold mt-28">Diagnosis</h3>
                                            </div>

                                            <div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="diagnosis"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Diagnosis</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->diagnosis }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div>
                                            <div>
                                                <h3 class=" text-3xl font-bold mt-28">Catatan Perawatan</h3>
                                            </div>

                                            <div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="cp_1"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Prosedur
                                                        Perawatan yang Telah Dilakukan Hari Ini</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->cp_1 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="cp_2"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Obat
                                                        yang Diberikan</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->cp_2 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="cp_3"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Catatan
                                                        Perawatan Hari Ini</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->cp_3 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div>
                                            <div>
                                                <h3 class=" text-3xl font-bold mt-28">Rencana Perawatan Berikutnya</h3>
                                            </div>

                                            <div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="rpb_1"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Perawatan
                                                        Selanjutnya</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->rpb_1 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="rpb_2"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Jadwal
                                                        Perawatan Selanjutnya</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->rpb_2 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pb-28">
                                            <div>
                                                <h3 class=" text-3xl font-bold mt-28">Catatan Komunikasi</h3>
                                            </div>

                                            <div>
                                                <div class="sm:col-span-4 py-3 mt-3">
                                                    <label for="ck_1"
                                                        class="block text-sm font-bold leading-6 text-gray-900">Instruksi
                                                        dan Saran yang Diberikan Untuk Pasien</label>
                                                    <div class="col-span-full">
                                                        <div class="mt-2">
                                                            <p class="text-sm px-3 text-justify">{{ $rm->ck_1 }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>
