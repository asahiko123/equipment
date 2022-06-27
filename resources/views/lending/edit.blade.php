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
                    <form method="POST" action="{{route('lending.update',['id'=>$items->id])}}">
                        @csrf
                    <div class="col-md-12">
                        <label>貸出物</label>
                        <input type="text" class="form-control mb-3" name="name"required>
                    </div>

                    <div class="col-md-12">
                        <label>貸出物グループ</label>
                        <select class="form-select form-control mb-3" name="optgroup_id" required>
                            <option selected>選択してください</option>
                                <option value="1">iPad</option>
                                <option value="2">パソコン</option>
                                <option value="3">書籍</option>
                                <option value="4">傘</option>
                                <option value="5">その他</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <input class="btn btn-info" type="submit" value="登録する">
                        <a class="btn btn-success" href="{{route('equipment.index')}}">戻る</a>
                    </div>

                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
