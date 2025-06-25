 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')



 <h2 style="text-align:center; margin-bottom: 20px;">Book-Collection</h2>

 <div class="card-container">
     <tr>

         <div class="hero-card">
             <div class="hero-card-body">
                 <p><strong>ID:</strong> {{ $books->id }}</p>
                 <p><strong>ID:</strong> {{$books->title}}</p>
                 <p><strong>Link:</strong> <a href="{{ $books->link }}" target="_blank">{{ $books->url }}</a></p>
                 <div class="avatar-img mb-3">@if($books->image)
                     <img src="{{ asset('/assets/uploades/books/'. $books->image) }}" alt="Image" width="180">
                     @else
                     N/A
                     @endif
                 </div>
                 <p><strong>Sequence:</strong> {{ $books->sequence }}</p>
             </div>

         </div>
 </div>

 @endsection