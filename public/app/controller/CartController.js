app.controller('CartController', function ($scope, $http) {
    $scope.addProductToCart = function (product) {
        var cart = JSON.parse(sessionStorage.getItem('cart')) || []; // Retrieve cart from session storage, or create new cart if none exists

        var productIndex = cart.findIndex(function (cartProduct) { // Check if product already exists in cart
            return cartProduct.id === product.id;
        });

        if (productIndex === -1) { // If product not in cart, add it    
            product.quantity = 1; // Set initial quantity to 1
            cart.push(product);
        } else { // If product already in cart, increment quantity
            cart[productIndex].quantity++;
        }

        sessionStorage.setItem('cart', JSON.stringify(cart)); // Store updated cart in session storage       
    }
    let cart = JSON.parse(sessionStorage.getItem('cart'));

    $scope.setCart = cart ? cart : [];


    $scope.checkCart = function (index) {
        console.log($scope.setCart);

    }

    $scope.test = function () {
        console.log('test');
    }

    $scope.removeCart = function (index) {
        
        
        cart.splice(index, 1); // Xóa phần tử đầu tiên trong mảng
        sessionStorage.setItem('cart', JSON.stringify(cart));
    }
    if(cart){
        $scope.cartCount = cart.length;
    }
    
    $scope.$watch('cartCount', function (newVal, oldVal) {
        if (newVal !== oldVal) {
            // Cập nhật giá trị của phần tử HTML tương ứng
            document.querySelector('.tip').innerText = newVal;
        }
    });

    $scope.totalPrice = 0;

            
})