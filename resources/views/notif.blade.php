@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-7 offset-md-3">
            <h1 class="text-center">Halaman Notifikasi</h1>

            <ul class="list-group">
                @foreach ($notifs as $notif)
                  <li class="list-group-item">
                      <a href="/{{$notif->form->slug}}">
                              {{$notif->subject }}
                      </a></li>
                @endforeach
            </ul>
        </div>

       
    </div>
</div>
@endsection
