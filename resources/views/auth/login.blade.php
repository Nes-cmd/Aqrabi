<x-customer-layout>
    <section class="signin-page account">
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
                        <p><a href="{{ url('forget-password') }}" class="text-blue"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>