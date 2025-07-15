<x-app-layout>
    <div class="max-w-xl mx-auto py-10 px-4">
                <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <h2 class="text-xl text-center font-semibold mb-4 text-black-300">Detail Barang</h2>

        <p><strong>Nama Barang:</strong> {{ $barang['nama_barang'] }}</p>
        <p><strong>Harga Barang:</strong> Rp{{ number_format((float) $barang['harga_barang'], 0, ',', '.') }}</p>
        <p><strong>Stok:</strong> {{ $barang['stok'] }}</p>

        <div class="mt-4">
            <a href="{{ route('barang.index') }}" class="btn btn-warning">Kembali</a>
        </div>
        </div>
    </div>
</x-app-layout>