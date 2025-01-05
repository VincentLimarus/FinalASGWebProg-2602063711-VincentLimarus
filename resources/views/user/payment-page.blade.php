@extends('layouts.app')

@section('title', 'Payment Page')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        @if (Auth::check())
            <h3>Hello, {{ Auth::user()->name }}!</h3>
            <h5>Welcome to Connect Friend - Please confirm your payment below!</h5>
        @else
            <h3>Error: User not authenticated!</h3>
        @endif
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="margin-top: 5rem">
        @if (Auth::check() && Auth::user()->registration_price)
            <h2>Registration Fee: Rp {{ number_format(Auth::user()->registration_price, 0, ',', '.') }}</h2>
        @else
            <h2>Error: Registration fee not available!</h2>
        @endif
    </div>

    <div class="container d-flex justify-content-center align-items-center mt-2"> 
        <form action="{{ route('payment.submit') }}" method="POST" onsubmit="validatePayment()">
            @csrf
            <div class="mb-3">
                <label for="paymentAmount" class="form-label">Enter Payment Amount (in Rp):</label>
                
                <input 
                    type="number" 
                    id="paymentAmount" 
                    name="paymentAmount" 
                    class="form-control form-control-lg" 
                    placeholder="100.000" 
                    required
                    style="width: 300px;">
                    
                <input 
                    type="number" 
                    id="registrationAmount" 
                    hidden
                    value="{{Auth::user()->registration_price}}"
                    >  
                    
                <input 
                    type="number"
                    name="coins" 
                    id="totalMargin"
                    hidden
                    value="-1"
                >
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Confirm Payment</button>
        </form>
    </div>
    
    <script>
        function validatePayment() {
            const paymentAmount = document.getElementById('paymentAmount').value;
            const registrationPrice = document.getElementById('registrationAmount').value;
            
            const margin = paymentAmount - registrationPrice;

            if (registrationPrice === 0) {
                alert('Error: Registration fee not available!');
                location.reload();
                return false;
            }
            
            if (margin < 0) {
                alert(`You are still underpaid ${-margin}!`);
                location.reload();
                return false;
            }

            if (margin > 0) {
                const confirmation = confirm(`Sorry you overpaid ${margin}, would you like to enter a balance?`);
                
                if (!confirmation) {
                    alert('Please re-enter the payment amount.');
                    location.reload();
                    return false;
                }
                alert(`We Will Convert Your Overpayment ${margin} to a Coins`);
            }
            document.getElementById('totalMargin').value = margin;
            return true;
        }
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
    
@endsection