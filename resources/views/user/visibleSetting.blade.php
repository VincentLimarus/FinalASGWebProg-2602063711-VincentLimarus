@extends('layouts.app')

@section('title', 'Visible Setting')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

    <div class="container">
        <h4 class="display-4">
            Change your Visibility now!
        </h4>
        <p style="font-size: 1.4rem">Click below and do the payment to change your account visiblity, People won't see your profile and can't search your name!</p>
        <hr>

        @if(Auth::user()->is_active == 1)
            <h3>Activate Visiblity</h3>
            <form method="POST" action="{{ route('change-visibility.submit') }}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Purchase Payment</label>
                  <input type="number" class="form-control" id="input" placeholder="50" readonly>
                  <div id="emailHelp" class="form-text">Please do consider all the terms and condition, No Refund!</div>
                </div>
                <button type="submit" class="btn btn-primary">Purchase Visibility</button>
            </form>
        @else
            <h3>Deactivate Visiblity</h3>
            <p style="font-size: 1.5rem">Click button below to change visibility!</p>
            <form method="POST" action="{{ route('change-visibility2.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Purchase Payment</label>
                    <input type="number" class="form-control" id="input" placeholder="5" readonly>
                    <div id="emailHelp" class="form-text">Please do consider all the terms and condition, No Refund!</div>
                  </div>
                <button type="submit" class="btn btn-outline-primary">Deactivate Visible</button>
            </form>
            
        @endif

    </div>

    <script>
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
    
@endsection()