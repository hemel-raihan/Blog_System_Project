@extends('layouts.backend.app')

@section('title','tag')

@section('content')
<div class="container-fluid">
           
            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit TAG
                               
                            </h2>
                          
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.tag.update',$tag->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" id="tagname" class="form-control" name="tagname" value="{{$tag->name}}">
                                        
                                    </div>
                                   
                                </div>

                                
                                <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">BACK</a>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
        
        </div>
@endsection