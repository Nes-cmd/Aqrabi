<x-customer-layout>
    <div>
        <div class="container">
            <div class="mx-auto py-16 sm:w-2/3 md:w-3/5 md:py-20 lg:w-1/2 lg:py-24 xl:w-2/5">
                <form method="post" action="{{route('login')}}" class="rounded border border-grey-dark py-8 px-10 shadow">
                    @csrf
                    <label class="block pb-3 font-hk text-secondary" for="first_name">Phone number</label>
                    <input type="text" placeholder="Enter your Phone" name="phone" id="phone" value="{{old('phone')}}" class="form-input mb-6" />
                    @error('email')
                        <span class="text-danger" style="color:red">{{ $message }}</span>
                    @enderror
                    <label class="block pb-3 font-hk text-secondary" for="password">Password</label>
                    <input name="password" type="password" placeholder="Enter your password" name="password" class="form-input mb-6" id="password" />
                    <button type="submit" class="btn btn-primary mb-4 w-full" aria-label="Create account button">
                        Login
                    </button>

                    <a href="{{ route('register')}}" class="mt-2 flex items-center justify-center">
                        <i class="bx bx-chevron-left -mb-1 text-2xl leading-none text-secondary"></i>
                        <span class="ml-1 font-hk leading-none text-secondary">Don' have account?</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-customer-layout>