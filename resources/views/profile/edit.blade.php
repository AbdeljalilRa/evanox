@extends('layouts.admin.app')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Profile Info -->
                <div class="card mb-4">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $user->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email', $user->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Avatar</label>
                                <input type="file" name="avatar" class="form-control">
                                @if ($user->avatar_url)
                                    <img src="{{ asset($user->avatar_url) }}" width="100" class="mt-2 img-thumbnail">
                                @endif
                                @error('avatar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="card">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="{{ route('profile.password.update') }}" method="POST">
                            @csrf
                            <div class="mb-3 position-relative">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" id="current_password">
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                    onclick="togglePassword('current_password', this)">
                                    <iconify-icon icon="mdi:eye-off-outline" id="icon_current_password"></iconify-icon>
                                </span>
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">New Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                    onclick="togglePassword('password', this)">
                                    <iconify-icon icon="mdi:eye-off-outline" id="icon_password"></iconify-icon>
                                </span>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                                <span class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer"
                                    onclick="togglePassword('password_confirmation', this)">
                                    <iconify-icon icon="mdi:eye-off-outline" id="icon_password_confirmation"></iconify-icon>
                                </span>
                            </div>

                            <button type="submit" class="btn btn-warning">Update Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
function togglePassword(inputId, iconElement) {
    const input = document.getElementById(inputId);
    const icon = iconElement.querySelector('iconify-icon');

    if (input.type === "password") {
        input.type = "text";
        icon.setAttribute('icon', 'mdi:eye-outline'); // eye open
    } else {
        input.type = "password";
        icon.setAttribute('icon', 'mdi:eye-off-outline'); // eye closed
    }
}
</script>
@endsection
