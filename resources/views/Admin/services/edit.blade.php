<!-- Modal -->
<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel{{ $service->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="editServiceModalLabel{{ $service->id }}">Edit Pelayanan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editServiceForm{{ $service->id }}" action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelayanan</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Pelayanan</label>
                    <textarea class="form-control" id="description" name="description" rows="10" required>{{ $service->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo Pelayanan</label>
                    <input type="file" class="form-control" id="logo" name="logo">
                    <div class="d-flex justify-content-center mt-2">
                        @if($service->logo)
                            <img src="{{ Storage::url($service->logo) }}" alt="Logo" style="width: 100px; height: auto;">
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%">Update</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus pelayanan?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </div>
    </div>
</div>
