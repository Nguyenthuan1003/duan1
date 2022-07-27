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
// let quantity = document.querySelector('#sum');
// let price = document.querySelector('#price_pro').value;
// let sale_pro = document.querySelector('#sale_pro').value;
let provisional = document.querySelector('#provisional');
let sale = document.querySelector('#sale');
let transport_fee = document.querySelector('#transport_fee');
// document.querySelector('#plus').onclick = function(){
//   console.log(quantity.value);
//   provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
//   sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
// }
// document.querySelector('#Subtraction').onclick = function(){
//   console.log(quantity.value);
//   provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
//   sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
// }
// document.querySelector('#sum').onchange = function(){
//   console.log(quantity.value);
//   provisional.innerHTML =`Tạm tính:  ${Number(quantity.value) * Number(price)} đ`;
//   sale.innerHTML = `Khuyến mãi: ${Number(sale_pro) * Number(quantity.value)} đ`;
// }
let sum = 0;
let quantity = document.querySelectorAll(".input-qty");
let price = document.querySelectorAll(".price");
let changes = document.querySelectorAll(".plus ");
let minus = document.querySelectorAll(".minus");
let sumMoney = document.querySelector('#sumMonney');
let sale_pro = document.querySelectorAll('.sale');
for (let c = 0; c < sale_pro.length; c++) {
  for(let i = 0; i < quantity.length; i++){
    for (let j = 0; j < price.length; j++) {
      if(i===j && i === c){
        if(Number(sale_pro[c].value) > 0){
          sum += (Number(quantity[i].value)* Number(sale_pro[j].value));
        }else{
          sum += (Number(quantity[i].value)* Number(price[j].value));
        }
      provisional.innerHTML =`Tạm tính: ${sum} đ`; 
    }
  }   
  }
  
}
for(let a = 0; a < changes.length; a++){
  changes[a].onclick = function() {
    let result = changes[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < quantity.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          quantity[index] = result[b];
        } 
      }   
  }
  sum = 0;
  for (let c = 0; c < sale_pro.length; c++) {
    for(let i = 0; i < quantity.length; i++){
      for (let j = 0; j < price.length; j++) {
        if(i===j && i === c){
          if(Number(sale_pro[c].value) > 0){
            sum += (Number(quantity[i].value)* Number(sale_pro[j].value));
          }else{
            sum += (Number(quantity[i].value)* Number(price[j].value));
          }
        provisional.innerHTML =`Tạm tính: ${sum} đ`; 
      }
    }   
    }
    
  }
  
}
}
      
for(let a = 0; a < minus.length; a++){
  minus[a].onclick = function() {
    let result = minus[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < quantity.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          quantity[index] = result[b];
        } 
      }   
  }
  sum = 0;
  for (let c = 0; c < sale_pro.length; c++) {
    for(let i = 0; i < quantity.length; i++){
      for (let j = 0; j < price.length; j++) {
        if(i===j && i === c){
          if(Number(sale_pro[c].value) > 0){
            sum += (Number(quantity[i].value)* Number(sale_pro[j].value));
          }else{
            sum += (Number(quantity[i].value)* Number(price[j].value));
          }
        provisional.innerHTML =`Tạm tính: ${sum} đ`; 
      }
    }   
    }
    
  }
}
}
for(let a = 0; a < quantity.length; a++){
  quantity[a].onchange = function() {
    let result = quantity[a].parentElement.children
    for(let b = 0; b < result.length; b++){
      for (let index = 0; index < quantity.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          quantity[index] = result[b];
        } 
      }   
  }
  sum = 0;
  for (let c = 0; c < sale_pro.length; c++) {
    for(let i = 0; i < quantity.length; i++){
      for (let j = 0; j < price.length; j++) {
        if(i===j && i === c){
          if(Number(sale_pro[c].value) > 0){
            sum += (Number(quantity[i].value)* Number(sale_pro[j].value));
          }else{
            sum += (Number(quantity[i].value)* Number(price[j].value));
          }
        provisional.innerHTML =`Tạm tính: ${sum} đ`; 
      }
    }   
    }
    
  }
}
}