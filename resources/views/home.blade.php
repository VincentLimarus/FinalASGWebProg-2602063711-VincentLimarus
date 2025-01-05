@extends('layouts.app')

@section('title', 'Home Page')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-3 col-sm-4 col-4 mt-2">
                <img src="{{ asset(Auth::user()->profile_picture) }}" class="img-thumbnail rounded-circle" alt="...">
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <h3 class="mt-3">Welcome to <span style="color:darkblue">Connect Friends</span>, {{Auth::user()->name}}!</h3>
                <p>ConnectFriend is a social networking site that allows users to communicate with other members, as well as share content and online media with those members. Let's Get Started!</p>
            </div>
        </div>
        <hr>

        <h3 class="display-6 fw-normal mt-2 mb-2">Connect with All Other User in <span style="color: darkblue">ConnectFriend!</span></h3>

        <div class="d-flex flex-wrap" style="gap: 20px">
            @forelse ($users as $user)
                @if(Auth::user()->id != $user->id && $user->is_active == 1)
                    <div class="card mt-2" style="width: 14rem; height: 22rem;">
                        <img src="{{ asset($user->profile_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">

                        <div class="card-body d-flex flex-column" style="flex-grow: 1;">
                            <h6 class="fw-bold">{{$user->name}}</h6>
                            <p><span class="fw-bold">Profession</span>: {{$user->profession}}</p>
                            <p><span class="fw-bold">Related Works</span>: 
                                @foreach ($user->works as $work)
                                    {{$work->name}},
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
            @empty
                <p>No users found.</p>
            @endforelse
        </div>

        <hr>
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
