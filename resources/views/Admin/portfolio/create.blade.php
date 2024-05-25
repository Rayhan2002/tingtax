<!-- Modal -->
<div class="modal fade" id="createPortfolioModal" tabindex="-1" aria-labelledby="createPortfolioModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createPortfolioForm" action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="img" class="form-label">Gambar Portfolio</label>
                        <input type="file" class="form-control" id="img" name="img">
                        <small id="fileHelpLogo" class="form-text text-muted">Format: JPG, PNG, GIF</small>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori Portfolio Pelayanan</label>
                        <select class="form-control" id="service_id" name="service_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Portfolio</label>
                        <textarea class="form-control" id="description" name="description" rows="10" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
