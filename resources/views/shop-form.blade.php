<!DOCTYPE html>
<html>
<head>
    <title>Shopping List Form</title>
    <link rel="stylesheet" href="css/shop-form.css">
</head>
<body>
    <div class="shop-form">
        <h1>Shopping List Form</h1>
        <form action="/shop" method="post">
            {{csrf_field()}}
            <div id="product-inputs">
                <div class="product-input">
                    <div class=input-item>
                        <label>Product Name:</label>
                        <input type="text" name="products[0][name]" required>

                        <label>Product Price:</label>
                        <input type="number"  name="products[0][price]" min='0' required>
                    </div>
                </div>
            </div>

            <button type="button" onclick="addProductInput()">Add Another Product</button>
            <input type="submit" value="Calculate">
        </form>
    </div>

    <script>
        let productCount = 1;

        function addProductInput() {
            const productInputs = document.getElementById('product-inputs');

            const newInput = document.createElement('div');
            newInput.className = 'product-input';
            newInput.innerHTML = `
                <div class=input-item>
                    <label>Product Name:</label>
                    <input type="text" name="products[${productCount}][name]" required>

                    <label>Product Price:</label>
                    <input type="number" name="products[${productCount}][price]" min='0' required>
                </div>
            `;

            productInputs.appendChild(newInput);

            productCount++;
        }
    </script>
</body>
</html>
