app.controller('ProductController', function ($scope, $http) {
    const API = 'http://phucuong.net/Caics/';
    $http.get(API + 'getlist').then(function (response) {
        $scope.records = response.data;

        // console.log($scope.records)
    }, function (error) {
        console.log(error);
    }
    );

    $http.get(API + 'getlistdel').then(function (response) {
        $scope.recordsdel = response.data;

        // console.log($scope.records)
    }, function (error) {
        console.log(error);
    }
    );
    $scope.modalDel = function () {
        $('#deledProduct').modal('show');
    };
    $scope.modal = function (state, id) {
        $scope.state = state;
        switch (state) {
            case 'add':
                $scope.modaltile = "Add Product";
                $('#exampleModal').modal('show');
                break;
            case 'edit':
                $scope.modaltile = "Edit Product";
                $http.get(API + 'getproduct?id=' + id).then(function (response) {
                    $scope.product = response.data;
                    console.log(response);
                }, function (error) {
                    console.log(error);
                }
                )
                $('#exampleModal').modal('show');
                break;
            case 'close':
                $scope.product = null;
                break;
            case 'del':
                console.log(id);
                var formData = new FormData();
                formData.append('visible', '0');
                $http.post(API + 'delproduct?id=' + id).then(function (response) {

                    console.log(response);
                    location.reload();
                }, function (error) {
                    console.log(error);
                }
                )
                break;

                case 'restore':
                    console.log(id);
                    var formData = new FormData();
                    formData.append('visible', '1');
                    $http.post(API + 'restoreproduct?id=' + id).then(function (response) {
    
                        console.log(response);
                        location.reload();
                    }, function (error) {
                        console.log(error);
                    }
                    )
                    break;

        }


    }


    $scope.save = function (state, id) {
        console.log(state);
        console.log($scope.product[0].prd_img);
        if (state == 'add') {
            var url = API + 'addproduct';
            var formData = new FormData();
            formData.append('name', $scope.product[0].prd_name);
            formData.append('cate', $scope.product[0].prd_cate);
            formData.append('price', $scope.product[0].prd_price);
            formData.append('status', $scope.product[0].prd_status);
            formData.append('img', $scope.product[0].prd_img); // Thêm hình ảnh vào FormData

            $http({
                method: 'POST',
                url: url,
                data: formData,
                headers: { 'Content-Type': undefined } // Đặt content-type là undefined
            }).then(function (response) {
                console.log(response);
                location.reload();

            }, function (error) {
                console.log(error);
            });
        }
        if (state == 'edit') {
            console.log(id);
            var url = API + 'editproduct?id=' + id;
            var formData = new FormData();
            formData.append('name', $scope.product[0].prd_name);
            formData.append('cate', $scope.product[0].prd_cate);
            formData.append('price', $scope.product[0].prd_price);
            formData.append('status', $scope.product[0].prd_status);
            formData.append('img', $scope.product[0].prd_img); // Thêm hình ảnh vào FormData

            $http({
                method: 'POST',
                url: url,
                data: formData,
                headers: { 'Content-Type': undefined } // Đặt content-type là undefined
            }).then(function (response) {
                console.log(response);
                location.reload();

            }, function (error) {
                console.log(error);
            });
        }

    }



    $(document).ready(function() {
        // Khi nhập từ khóa tìm kiếm
        $('input[id="searchpr"]').on('keyup', function() {
          // Đặt từ khóa tìm kiếm vào biến $search
          let $search = $(this).val();
          // Lọc dữ liệu theo từ khóa tìm kiếm
          $scope.searchKeyword = $search;
          $scope.$apply();
        });
      });
      
      $scope.sortColumn = function(columnName) {
        $scope.reverseSort = ($scope.columnName === columnName) ? !$scope.reverseSort : false;
        $scope.columnName = columnName;
      }
}); 