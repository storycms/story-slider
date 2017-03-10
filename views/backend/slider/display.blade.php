@extends('story-theme::layouts.master')

@section('title') Dashboard @stop

@section('content')
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h1>Slider > </h1>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Create New Slider Item</div>
        <div class="panel-body">
          <form class="" action="" method="POST" accept-charset="UTF-8">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('name') ? 'has-error': '' }} ">
              <label>Name</label>
              <input type="type" name="name" class="form-control">
              @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Create new</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Updated at</th>
            <th>Updated by</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
@stop
