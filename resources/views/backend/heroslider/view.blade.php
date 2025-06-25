 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')


 <h2 style="text-align:center; margin-bottom: 20px;">Hero Sliders</h2>

 <div class="card-container">
     <div class="hero-card">

         <div class="hero-card-body">
             <p><strong>ID:</strong> {{ $heroslider->id }}</p>
             <p><strong>Link:</strong> <a href="{{ $heroslider->link }}" target="_blank">{{ $heroslider->link }}</a></p>
             <p><strong>Sequence:</strong>{{$heroslider->sequence}}</p>
         </div>

     </div>

 </div>

 @endsection