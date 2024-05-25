<div class="modal fade" id="editPortfolioModal{{ $portfolio->id }}" tabindex="-1" aria-labelledby="editPortfolioModalLabel{{ $portfolio->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $portfolio->id }}">Edit Portfolio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPortfolioForm{{ $portfolio->id }}" action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="img{{ $portfolio->id }}" class="form-label">Gambar Portofolio</label>
                        <input type="file" class="form-control" id="img{{ $portfolio->id }}" name="img">
                        <div class="d-flex justify-content-center mt-2">
                            @if($portfolio->img)
                                <img src="{{ Storage::url($portfolio->img) }}" alt="img" style="width: 100px; height: auto;">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="service_id{{ $portfolio->id }}" class="form-label">Kategori Pelayanan</label>
                        <select class="form-select" id="service_id{{ $portfolio->id }}" name="service_id" required>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $portfolio->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description{{ $portfolio->id }}" class="form-label">Deskripsi Portofolio</label>
                        <textarea class="form-control" id="description{{ $portfolio->id }}" name="description" rows="5" required>{{ $portfolio->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus portfolio?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
