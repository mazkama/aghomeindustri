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
            <form action="{{ route('mhs.update', $data->nim)}}" method="POST">
                @csrf
                @method('PUT') <!-- Assuming you are using the PUT method for updating -->

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Mahasiswa <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" id="nama" value="{{ $data->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="no_hp" id="no_hp" value="{{ $data->no_hp }}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki-laki" {{ $data->jenis_kelamin == "Laki-laki" ? 'selected' : '' }}>Laki - Laki</option>
                            <option value="Perempuan" {{ $data->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat<span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="alamat" id="alamat" value="{{ $data->alamat }}">
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
        document.getElementById('editMahasiswaForm').reset();
    }
</script>