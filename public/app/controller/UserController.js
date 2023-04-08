app.controller('userControl', function ($scope, $http){
    const API = 'http://phucuong.net/Caics/';
    $http.get(API + 'getuser').then(function (response) {
        $scope.records = response.data;

        // console.log($scope.records)
    }, function (error) {
        console.log(error);
    }
    );
    $scope.add = function(){
        let url = API +"getadd"
        var formData = new FormData();
        formData.append('name', $scope.formData.name);
        formData.append('email', $scope.formData.email);
        formData.append('pass', $scope.formData.pass);
        console.log(formData);
       
        $http({
            method: 'POST',
            url: url,
            data: formData,
            headers: { 'Content-Type': undefined } // Đặt content-type là undefined
        }).then(function (response) {
            console.log(response);
            location.reload();
            window.alert("Sign up success!");

        }, function (error) {
            console.log(error);
        });

    }
    $scope.login = function(){
        let url = API + "login"
        let formData = new FormData();
        formData.append('email',$scope.formData.email);
        formData.append('password', $scope.formData.pass);

        $http({
            method: 'POST',
            url: url,
            data: formData,
            headers: { 'Content-Type': undefined }
        }).then(function (response) {
            if (response.data.user) {
                window.alert(response.data.message);
                window.location="/caics"
              } else {
                window.alert(response.data.message);
              }
        }),function (response) {
            window.alert(response.message);
        };
    }
   
    
})