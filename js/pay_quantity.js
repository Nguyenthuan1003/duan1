$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
});
let sum;
let money = $("#price_pro").val();
let quantity = $("#sum").val();
console.log(money);
document.querySelector("#sum").onchange = function(){
  console.log(quantity);
  document.querySelector("#provisional").innerHTML = `Tạm tính: ${Number(money)*Number(quantity)}`;
  document.querySelector("#sale").innerHTML = `Khuyến mãi: ${$("#sale_pro").val()}`;
  document.querySelector("#transport_fee").innerHTML = `Phí vận chuyển: 0đ`;
  if($("#sale_pro").val() > 0){
    sum = Number($("#sale_pro").val())*Number($("#sum").val());
  }else{
      sum = Number($("#price_pro").val())*Number($("#sum").val());
  }
  document.querySelector("#sumMonney").innerHTML = `Tổng tiền: <input type="text" value="${sum}" disabled>`;
}




