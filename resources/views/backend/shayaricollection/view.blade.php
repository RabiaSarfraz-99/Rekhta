 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')



 <h2 style="text-align:center; margin-bottom: 20px;">ShayariCollection</h2>

 <div class="card-container">
     <tr>

         <div class="hero-card">
             <div class="hero-card-body">
                 <p><strong>ID:</strong> {{ $shayaricollection->id }}</p>
                 <p><strong>ID:</strong> {{$shayaricollection->title}}</p>
                 <p><strong>Link:</strong> <a href="{{ $shayaricollection->link }}" target="_blank">{{ $shayaricollection->url }}</a></p>
                 <div class="avatar-img mb-3">@if($shayaricollection->image)
                     <img src="{{ asset('/assets/uploades/shayaricollection/'. $shayaricollection->image) }}" alt="Image" width="180">
                     @else
                     N/A
                     @endif
                 </div>
                 <p><strong>Sequence:</strong> {{ $shayaricollection->sequence }}</p>
             </div>

         </div>
 </div>

 @endsection