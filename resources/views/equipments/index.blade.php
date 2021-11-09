@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">ダッシュボード</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{route('equipment.create')}}">       
                    <button type="submit"class="btn btn-primary">新規登録</button>
                    </form>

                        <table class="table table-striped">
                        <thead>
                            <tr>
                            
                            <th scope="col">id</th>
                            <th scope="col">氏名</th>
                            <th scope="col">貸出物</th>
                            <th scope="col">貸出日</th>
                            <th scope="col">返却日</th>
                            <th scope="col">状態</th>
                            <th scope="col">備考</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($equipments as $equipment)    
                        <tr>
                        <th>{{$equipment->id}}</th>
                        <td>{{$equipment->name}}</td>                   
                        <td>{{$borrowarr[$loop->iteration -1]}}</td>                   
                        <td>{{$equipment->checkout}}</td>
                        <td>{{$equipment->returned}}</td>                 
                        <td><span class="badge badge-success">{{$confirmarr[$loop->iteration -1]}}</span></td>
                        <td>{{$equipment->description}}</td>
                        @can('admin-higher')
                        <td><a href="{{ route('equipment.edit',['id'=> $equipment->id])}}">編集</a></td>
                        <td>
                            <form method="POST" action="{{route('equipment.destroy',['id'=> $equipment->id])}}">
                            @csrf
                                <button type="submit"class="btn btn-danger">削除する</button>
                            </form>
                        </td>
                        @endcan
                        @endforeach
                        </tbody>
                        </table>
                    {{$equipments->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
