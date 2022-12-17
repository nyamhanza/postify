@extends('layouts.app')
@section('content')


@auth
    

<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card mt-5 bg-warning" >

               <div class="card-body ">

                <form action="{{ route('posts') }}" method="POST">
                    @csrf

                    <div class="mt-4">

                        <h4>Postify.com</h4>

                        <textarea name="body" id="body " placeholder="Post Something" class=" form-control col-md-4" ></textarea>

                        @error('body')
                        <p class="bg-danger"> {{$message  }}</p>
                            
                        @enderror>
                    </div>
                <div class="mb-4">
                    <button class="btn btn-primary form-control">Post</button>

                </div>
                </form>
      @endauth

                @if ($posts->count())
                    @foreach ($posts as $post)
                    
                  <x-post :post="$post"/>

                    @endforeach
                    {{ $posts->links() }}

                    
                @else

                nothing
                    
                @endif

                
               </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection