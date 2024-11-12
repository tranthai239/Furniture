<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Style for filter button and panel */
        .filter-icon {
            position: fixed;
            left: 0;
            top: 28%;
            transform: translateY(-50%);
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            z-index: 1050;
        }

        .filter-panel {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            background-color: #f8f9fa;
            padding: 15px;
            width: 300px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1040;
            display: none;
        }

        /* Toggle visibility */
        .filter-panel.active {
            display: block;
        }

        /* Responsive product display */
        .product-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Icon and filter panel -->
        <div class="filter-icon" onclick="toggleFilter()">☰</div>
        <div class="filter-panel" id="filterPanel">
            <h5>Bộ Lọc Sản Phẩm</h5>
            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Chọn loại sản phẩm (SKU)</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="BED">
                        <label class="form-check-label">Giường (BED)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="CHAIR">
                        <label class="form-check-label">Ghế (CHAIR)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="TABLE">
                        <label class="form-check-label">Bàn (TABLE)</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="filter[]" value="SOFA">
                        <label class="form-check-label">Sofa (SOFA)</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Chọn khoảng giá</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="under_200000">
                        <label class="form-check-label">Dưới 200.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="200000_500000">
                        <label class="form-check-label">200.000 - 500.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="500000_1000000">
                        <label class="form-check-label">500.000 - 1.000.000 VNĐ</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="price_filter[]" value="above_1000000">
                        <label class="form-check-label">Trên 1.000.000 VNĐ</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Áp Dụng Lọc</button>
            </form>
        </div>

        <!-- Product List -->
        <div class="col-lg-10 offset-lg-2 col-md-9 offset-md-3 p-3">
            <h3>Danh Sách Sản Phẩm</h3>
            <div class="row" style="justify-content: space-evenly;">
                <?php
                include 'product.php';
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Toggle filter panel
    function toggleFilter() {
        var filterPanel = document.getElementById("filterPanel");
        filterPanel.classList.toggle("active");
    }
</script>
</body>
</html>
