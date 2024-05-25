@extends('layouts.mainlogin')

@section('content')

<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/loginPage/images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
            <span class="login100-form-title p-b-41">
                Admin
            </span>
            <form class="login100-form validate-form p-b-33 p-t-5" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="wrap-input100 validate-input" data-validate = "Masukkan username">
                    <input class="input100" type="text" id="name" name="name" placeholder="User name">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Masukkan password">
                    <input class="input100" type="password" id="password" name="password" placeholder="Masukkan Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Masuk
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

@endsection
