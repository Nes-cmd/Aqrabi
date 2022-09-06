<x-customer-layout>
    <section class="forget-password-page account">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto d-none d-lg-block">
                    <img src="customer/images/kids.webp" alt="">
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="logo">
                        </a>
                        <h2 class="text-center">Please verify your phone</h2>
                        <form class="text-left clearfix">
                            <p>A verification code will be sent to you. Once you have received the verification code, you will be able to proceed for your account.</p>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Account phone number">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <p class="mt-3"><a href="{{ route('login')}}">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>