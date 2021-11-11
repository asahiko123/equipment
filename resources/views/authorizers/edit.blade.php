@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">承認者フォーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('authorizer.accept')}}">
                    @csrf
                    <label>氏名</label>
                    <input type="text" class="form-control col-md-6"name="name"required>
                    </div>       
                    <button type="submit"class="btn btn-primary">新規登録</button>
                    </form>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection