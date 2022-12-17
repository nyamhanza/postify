
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header text-center" >{{ $user->name }}
                    <span> has {{ $posts->count() }}{{ Str::plural('post', $posts->count()) }} and Received
                        {{ $user->ReceivedLikes->count() }}  {{ Str::plural('like',$user->ReceivedLikes->count()) }}
                    
                    </span>
                
                </div>

               <div class="card-body mt-3 ">
                @if($posts->count())

                @foreach ($posts as $post)

             <x-post :post="$post"/>

        @endforeach
            {{ $posts->links() }}


@else

<span class="bg-success">{{ $user->name }}</span> Has nothing to show 

@endif

            
                
               </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



