@extends("layouts.app")
@section('content')
<div class="container">
    <div class="h4">Notifications</div>
    <div class="card">

        <div class="card-body">
            <div class="">

                {{-- {{ dd($notifications->type) }} --}}
                @forelse ($notifications as $notification)
                <div
                    class="alert alert-secondary d-flex justify-content-between align-items-center {{ $notification->read_at == '' ? 'alert-info' : '' }}">

                    <div>
                        <p class=" m-0 p-0">
                            <strong> {{ $notification->data['comment_user_name'] }}</strong>
                            commented your post
                            of <strong>"{{ $notification->data['article_title'] }}"</strong>

                        </p>
                        <small>
                            [{{ $notification->created_at->diffForHumans() }}]
                        </small>

                    </div>


                    <a href="{{ route('profile.notification.markAsRead', [auth()->user(),$notification->id]) }}"
                        class="float-right mark-as-read h5" data-id="{{ $notification->id }}">
                        &raquo;
                    </a>

                </div>

                {{-- <div class="alert alert-info">{{ $notification->data['article_user'] }}</div> --}}
                @empty
                <div class="alert alert-secondary" role="alert">You have no notifications yet...</div>

                @endforelse

            </div>
        </div>
    </div>
</div>
@endsection