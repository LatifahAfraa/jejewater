<button type="button" class="btn btn-danger shadow btn-xs sharp" data-toggle="modal"
    data-target="#delete{{ $id }}">
    <i class="ti-trash"></i>
</button>
<!-- Modal -->
<div class="modal fade" id="delete{{ $id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mb-3" style="font-size:80px">
                    <i class="fa fa-exclamation-circle text-warning"></i>
                    <h2>Yakin hapus data?</h2>
                    <h6>Data yang dihapus tidak bisa
                        dikembalikan</h6>
                </div>
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="d-flex offset-4">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
