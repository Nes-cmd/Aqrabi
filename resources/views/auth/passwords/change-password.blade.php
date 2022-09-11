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
                        <h2 class="text-center">You are almost done!</h2>
                        <form action="{{route('change-password')}}" method="post" class="text-left clearfix">
                            @csrf
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="Enter new password">
                                @error('password')
                                <span class="text-danger pl-3">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="Confirm the password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>