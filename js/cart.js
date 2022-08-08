
$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('mix')),
    max = Number($this.attr('max'))
    if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function(){
    if ($(this).hasClass('minus')) {
      if (d > 1) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
});


let sum = 0;
let quantity = document.querySelectorAll(".input-qty");
let price = document.querySelectorAll(".price_product_default");
let changes = document.querySelectorAll(".plus ");
let inner = document.querySelectorAll(".price_product_on_cart");
let minus = document.querySelectorAll(".minus");
let money = document.querySelector("#money");
let showMoney = document.querySelector('#showMoney');
for(let i = 0; i < inner.length; i++){
  sum += Number(inner[i].textContent);
  money.innerHTML = `Tạm tính: ${sum.toLocaleString() } đ`;
  showMoney.innerHTML = `Tiền hàng: ${sum.toLocaleString()} đ`; 
  // console.log(sum)
}
for(let a = 0; a < changes.length; a++){
  changes[a].onclick = function() {
    let result = changes[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < inner.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          inner[index].innerHTML = `${Number(result[b].value)*Number(price[index].value)}`;
          
        } 
      }   
  }
  sum = 0;
  for(let i = 0; i < inner.length; i++){
      sum += Number(inner[i].textContent);
      money.innerHTML = `Tạm tính: ${sum.toLocaleString() } đ`;
      showMoney.innerHTML = `Tiền hàng: ${sum.toLocaleString()} đ`; 
      // console.log(sum)
  }
}
}
    
for(let a = 0; a < minus.length; a++){
  minus[a].onclick = function() {
    let result = minus[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < inner.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          inner[index].innerHTML = `${Number(result[b].value)*Number(price[index].value)}`;
          quantity[index] = result[b] 
        } 
      }   
  }
  sum = 0;
  for(let i = 0; i < inner.length; i++){
      sum += Number(inner[i].textContent);
      money.innerHTML = `Tạm tính: ${sum.toLocaleString() } đ`;
      showMoney.innerHTML = `Tiền hàng: ${sum.toLocaleString()} đ`; 
  }
}
}
for(let a = 0; a < quantity.length; a++){
  quantity[a].onchange = function() {
    let result = quantity[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < inner.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          inner[index].innerHTML = `${Number(result[b].value)*Number(price[index].value)}`;
          
        } 
      }   
  }
  sum = 0;
  for(let i = 0; i < inner.length; i++){
      sum += Number(inner[i].textContent);
      money.innerHTML = `Tạm tính: ${sum.toLocaleString() } đ`;
      showMoney.innerHTML = `Tiền hàng: ${sum.toLocaleString()} đ`; 
      
  }
}
}


