<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $galeri['id'] ? 'Edit Galeri' : 'Tambah Galeri' }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10 sm:px-6 lg:px-8">
        <form action="{{ $galeri['id'] ? route('galeri.update', $galeri['id']) : route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($galeri['id'])
                @method('PUT')
            @endif

            {{-- Judul --}}
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-semibold">Judul Foto</label>
                <input type="text" name="judul" id="judul"
                       value="{{ old('judul', $galeri['nama_photo']) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring focus:border-blue-500"
                       required>
            </div>

            {{-- Gambar Lama --}}
            @if ($galeri['photo'])
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-1">Gambar Lama:</label>
                    <img src="{{ asset($galeri['photo']) }}" alt="Gambar Lama"
                         class="w-48 h-48 object-cover rounded border">
                </div>
            @endif

            {{-- Gambar Baru --}}
            <div class="mb-4">
                <label for="gambar" class="block text-gray-700 font-semibold">Upload Gambar Baru (opsional)</label>
                <input type="file" name="gambar" id="gambar"
                       class="w-full mt-1 text-sm text-gray-700 border border-gray-300 rounded cursor-pointer">
            </div>

            {{-- Tombol Simpan --}}
            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                    {{ $galeri['id'] ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
