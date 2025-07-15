<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeri') }}
        </h2>
    </x-slot>

    <div class="page-container">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="mb-6">
                        <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                            <i class="mr-1 icon-plus"></i>
                            Tambah Gambar
                        </a>
                    </div>

                    {{-- Galeri Grid --}}
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @forelse ($galeri as $item)
                        <div class="bg-white shadow rounded p-2 text-center">
                            {{--tombol edit dan hapus--}}
                            {{-- Gambar --}}
                            @if ($item->photo)
                            <div class="w-full aspect-video overflow-hidden rounded-lg shadow">
                                <img src="{{ asset($item->photo) }}" alt="{{ $item->nama_photo }}"
                                    class="w-full h-full object-cover">
                            </div>
                            @else
                            <div class="w-full aspect-video bg-gray-200 flex items-center justify-center text-sm text-gray-500 rounded">
                                Tidak ada gambar
                            </div>
                            @endif
                            {{-- Info --}}
                            <div class="mt-2">
                                <h3 class="text-sm font-medium text-gray-700 truncate">{{ $item->nama_photo }}</h3>
                                <p class="text-xs text-gray-400">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                                </p>
                            </div>
                            {{-- Tombol Edit & Hapus --}}
                            <div class="flex justify-center gap-2 mt-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('galeri.edit', $item->id) }}"
                                    class="inline-block bg-blue-500 text-white text-sm px-4 py-2 rounded shadow hover:bg-blue-600 transition">
                                    Edit
                                </a>


                                <form action="{{ route('galeri.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus gambar ini?')"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white text-sm px-4 py-2 rounded shadow hover:bg-red-600 transition">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                        @empty
                        <div class="col-span-full text-center text-gray-500">
                            Belum ada gambar.
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>