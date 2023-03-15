app.controller('ProductController', function ($scope, $http) {
    $http.get('').then(function (response) {
       $scope.product =
       { id: 1, name: 'Product A', price: 10 },
       { id: 2, name: 'Product B', price: 20 },
       { id: 3, name: 'Product C', price: 30 }
    }, function (error) {
        console.log(error);
    });
});