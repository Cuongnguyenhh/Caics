
// const test = document.querySelector('.test')
const app = angular.module("myApp", []);

app.controller('myCtrl', function ($scope, $http) {
    $http.get('http://phucuong.net/Caics/getlist').then(function (response) {
        $scope.records = response.data;
        console.log($scope.records)
    }, function (error) {
        console.log(error);
    });
});
// console.log('app',app);
