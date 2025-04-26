<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Summary</title>
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
        <h1>Stock Summary</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Stock</h5>
                        <p class="card-text">{{ $totalStock }} units</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Stock Value</h5>
                        <p class="card-text">{{ number_format($totalValue, 2) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Average Price</h5>
                        <p class="card-text">{{ number_format($averagePrice, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>