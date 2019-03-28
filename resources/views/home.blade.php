
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach ($user->forms as $form)
            <div class="card">

                    <div class="card-body">
                        
                            
                       
                            <h4 class="card-title">{{$form->title}}</h4>
                            {{-- <p class="card-text">{{$form->t}}</p> --}}
                            <span> Dibuat Oleh : {{$user->name}} </span><br>
                            <a href="/{{$form->slug}}" class="btn btn-primary">Baca</a>
                            <a href="/{{$form->slug}}/edit" class="btn btn-warning">Edit</a>
                            <br>
                            <form method="POST" action="/{{$form->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                          

                            {{-- <a href="/hapus/id" class="btn btn-danger">Hapus</a> --}}
                        </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
