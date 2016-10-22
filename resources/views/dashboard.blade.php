@extends('layouts.master')

@section('content')
@include('includes.message-block')

<section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header><h3> Sta imas da kazes</h3> </header>
        <form action="{{ route('post.create')}}" method="post">
            <div class="form-group">
                <textarea class="form-control" name="body" id="new-post" cols="30" rows="5" placeholder="status"></textarea>
                
                
            </div>  
            <button type="submit" class="btn btn-primary">Objavi</button>
            <input type="hidden"  value="{{Session::token()}}" name="_token">
        </form>
    </div>
    
</section>
<section class="row posts">
    <div class="col-md-6 col-md-offset-3">
        <header><h3>Sta ostali kazu</h3></header>
        @foreach($posts as $post)
        
        <article class="post" data-postid="{{$post->id}}" >
            <p > {{ $post->body }}</p>
            <div class="info">
                Rekao {{ $post->user->first_name}} {{ $post->created_at  }}
            </div>
            <div class="interaction"> 
                <a href="#" class="like"> Lajk</a>
                <a href="#" class="like"> Fuj</a>
                 @if(Auth::user() == $post->user)
                 
                 <a href="#" class="edit" > Izmjeni</a>
                   <a href="{{route('post.delete',['post_id'=>$post->id])}}"> Izbrisi</a>
                 
                 @endif
                  
            </div>
            
        </article>
        @endforeach
       
        
    </div>
    
    
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Izmjeni objavu</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Izmjeni objavu</label>
                  <textarea  class="form-control" name="post-body" id="post-body"  rows="5"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
        <button type="button" class="btn btn-primary"  id="modal-save">Izmjeni objavu </button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  var token = '{{Session::token()  }}';
  var url='{{route('edit')}}';
  var urlLike='{{route('like')}}';
</script>


@endsection