$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function(){
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
});

// Đổ dữ liệu ra client
let quantity = document.querySelector('#sum');
let price = document.querySelector('#price_pro').value;
let sale_pro = document.querySelector('#sale_pro').value;
let provisional = document.querySelector('#provisional');
let sale = document.querySelector('#sale');
let transport_fee = document.querySelector('#transport_fee');
document.querySelector('#plus').onclick = function(){
  console.log(quantity.value);
  provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
  sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
}
document.querySelector('#Subtraction').onclick = function(){
  console.log(quantity.value);
  provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
  sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
}
document.querySelector('#sum').onchange = function(){
  console.log(quantity.value);
  provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
  sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
}