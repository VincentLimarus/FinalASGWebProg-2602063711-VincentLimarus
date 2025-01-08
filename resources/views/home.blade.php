@extends('layouts.app')

@section('title', 'Home Page')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-3 col-sm-4 col-4 mt-3">
                <img src="{{ asset(Auth::user()->profile_picture) }}" class="img-thumbnail rounded-circle" alt="..." style="height: 80px; width: 150px;" >
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                <h3 class="mt-3">Welcome to <span style="color:darkblue">Connect Friends</span>, {{Auth::user()->name}}!</h3>
                <p>ConnectFriend is a social networking site that allows users to communicate with other members, as well as share content and online media with those members. Let's Get Started!</p>
            </div>
        </div>
        <hr>

        <h3 class="display-6 fw-normal mt-2 mb-2">Connect with All Other User in <span style="color: darkblue">ConnectFriend!</span></h3>

        <form method="GET" action="{{ route('search-users') }}">
            <div class="input-group mb-3">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
                <select class="form-select" id="gender" name="gender" style="max-width: 30%">
                    <option value="1" selected>All</option>
                    <option value="2">Male</option>
                    <option value="3">Female</option>
                </select>
            </div>
        
            <div class="mb-3">
                <input type="text" class="form-control" id="profession" name="profession" placeholder="Input Job Title eg. Developer, Designer, etc." style="max-width: 36%">
            </div>
        
            <button type="submit" class="btn btn-outline-primary mb-3">Search</button>
        </form>

        <div class="d-flex flex-wrap justify-content-center gap-3">
            @forelse ($users as $user)
                @if(Auth::user()->id != $user->id && $user->is_active == 1)
                    <div class="card mt-2 flex-grow-1" style="width: 14rem; height: auto;">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset($user->profile_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">
        
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="fw-bold">{{$user->name}}</h6>
                                <p class="mt-0 mb-0"><span class="fw-bold">Profession</span>: {{$user->profession}}</p>
                                <p class="mt-1 mb-1"><span class="fw-bold">Gender</span>: {{$user->gender}}</p>
                                <p><span class="fw-bold">Related Works</span>: 
                                    @foreach ($user->works as $work)
                                        {{$work->name}}@if (!$loop->last), @endif
                                    @endforeach
                                </p>
                                <form method="POST" action="{{route('send-friend-request.submit', $user->id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mt-3 w-100">👍 Like</button>
                                </form>
                            </div>
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
