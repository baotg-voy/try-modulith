@extends('core::layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Manage Products</h2>
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Create Product
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-body">
                    @if($products->isEmpty())
                        <div class="alert alert-info text-center" role="alert">
                            No products found. Create your first product!
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 80px;">ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 120px;">Price</th>
                                        <th style="width: 150px;">Category</th>
                                        <th style="width: 200px;" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td class="fw-bold text-muted">#{{ $product->id }}</td>
                                            <td>
                                                <div class="fw-semibold">{{ $product->name }}</div>
                                            </td>
                                            <td>
                                                <div class="text-truncate" style="max-width: 300px;" title="{{ $product->description }}">
                                                    {{ $product->description }}
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge bg-success">${{ number_format($product->price, 2) }}</span>
                                            </td>
                                            <td>
                                                @if($product->category)
                                                    <span class="badge bg-secondary">{{ $product->category->name }}</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">No Category</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('products.edit', $product->id) }}" 
                                                       class="btn btn-outline-primary" 
                                                       title="Edit">
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('products.destroy', $product->id) }}" 
                                                       class="btn btn-outline-danger"
                                                       onclick="return confirm('Are you sure you want to delete this product?')"
                                                       title="Delete">
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="pagination-container d-flex justify-content-between align-items-center mt-4 flex-grow-1">
                            {{ $products->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .table .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .btn-group-sm .btn {
        padding: 0.25rem 0.75rem;
        font-size: 0.875rem;
    }
    
    .card {
        border: none;
        border-radius: 8px;
    }

    .badge {
        font-weight: 500;
        padding: 0.375rem 0.625rem;
    }

    .pagination-container {
        padding-top: 1rem;
        border-top: 1px solid #e9ecef;
    }
</style>
@endpush
@endsection