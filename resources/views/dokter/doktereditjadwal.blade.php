<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Edit Jadwal</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-dokternav></x-dokternav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Edit Jadwal</h1>
            </div>
        </header>

        <main>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
                <div class="space-y-12">
                    <form action="{{ route('jadwal.update', $jadwal['id']) }}" method="post" class="mx-3 sm:mx-0">
                        @csrf
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-4">
                                    {{-- row input tanggal --}}
                                    <label for="tanggal"
                                        class="block text-sm font-medium leading-6 text-gray-900">Tanggal
                                    </label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="date" name="tanggal" id="tanggal" autocomplete="off"
                                                value="{{ $jadwal['tanggal'] }}"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- row input jam mulai --}}
                                <div class="sm:col-span-4">
                                    <label for="jam_mulai" class="block text-sm font-medium leading-6 text-gray-900">Jam
                                        Mulai</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="time" name="jam_mulai" id="jam_mulai" autocomplete="off"
                                                value="{{ $jadwal['jam_mulai'] }}"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="janesmith">
                                        </div>
                                    </div>
                                </div>
                                {{-- row input jam selesai --}}
                                <div class="sm:col-span-4">
                                    <label for="jam_selesai"
                                        class="block text-sm font-medium leading-6 text-gray-900">Jam
                                        Selesai
                                    </label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                            <input type="time" name="jam_selesai" id="jam_selesai" autocomplete="off"
                                                value="{{ $jadwal['jam_selesai'] }}"
                                                class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                </div>
                                {{-- status aktif --}}
                                <div class="sm:col-span-4">
                                    <label for="status_aktif"
                                        class="block text-sm font-medium leading-6 text-gray-900">Status Aktif</label>
                                    <div class="mt-2">
                                        <select id="status_aktif" name="status_aktif" autocomplete="off"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan
                                </button>
                            </div>
                    </form>
                </div>
        </main>
    </div>

</body>

</html>
