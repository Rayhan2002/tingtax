<!-- Modal -->
<div class="modal fade" id="createServicesModal" tabindex="-1" aria-labelledby="createServicesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Pelayanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createServiceForm" action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Pelayanan</label>
                        <input type="name" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Pelayanan</label>
                        <textarea class="form-control" id="description" name="description" rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo Pelayanan</label>
                        <input type="file" class="form-control" id="logo" name="logo">
                        <small id="fileHelpLogo" class="form-text text-muted">Format: JPG, PNG, GIF</small>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
