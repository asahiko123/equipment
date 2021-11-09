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

                    <form method="POST" action="{{route('equipment.store')}}">
                    @csrf
                    <div class="d-grid gap-3 col-lg-5 py-2">
                    <div class="col-md-12">
                    <label>氏名</label>
                    <input type="text" class="form-control col-md-6"name="name"required>
                    </div>
                    <div class="col-md-12">
                    <label>貸出物</label>
                    <select class="form-select form-control mb-3" name="borrowed" required>
                        <option selected>選択してください</option>
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
                        <input type="date" class="form-control mb-3" name="checkout"required>
                    </div>
                    <div class="col-md-12">
                        <label>返却日</label>
                        <input type="date" class="form-control mb-3"name="returned"required>
                    </div>
                    
                    <div class="col-md-12">
                    <label>備考</label>
                    <textarea name="description" class="form-control col-md-12 mb-3"required></textarea>
                    </div>
                    <div class="col-md-12">
                    <label>状態</label>
                    <div class="form-check mb-3">
                    <input type="radio" class="form-check-input" name="confirmed"value="0">
                    <label class="form-check-label">貸出中</label>
                    </div>
                    <div class="form-check mb-3">                   
                    <input type="radio" class="form-check-input" name="confirmed" value="1">
                    <label class="form-check-label">返却済</label>
                    </div>
                    </div>
                    <div class="col-md-12">  
                        <input class="btn btn-info" type="submit" value="登録する">
                    </div>
                    </div>
                    </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
