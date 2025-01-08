@extends('layouts.app')

@section('title', 'Friends Page')

@section('navbar')
    @include('components.navbar')
@endsection

@section('content')

    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="display-6 fw-normal mt-2 mb-2">Discover Your Friend List at <span style="color: darkblue">ConnectFriend!</span></h3>
            <hr>
        </div>

        <div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-3">
            <h4 class="fw-normal mt-2 mb-2">Your Active Friend List at <span style="color: darkblue">ConnectFriend!</span></h4>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-3 mt-1">
            @forelse ($activeFriends as $af)
                @php
                    $friendId = ($af->user_id == Auth::user()->id) ? $af->friend_id : $af->user_id;
                @endphp
        
                @if($af->is_active == 1)
                    <div class="card mt-2" style="width: 100%; max-width: 14rem; height: auto;">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset($af->profile_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="fw-bold">{{$af->name}}</h6>
                                <p class="mt-0 mb-0"><span class="fw-bold">Profession</span>: {{$af->profession}}</p>
                                <p class="mt-1 mb-1"><span class="fw-bold">Gender</span>: {{$af->gender}}</p>
        
                                <form method="POST" action="{{ route('delete-friend.submit', $friendId) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mt-3 w-100">Delete Friends</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="alert alert-danger mt-3" role="alert">
                    No Friends found.
                </div>
            @endforelse
        </div>
        <hr>

        <div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-4">
            <h4 class="fw-normal mt-2 mb-2">Your Pendings Friend List at <span style="color: darkblue">ConnectFriend!</span></h4>
        </div>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-1">
            @forelse ($pendingFriends as $pf)
                @if($pf->is_active == 0)
                    <div class="card mt-2" style="width: 100%; max-width: 14rem; height: auto;">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset($pf->profile_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">
        
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="fw-bold">{{$pf->name}}</h6>
                                <p class="mt-0 mb-0"><span class="fw-bold">Profession</span>: {{$pf->profession}}</p>
                                <p class="mt-1 mb-1"><span class="fw-bold">Gender</span>: {{$pf->gender}}</p>
                                <form method="POST" action="{{route('delete-request.submit', $pf->friend_id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mt-3 w-100">Delete Request</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="alert alert-danger mt-3" role="alert">
                    No Request found.
                </div>            
            @endforelse
        </div>  

        <hr>

        <div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-4">
            <h4 class="fw-normal mt-2 mb-2">Hello <span style="color: darkblue">{{Auth::user()->name}}</span>, Someone Wants to be your Friend at <span style="color: darkblue">ConnectFriend!</span></h4>
        </div>

        <div class="d-flex flex-wrap justify-content-center gap-3 mt-1">
            @forelse ($friendRequestFromOtherUser as $fr)
                @if($fr->is_active == 0)
                    <div class="card mt-2" style="width: 100%; max-width: 14rem; height: auto;">
                        <div class="d-flex flex-column h-100">
                            <img src="{{ asset($fr->profile_picture) }}" class="card-img-top" alt="..." style="object-fit: cover; height: 150px;">
        
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="fw-bold">{{$fr->name}}</h6>
                                <p class="mt-0 mb-0"><span class="fw-bold">Profession</span>: {{$fr->profession}}</p>
                                <p class="mt-1 mb-1"><span class="fw-bold">Gender</span>: {{$fr->gender}}</p>
                                <form method="POST" action="{{route('accept-friend-request.submit', $fr->user_id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mt-3 w-100">Accept Request</button>
                                </form>
                                
                                <form method="POST" action="{{route('delete-friend-request.submit', $fr->user_id)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger mt-3 w-100">Reject Request</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                @endif
            @empty
            <div class="alert alert-danger mt-3" role="alert">
                No Request found.
            </div>
            @endforelse
            <hr>
        </div>
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
