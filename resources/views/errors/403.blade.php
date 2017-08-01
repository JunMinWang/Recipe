@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel panel-body">
              <h1 class="alert alert-danger">注意!您沒有修改此文章的權限!</h1>
              <a href="{{ route('home') }}" class="btn btn-danger">回首頁</a>
            </div>
          </div>  
        </div>
    </div>
</div>
@endsection