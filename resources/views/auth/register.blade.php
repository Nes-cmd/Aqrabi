<x-customer-layout>
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                       
                        <h2 class="text-center">Create Your Account</h2>
                        <form class="text-left clearfix" method="post" action="{{ route('register')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="fullname" value="{{ old('fullname')}}" class="form-control" placeholder="Full Name">
                            </div>
                            @error('fullname')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email')}}" class="form-control" placeholder="Email">
                            </div>
                            @error('email')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <input type="text" name="phone" value="{{ old('phone')}}" class="form-control" placeholder="Phone eg">
                            </div>
                            @error('phone')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <input type="password" name="password-confirmation" class="form-control" placeholder="Password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <p class="mt-3">Already hava an account ?<a href="{{ route('login')}}"> Login</a></p>
                        <p><a href="{{ url('forgot-password') }}"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>