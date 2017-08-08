@extends('story-theme::layouts.master')

@section('title') Slider Item @stop

@section('heading-elements')
<div class="heading-elements">
  <div class="heading-btn-group">
    {{--  <a href="/backend/system/appearance/navigation/create" class="btn btn-link btn-float has-text">
      <i class="material-icons">add_box</i> <span>ADD NEW</span>
    </a>  --}}
  </div>
</div>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">Create New Slider Item</div>
        <div class="panel-body">
          <form class="" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group {{ $errors->has('title') ? 'has-error': '' }} ">
              <label>Title</label>
              <input type="type" name="title" class="form-control" value="{{ $item->title }}">
              @if ($errors->has('title'))
                <span class="help-block">{{ $errors->first('title') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('subtittle') ? 'has-error': '' }} ">
              <label>Subtittle</label>
              <textarea name="subtitle" class="form-control" rows="8">{{ $item->subtitle }}</textarea>
              @if ($errors->has('subtittle'))
                <span class="help-block">{{ $errors->first('subtittle') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error': '' }} ">
              <label>Content</label>
              <textarea name="content" class="form-control" rows="8">{{ $item->content }}</textarea>
              @if ($errors->has('content'))
                <span class="help-block">{{ $errors->first('content') }}</span>
              @endif
            </div>
            <div class="form-group {{ $errors->has('media') ? 'has-error': '' }} ">
              <label>Image *</label>
              {{ $item->image }}
              <input type="file" name="media" class="form-control">
              @if ($errors->has('media'))
                <span class="help-block">{{ $errors->first('media') }}</span>
              @endif
              <span class="help-block">Picture size 1920 x 1080 pixel</span>
            </div>

            <div class="form-group {{ $errors->has('media_mobile') ? 'has-error': '' }} ">
              <label>Video *</label>
              {{ $item->image_mobile }}
              <input type="file" name="media_mobile" class="form-control">
              @if ($errors->has('media_mobile'))
                <span class="help-block">{{ $errors->first('media_mobile') }}</span>
              @endif
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Create new</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
