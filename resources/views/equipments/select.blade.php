@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">承認者選択</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('equipment.select',['id'=> $equipment->id])}}">
                    @csrf
                    承認者
                    <select name="authorizer_id">
                        <option value="">選択してください</option>
                        @foreach($authorizer as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">登録する</button>         
                    </form>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection