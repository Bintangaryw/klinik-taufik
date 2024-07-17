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
        <x-dokternav></x-dokternav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Formulir Input Jadwal Baru</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <form class="px-3" action="{{ route('dokter.tambahjadwal') }}" method="post">
                    @csrf
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                {{-- input dokter_id --}}
                                <div class="sm:col-span-4 hidden">
                                    <label for="dokter_id"
                                        class="block text-sm font-medium leading-6 text-gray-900">Dokter ID</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="text" name="dokter_id" id="dokter_id" autocomplete="off"
                                                value={{ Auth::guard('dokter')->user()->id }}
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- input tanggal --}}
                                <div class="sm:col-span-4">
                                    <label for="tanggal"
                                        class="block text-sm font-medium leading-6 text-gray-900">Tanggal</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="date" name="tanggal" id="tanggal" autocomplete="off"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- input jam mulai --}}
                                <div class="sm:col-span-3">
                                    <label for="jam_mulai" class="block text-sm font-medium leading-6 text-gray-900">Jam
                                        Mulai</label>
                                    <div class="mt-2">
                                        <input type="time" name="jam_mulai" id="jam_mulai" autocomplete="off"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="jam_selesai"
                                        class="block text-sm font-medium leading-6 text-gray-900">Jam
                                        Selesai</label>
                                    <div class="mt-2">
                                        <input type="time" name="jam_selesai" id="jam_selesai" autocomplete="off"
                                            class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                {{-- input status aktif --}}
                                <div class="sm:col-span-3">
                                    <label for="status_aktif"
                                        class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                    <div class="mt-2">
                                        <select id="status_aktif" name="status_aktif" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak aktif</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- input status aktif --}}
                                <div class="sm:col-span-3">
                                    <label for="pasien_maksimum"
                                        class="block text-sm font-medium leading-6 text-gray-900">Maksimal Kuota
                                        Pasien</label>
                                    <div class="mt-2">
                                        <input type="number" name="pasien_maksimum" id="pasien_maksimum"
                                            autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 pl-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buat
                                Jadwal Baru
                            </button>
                        </div>
                </form>
            </div>
        </main>
    </div>
</body>

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
