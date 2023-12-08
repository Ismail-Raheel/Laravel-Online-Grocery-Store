@extends("layout/Web_layout")


@section('title')
    User Register
@endsection
@section('Web-Content')



<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title text-white mb-25">Account Page</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index-2.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Account Page</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start login section  -->
        <div class="login__section section--padding mb-80">
            <div class="container">
                <form action="{{url('Users_Register')}}" method="post">
                    @csrf
                    <div class="login__section--inner">
                        <div class="row" style="width: 800px; margin: auto;">
                     
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                        <p class="account__login--header__desc">Register here if you are a new customer</p>
                                    </div>
                                    <div class="account__login--inner">
                                        @if(session('email'))
                                        <div class="alert alert-danger">
                                            {{ session('email') }}
                                        </div>
                                         @endif
                                    <div class="row">
                                        <div class="col-6">
                                        <label>
                                            <input class="account__login--input" style="margin:0%;" placeholder="Username" name="name" type="text">
                                            <span class="text-danger">@error('name'){{$message}}@enderror</span>
                                        </label>
                                        </div>
                                        <div class="col-6">
                                        <label>
                                            <input class="account__login--input" style="margin:0%;" placeholder="Email Address" name="email" type="email">
                                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                                        </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                        <label>
                                            <input class="account__login--input" style="margin:0%;" placeholder="Password" name="password" type="password">
                                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                                        </label>
                                        </div>
                                        <div class="col-6">
                                        <label>
                                            <input class="account__login--input" style="margin:0%;" placeholder="Password confirmed" name="password_confirmed" type="password">
                                            <span class="text-danger">@error('password_confirmed'){{$message}}@enderror</span>
                                        </label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                        <label>
                                            <input class="account__login--input" style="margin:0%;" placeholder="Date of Birth" name="dob" type="date">
                                            <span class="text-danger">@error('dob'){{$message}}@enderror</span>
                                        </label>
                                        </div>
                                        <div class="col-6">
                                        <label>
                                            <select name="gender" style="margin:0%;" class="account__login--input">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="O">Other</option> 
                                            </select>
                                            
                                        </label>
                                        </div>
                                    </div>
                                    

                                        <button class="account__login--btn btn mb-10" type="submit"  name="registered" >Submit & Register</button>
                                        <div class="account__login--remember position__relative">
                                            <a href="{{url('Users_Login')}}">Already have an account sign in</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>     
        </div>
        <!-- End login section  -->

  

        
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
     

</main>






@endsection
