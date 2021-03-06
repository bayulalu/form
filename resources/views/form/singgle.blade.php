@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="jarak"></div> 
        @foreach ($form as $fm)
            <h1 class="text-center">{{$fm->title}}</h1>
            <p>{{$fm->subject}}</p>
            
       
        
        <hr>
        <div>
            <h3 >Tanggapan</h3>
                
               @foreach ($fm->responses as $res)
                <div class="alert alert-dark alert-constume" role="alert">
                    <h4 class="alert-heading" id="biru">{{$res->user->name}}</h4>
                
                <p> {{$res->subject}} </p>
                </div>
                @endforeach 

            </div>
            <div id="jarak"></div>
            <h6>Tanggapan : </h6>
            <form method="POST" action="/tanggapi/{{$fm->id}}">
                <div class="form-group">
                    <textarea class="form-control" name="subject" rows="3">{{old('subject')}}</textarea>
                </div>
                @csrf
                <button type="submit" class="btn btn-primary">Tanggapi</button>
            </form>
        </div>
        @endforeach
    </div>
    
@endsection