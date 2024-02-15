@extends('master')

@section('body')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div class="card">
        <div class="card-header bold"> Attorney Registration</div>
        <div class="card-body">
            <form action="{{route('attorney.store')}}" method = "post">
            @csrf
                <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">User Id:</label>
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <input name="id" value="{{ old('UserId') }}" type="text" class="form-control" placeholder ="please enter user Id"required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">First Name:</label>
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <input name="firstName" value="{{ old('first') }}" type="text" class="form-control"placeholder="Enter your first name" required>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Last Name:</label>
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <input name="lastName" value="{{ old('last') }}" type="text" class="form-control"placeholder="Enter your last name" required>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Email:</label>
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control"placeholder="Enter your email" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-0 col-sm-1 col-form-label bold">Adress:</label>
                        <div class="col-lg-4 col-md-4 col-sm-10">
                            <input name="address" value="{{ old('mobile') }}" type="text" class="form-control"placeholder="Enter your Mobile Number" required maxlength="10">
                        </div>
                    </div>
                </div>
            </div>

                <button center type="submit" class="btn btn-primary bold">Submit</button>

                <!-- <script defer
                src="https://unpkg.com/verifalia-widget@1.10.0/dist/verifalia-widget.js"
                data-verifalia-appkey="YOUR BROWSER APP KEY HERE"
                integrity="sha512-Byn2sawjqjYOq9vwcSZdb8ncm3h3B4EmeyQ5hM035sShmwzv58/LdwACNmzJnkmILKvEvavSvdI6HaHy8FJWvg=="
                crossorigin="anonymous"></script>
              <div style="display: none">Powered by Verifalia <a href="https://verifalia.com/">email verifier</a></div> -->


                </div>
            </form>
        </div>
    </div>
</div>

@endsection
