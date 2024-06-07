<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="overflow-y: auto;" role="document">
        <div class="modal-content" style="overflow-y: auto;">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Pembayaran Pesanan <br>ID#{{$transaksi->id_transaksi}}</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('pembayaran.store', ['id_transaksi' => $transaksi->id_transaksi]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama">Nama Pemilik Rekening <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" id="nama" placeholder="Masukan Nama Pemilik Rekening" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="rekening">Rekening Tujuan <span class="text-danger">*</span></label>
                        <select class="form-control" name="rekening" id="rekening" required>
                                <option value="">-- Pilih Rekening --</option>
                            @foreach ($metodePembayaran as $data)
                                <option value="{{ $data->id_mtd_pembayaran }}">{{ $data->nama_mtd_pembayaran . " | " . $data->atas_nama_mtd_pembayaran . " | " . $data->no_rek_mtd_pembayaran}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="tanggal_pembayaran">Tanggal Pembayaran <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" required>
                    </div>
                    
                <h5 class="fw-bold mt-3 pt-2">Total Bayar : Rp.{{$transaksi->total_bayar}}</h5>
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
        document.getElementById('addPembayaranForm').reset();
    }
</script>