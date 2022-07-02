@extends('layouts.app')

@section('content')

<div class="container col-md-10">
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

                    <div class="btn-toolbar d-flex justify-content-around flex-wrap p-2">
                        <form method="GET" action="{{route('equipment.create')}}">
                            <button type="submit"class="btn btn-primary lg">新規登録画面</button>
                        </form>
                        
                        <div class="btn-toolbar-right">
                            <form method="GET" action="{{route('authorizer.index')}}">
                                <button type="submit"class="btn btn-primary">承認者管理画面</button>
                            </form>
                        </div>
                        <div class="btn-toolbar-right">
                            <form method="GET" action="{{route('user.index')}}">
                                <button type="submit"class="btn btn-primary">利用者登録画面</button>
                            </form>
                        </div>

                        <div class="btn-toolbar-right">
                            <form method="GET" action="{{route('lending.index')}}">
                                <button type="submit"class="btn btn-primary">貸出物登録画面</button>
                            </form>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>

                            <th scope="col" class="text-nowrap">id</th>
                            <th scope="col" class="text-nowrap">氏名</th>
                            <th scope="col" class="text-nowrap">貸出物</th>
                            <th scope="col" class="text-nowrap">貸出日</th>
                            <th scope="col" class="text-nowrap">返却日</th>
                            <th scope="col" class="text-nowrap">貸出状態</th>
                            <th scope="col" class="text-nowrap">備考</th>
                            <th scope="col" class="text-nowrap">承認者</th>
                            <th scope="col" class="text-nowrap">承認状態</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($equipments as $equipment)
                        <tr>
                        <th>{{$equipment->id}}</th>
                        <td>{{$equipment->facility_user_name}}</td>
                        <td>{{$borrowarr[$loop->iteration -1]}}</td>
                        <td>{{$equipment->checkout}}</td>
                        <td>{{$equipment->returned}}</td>
                        <td>
                            @if($confirmarr[$loop->iteration -1]==='返却済み')
                            <span class="badge badge-success">{{$confirmarr[$loop->iteration -1]}}</span>
                            @else
                            <span class="badge badge-danger">{{$confirmarr[$loop->iteration -1]}}</span>
                            @endif
                        </td>
                        <td>{{$equipment->description}}</td>
                        <td>{{$equipment->authorizer_name}}</td>
                        <td>
                        @if($equipment->accepted===1)
                            <span style="color:green" class="text-nowrap">承認済</span>
                        @else
                            <span style="color:red" class="text-nowrap">未承認</span>
                        @endif
                        </td>
                        @can('admin-higher')
                        <td><button class="btn btn-primary text-nowrap" onclick="location.href='{{ route('equipment.edit',['id'=> $equipment->id])}}'">編集</button></td>
                        <td>
                            <form method="POST" action="{{route('equipment.destroy',['id'=> $equipment->id])}}" onsubmit="return check()">
                            @csrf
                                <button type="submit"class="btn btn-danger text-nowrap">削除</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{route('equipment.accept',['id'=>$equipment->id])}}" onsubmit="return authcheck()">
                                @csrf
                                @if($equipment->accepted===0)
                                <button type="submit"class="btn btn-success text-nowrap" name="accepted" value="1">承認</button>
                                @else
                                <button type="submit"class="btn btn-warning text-nowrap" name="accepted" value="0">承認取消</button>
                                @endif
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
</div>
@endsection
