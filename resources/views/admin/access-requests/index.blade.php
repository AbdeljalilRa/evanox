@extends('layouts.admin.app')

@section('title', 'Access Requests')

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3">Access Requests</h1>
            <div class="text-muted">
                Manage store access requests from users
            </div>
        </div>

        <!-- Access Requests Table -->
        <div class="card">
            <div class="card-body">
                @if($accessRequests->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Requested Date</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accessRequests as $request)
                                    <tr>
                                        <td>{{ $request->email }}</td>
                                        <td>
                                            @if($request->is_approved)
                                                <span class="badge bg-success">Approved</span>
                                            @else
                                                <span class="badge bg-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $request->created_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($request->password)
                                                <code class="small">{{ $request->password }}</code>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$request->is_approved)
                                                <form action="{{ route('admin.access-requests.approve', $request) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success" 
                                                            onclick="return confirm('Approve access request for {{ $request->email }}? This will generate a password and send it to the user.')">
                                                        <i class="fas fa-check"></i> Approve
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-muted small">Already approved</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        {{ $accessRequests->links() }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <div class="mb-3">
                            <i class="fas fa-inbox fa-3x text-muted"></i>
                        </div>
                        <h5 class="text-muted">No Access Requests</h5>
                        <p class="text-muted">No users have requested access to the store yet.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Store Settings -->
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Store Settings</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.store-settings.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <label for="store_status" class="form-label">Store Status</label>
                            <select name="store_status" id="store_status" class="form-select">
                                <option value="off" {{ \App\Models\Setting::get('store_status', 'off') === 'off' ? 'selected' : '' }}>
                                    Off (Coming Soon Mode)
                                </option>
                                <option value="on" {{ \App\Models\Setting::get('store_status', 'off') === 'on' ? 'selected' : '' }}>
                                    On (Public Access)
                                </option>
                            </select>
                            <div class="form-text">
                                When "Off", only users with approved passwords can access the store. 
                                When "On", everyone can access the store.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Setting
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection