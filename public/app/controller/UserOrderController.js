app.controller('userOrderControl', function ($scope, $http){

    

   
    $http.get(API + 'getoderuser').then(function (response) {
        $scope.Order = response.data;
    }, function (error) {
        console.log(error);
    }
    );

  
    $scope.removeOrder = function (id) {
        $http.get(API + 'removeoderoneuser?id=' +id).then(function (response) {
            window.alert('Delete order successfully!!')
            location.reload();
        }, function (error) {
            console.log(error);
        }
        );
    }
    $scope.showModal = function (id) {
        $http.get(API + 'getoderoneuser?id=' +id).then(function (response) {
            $scope.orderDetail = response.data;
            console.log(response.data);
        }, function (error) {
            console.log(error);
        }
        );

        $('#detailModal').modal('show');
    };



// chartFillter


})