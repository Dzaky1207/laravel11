<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Tambah -->
            <div class="btn btn-primary btn-sm mb-4 ">
                <a href="{{url('barang/create')}}">Tambah Barang</a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($barang as $index => $item)
                                <tr>
                                    <td class="px-6 py-4 text-gray-900">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-900">{{ $item->nama_barang }}</td>
                                    <td class="px-6 py-4 text-gray-900">Rp {{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-gray-900">{{ $item->stok }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap space-x-2">
                                        <a href="{{ url('barang/create?id=' . $item->id) }}"
                                            class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-all duration-200 text-xs">
                                             Edit
                                        </a>
                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-all duration-200 text-xs">
                                                 Hapus
                                            </button>
                                        </form>
                                        <a href="{{ route('barang.show', $item->id) }}" class="btn btn-sm btn-info">View</a>
                                    </td>

                                </tr>
                                @endforeach

                                @if ($barang->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Tidak ada data barang.
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>