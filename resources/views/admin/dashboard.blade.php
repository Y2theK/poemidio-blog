@extends('layouts.master')
@section('breadcumb')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">Poemidio</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book-medical"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Articles</span>
                    <span class="info-box-number">
                        {{ $articleCount }}
                        <small>s</small>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-user-check"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Verified Users</span>
                    <span class="info-box-number">{{ $userCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-user-secret"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Admins</span>
                    <span class="info-box-number">{{ $adminCount }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-laugh-beam"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Daily Visiters</span>
                    <span class="info-box-number">{{ rand(200,1000) }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @forelse($notifications as $notification)
    <div class="alert alert-success" role="alert">
        [{{ $notification->created_at->diffForHumans() }}] User {{ $notification->data['name'] }} ({{
        $notification->data['email'] }})
        has just registered.
        <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
            Mark as read
        </a>
    </div>

    @if($loop->last)
    <a href="#" id="mark-all">
        Mark all as read
    </a>
    @endif
    @empty
    There are no new notifications
    @endforelse
</div><!-- /.container-fluid -->
@endsection