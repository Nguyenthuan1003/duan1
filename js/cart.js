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

let sum = 0;
let quantity = document.querySelectorAll(".input-qty");
let price = document.querySelectorAll(".price_product_default");
let changes = document.querySelectorAll(".plus ");
let inner = document.querySelectorAll(".price_product_on_cart");
// for (let i = 0; i < quantity.length; i++) {
//   arr[i] = quantity[i].value;
// }
// for (let i = 0; i < arr.length; i++) {
//   console.log(arr[i]);
// }
for(let a = 0; a < changes.length; a++){
  changes[a].onclick = function() {
    let result = changes[a].parentElement.children
    // console.log(result);
    // console.log(result.length);
    for(let b = 0; b < result.length; b++){
      // console.log(result[b].getAttribute("class") === 'input-qty')
      // console.log(result[b].getAttribute("class"))
      // console.log(result[a])
      for (let index = 0; index < inner.length; index++) {
        if((result[b].getAttribute("class") === 'input-qty')===true && index === a){
          inner[index].innerHTML = `${Number(result[b].value)*Number(price[index].value)}`;
          
        } 
      }   
  } 
  
  
}
}

// let inners = document.querySelectorAll(".price_product_on_cart");
// for(let i = 0; i < inners.length; i++){
//   sum += Number(inners[i].textContent);
//   console.log(inners[i].textContent);
//   console.log(sum);
// }