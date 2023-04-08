<?php $__env->startSection('cart_content'); ?>
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?php echo e(URL::asset('/home')); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Your Order</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- <button ng-click="checkCart()">check</button> -->
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad" ng-controller="userOrderControl">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Time Order</th>
                                <th>Total Price</th>
                                <th>Action</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="(index, item) in Order">
                                <td class="cart__product__item">
                                    <div class="cart__product__item__title">
                                        <h6>{{item.created_at}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">${{item.order_price}}</td>
                                <td ng-if="item.status == 0">
                                    <button class="btn btn-danger" ng-click="removeOrder(item.id)">Delete Order</button>
                                </td>
                                <td ng-if="item.status == 1">
                                    <button class="btn btn-success" >Success</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" ng-click="showModal(item.id)">Detail</button>
                                </td>
                            </tr>


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-6">
                <div class="discount__content">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Enter your coupon code">
                        <button type="submit" class="site-btn">Apply</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ 750.0</span></li>
                        <li>Total <span>$ 750.0</span></li>
                    </ul>
                    <a href="" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div> -->
    </div>



    <!-- modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <table class="table table-bordered">
  <thead>
    <tr>
   
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="itemDetail in orderDetail">
      
      <td>{{itemDetail.prd_name}}</td>
      <td>${{itemDetail.prd_price}}</td>
      <td>{{itemDetail.quantity}}</td>
      <td ng-bind="{{itemDetail.prd_price}}*{{itemDetail.quantity}}"></td>
    </tr>
    
  </tbody>
</table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal -->
</section>
<script>
    // Get all elements with class "cart__total"
</script>
<!-- Shop Cart Section End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/caics/resources/views/pages-home/userOrder.blade.php ENDPATH**/ ?>