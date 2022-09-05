<x-customer-layout>
    <section class="signin-page account">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto d-none d-lg-block">
                    <img src="customer/images/kids.webp" alt="">
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <h2 class="text-center">Create Account</h2>
                        <form class="text-left clearfix" method="post" action="{{ route('register')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_type" value="{{session()->get('type')}}">
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
                                <input type="text" name="tin_number" value="{{ old('tin_number')}}" class="form-control" placeholder="Tin number eg 54522">
                            </div>
                            @error('tin_number')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            @error('password')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Re enter password">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Your document</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="document_url" class="custom-file-input" value="{{ old('document_url')}}" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @error('document_url')
                            <span style="color:red;padding-left:3px;">{{ $message }}</span>
                            @enderror
                            <div class="text-center m-5">
                                <button type="submit" class="btn btn-dark">Register</button>
                            </div>
                        </form>
                        <p class="mt-3">Already hava an account ?<a href="{{ route('login')}}"> Login</a></p>
                        <p><a href="{{ url('forgot-password') }}"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
    </script>
</x-customer-layout>