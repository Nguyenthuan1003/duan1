var price_product = document.querySelectorAll(".price_product_on_cart");
var quantity_product = document.querySelectorAll(".quantity_product_on_cart");
var minus_product = document.querySelectorAll(".minus_product_on_cart");
var plus_product = document.querySelectorAll(".plus_product_on_cart");
var price_default = document.querySelectorAll(".price_product_default");

for(var i = 0 ; i < price_product.length ; i++)
{
  minus_product[i].onclick = function(){ quantity_product[i].innerHTML = quantity_product[i].value - 1  ; price_product[i].innerHTML =  price_default[i].value * quantity_product[i].value  };
  plus_product[i].onclick = function(){ quantity_product[i].innerHTML = quantity_product[i].value + 1  ; price_product[i].innerHTML =  price_default[i].value * quantity_product[i].value  };
}