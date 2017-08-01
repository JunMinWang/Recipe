@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">{{ $recipe[0]['uname'] }} at {{ $recipe[0]['create_at'] }}</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-6">
                  <a href="#" class="thumbnail">
                    <img src="{{ $recipe[0]['imgsrc'] }}" style="width:400px;height:300px;" />
                  </a>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <h3>{{ $recipe[0]['name'] }}</h3>
                    <span>{{ $recipe[0]['description'] }}</span>
                  </div>
                  <div class="form-group">
                    <h3>食材</h3>
                    <ul>
                      @foreach($recipe[0]['ingredients'] as $ingr)
                        <li>{{ $ingr }}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-footer">
              <a href="{{ url('/home') }}" class="btn btn-primary">回食譜清單</a>
            </div>
          </div>  
        </div>
    </div>
</div>
@endsection