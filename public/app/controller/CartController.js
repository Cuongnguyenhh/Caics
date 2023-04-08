app.controller('CartController', function ($scope, $http) {
  const API = 'http://phucuong.net/Caics/';
  const cart = JSON.parse(localStorage.getItem('cart')) || [];

  $scope.addProductToCart = function (product) {
    const productIndex = cart.findIndex(p => p.id === product.id);

    if (productIndex === -1) { // If product not in cart, add it    
      product.quantity = 1; // Set initial quantity to 1
      cart.push(product);
    } else { // If product already in cart, increment quantity
      cart[productIndex].quantity++;
    }

    localStorage.setItem('cart', JSON.stringify(cart)); // Store updated cart in local storage       
  }

  $scope.setCart = cart;

  $scope.removeCart = function (index) {
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
  }

  $scope.cartCount = cart.length;

  $scope.totalCartCheck = 0;
  let totalpricecart = 0
  for (var i = 0; i < $scope.setCart.length; i++) {

    totalpricecart += ($scope.setCart[i].quantity * $scope.setCart[i].prd_price);
  }
  $scope.TotalPriceOfcart = totalpricecart;

  $scope.getCheckout = function () {
    let url = API + "getcheckout"
    var formData = new FormData();
    formData.append('name', $scope.checkout.name);
    formData.append('phone', $scope.checkout.phone);
    formData.append('email', $scope.checkout.email);
    formData.append('adr', $scope.checkout.adr);
    formData.append('price', $scope.TotalPriceOfcart);
    let doneCart = $scope.setCart;
    for(let i = 0; i < doneCart.length; i++){
      formData.append('name_prd['+i+']', doneCart[i].prd_name);
      formData.append('price_prd['+i+']', doneCart[i].prd_price);
      formData.append('quantity['+i+']', doneCart[i].quantity);    
    }
    
    
    $http({
      method: 'POST',
      url: url,
      data: formData,
      headers: { 'Content-Type': undefined } // Đặt content-type là undefined
    }).then(function () {
      window.alert("Order Successfully!!")
    })

  }
});
