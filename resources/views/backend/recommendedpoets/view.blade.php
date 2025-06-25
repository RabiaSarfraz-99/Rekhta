 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')



 <h2 style="text-align:center; margin-bottom: 20px;">Recommendedpoets</h2>

 <div class="card-container">
     <tr>

         <div class="hero-card">
             <div class="hero-card-body">
                 <p><strong>ID:</strong> {{ $recommendedpoets->id }}</p>
                 <p><strong>Name:</strong> {{$recommendedpoets->name}}</p>
                 <p><strong>Link:</strong> <a href="{{ $recommendedpoets->link }}" target="_blank">{{ $recommendedpoets->url }}</a></p>
                 <div class="avatar-img mb-3">@if($recommendedpoets->image)
                     <img src="{{ asset('/assets/uploades/recommendedpoets/'. $recommendedpoets->image) }}" alt="Image" width="180">
                     @else
                     N/A
                     @endif
                 </div>
                 <p><strong>Sequence:</strong> {{ $recommendedpoets->sequence }}</p>
             </div>

         </div>
 </div>

 @endsection