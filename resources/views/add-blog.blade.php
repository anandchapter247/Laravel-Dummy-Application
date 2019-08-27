@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Details</div>
                <div class="panel-body">
                  @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                  @endif
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                      <form action="{{route('submitBlog')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group @if(@$errors->first('title')) has-error @endif">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title" value="{{ old('title') }}" >
                          @if(@$errors->first('title'))
                            <small id="titleHelp" class="help-block">{{$errors->first('title')}}</small>
                          @endif
                        </div>
                        <div class="form-group  @if(@$errors->first('summary')) has-error @endif">
                          <label for="summary">Summary</label>
                          <textarea class="form-control no-resize" name="summary" id="summary" aria-describedby="emailHelp" placeholder="Enter Summary">{{ old('summary') }}</textarea>
                          @if(@$errors->first('summary'))
                            <small id="titleHelp" class="help-block">{{$errors->first('summary')}}</small>
                          @endif
                        </div>
                        <div class="form-group @if(@$errors->first('description')) has-error @endif">
                          <label for="description">Descrption</label>
                          <textarea name="description" class="form-control no-resize" aria-describedby="description"  id="tinymce">{{ old('description') }}</textarea>
                          @if(@$errors->first('description'))
                            <small id="titleHelp" class="help-block">{{$errors->first('description')}}</small>
                          @endif
                        </div>
                        <div class="pull-right">
                          <button type="button" class="btn btn-danger">Cancel</button>&nbsp;
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

