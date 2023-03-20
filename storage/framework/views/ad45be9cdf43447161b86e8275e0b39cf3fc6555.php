<?php $__env->startSection('cart_content'); ?>
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="<?php echo e(URL::asset('/home')); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- <button ng-click="checkCart()">check</button> -->
<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody ng-init="totalPrice = 0">
                            <tr ng-repeat="(index, item) in setCart">
                                <td class="cart__product__item">
                                    <img style="width: 80px; height: 80px;" src="<?php echo e(asset('/storage/app/public/images')); ?>/{{item.prd_img}}" alt="">
                                    <div class="cart__product__item__title">
                                        <h6>{{item.prd_name}}</h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">${{item.prd_price}}</td>
                                <td class="cart__quantity">
                                    <input type="number" min="1" class="form-control" style="width: 80px; border-radius: 12px; text-align: center; padding-left: 10px ;" aria-label="Sizing example input" ng-model="item.quantity">
                                </td>
                                <td class="cart__total" ng-bind="item.quantity * item.prd_price"></td>
                                <td ng-click="removeCart($index)" class="cart__close"><span class="icon_close"></span></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <td>
                                <h4 style="color: black; font-weight: 600;">Total:</h4>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <h4 style="color: red; font-weight: 600;" ng-bind="totalPrice"></h4>
                            </td>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                <a href="<?php echo e(URL::asset('/home')); ?>">Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn update__btn">
                <a href="<?php echo e(URL::asset('/home')); ?>">Check Out</a>
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
</section>
<!-- Shop Cart Section End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('cart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Caics/resources/views/pages-home/cart.blade.php ENDPATH**/ ?>