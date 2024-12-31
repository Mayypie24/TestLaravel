@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 bg-gray-50 rounded-xl shadow-lg">

    <!-- Title and Button Section -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-semibold text-blue-800">Daftar Barang Bengkel Motor</h1>
        <a href="{{ route('barang.create') }}" class="btn btn-primary bg-teal-600 hover:bg-teal-700 text-white px-6 py-3 rounded-lg shadow-md flex items-center">
            <i class="fas fa-plus mr-2"></i>Tambah Barang
        </a>
    </div>

    <!-- Barang List Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($barang as $b)
            <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-blue-600">{{ $b->nama_barang }}</h3>
                    <span class="text-gray-500 text-sm">{{ $b->merk_barang }}</span>
                </div>
                <div class="mt-4">
                    <div class="text-sm text-gray-600">Stok: {{ $b->stok_barang }}</div>
                    <div class="text-sm text-gray-600">Harga: Rp {{ number_format($b->harga_barang, 0, ',', '.') }}</div>
                    <div class="text-sm text-gray-600">Kualitas: {{ $b->kualitas_barang }}</div>
                </div>
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('barang.edit', $b->id) }}" class="text-teal-600 hover:text-teal-800">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button" class="text-red-600 hover:text-red-800" onclick="openDeleteModal({{ $b->id }}, '{{ $b->nama_barang }}')">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                Tidak ada data barang.
            </div>
        @endforelse
    </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus barang <strong id="modal-item-name"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirm-delete-button">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Button for Best Products -->
    <div class="text-center mt-6">
        <a href="{{ route('barang.tpk') }}" class="btn btn-info bg-orange-500 hover:bg-orange-600 text-white py-3 px-6 rounded-lg shadow-md">
            <i class="fas fa-star mr-2"></i>Lihat Barang Terbaik
        </a>
    </div>
</div>

<!-- JavaScript -->
<script>
function openDeleteModal(id, name) {
    document.getElementById('modal-item-name').textContent = name;
    document.getElementById('confirm-delete-button').onclick = function () {
        document.getElementById(`delete-form-${id}`).submit();
    };
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>

@endsection
