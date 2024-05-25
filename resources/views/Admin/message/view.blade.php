<!-- Modal -->
<div class="modal fade" id="viewModal{{ $contact->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $contact->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel{{ $contact->id }}">Detail Pesan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <p class="form-control">{{ $contact->name }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <p class="form-control">{{ $contact->email }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subjek</label>
                    <p class="form-control">{{ $contact->subject }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Pesan</label>
                    <p class="form-control">{{ $contact->message }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
