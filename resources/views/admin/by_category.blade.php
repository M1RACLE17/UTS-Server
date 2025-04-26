<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items by Category</title>
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
        <h1>Items by Category</h1>

        <form action="{{ route('stock.by_category') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select class="form-control" id="category_id" name="category_id" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>

        <h3>Items List</h3>
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
                @forelse ($items as $item)
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
                        <td colspan="7" class="text-center">No items found for this category.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>