@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">利用者登録フォーム</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <form method="POST" action="{{route('user.store')}}">
                        @csrf
                        <label>氏名</label>
                        <input type="text" class="form-control col-md-6"name="name"required>
                        <div class="btn-toolbar">
                            <button type="submit"class="btn btn-primary">新規登録</button>
                    </form>
                    <div class="btn-toolbar-right">
                        <form method="GET" action="{{route('user.index')}}">   
                            <button type="submit"class="btn btn-success">戻る</button>
                        </form>
                    </div>
                    </div>

                        <table class="table table-striped">
                        <thead>
                            <tr>
                            
                            <th scope="col">id</th>
                            <th scope="col">氏名</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)    
                        <tr>
                        <th>{{$user->id}}</th>
                        <td>{{$user->name}}</td>                   
                        
                        @can('admin-higher')
           
                        <td>
                            <form method="POST" action="{{route('user.destroy',['id'=> $user->id])}}" onsubmit="return check()">
                            @csrf
                                <button type="submit"class="btn btn-danger">削除</button>
                            </form>
                        </td>
                        @endcan
                        @endforeach
                        </tbody>
                        </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection