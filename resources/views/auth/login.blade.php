<x-customer-layout>
    <section class="signin-page account">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto d-none d-lg-block">
                    <img src="customer/images/kids.webp" alt="">
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">

                        <h2 class="text-center">Welcome Back</h2>
                        <form class="text-left clearfix" method="post" action="{{ route('login')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone')}}" placeholder="Phone">
                                @error('phone')
                                <span style="color:red;padding-left:3px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </form>
                        <p class="mt-3">New in this site ?<a href="{{route('choose-acccount-type')}}"> Create New Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>