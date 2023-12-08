@extends("layout/Web_layout")

@section('title')
    Order History 
@endsection
@section('Web-Content')

<main class="main__content_wrapper">

    @if(session('orders'))
    <div class="alert alert-success">
      {{ session('orders') }}
    </div> 
    @endif

    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Account</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{url('index')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Account</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    
    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account__wrapper account__wrapper--style4 border-radius-10">
                            <div class="account__content">
                                <h2 class="account__content--title h3 mb-20">Orders History</h2>
                                <div class="account__table--area">
                                    <table class="account__table">
                                        <thead class="account__table--header">
                                            <tr class="account__table--header__child">
                                                <th class="account__table--header__child--items">Order</th>
                                                <th class="account__table--header__child--items">User</th>
                                                <th class="account__table--header__child--items">Email</th>
                                                <th class="account__table--header__child--items">Date</th>
                                                <th class="account__table--header__child--items">Payment Status</th>
                                                <th class="account__table--header__child--items">Total Product</th>
                                                <th class="account__table--header__child--items">Total Price</th>	 	 	 	
                                            </tr>
                                        </thead>
                                        <tbody class="account__table--body mobile__none">

                                            @foreach ($orders as $order)
                                            <tr class="account__table--body__child">
                                                <td class="account__table--body__child--items">#{{$order->Order_Id}}</td>
                                                <td class="account__table--body__child--items">{{$order->User_Number}}</td>
                                                <td class="account__table--body__child--items">{{$order->User_Email}}</td>
                                                <td class="account__table--body__child--items">{{$order->created_at}}</td>
                                                <td class="account__table--body__child--items">{{$order->Payment_Mothod}}</td>
                                                <td class="account__table--body__child--items">{{$order->Total_products}}</td>
                                                <td class="account__table--body__child--items">Rs: {{$order->Total_price}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3">
                        <div class="account__details">
                           
                            <p class="account__details--desc">User <br> {{$orders->User_Name}} <br> {{$orders->User_Number}}</p>
                          
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping1.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping2.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">Visa, Paypal, Master</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping3.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">30 day guarantee</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping4.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">Support every time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>

@endsection