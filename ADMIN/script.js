/*function fillForm(productCode) {
  // Lấy tất cả các dòng trong bảng
  const rows = document.querySelectorAll("table tbody tr");
  rows.forEach(row => {
    const radioButton = row.querySelector("input[type='radio']");
    if (radioButton.value === productCode) {
      const cells = row.querySelectorAll("td");
      document.querySelector("input[name='ProductCode']").value = productCode;
      document.querySelector("input[name='NameProduct']").value = cells[2].innerText;
      document.querySelector("input[name='Price']").value = cells[3].innerText;
      document.querySelector("input[name='DiscountPrice']").value = cells[4].innerText;
      document.querySelector("input[name='ImagePath']").value = cells[5].innerText; // Đường dẫn ảnh
      document.querySelector("input[name='SKU']").value = cells[6].innerText;
      document.querySelector("input[name='Color']").value = cells[7].innerText;
      document.querySelector("input[name='Dimensions']").value = cells[8].innerText;
      document.querySelector("input[name='Material']").value = cells[9].innerText;
      document.querySelector("input[name='Policies']").value = cells[10].innerText;
      document.querySelector("input[name='ImagePathSP1']").value = cells[11].innerText; // Đường dẫn ảnh phụ 1
      document.querySelector("input[name='ImagePathSP2']").value = cells[12].innerText; // Đường dẫn ảnh phụ 2
    }
  });
}
  function fillProductInfoForm(productCode, nameProduct, price, discountPrice, imagePath, sku, color, dimensions, material, policies, imagePathSP1, imagePathSP2, quantity) {
    document.querySelector('input[name="ProductCode"]').value = productCode;
    document.querySelector('input[name="NameProduct"]').value = nameProduct;
    document.querySelector('input[name="Price"]').value = price;
    document.querySelector('input[name="DiscountPrice"]').value = discountPrice;
    document.querySelector('input[name="ImagePath"]').value = imagePath;
    document.querySelector('input[name="SKU"]').value = sku;
    document.querySelector('input[name="Color"]').value = color;
    document.querySelector('input[name="Dimensions"]').value = dimensions;
    document.querySelector('input[name="Material"]').value = material;
    document.querySelector('input[name="Policies"]').value = policies;
    document.querySelector('input[name="ImagePathSP1"]').value = imagePathSP1; // Nếu cần
    document.querySelector('input[name="ImagePathSP2"]').value = imagePathSP2; // Nếu cần
    document.querySelector('input[name="Quantity"]').value = quantity;
}
 function fillProductDemoForm(productCode, nameProduct, price, discountPrice, imagePath, sku, color, dimensions, material, policies, quantity) {
    document.querySelector('input[name="ProductCode"]').value = productCodedemo;
    document.querySelector('input[name="NameProduct"]').value = nameProduct;
    document.querySelector('input[name="Price"]').value = price;
    document.querySelector('input[name="DiscountPrice"]').value = discountPrice;
    document.querySelector('input[name="ImagePath"]').value = imagePath;
    document.querySelector('input[name="SKU"]').value = sku;
    document.querySelector('input[name="Color"]').value = color;
    document.querySelector('input[name="Dimensions"]').value = dimensions;
    document.querySelector('input[name="Material"]').value = material;
    document.querySelector('input[name="Policies"]').value = policies;
    document.querySelector('input[name="Quantity"]').value = quantity; // Sử dụng trường DemoQuantity cho số lượng
}
function selectCheckbox(currentCheckbox) {

                                        // Lấy tất cả các checkbox
                                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                        // Bỏ chọn tất cả các checkbox khác
                                        checkboxes.forEach(function(checkbox) {
                                            if (checkbox !== currentCheckbox) {
                                                checkbox.checked = false;
                                            }
                                        });
                                    }
  
  function selectCheckbox1(currentCheckbox) {

                                        // Lấy tất cả các checkbox
                                        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                        // Bỏ chọn tất cả các checkbox khác
                                        checkboxes.forEach(function(checkbox) {
                                            if (checkbox !== currentCheckbox) {
                                                checkbox.checked = false;
                                            }
                                        });
                                    }
  */

