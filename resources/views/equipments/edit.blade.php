@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                    <!-- 氏名
                    <input type="text" name="name">
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
                    貸出日
                    <input type="date" name="checkout">
                    返却日
                    <input type="date" name="returned">
                    備考
                    <textarea name="description"></textarea> -->
                    
                    <input type="radio" name="confirmed"value="0">貸出中
                    <input type="radio" name="confirmed" value="1">返却済
                  
                    <input class="btn btn-info" type="submit" value="更新する">  
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
