 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')


 <style>
     .table-wrapper {
         margin-top: 2rem;
         background: #fff;
         padding: 1.5rem;
         border-radius: 0.75rem;
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
         overflow-x: auto;
         margin: 20px auto;
         text-align: center;
         width: 800px;
         height: fit-content;
     }

     .custom-table {
         width: 100%;
         border-collapse: collapse;
     }

     .custom-table thead {
         background: #f8fafc;
     }

     .custom-table th,
     .custom-table td {
         padding: 1rem;
         text-align: left;
         border-bottom: 1px solid #e2e8f0;
     }

     .custom-table th {
         color: #1e293b;
         font-weight: 600;
     }

     .custom-table td img {
         width: 40px;
         height: 40px;
         border-radius: 50%;
         object-fit: cover;
     }

     .status {
         padding: 0.25rem 0.75rem;
         border-radius: 9999px;
         font-size: 0.75rem;
         font-weight: 500;
     }

     .status.active {
         background-color: #dcfce7;
         color: #166534;
     }

     .status.inactive {
         background-color: #fee2e2;
         color: #dc2626;
     }

     .btn {
         padding: 0.3rem 0.75rem;
         font-size: 0.8rem;
         border: none;
         border-radius: 5px;
         cursor: pointer;
     }

     .btn.edit {
         background-color: #3b82f6;
         color: white;
         margin-right: 5px;
     }

     .btn.delete {
         background-color: #ef4444;
         color: white;
     }
 </style>

 <div class="table-wrapper">
     <h2>Records List</h2>
     <table class="custom-table">
         <thead>
             <tr>
                 <th>#</th>
                 <th>Link</th>
                 <th>Title</th>
                 <th>Image</th>
                 <th>Sequence</th>
                 <!-- <th>Email</th>
        <th>Status</th>
        <th>Created At</th> -->
                 <th>Actions</th>
             </tr>
         </thead>
         <tbody>
             <!-- Sample Row -->
             @foreach($shayaricollection as $item)
             <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->url}}</td>
                 <td>{{$item->title}}</td>

                 <td>
                     <div class="avatar-img mb-3">@if($item->image)
                         <img src="{{ asset('/assets/uploades/shayaricollection/'. $item->image) }}" alt="Image" width="180">

                         @else
                         N/A
                         @endif
                     </div>
                 </td>
                 <td>{{$item->sequence}}</td>
                 <!-- <td>john@example.com</td>
        <td><span class="status active">Active</span></td>
        <td>2025-06-18</td> -->
                 <td>
                     <div class="card-actions" style="display: flex; gap: 2px; align-items: center;">
                         <a href="{{ route('shayaricollection', $item->id) }}">
                             <button class="btn view" style="background-color: grey; color: white;">View</button>
                         </a>
                         <a href="{{ route('editshayaricollection', $item->id)}}"> <button class="btn edit">Edit</button></a>
                         <form action="{{ route('deleteshayaricollection', $item->id) }}" method="POST" style="display:inline;">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn delete" onclick="return confirm('Are you sure?')">Delete</button>
                         </form>
                     </div>
                 </td>
                

             </tr>
             @endforeach
             <!-- More rows dynamically here -->
         </tbody>
     </table>
     {{ $shayaricollection->links('pagination::bootstrap-5') }}
 </div>
 @endsection