document.addEventListener("DOMContentLoaded", function() {
  // Định nghĩa các hàm fillFormProductDemo và fillFormProductInfo tại đây



  function fillFormProductDemo() {
  const table = document.getElementById("product-demo");
  if (!table) {
    console.log("Không tìm thấy bảng product-demo.");
    return;
  }

  const rows = table.querySelectorAll("tbody tr");
  rows.forEach(row => {
    const checkbox = row.querySelector("input[type='checkbox']");
    if (checkbox && checkbox.checked) {
      const cells = row.querySelectorAll("td");

      // Điền dữ liệu từ bảng product-demo
      document.querySelector("input[name='ProductCode']").value = cells[1].innerText;
      document.querySelector("input[name='NameProduct']").value = cells[2].innerText;
      document.querySelector("input[name='Price']").value = cells[3].innerText;
      document.querySelector("input[name='DiscountPrice']").value = cells[4].innerText;
      document.querySelector("input[name='ImagePath']").value = cells[5].innerText;
      document.querySelector("input[name='SKU']").value = cells[6].innerText;
      document.querySelector("input[name='Color']").value = cells[7].innerText;
      document.querySelector("input[name='Dimensions']").value = cells[8].innerText;
      document.querySelector("input[name='Material']").value = cells[9].innerText;
      document.querySelector("input[name='Policies']").value = cells[10].innerText;
    }
  });
}

function fillFormProductInfo() {
  const table = document.getElementById("product-info");
  if (!table) {
    console.log("Không tìm thấy bảng product-info.");
    return;
  }

  const rows = table.querySelectorAll("tbody tr");
  rows.forEach(row => {
    const checkbox = row.querySelector("input[type='checkbox']");
    if (checkbox && checkbox.checked) {
      const cells = row.querySelectorAll("td");

      // Điền dữ liệu từ bảng product-info
      document.querySelector("input[name='ProductCode']").value = cells[1].innerText;
      document.querySelector("input[name='NameProduct']").value = cells[2].innerText;
      document.querySelector("input[name='Price']").value = cells[3].innerText;
      document.querySelector("input[name='DiscountPrice']").value = cells[4].innerText;
      document.querySelector("input[name='ImagePath']").value = cells[5].innerText;
      document.querySelector("input[name='SKU']").value = cells[6].innerText;
      document.querySelector("input[name='Color']").value = cells[7].innerText;
      document.querySelector("input[name='Dimensions']").value = cells[8].innerText;
      document.querySelector("input[name='Material']").value = cells[9].innerText;
      document.querySelector("input[name='Policies']").value = cells[10].innerText;
      document.querySelector("input[name='ImagePathSP1']").value = cells[11].innerText; // SP1
      document.querySelector("input[name='ImagePathSP2']").value = cells[12].innerText; // SP2
    }
  });
}
function selectCheckboxProductDemo(currentCheckbox) {
  // Lấy tất cả các checkbox trong bảng product-demo
  const checkboxes = document.querySelectorAll('#product-demo input[type="checkbox"]');

  // Bỏ chọn tất cả các checkbox khác
  checkboxes.forEach(function(checkbox) {
    if (checkbox !== currentCheckbox) {
      checkbox.checked = false;
    }
  });
}

function selectCheckboxProductInfo(currentCheckbox) {
  // Lấy tất cả các checkbox trong bảng product-info
  const checkboxes = document.querySelectorAll('#product-info input[type="checkbox"]');

  // Bỏ chọn tất cả các checkbox khác
  checkboxes.forEach(function(checkbox) {
    if (checkbox !== currentCheckbox) {
      checkbox.checked = false;
    }
  });
}
});