<x-customer-layout>
<style>
        .phone{
            padding-bottom: 7px;
            border-radius: 0px;
            width: 50%;
            /* margin: 2px; */
        }
    </style>
    <section class="forget-password-page account">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto d-none d-lg-block">
                    <img src="customer/images/kids.webp" alt="">
                </div>
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <h2 class="text-center">Please enter your phone</h2>
                        <form method="post" action="{{route('phone-confirmation')}}"  class="text-left clearfix">
                            @csrf
                            <p>A verification code will be sent to you. Once you have received the verification code, you will be able to proceed for your account.</p>
                            <div class="form-group" style="display:flex">
                                    <select name="country_code" value="{{old('country_code')}}" class="form-control phone">
                                        <option value="+251">Ethiopia (+251)</option>
                                        <option value="+251">Ertria (+252)</option>
                                    </select>
                                    <input name="phone" value="{{old('phone')}}"  class="form-control" placeholder="09434..." type="text">
                            </div>
                            @error('phone')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            @error('country_code')
                            <span style="color:red;padding-left:3px">{{ $message }}</span>
                            @enderror
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                        <p class="mt-3"><a href="{{ route('login')}}">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>