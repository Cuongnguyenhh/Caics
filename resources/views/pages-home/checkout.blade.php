@extends('cart')
@section('cart_content')
<section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div>
            <form action="#" name="checkoutForm" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">       
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Name <span>*</span></p>
                                    <input type="text" value="<?php echo $_SESSION['login']['name'] ?>" ng-model="checkout.name" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address" ng-model="checkout.adr" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" ng-model="checkout.phone" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" value="<?=$_SESSION['login']['email']?>" ng-model="checkout.email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                 
                                  
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Decscrition<span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                      
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <li ng-repeat="(index, item) in setCart">@{{item.prd_name}}<span ng-bind="(item.quantity * item.prd_price)"></span></li>
                                    
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>@{{TotalPriceOfcart}}</span></li>
                                        
                                    </ul>
                                </div>
                                <button type="button" class="site-btn" ng-disabled="checkoutForm.$invalid" ng-click=getCheckout()>Order</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
@endsection