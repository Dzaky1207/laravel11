<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('barang.store') }}" method="POST" class="inline">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" value="{{ $barang['nama_barang'] }}" name="nama_barang" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Barang</label>
                        <input type="number" value="{{ $barang['harga_barang'] }}" name="harga_barang" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" value="{{ $barang['stok'] }}" name="stok" class="form-control" required>
                    </div>
                    <input type="text" hidden name="action_task" value="save_barang">
                    <input type="hidden" name="id" value="{{ $barang['id'] }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>