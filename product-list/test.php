<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Float Menu */
        .float-menu {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 250px;
            z-index: 1000;
        }
        
        .toggle-button {
            margin: 10px 0;
        }

        /* Mobile view toggle icon */
        .menu-toggle-btn {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            z-index: 1001;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 10px;
            display: none;
        }

        @media (max-width: 768px) {
            .menu-toggle-btn {
                display: block;
            }
            .float-menu {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Toggle Icon for Smaller Screens -->
    <button class="menu-toggle-btn d-md-none" onclick="toggleMenu()">
        ☰
    </button>

    <!-- Float Menu (only visible on medium and larger screens) -->
    <div class="float-menu d-none d-md-block" id="floatMenu">
        <h5>Filter Options</h5>

        <!-- Category Filter -->
        <div>
            <h6>Category</h6>
            <button class="btn btn-primary toggle-button" type="button" data-toggle="collapse" data-target="#categoryFilter" aria-expanded="false" aria-controls="categoryFilter">
                Toggle Category Filter
            </button>
            <div class="collapse" id="categoryFilter">
                <form id="filterForm" method="POST" action="filter-products.php">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="Furniture" id="category1">
                        <label class="form-check-label" for="category1">
                            Furniture
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="Electronics" id="category2">
                        <label class="form-check-label" for="category2">
                            Electronics
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" value="Clothing" id="category3">
                        <label class="form-check-label" for="category3">
                            Clothing
                        </label>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Price Range Filter -->
        <div>
            <h6>Price Range</h6>
            <button class="btn btn-primary toggle-button" type="button" data-toggle="collapse" data-target="#priceFilter" aria-expanded="false" aria-controls="priceFilter">
                Toggle Price Filter
            </button>
            <div class="collapse" id="priceFilter">
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prices[]" value="0-50" id="price1">
                        <label class="form-check-label" for="price1">
                            $0 - $50
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prices[]" value="51-100" id="price2">
                        <label class="form-check-label" for="price2">
                            $51 - $100
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prices[]" value="101-200" id="price3">
                        <label class="form-check-label" for="price3">
                            $101 - $200
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="prices[]" value="200+" id="price4">
                        <label class="form-check-label" for="price4">
                            $200+
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <!-- Color Filter -->
        <div>
            <h6>Color</h6>
            <button class="btn btn-primary toggle-button" type="button" data-toggle="collapse" data-target="#colorFilter" aria-expanded="false" aria-controls="colorFilter">
                Toggle Color Filter
            </button>
            <div class="collapse" id="colorFilter">
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="colors[]" value="Red" id="color1">
                        <label class="form-check-label" for="color1">
                            Red
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="colors[]" value="Blue" id="color2">
                        <label class="form-check-label" for="color2">
                            Blue
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="colors[]" value="Green" id="color3">
                        <label class="form-check-label" for="color3">
                            Green
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="colors[]" value="Black" id="color4">
                        <label class="form-check-label" for="color4">
                            Black
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="colors[]" value="White" id="color5">
                        <label class="form-check-label" for="color5">
                            White
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <!-- Apply Filter Button -->
        <button class="btn btn-success mt-3" type="submit" form="filterForm">Apply Filter</button>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        
        function toggleMenu() {
            var menu = document.getElementById("floatMenu");
            if (menu.style.display === "none" || menu.style.display === "") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        }
    </script>
</body>
</html>
