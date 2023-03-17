@extends('admin')
@section('admin_content')
<div class="container-fluid py-4" ng-app="myApp" ng-controller="ProductController">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">

        <div class="card-header pb-0">
          <button class="btn btn-success float-end w-25" ng-click="modal('add')">Add new product</button>
          <h6>Authors table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr ng-repeat="x in records">
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="./assets/img/@{{x.prd_img}}" class="avatar avatar-sm me-3" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">@{{x.prd_name}}</h6>
                        <p class="text-xs text-secondary mb-0">@{{x.prd_cate}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0 ">$@{{x.prd_price}}</p>

                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Saling</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">@{{x.create_at}}</span>
                  </td>
                  <td class="align-middle">
                    <button type="button" class="btn btn-primary" ng-click="modal('edit')">Edit</button>
                    </a>
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
  <div  class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">@{{modaltile}}</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form name="modalProduct" class="w-70 m-auto">
  
            <div class="mb-2">
              <label class="form-label">Product name</label>
              <input type="type" class="form-control" id="name" name="name" ng-model="product.name" ng-required="true">
              <span class="text-danger" ng-show="modalProduct.name.$error.required"> Please type product name</span>
            </div>
            <div class="mb-3">
              <label class="form-label">Price</label>
              <input type="text" id="price" name="price" class="form-control"  ng-model="product.price" ng-required ="true">
              <span class="text-danger" ng-show="modalProduct.price.$error.required"> Please type product price</span>
            </div>
            <select class="form-select"  id="cate" name= "cate"  aria-label="Default select example" ng-model="product.cate">
              <option selected>Select product's category</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <hr>
            <select class="form-select" aria-label="Default select example" ng-model="product.status">
              <option selected>Select product's status</option>
              <option value="1">Sale</option>
              <option value="2">Stop Sale</option>
            </select>
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label">Choose product image</label>
              <input class="form-control" type="file" id="formFileMultiple" multiple ng-model="product.img">
            </div>
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-disabled="modalProduct.$invalid" ng-click="save(state) ">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- modal edit -->
<!-- large modal -->
<!-- Modal -->
<script>

</script>
@endsection