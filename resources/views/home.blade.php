@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>精選食譜</h2></div>
                @forelse($recipes as $recipe)
                <div class="panel-body">
                    <div>
                      <div class="row">
                        <div class="col-md-8">
                          <h3 style="display:inline-block;">
                            <span class='glyphicon glyphicon-tag' aria-hidden='true'></span>  {{ $recipe['name'] }}
                          </h3>
                          <h5 style="display:inline-block;">by {{ $recipe['uname'] }} ( {{ $recipe['create_at'] }})</h5>
                          </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-4">
                          <a href="{{ url('/recipe/show/'. $recipe['_id']) }}" class="thumbnail">
                            <img src="{{ $recipe['imgsrc'] }}" width="200px" height="150px">
                          </a>
                        </div>
                        <div class="col-md-4">
                          {{ $recipe['description'] }}
                          @if($recipe['uid'] == Auth::id())
                            <div class="form-group pull-left">
                              <a href="{{ url('/recipe/modify/'. $recipe['_id']) }}" class="btn btn-success">修改</a>
                              <a href="{{ url('/recipe/remove/'. $recipe['_id']) }}" class="btn btn-danger">刪除</a>
                            </div>
                          @endif
                        </div>
                      </div>
                      
                      
                      
                    </div>
                </div>
                @empty
                  <h1>No Recipe.</h1>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
