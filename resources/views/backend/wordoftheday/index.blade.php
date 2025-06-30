 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')


     {{-- <style>
     .table-wrapper {
         margin-top: 2rem;
         background: #fff;
         padding: 1.5rem;
         border-radius: 0.75rem;
         box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
         overflow-x: auto;
         margin: 20px auto;
         text-align: center;
         width: 1000px;
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
 </style> --}}

     <div class="table-wrapper">
         <h2>Records List</h2>
         <table class="custom-table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Word in Eng</th>
                     <th>Word in Hin</th>
                     <th>Word in Urdu</th>
                     <th>Meaning</th>
                     <th>Sher</th>
                     <th>Poet</th>
                     <th>Link to Profile</th>
                     <!-- <th>Email</th>
                <th>Status</th>
                <th>Created At</th> -->
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 <!-- Sample Row -->
                 @foreach ($wordoftheday as $item)
                     <tr>
                         <td>{{ $item->id }}</td>
                         <td>{{ $item->engword }}</td>
                         <td>{{ $item->hinword }}</td>
                         <td>{{ $item->urdword }}</td>
                         <td>{{ $item->meaning }}</td>
                         <td>{{ $item->meaning }}</td>
                         <td>{{ $item->sher }}</td>
                         <td>{{ $item->poet }}</td>
                         <td>{{ $item->link }}</td>
                         <td>
                             <a href="{{ route('editword', $item->id) }}"> <button class="btn edit">Edit</button></a>
                             <a href="{{ route('viewword', $item->id) }}"> <button class="btn view">View</button></a>

                             <form action="{{ route('deleteword', $item->id) }}" method="POST" style="display:inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn delete"
                                     onclick="return confirm('Are you sure?')">Delete</button>
                             </form>

                         </td>

                     </tr>
                 @endforeach
                 <!-- More rows dynamically here -->
             </tbody>
         </table>
         {{ $wordoftheday->links() }}
     </div>
 @endsection
