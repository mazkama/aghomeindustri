<!-- Edit Mahasiswa Form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Mahasiswa</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{ route('aktivitas.update', $data->nim)}}" method="POST">
                @csrf
                @method('PUT') <!-- Assuming you are using the PUT method for updating -->

                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nama_aktivitas">Nama Aktivitas</label> 
                        <input type="text" class="form-control" id="nama_aktivitas" name="nama_aktivitas"
                        placeholder="Masukan nama aktivtas" value="{{ $data->nama_aktivitas }}">
                    </div>

                    <fieldset class="form-group mb-3">
                        <label for="kategori">Kategori</label> 
                        <select class="form-select" id="kategori" name="kategori">
                            <option>-- Pilih Kategori --</option>
                            <option value="Organisasi" {{ $data->kategori == "Organisasi" ? 'selected' : '' }} >Organisasi</option>
                            <option value="Perlombaan" {{ $data->kategori == "Perlombaan" ? 'selected' : '' }} >Perlombaan</option>
                        </select>
                    </fieldset> 

                    <div class="form-group">
                        <label for="tgl_aktivitas">Tanggal Aktivitas</label>
                        <input type="date" class="form-control" id="tgl_aktivitas" name="tgl_aktivitas"  value="{{ $data->tgl_aktivitas }}"placeholder="">
                    </div>

                    <div class="form-group mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Aktivitas</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" 
                            rows="3" >{{ $data->deskripsi }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    @unless(Auth::check() && Auth::user()->level == 'admin')
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                    @endunless
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function resetForm() {
        // Assuming your form has an ID of "editMahasiswaForm"
        document.getElementById('editMahasiswaForm').reset();
    }
</script>