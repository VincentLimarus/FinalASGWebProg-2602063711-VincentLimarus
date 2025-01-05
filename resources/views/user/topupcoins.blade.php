@extends('layouts.app')

@section('title', 'Top Up Coins')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        <h3>Hi {{Auth::user()->name}}, Your Current Coins is {{Auth::user()->coins}}.</h3>
        <p>Please make sure all the payment was correct because we're not doing refund policy! Click Button below to Purchase Coins!</p>

        <h3 class="mt-5">Purchase Now!</h3>

        <form method="POST" action="{{ route('topup-coins.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="coins" class="form-label">Coins to Add</label>
                <input type="number" class="form-control" id="coins" name="coins" value="100" readonly>
                <div id="coinsHelp" class="form-text">Click Purchase to continue.</div>
            </div>
            <button type="submit" class="btn btn-primary">Purchase</button>            
        </form>
    </div>

    <script>
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
    
@endsection