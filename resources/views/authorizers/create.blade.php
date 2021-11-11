@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('authorizer.store')}}">
                    @csrf
                    <div class="d-grid gap-3 col-lg-5 py-2">
                    <div class="col-md-12">
                    <label>氏名</label>
                    <input type="text" class="form-control col-md-6"name="name"required>
                    </div>
                      
                    <div class="col-md-12">  
                        <input class="btn btn-info" type="submit" value="登録する">
                    </div>           
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
