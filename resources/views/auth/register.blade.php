<x-customer-layout>
    <div>
        <div class="container">
            <div class="mx-auto py-16 sm:w-2/3 md:w-3/5 md:py-20 lg:w-1/2 lg:py-24 xl:w-2/5">
                <form action="{{ route('register')}}" method="post"  class="rounded border border-grey-dark py-8 px-10 shadow">
                    @csrf 
                    <label class="block pb-3 font-hk text-secondary" for="first_name">Full Name</label>
                    <input type="text" placeholder="Enter your full name" name="fullname" value="{{old('fullname')}}" id="first_name" class="form-input mb-6" />
                    @error('fullname')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <label class="block pb-3 font-hk text-secondary" for="last_name">Phone number</label>
                    <input type="text" placeholder="Enter your phone number" name="phone" value="{{old('phone')}}" id="last_name" class="form-input mb-6" />
                    @error('phone')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <label class="block pb-3 font-hk text-secondary" for="email" value="{{old('email')}}">Email</label>
                    <input type="email" placeholder="Enter your email" name="email" id="email" class="form-input mb-6" />
                    @error('email')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <label class="block pb-3 font-hk text-secondary" for="password">Password</label>
                    <input type="password" placeholder="Enter your password" name="password" class="form-input mb-6" id="password" />
                    @error('password')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                    <label class="block pb-3 font-hk text-secondary" for="password">Confirm password</label>
                    <input type="password" placeholder="Enter your password" name="password-confirmation" class="form-input mb-6" id="password" />

                    <label class="block pb-3 font-hk text-secondary" for="password">Register as</label>                    
                    <div class="pb-3 pl-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="buyer" name="user_type" id="exampleRadios1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Buyer
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_type" value="supplier" id="exampleRadios1">
                            <label class="form-check-label" for="exampleRadios1">
                                Supplier
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mb-4 w-full" aria-label="Create account button">
                        Create Account
                    </button>

                    <a href="{{ route('login')}}" class="mt-2 flex items-center justify-center">
                        <i class="bx bx-chevron-left -mb-1 text-2xl leading-none text-secondary"></i>
                        <span class="ml-1 font-hk leading-none text-secondary">Login instead</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-customer-layout>