<!-- Edit Mahasiswa Form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="overflow-y: auto;" role="document">
        <div class="modal-content"style="overflow-y: auto;">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Produk</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('produk.update', $data->kode_produk)}}" method="POST">
                @csrf
                @method('PUT') <!-- Assuming you are using the PUT method for updating -->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Produk <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_produk" id="nama_produk" value="{{ $data->nama_produk }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" id="deskripsi_produk" name="deskripsi_produk" rows="3">{{ old('deskripsi_produk') }}{{ $data->deskripsi_produk }}</textarea>
                        @error('deskripsi_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok Produk<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="stok" id="no_stokhp" value="{{ $data->stok }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Produk<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="harga" id="harga" value="{{ $data->harga }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Ukuran Produk <span class="text-danger">*</span></label>
                        <select class="form-control" name="ukuran" id="ukuran">
                            <option value="15x30 Cm" {{ $data->ukuran == "15x30 Cm" ? 'selected' : '' }}>15x30 Cm</option>
                            <option value="20x30 Cm" {{ $data->ukuran == "20x30 Cm" ? 'selected' : '' }}>20x30 Cm</option>
                            <option value="5x15 Cm" {{ $data->ukuran == "5x15 Cm" ? 'selected' : '' }}>5x15 Cm</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function resetForm() {
        // Assuming your form has an ID of "editMahasiswaForm"
        document.getElementById('editProdukForm').reset();
    }
</script>