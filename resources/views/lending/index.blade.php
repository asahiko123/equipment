@extends('layouts.app')

@section('content')

<div class="container col-md-10">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">貸出物管理</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('lending.store')}}">
                        @csrf
                    <div class="col-md-12">
                        <label>貸出物</label>
                        <input type="text" class="form-control mb-3" name="name"required>
                    </div>

                    <div class="col-md-12">
                        <label>貸出物グループ</label>
                        <input type="text" class="form-control mb-3" name="optgroup_id"required>
                    </div>
                    <div class="col-md-12">
                        <input class="btn btn-info" type="submit" value="登録する">
                        <a class="btn btn-success" href="{{route('equipment.index')}}">戻る</a>
                    </div>

                    </form>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>

                            <th scope="col" class="text-nowrap">id</th>
                            <th scope="col" class="text-nowrap">貸出物</th>
                            <th scope="col" class="text-nowrap">貸出物グループ</th>
                            

                            <th scope="col"></th>
                            <th scope="col"></th>
                          
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                        <tr>
                        <th>{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->optgroup_id}}</td>
                        {{-- <td>
                            @if($item->optgroup_id === 1)
                            <span>iPad</span>
                            @elseif($item->optgroup_id === 2)
                                <span>パソコン</span>
                            @elseif($item->optgroup_id === 3)
                                <span>書籍</span>
                            @elseif($item->optgroup_id === 4)
                                <span>傘</span>
                            @elseif($item->optgroup_id === 5)
                                <span>その他</span>
                            @endif
                        </td> --}}
                        
                        
                        <td><button class="btn btn-primary text-nowrap" onclick="location.href='{{ route('lending.edit',['id'=> $item->id])}}'">編集</button></td>
                        <td>
                            <form method="POST" action="{{route('lending.destroy',['id'=> $item->id])}}" onsubmit="return check()">
                            @csrf
                                <button type="submit"class="btn btn-danger text-nowrap">削除</button>
                            </form>
                        </td>
                    
                        @endforeach
                        </tbody>
                        </table>
                    {{$items->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
