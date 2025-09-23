@extends('layouts.admin.app')

@section('title', 'Store Access Requests')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h4 class="card-title flex-grow-1 mb-0">Store Access Requests</h4>
                    <button id="sendSelectedBtn" class="btn btn-primary d-none">
                        <i class="bx bx-envelope me-1"></i> Send Password to Selected
                    </button>
                </div>

                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-hover table-centered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-3" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th class="py-3" style="min-width: 300px;">Email</th>
                                    <th class="py-3" style="min-width: 200px;">Requested At</th>
                                    <th class="py-3" style="min-width: 150px;">Status</th>
                                    <th class="py-3 text-center" style="min-width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $req)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input request-checkbox" type="checkbox" 
                                                       value="{{ $req->id }}" 
                                                       {{ $req->password ? 'disabled' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title bg-light text-primary rounded">
                                                            <i class="bx bx-user font-size-20"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h5 class="font-size-15 mb-0">{{ $req->email }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $req->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if($req->password)
                                                <span class="badge bg-success">Password Sent</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                @if(!$req->password)
                                                    <form action="{{ route('admin.access-requests.send-password', $req->id) }}" 
                                                          method="POST" 
                                                          class="d-inline">
                                                        @csrf
                                                        <button type="submit" 
                                                                class="btn btn-soft-primary btn-sm"
                                                                data-bs-toggle="tooltip"
                                                                title="Send Password">
                                                            <iconify-icon icon="solar:send-linear" class="align-middle fs-18"></iconify-icon>
                                                        </button>
                                                    </form>
                                                @endif
                                                
                                                <form id="delete-form-{{ $req->id }}" 
                                                      action="{{ route('admin.access-requests.destroy', $req->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" 
                                                            class="btn btn-soft-danger btn-sm"
                                                            data-bs-toggle="tooltip"
                                                            title="Delete"
                                                            onclick="confirmDelete('delete-form-{{ $req->id }}')">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bx bx-user-x text-muted" style="font-size: 40px;"></i>
                                                <h5 class="mt-2">No access requests found</h5>
                                                <p class="text-muted">There are no pending access requests</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($requests->hasPages())
                        <div class="d-flex justify-content-end mt-4">
                            {{ $requests->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Action Form -->
<form id="bulkActionForm" action="{{ route('admin.access-requests.bulk-send-password') }}" method="POST" class="d-none">
    @csrf
    <input type="hidden" name="request_ids" id="selectedIds">
</form>
@endsection

@section('scripts')
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Handle select all checkbox
        const selectAllCheckbox = document.getElementById('selectAll');
        const requestCheckboxes = document.querySelectorAll('.request-checkbox:not([disabled])');
        const sendSelectedBtn = document.getElementById('sendSelectedBtn');
        const bulkActionForm = document.getElementById('bulkActionForm');
        const selectedIdsInput = document.getElementById('selectedIds');

        selectAllCheckbox.addEventListener('change', function() {
            requestCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActionButton();
        });

        requestCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                updateBulkActionButton();
            });
        });

        function updateBulkActionButton() {
            const selectedCheckboxes = document.querySelectorAll('.request-checkbox:checked');
            if (selectedCheckboxes.length > 0) {
                sendSelectedBtn.classList.remove('d-none');
            } else {
                sendSelectedBtn.classList.add('d-none');
            }
        }

        sendSelectedBtn.addEventListener('click', function() {
            const selectedIds = Array.from(document.querySelectorAll('.request-checkbox:checked'))
                                   .map(checkbox => checkbox.value);
            selectedIdsInput.value = JSON.stringify(selectedIds);
            bulkActionForm.submit();
        });
    });
</script>
@endsection