function fillForm(productCode) {
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
  