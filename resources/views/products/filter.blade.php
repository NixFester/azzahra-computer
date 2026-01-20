<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Filter</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .filter-form {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            font-size: 14px;
            background: white;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        select:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            align-items: flex-end;
        }

        button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-filter {
            background: #4CAF50;
            color: white;
        }

        .btn-filter:hover {
            background: #45a049;
        }

        .btn-reset {
            background: #f44336;
            color: white;
        }

        .btn-reset:hover {
            background: #da190b;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            background: #fafafa;
        }

        .product-card h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .product-info {
            color: #666;
            font-size: 14px;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            margin-top: 8px;
            margin-right: 5px;
        }

        .badge-category {
            background: #2196F3;
            color: white;
        }

        .badge-brand {
            background: #FF9800;
            color: white;
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Filter</h1>

        <form action="{{ route('products.filter') }}" method="GET" class="filter-form">
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="brand">Brand</label>
                <select name="brand" id="brand">
                    <option value="">All Brands</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>
                            {{ $brand }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-filter">Filter</button>
                <a href="{{ route('products.index') }}">
                    <button type="button" class="btn-reset">Reset</button>
                </a>
            </div>
        </form>

        @if(isset($products))
            @if($products->count() > 0)
                <div class="products-grid">
                    @foreach($products as $product)
                        <div class="product-card">
                            <h3>{{ $product->name ?? 'Product #' . $product->id }}</h3>
                            <div class="product-info">
                                <span class="badge badge-category">{{ $product->category }}</span>
                                <span class="badge badge-brand">{{ $product->brand }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="no-results">
                    <p>No products found with the selected filters.</p>
                </div>
            @endif
        @endif
    </div>
</body>
</html>