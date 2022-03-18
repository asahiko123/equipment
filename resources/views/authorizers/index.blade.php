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

                    <form method="POST" action="{{route('authorizer.store')}}">
                    @csrf
                    <label>氏名</label>
                    <input type="text" class="form-control col-md-6"name="name"required>
                    <div class="btn-toolbar">
                    <button type="submit"class="btn btn-primary">新規登録</button>
                    </form>
                    <div class="btn-toolbar-right">
                    <form method="GET" action="{{route('equipment.index')}}">
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
                        @foreach($authorizers as $authorize)
                        <tr>
                        <th>{{$authorize->id}}</th>
                        <td>{{$authorize->name}}</td>

                        @can('admin-higher')

                        <td>
                            <form method="POST" action="{{route('authorizer.destroy',['id'=> $authorize->id])}}" onsubmit="return check()">
                            @csrf
                                <button type="submit"class="btn btn-danger">削除</button>
                            </form>
                        </td>
                        @endcan
                        @endforeach
                        </tbody>
                        </table>
                    {{$authorizers->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
