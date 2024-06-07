<div class="modal fade text-left" id="TambahMP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="overflow-y: auto;" role="document">
        <div class="modal-content"style="overflow-y: auto;">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Metode Pembayaran</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('tambah-mp')}}" method="POST">
                @csrf
                <!-- @method('PUT') Assuming you are using the PUT method for updating -->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Metode Pembayaran <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_mp" id="nama_mp">
                    </div>
                    <div class="form-group">
                        <label for="nama_va">Nama Virtual Account<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_va" id="nama_va">
                    </div>
                    <div class="form-group">
                        <label for="no_va">No. Virtual Account<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_va" id="no_va" >
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

<!-- Edit Mahasiswa Form Modal -->
@foreach($metode_pembayaran as $data)
<div class="modal fade text-left" id="inlineForm{{ $data->id_mtd_pembayaran }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="overflow-y: auto;" role="document">
        <div class="modal-content"style="overflow-y: auto;">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Metode Pembayaran "{{$data->nama_mtd_pembayaran}}"</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('update-mp', $data->id_mtd_pembayaran)}}" method="POST">
                @csrf
                @method('PUT') <!-- Assuming you are using the PUT method for updating -->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Metode Pembayaran <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_mp" id="nama_mp" value="{{ $data->nama_mtd_pembayaran }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_va">Nama Virtual Account<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama_va" id="nama_va" value="{{ $data->atas_nama_mtd_pembayaran }}">
                    </div>
                    <div class="form-group">
                        <label for="no_va">No. Virtual Account<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_va" id="no_va" value="{{ $data->no_rek_mtd_pembayaran }}">
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
@endforeach
<script>
    function resetForm() {
        // Assuming your form has an ID of "editMahasiswaForm"
        document.getElementById('editProdukForm').reset();
    }
</script>