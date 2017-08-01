@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel panel-body">
            <form method="POST" action="{{ route('postCreateRecipe') }}">
              <div class="form-group">
                <label for="recipename">食譜名稱:</label>
                <input id="recipename" name="recipename" class="form-control" placeholder="請輸入食譜名稱" />
              </div>
              <div class="form-group">
                <label for="ingredients">食材:</label>
                <input id="ingredients" name="ingredients" class="form-control" placeholder="多重食材使用空白分割" />
              </div>
              <div class="form-group">
                <label for="imgsrc">圖片:</label>
                <input id="imgsrc" name="imgsrc" class="form-control" />
              </div>
              <div class="form-group">
                <label for="description">描述:</label>
                <textarea id="description" name="description" class="form-control" placeholder="請輸入描述"></textarea> 
              </div>
              {{ csrf_field() }}
              <div class="form-group">
                <button class="btn btn-primary">新增食譜</button>
              </div>
            </form>
            </div>
          </div>  
        </div>
    </div>
</div>
@endsection