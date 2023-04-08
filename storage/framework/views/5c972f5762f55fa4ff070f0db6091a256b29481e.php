<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <script src="./public/app/lib/angular.min.js"></script>
  <script src="https://kit.fontawesome.com/b907c217d3.js" crossorigin="anonymous"></script>
  <base href="<?php echo e(asset('./public/backend')); ?>/">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js"></script>
  <title>Document</title>
</head>

<body>
  <div ng-controller="userControl" class="bg-image p-5 shadow-1-strong text-white" style="
        background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/003.webp');
        height: 100vh;
        width: 100%;
      ">
    <h1 class="mb-3 ms-5 h2">Danh sách bạn bè</h1>

    <form role="form">
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Name" aria-label="Name" ng-model="formData.name" required>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Email" ng-model="formData.email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" placeholder="Password" ng-model="formData.pass" required>
      </div>
      <div class="form-check form-check-info text-start">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
        <label class="form-check-label" for="flexCheckDefault">
          I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
        </label>
      </div>
      <div class="text-center">
        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" ng-click=add()>Sign up</button>
      </div>
      <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?php echo e(URL::asset('/signin')); ?>" class="text-dark font-weight-bolder">Sign in</a></p>
    </form>
    <div class="form-outline mb-4 d-flex align-items-center justify-content-center">
    </div>
    <button class="btn btn-primary w-50 btn-block mb-4 ms-5" ng-click=add()>
      Sign in
    </button>

    <table class="ms-5 text-center table-bordered border-dark-subtle bg-black w-50">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">##</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="user in records">
          <th scope="row"></th>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button class="btn btn-success me-3" ng-click=modaledit(user)>
              Cập nhật</button>
            <button class="btn btn-warning" ng-click=hihi(user.id)>
              Xóa
            </button>
            <button class="btn btn-primary" ng-click=them(user.id)>
              Thêm
            </button>
          </td>
        </tr>
      </tbody>
    </table>
      <br> <br><br><br><br><br>
    <div>
    <table class="ms-5 text-center table-bordered border-dark-subtle bg-black w-50">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">##</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="user in Ordernone">
          <th scope="row"></th>
          <td class="nameuser">{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
           
    
            <button class="btn btn-primary" ng-click=xoa(user.id)>
              Xóa
            </button>
          </td>
        </tr>
        <tfoot>
          <button class="btn btn-primary" style="margin-right: -80px;" ng-click=random()>
            Chọn
          </button>

        </tfoot>
      </tbody>
    </table>
    </div>


  

    <div class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form role="form">
      <div class="mb-3">
        <label for="">Name</label>
        <input type="text" class="form-control"  placeholder="{{oneu.name}}" aria-label="Name" ng-model="formedit.name" required>
      </div>
      <div class="mb-3">
        <label for="">Email</label>
        <input type="email" class="form-control" placeholder="{{oneu.email}}" ng-model="formedit.email" required>
      </div>
      <div class="form-check form-check-info text-start">
      
      </div>
   
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="" class="btn btn-primary" ng-click=getedit(oneu)>Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    
    type: 'bar',
    
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        
        backgroundColor: [
      'rgb(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>



  <!-- Modal -->
 
</body>
<script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<script src="../app/app.js"></script>
<script src="../app/controller/ProductController.js"></script>
<script>
  app.controller('userControl', function($scope, $http) {
    const API = 'http://phucuong.net/Caics/';
    $http.get(API + 'getusernone').then(function (response) {
        $scope.Ordernone = response.data;
    }, function (error) {
        console.log(error);
    }
    );

    $http.get(API + 'getuser').then(function(response) {
      $scope.records = response.data;

      // console.log($scope.records)
    }, function(error) {
      console.log(error);
    });
    $scope.add = function() {
      
      let url = API + "getadd"
      var formData = new FormData();
      formData.append('name', $scope.formData.name);
      formData.append('email', $scope.formData.email);
      formData.append('pass', $scope.formData.pass);
      console.log(formData);

      $http({
        method: 'POST',
        url: url,
        data: formData,
        headers: {
          'Content-Type': undefined
        } // Đặt content-type là undefined
      }).then(function(response) {
        console.log(response);
        location.reload();
        window.alert("Sign up success!");

      }, function(error) {
        console.log(error);
      });

    }
    $scope.login = function() {
      let url = API + "login"
      let formData = new FormData();
      formData.append('email', $scope.formData.email);
      formData.append('password', $scope.formData.pass);

      $http({
          method: 'POST',
          url: url,
          data: formData,
          headers: {
            'Content-Type': undefined
          }
        }).then(function(response) {
          if (response.data.user) {
            window.alert(response.data.message);
            window.location = "/caics"
          } else {
            window.alert(response.data.message);
          }
        }),
        function(response) {
          window.alert(response.message);
        };
    }
    $scope.hihi = function(user) {
      // console.log('deleteUser');
      console.log(user);
      let url = API + "deluser"
      let formData = new FormData();
      formData.append('user', user);

      $http({
        method: 'POST',
        url: url,
        data: formData,
        headers: {
          'Content-Type': undefined
        }
      }), then(function(response) {
        location.reload();
      });
    }

    $scope.modaledit = function(user) {

        $scope.oneu = user;
        console.log($scope.oneu);
        $('#edituser').modal('show');
    };
    $scope.getedit = function(user) {
      let url = API + "getedituser"
      var formData = new FormData();
      formData.append('name', $scope.formedit.name);
      formData.append('email', $scope.formedit.email);
      formData.append('id', user.id);

      $http({
          method: 'POST',
          url: url,
          data: formData,
          headers: {
            'Content-Type': undefined
          }
        }).then(function(response) {
          if (response.data.datas) {
            window.alert(response.data.datas);
            location.reload();
          } 
        })
       
    };
    $scope.them = function(user){
      console.log(user);
      let url = API + "themmang"
      var formData = new FormData();
      formData.append('id', user);

      $http({
          method: 'POST',
          url: url,
          data: formData,
          headers: {
            'Content-Type': undefined
          }
        }).then(function(response) {
          location.reload();
        })
    }
    $scope.xoa = function(user){
      console.log(user);
      let url = API + "xoamang"
      var formData = new FormData();
      formData.append('id', user);

      $http({
          method: 'POST',
          url: url,
          data: formData,
          headers: {
            'Content-Type': undefined
          }
        }).then(function(response) {
          location.reload();
        })
    }
    $scope.random =function(){
      
      var tds = document.querySelectorAll("tr[ng-repeat='user in Ordernone'] td:nth-child(2)");
  var index = Math.floor(Math.random() * tds.length);
    
    window.alert("Người trúng thưởng là: "+ tds[index].textContent.trim()  );
    var tdToRemove = tds[index];
  tdToRemove.parentNode.removeChild(tdToRemove);



    }

  })
</script>

</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/caics/resources/views/lab.blade.php ENDPATH**/ ?>