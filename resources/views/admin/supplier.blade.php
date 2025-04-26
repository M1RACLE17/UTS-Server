<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Admin Dashboard</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('items') }}">Items</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('suppliers') }}">Suppliers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.summary') }}">Stock Summary</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.low') }}">Low Stock</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.by_category') }}">By Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.per_category') }}">Per Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.per_supplier') }}">Per Supplier</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('stock.system_summary') }}">System Summary</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Manage Suppliers</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <h3>Add New Supplier</h3>
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact_info" class="form-label">Contact Info</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info">
            </div>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>

        <h3 class="mt-5">Supplier List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Info</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact_info }}</td>
                        <td>{{ $supplier->admin->username }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>