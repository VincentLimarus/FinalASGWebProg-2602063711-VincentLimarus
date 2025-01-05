@extends('layouts.app')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" onsubmit="return formValidation();">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Input your Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <div class="col-md-6">
                                <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="field_of_work" class="col-md-4 col-form-label text-md-end">{{ __('Field of Work') }}</label>
                            <div class="col-md-6">
                                <div id="field-of-work-container">
                                    <div class="input-group mb-2">
                                        <input type="text" name="works[]" 
                                               class="form-control" 
                                               placeholder="Enter a field of work" required>
                                        <button type="button" class="btn btn-danger remove-field">Remove</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" id="add-field-of-work">Add More</button>
                        
                                @error('works')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="linkedin" class="col-md-4 col-form-label text-md-end">{{ __('LinkedIn') }}</label>
                        
                            <div class="col-md-6">
                                <input id="linkedin" type="text" class="form-control @error('linkedin') is-invalid @enderror" placeholder="https://www.linkedin.com/in/<username>" name="linkedin"  required autocomplete="linkedin" autofocus>
                        
                                @error('linkedin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>
                        
                            <div class="col-md-6">
                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" placeholder="+62 895-4013-60072" name="mobile_number" required autocomplete="mobile_number" autofocus>
                        
                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Input your Email" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="registration_price" class="col-md-4 col-form-label text-md-end">{{ __('Registration Price') }}</label>
                            
                            <div class="col-md-6">
                                @php
                                    $price = random_int(100000,125000);
                                @endphp
                                <h6 class="mt-2">{{ 'Rp '. number_format($price, 0, ',', '.' )}}</h6>

                                <input type="hidden" name="registration_price" value="{{ $price }}" hidden>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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

<script>
document.getElementById('add-field-of-work').addEventListener('click', function () {
    const container = document.getElementById('field-of-work-container');

    const inputGroup = document.createElement('div');
    inputGroup.className = 'input-group mb-2';

    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'works[]'; 
    input.className = 'form-control';
    input.placeholder = 'Enter a field of work';
    input.required = true;

    const removeButton = document.createElement('button');
    removeButton.type = 'button';
    removeButton.className = 'btn btn-danger remove-field';
    removeButton.textContent = 'Remove';

    removeButton.addEventListener('click', function () {
        container.removeChild(inputGroup);
    });

    inputGroup.appendChild(input);
    inputGroup.appendChild(removeButton);

    container.appendChild(inputGroup);
});

document.querySelectorAll('.remove-field').forEach(button => {
    button.addEventListener('click', function () {
        const container = document.getElementById('field-of-work-container');
        const inputGroup = this.parentElement;
        container.removeChild(inputGroup);
    });
});

</script>
@endsection
