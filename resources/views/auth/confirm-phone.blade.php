<x-customer-layout>
    <section class="forget-password-page account">
        <div class="container">
            <div class="mb-100"></div>
            <div class="row align-items-center bg-secondary mt-50">
                <div class="col-md-6 d-none d-lg-block">
                    <div class="text-center">
                        <img width="60%" height="auto" src="logo.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="block text-center m-0">
                        <h2 class="text-center">Please confirm your phone</h2>
                        <form action="{{route('check-verification')}}" method="post" class="text-left clearfix">
                            @csrf
                            <p>A verification code sent to your phone <i>{{auth()->user()->phone}}</i>. Once you have received the verification code, please entr that code here to verify the phone.</p>
                            <div class="form-group">
                                <input type="text" name="confirmation_code" class="form-control" id="exampleInputEmail1" placeholder="Enter the code">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <div class="flex text-center">
                            <p class="mt-3">Don't received the code? <a href="{{ route('verification-resend')}}" style="color: blue;">Resend</a></p>
                        </div>
                        <p class="mt-3"><a href="{{ route('login')}}">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>