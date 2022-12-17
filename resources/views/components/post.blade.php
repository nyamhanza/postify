
@props(['post'=>$post])

<div class="badge badge-primary mb-0 ">
    <a href="{{ route('user.post',$post->user) }}"><b class="">{{ $post->user->username }}</b></a><span class="bg-warning ">{{ $post->created_at->diffForHumans() }}</span>
</div>
<div class="mb-1" >
    <p class="mb-0 d-flex form-control bg-success ">{{ $post->body}}
     <div class="">
        @can('delete', $post)
            
       
        @if ( $post->ownedBy(auth()->user()) )
        <form method="POST" action="{{ route('delete',$post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
            
        @endif
        @endcan
       

        @if (!$post->likedBy(auth()->user()))
        <form method="POST" action="{{ route('like',$post) }}">
            @csrf
            <button type="submit" class="btn btn-success">Like</button>
        </form>
        @else
        <form method="POST" action="{{ route('like',$post) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-secondary">Unlike</button>
        </form>
            
        @endif
        
           
              
                <span><b>{{ $post->likes->count() }} {{ Str::plural('like',$post->likes->count() ) }}</b></span>
            
            
        
        </div>
           
        

    </div>
     