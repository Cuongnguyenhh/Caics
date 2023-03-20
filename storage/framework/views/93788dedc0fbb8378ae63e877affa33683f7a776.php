<?php $__env->startSection('admin_content'); ?>
<div class="container-fluid py-4" ng-app="myApp" ng-controller="ProductController">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">

        <div class="card-header pb-0" id="sidenav-main" data-color="warning">
          <button class="btn bg-gradient-warning float-end" style="margin-left: 10px;" ng-click="modalDel()">Backup </button>
          <button class="btn btn-success float-end w-25" ng-click="modal('add')">Add new product</button>
          <input type="text" id="searchpr" class="form-control float-end w-30 h-15 bg-light" style="margin-right: 10px;" ng-model="searchKeyword" placeholder="Search...">
          <h6>Products table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0" style="height: 450px; ">
            <table class="table align-items-center mb-0">
              <thead >
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" ng-click="sortColumn('prd_name')"><a ng-click="sortColumn('prd_name')">Name</a></th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"><a ng-click="sortColumn('prd_price')">Price</a></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><a ng-click="sortColumn('prd_status')">Status</a></th>

                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><a ng-click="sortColumn('created_at')">Date Add</a></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="x in records | filter:searchKeyword | orderBy:columnName:reverseSort "  style="overflow: scroll;">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="<?php echo e(asset('/storage/app/public/images')); ?>/{{x.prd_img}}" class="avatar avatar-sm me-3" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{x.prd_name}}</h6>
                        <p class="text-xs text-secondary mb-0">{{x.prd_cate}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ">${{x.prd_price}}</p>

                  </td>
                  <td class="align-middle text-center text-sm">
                    <span ng-class="{'badge badge-sm bg-gradient-success': x.prd_status ==1 , 'badge badge-sm bg-gradient-secondary': x.prd_status == 0}">
                      {{ x.prd_status == 1 ? 'Selling' : 'Stopped' }}
                    </span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{x.created_at}}</span>
                  </td>
                  <td class="align-middle">
                    <button type="button" class="btn bg-gradient-primary" ng-click="modal('edit',x.id)">Edit</button>
                    <button type="button" class="btn bg-gradient-danger " ng-click="modal('del',x.id)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- modal layout -->
  <div class="modal fade modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">{{modaltile}}</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form name="modalProduct" class="w-70 m-auto" enctype="multipart/form-data">

              <div class="mb-2">
                <label class="form-label">Product name </label>
                <input type="type" class="form-control" id="name" name="prd_name" ng-model="product[0].prd_name" ng-required="true">
                <span class="text-danger" ng-show="modalProduct.name.$error.required"> Please type product name</span>
              </div>
              <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" id="price" name="prd_price" class="form-control" ng-model="product[0].prd_price" ng-required="true">
                <span class="text-danger" ng-show="modalProduct.price.$error.required"> Please type product price</span>
              </div>

              <label class="form-label">Category</label>
              <select class="form-select" id="prd_cate" name="cate" aria-label="Default select example" ng-model="product[0].prd_cate" ng-required="true">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>

              <label class="form-label">Status</label>
              <select class="form-select" aria-label="Default select example" ng-model="product[0].prd_status" ng-required="true">
                <option value="1">Sale</option>
                <option value="0">Stop Sale</option>
              </select>
              <div class="mb-3">
                <label class="form-label">Choose product image</label>
                <input class="form-control"  name="file" type="file" file-model="product[0].prd_img"  ng-required="true">
              </div>  
            </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" ng-click="modal('close')">Close</button>
            <button type="button" class="btn btn-primary" ng-disabled="modalProduct.$invalid" ng-click="save(state,product[0].id) ">Save changes</button>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- modal deled product -->
  <div class="modal fade modal-lg" id="deledProduct" tabindex="-1" aria-labelledby="deledProduct" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Products Was deleted </h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <table class="table">
            <div class="form-group">
              <input type="text" id="searchpr" class="form-control" ng-model="searchKeyword" placeholder="Search...">
            </div>

            <thead>
              <tr class="bg-gradient-success">
                <th scope="col" ><a ng-click="sortColumn('prd_name')">Name</a></th>
                <th scope="col" ><a ng-click="sortColumn('prd_cate')">Category</a></th>
                <th scope="col" > <a ng-click="sortColumn('delete_at')">Delete At</a></th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              <tr class="bg-gradient-warning" ng-repeat="del in recordsdel | filter:searchKeyword | orderBy:columnName:reverseSort">
                <td>
                  <h6>{{del.prd_name}}</h6>
                </td>
                <td>
                  <h6>{{del.prd_cate}}</h6>
                </td>
                <td>
                  <h6>{{del.delete_at}}</h6>
                </td>
                <td class="align-middle">

                  <button type="button" class="btn btn-sm bg-gradient-success " ng-click="modal('restore',del.id)">Restore</button>

                </td>
              </tr>
            </tbody>
          </table>


        </div>
      </div>

    </div>
  </div>

  <script>
  </script>


  <!-- modal edit -->
  <!-- large modal -->
  <!-- Modal -->
  <script>

  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Caics/resources/views/pages/product.blade.php ENDPATH**/ ?>