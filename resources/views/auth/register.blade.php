@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" id="registerForm" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username"  type="text" oninput="validateUsername(this)" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                 <small id="username-error" class="text-danger d-none"></small>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <span id="username-error" style="color:red; display:none;">Only letters and numbers (3–20 chars)</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                 <small id="password-error" class="text-danger d-none"></small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
       oninput="validatePassword(this)" placeholder="Enter password" required>

  <small id="confirm-error" class="text-danger d-none"></small>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit-btn" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function validatePassword() {
        const password = $('#password').val();
        const confirm = $('#password_confirmation').val();
        const passError = $('#password-error');
        const confirmError = $('#confirm-error');
        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;

        // Reset messages
        passError.addClass('d-none');
        confirmError.addClass('d-none');

        // Password strength check
        if (!pattern.test(password)) {
            passError.removeClass('d-none').text(
                'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and be at least 8 characters long.'
            );
            
            return false;
        }

        // Confirm password check
        if (confirm && password !== confirm) {
            confirmError.removeClass('d-none').text('Passwords do not match.');
            return false;
        }

        return true;
    }

    // Validate on typing
    $('#password, #password_confirmation').on('input', function() {
        validatePassword();
    });

    // Validate before form submit
    $('#registerForm').on('submit', function(e) {
        if (!validatePassword()) {
            e.preventDefault();
        }
    });
});

$(document).ready(function() {

    function validateUsername() {
        const username = $('#username').val();
        const usernameError = $('#username-error');

        // ✅ Only allow letters and numbers, and length between 3–20
        const pattern = /^[A-Za-z0-9]{3,20}$/;

        if (username === '') {
            usernameError.addClass('d-none');
            return false;
        }

        if (!pattern.test(username)) {
            usernameError.removeClass('d-none').text(
                'Username must be 3–20 characters and contain only letters and numbers.'
            );
            return false;
        } else {
            usernameError.addClass('d-none');
            return true;
        }
    }

    // Run validation on typing
    $('#username').on('input', function() {
        // Remove any non-alphanumeric characters in real-time
        this.value = this.value.replace(/[^a-zA-Z0-9]/g, '');
        validateUsername();
    });

    // Prevent form submission if invalid
    $('#registerForm').on('submit', function(e) {
        if (!validateUsername()) {
            e.preventDefault();
        }
    });

});
</script>
@endsection
