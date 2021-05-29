@extends('layouts.backend.app')

@section('title','Post')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
           
          <a href="{{route('admin.post.index')}}" class="btn btn-danger waves-effect">BACK</a>
          @if($post->is_approved == false)
          <button type="button" class="btn btn-success pull-right waves-effect" onclick="approvepost$post({{$post->id}})"><i class="material-icons">done</i><span>Approve</span></button>
          <form id="approvalform" action="{{route('admin.post.approve',$post->id)}}" method="POST" style="display: none;">
                                 @csrf
                                @method('PUT')                           
                                </form>
          @else
          <button type="button" class="btn btn-success pull-right " disabled><i class="material-icons">done</i><span>Approved</span></button>
          @endif
          </br>
          </br>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{$post->title}}
                                <small>posted by : <strong><a href="">{{$post->user->name}}</a></strong> on {{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y H:i:s') }}</small>
                               
                            </h2>
                          
                        </div>
                        <div class="body">
                           {!! html_entity_decode($post->body) !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-cyan">
                            <h2>
                                Categories
                               
                            </h2>
                          
                        </div>
                        <div class="body">
                           
                                @foreach($post->categories as $category)
                                <span class="label bg-cyan">{{$category->name}}</span>
                                @endforeach
                            
                        </div>
                    </div>
                        <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Tags
                               
                            </h2>
                          
                        </div>
                        <div class="body">
                           
                                @foreach($post->tags as $tag)
                                <span class="label bg-green">{{$tag->name}}</span>
                                @endforeach
                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="header bg-amber">
                            <h2>
                                Feature Image
                               
                            </h2>
                          
                        </div>
                        <div class="body">
                           
                           <img class="img-responsive thumbnail" src="{{Storage::disk('public')->url('post/'.$post->image)}}" alt="">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
    function approvepost$post(id)
    {
        Swal.fire({
  title: 'Are you sure?',
  text: "You approve this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, approve it!'
}).then((result) => {
  if (result.isConfirmed) {
   event.preventDefault();
   document.getElementById('approvalform').submit();
  }
})
    }
    </script>

 <!-- Select Plugin Js -->
 <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
  <!-- TinyMCE -->
  <script src="{{asset('assets/backend/plugins/tinymce/tinymce.js')}}"></script>
  <script>
  $(function () {
    

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '{{asset('assets/backend/plugins/tinymce')}}';
});</script>
@endpush