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
                        <select class="form-select form-control mb-3" name="facility_user_id" required>
                            <option selected>選択してください</option>
                            @foreach($facility_user as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-12">
                        <label>貸出物</label>
                        <select class="form-select form-control mb-3" name="borrowed" required>
                            <option selected>選択してください</option>
                            @foreach($lendings as $key =>$vals)
                            <optgroup label ="{{$key}}">
                                @foreach($vals as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                               @endforeach
                            </optgroup>
                            
                            @endforeach
                            {{-- <optgroup label ="iPad">
                                <option value="1">1号機+アダプタ+バッテリー</option>
                                <option value="2">2号機+アダプタ+バッテリー</option>
                                <option value="3">3号機+アダプタ+バッテリー</option>
                                <option value="4">4号機+アダプタ+バッテリー</option>
                                <option value="5">5号機+アダプタ+バッテリー</option>
                                <option value="6">6号機+アダプタ+バッテリー</option>
                            </optgroup>
                            <optgroup label ="パソコン">
                                <option value="7">7号機+アダプタ+バッテリー</option>
                                <option value="8">8号機+アダプタ+バッテリー</option>
                                <option value="9">9号機+アダプタ+バッテリー</option>
                                <option value="10">10号機+アダプタ+バッテリー</option>
                                <option value="11">11号機+アダプタ+バッテリー</option>
                                <option value="12">12号機+アダプタ+バッテリー</option>
                                <option value="13">13号機+アダプタ+バッテリー</option>
                                <option value="14">14号機+アダプタ+バッテリー</option>
                                <option value="15">15号機+アダプタ+バッテリー</option>
                                <option value="16">16号機+アダプタ+バッテリー</option>
                                <option value="17">17号機+アダプタ+バッテリー</option>
                                <option value="18">18号機+アダプタ+バッテリー</option>
                                <option value="19">19号機+アダプタ+バッテリー</option>
                            </optgroup>
                            <optgroup label="書籍">
                                <option value="20">書籍</option>
                            </optgroup>
                            <optgroup label="傘">
                                <option value="21">傘</option>
                            </optgroup> --}}
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
                        <textarea name="description" class="form-control col-md-12 mb-3"></textarea>
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
                            <a class="btn btn-success" href="{{route('equipment.index')}}">戻る</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
