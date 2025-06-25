 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')



 <h2 style="text-align:center; margin-bottom: 20px;">Poetrycollection</h2>

 <div class="card-container">
     <tr>

         <div class="hero-card">
             <div class="hero-card-body">
                 <p><strong>ID:</strong> {{ $poetrycollection->id }}</p>
                 <p><strong>ID:</strong> {{$poetrycollection->title}}</p>
                 <p><strong>Link:</strong> <a href="{{ $poetrycollection->link }}" target="_blank">{{ $poetrycollection->url }}</a></p>
                 <div class="avatar-img mb-3">@if($poetrycollection->image)
                     <img src="{{ asset('/assets/uploades/poetrycollection/'. $poetrycollection->image) }}" alt="Image" width="180">
                     @else
                     N/A
                     @endif
                 </div>
                 <p><strong>Sequence:</strong> {{ $poetrycollection->sequence }}</p>
             </div>

         </div>
 </div>

 @endsection