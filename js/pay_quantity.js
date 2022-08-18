
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
let sumMoney = document.querySelector('#sumMonney');
let sale_pro = document.querySelectorAll('.sale');
for (let c = 0; c < sale_pro.length; c++) {
 
    for (let j = 0; j < price.length; j++) {
      if( j === c){
        if(Number(sale_pro[c].value) > 0){
          sum += Number(sale_pro[j].value);
        }else{
          sum += Number(price[j].value);
        }
      provisional.innerHTML =`Tạm tính: ${sum} đ`; 
    }
  }
  
}
console.log(provisional);