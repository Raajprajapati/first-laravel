<!DOCTYPE html>
<html>
<head>
    <title>Shopping List</title>
    <link rel="stylesheet" href="css/shopping-list.css">
</head>
<body>
    <div class="shopping-list">
        <h1>Shopping List</h1>
        <p><strong>Total Cost:</strong> {{ $totalCost? $totalCost: "0" }}</p>
        <p><strong>Cheapest Product(s):</strong></p>
        <ul>
            @forelse ($cheapestProducts as $product)
            <li>{{ $product }}</li>
            @empty
            <li>No products found.</li>  
            @endforelse
        </ul>

        <p><strong>Most Expensive Product(s):</strong></p>
        <ul>
            @forelse ($mostExpensiveProducts as $product)
            <li>{{ $product }}</li>
            @empty
            <li>No products found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
