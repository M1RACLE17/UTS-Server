<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low Stock Items</title>
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
        <h1>Low Stock Items (Below 5 Units)</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Supplier</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lowStockItems as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>{{ $item->admin->username }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No items with low stock.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>