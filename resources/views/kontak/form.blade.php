<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontak') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">

            {{-- Flash success message --}}
            @if (session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('kontak.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                        required value="{{ old('nama') }}">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email"
                        class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                        required value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                    <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea name="pesan" id="pesan"
                        class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                        rows="4">{{ old('pesan') }}</textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                    Kirim Pesan
                </button>
            </form>
        </div>

        {{-- TABEL KONTAK --}}
        @if (isset($kontak) && $kontak->count())
            <div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded shadow">
                <h3 class="text-lg font-bold mb-4">Daftar Pesan</h3>
                <table class="min-w-full border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kontak as $index => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2">{{ $item->nama }}</td>
                                <td class="border px-4 py-2">{{ $item->email }}</td>
                                <td class="border px-4 py-2">{{ $item->pesan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
