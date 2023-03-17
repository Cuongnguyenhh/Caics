app.controller('ProductController', function ($scope, $http) {
    const API = 'http://phucuong.net/Caics/';
    $http.get(API +'getlist').then(function (response) {
        $scope.records = response.data;
        // console.log($scope.records)
    }, function (error) {
        console.log(error);
    });
    $scope.modal = function (state) {
        $scope.state = state;
        switch (state) {
            case 'add':
                $scope.modaltile = "Add Product";
                break;
            case 'edit':
                $scope.modaltile = "Edit Product";
        }


        $('#exampleModal').modal('show');
    }

    // $scope.save = function(state){
    //     if (state == 'add'){
    //       var url = API + 'addproduct';
    //       var formData = new FormData();
    //       var file = $scope.product.img; // lấy thông tin về file từ thuộc tính img của đối tượng product
    //       formData.append('file', file);
    //       formData.append('product', angular.toJson($scope.product)); // chuyển đổi object product sang chuỗi JSON và thêm vào formData
    //       $http.post({
           
    //         url: url,
    //         data: formData,
    //         headers: { 'Content-Type' : undefined } // sử dụng undefined để angular tự đặt header
    //       }).then(function (response) {
    //         window.location="http://phucuong.net/Caics/addproduct";
    //         console.log(formData);
    //         console.log('gigi');
    //       }),function(error) {
    //         console.log(error);
    //       };
    //     }
    //   }
    $scope.save = function(state){
      if (state == 'add'){
          var url = API +'addproduct';
          var formData = new FormData();
          formData.append('name', $scope.product.name);
          formData.append('cate', $scope.product.cate);
          formData.append('status', $scope.product.status);
          formData.append('price', $scope.product.price);
          formData.append('img', $scope.product.img); // Thêm hình ảnh vào FormData
  
          $http({
              method: 'POST',
              url: url,
              data: formData,
              headers: { 'Content-Type': undefined } // Đặt content-type là undefined
          }).then(function(response) {
              console.log(response);
          }, function(error) {
              console.log(error);
          });
      }
  }
  
      
      
      

}); 