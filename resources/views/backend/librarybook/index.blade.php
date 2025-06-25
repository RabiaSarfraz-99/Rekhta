 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')

     <div class="table-wrapper">
         <h2>Records List</h2>
         <table class="custom-table">
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Title</th>
                     <th>Author</th>
                     <th>Year</th>
                     <th>Catagory</th>
                     <th>Image</th>
                     <th>Link</th>
                     <th>Sequence</th>
                     <!-- <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th> -->
                     <th>Actions</th>
                 </tr>
             </thead>
             <tbody>
                 <!-- Sample Row -->
                 @foreach ($librarybook as $item)
                     <tr>
                         <td>{{ $item->id }}</td>
                         <td>{{ $item->title }}</td>
                         <td>{{ $item->author }}</td>
                         <td>{{ $item->year }}</td>
                         <td>{{ $item->catagory }}</td>
                         <td>
                             <div class="avatar-img mb-3">
                                 @if ($item->image)
                                     <img src="{{ asset('/assets/uploades/librarybook/' . $item->image) }}" alt="Image"
                                         width="180">
                                 @else
                                     N/A
                                 @endif
                             </div>
                         </td>
                         <td>{{ $item->link }}</td>
                         <td>{{ $item->sequence }}</td>

                         <td>
                             <a href="{{ route('editlibrarybook', $item->id) }}"> <button class="btn edit">Edit</button></a>
                             <a href="{{ route('viewbookslist', $item->id) }}"> <button class="btn view">View</button></a>

                             <form action="{{ route('deletelibrarybook', $item->id) }}" method="POST"
                                 style="display:inline;">
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

         {{ $librarybook->links() }}

     </div>
 @endsection
