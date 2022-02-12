@extends("layouts.app")
@section('content')
<div class="container">
    <div class="h4">Notifications</div>
    <div class="card">

        <div class="card-body">
            <div class="">

                {{-- {{ dd($notifications->type) }} --}}
                @forelse ($notifications as $notification)
                <div class="alert alert-info" role="alert">
                    {{ $notification->data['comment_user_name'] }} commented your post
                    of "{{ $notification->data['article_title'] }}"

                    [{{ $notification->created_at->diffForHumans() }}]
                    <a href="{{ route('articles.detail',$notification->data['article_id'] ) }}"
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