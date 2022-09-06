<x-customer-layout>
    <section class="forget-password-page account">
        <div class="container">
        <div class="row align-items-center">
                <div class="col-md-6 mx-auto d-none d-lg-block">
                    <img src="customer/images/kids.webp" alt="">
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
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