@extends('layouts.admin.app')

@section('title', 'Customer Details')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Customer Details</h5>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-soft-primary btn-sm">
                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon> Edit
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $customer->name }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $customer->email }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>{{ ucfirst($customer->role) }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $customer->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At:</th>
                            <td>{{ $customer->updated_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    </table>
                </div>

            </div>

            <div class="mt-3">
                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back to List</a>
            </div>

        </div>
    </div>
</div>
@endsection
