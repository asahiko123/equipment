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

                    <form method="POST" action="{{route('equipment.update',['id'=>$equipment->id])}}">
                    @csrf
                    <div class="d-grid gap-3 col-lg-5 py-2">
                        <div class="col-md-12">
                        氏名
                        <input type="text" name="name">
                        </div>
                        <div class="col-md-12">
                        貸出物
                        <select name="borrowed">
                            <option value=""></option>
                            <option value="1">1号機+アダプタ+バッテリー</option>
                            <option value="2">2号機+アダプタ+バッテリー</option>
                            <option value="3">3号機+アダプタ+バッテリー</option>
                            <option value="4">4号機+アダプタ+バッテリー</option>
                            <option value="5">5号機+アダプタ+バッテリー</option>
                            <option value="6">6号機+アダプタ+バッテリー</option>
                            <option value="7">7号機+アダプタ+バッテリー</option>
                            <option value="8">8号機+アダプタ+バッテリー</option>
                            <option value="9">9号機+アダプタ+バッテリー</option>
                        </select>

                        </div>

                        <div class="col-md-12">

                        <label>貸出日</label>
                        <input type="date" name="checkout">

                        </div>

                        <div class="col-md-12">

                        <label>返却日</label>
                        <input type="date" name="returned">

                        </div>

                        <div class="col-md-12">

                        <label>備考</label>
                        <textarea name="description"></textarea>

                        </div>

                        <div class="form-check mb-3">
                            <label for="">貸出中</label>
                        <input type="radio" name="confirmed"value="0" required>
                        </div>

                        <div class="form-check mb-3">
                            <label for="">返却済</label>
                        <input type="radio" name="confirmed" value="1">
                        </div>

                        <div class="col-md-12">

                        <input class="btn btn-info" type="submit" value="更新する">
                        <a class="btn btn-success" href="{{route('equipment.index')}}">戻る</a>

                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_'+e.dataset.id).submit();
        }
    }
</script>
@endsection
