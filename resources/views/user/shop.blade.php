@extends('layouts.app')

@section('title', 'Shop Page')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-3 col-sm-4 col-4 mt-2">
                <img src="{{asset('assets/defaultAvatar.jpg')}}" class="img-thumbnail rounded-circle" alt="...">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <h3 class="mt-3">Discover <span style="color:darkblue">Connect Friends</span> Shop, {{Auth::user()->name}}!</h3>
                <p>Get ready to enhance your profile and connect with friends! Check out our exclusive avatars and choose one that best represents you.</p>
            </div>
        </div>
        <hr>

        <h6 class="display-6 fw-normal mt-2 mb-2">Discover All Avatar that Available at <span style="color: darkblue">ConnectFriend!</span></h6>

        <div class="d-flex flex-wrap" style="gap: 20px">
            @forelse ($avatars as $avatar)  
                <div class="card mt-2" style="width: 14rem; height: 21rem;">
                    <img src="{{ asset($avatar->profile_url) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">

                    <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                        <h6 class="fw-bold">{{$avatar->name}}</h6>
                        <p class="fw-bold">{{$avatar->price}} Coins</p>
                    </div>
                    <form method="POST" action="{{ route('buy-avatar.submit', $avatar->id) }}" onsubmit="return confirmPurchase();">
                        @csrf
                        <button type="submit" class="btn btn-primary">Buy Avatar</button>
                    </form>
                </div>
            @empty
                <p>No avatar available.</p>
            @endforelse
        </div>
    </div>

    <script>
        function confirmPurchase() {
            return confirm('Are you sure you want to purchase this avatar?');
        }

        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
@endsection
