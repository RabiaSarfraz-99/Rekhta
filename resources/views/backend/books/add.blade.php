 @extends('backend.admin')
 @section('title', 'rekhta')

 @section('content')
 <style>
     .form-container {
         margin: 20px auto;
         background-color: #fff;
         padding: 40px 30px;
         border-radius: 12px;
         box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
         width: 100%;
         max-width: 700px;
         height: fit-content;
     }

     .form-container h2 {
         text-align: center;
         margin-bottom: 25px;
         color: #333;
     }

     .form-group {
         margin-bottom: 20px;
     }

     .form-group label {
         display: block;
         margin-bottom: 8px;
         font-weight: 600;
         color: #444;
     }

     .form-group input,
     .form-group select,
     .form-group textarea {
         width: 100%;
         padding: 12px;
         border: 1px solid #ccc;
         border-radius: 8px;
         background-color: #fafafa;
         font-size: 15px;
         transition: border-color 0.3s;
     }

     .form-group input:focus,
     .form-group select:focus,
     .form-group textarea:focus {
         outline: none;
         border-color: #007BFF;
         background-color: #fff;
     }

     .form-group textarea {
         resize: vertical;
         min-height: 100px;
     }

     .submit-btn {
         background-color: #007BFF;
         color: white;
         padding: 12px 20px;
         border: none;
         border-radius: 8px;
         width: 100%;
         font-size: 16px;
         cursor: pointer;
         transition: background-color 0.3s;
     }

     .submit-btn:hover {
         background-color: #0056b3;
     }

     .note {
         text-align: center;
         margin-top: 15px;
         font-size: 14px;
         color: #888;
     }
 </style>
 </head>

 <body>

     <div class="form-container">
         <h2>{{ isset($books) ? 'Edit Book Record' : 'Create New Book Record' }}</h2>

         <form action="{{ isset($books) ? route('updatebooks', $books->id) : route('books') }}"
             method="POST" enctype="multipart/form-data">

             @csrf
             @if(isset($books))
             @method('PUT')
             @endif
             <div class="form-group">
                 <label for="author">Author *</label>
                 <input type="text" id="author" name="author" value="{{ old('author', $books->author ?? '') }}" required>
             </div>
             <div class="form-group">
                 <label for="link">Link*</label>
                 <input type="text" id="link" name="link" value="{{ old('link', $books->link ?? '') }}" required>
             </div>

             <div class="form-group">
                 <label for="title">Title *</label>
                 <input type="text" id="title" name="title" value="{{ old('title', $books->title ?? '') }}" required>
             </div>


             <div class="form-group">
                 <label for="image">Upload Image *</label>
                 <input type="file" id="imageUpload" name="image" accept="image/*">

                 {{-- Image Preview --}}
                 <div class="avatar-img mb-3">
                     <img id="imagePreview"
                         src="{{ isset($books) && $books->image ? asset('assets/uploades/books/' . $books->image) : '#' }}"
                         alt="Image Preview"
                         style="{{ isset($books) && $books->image ? '' : 'display:none;' }} max-width: 200px; margin-top: 10px;">
                 </div>
             </div>
             <div class="form-group">
                 <label for="rating">rating</label>
                 <input type="number" id="rating" value="{{ old('rating', $books->rating ?? '') }}" name="rating">
             </div>
             <div class="form-group">
                 <label for="sequence">sequence</label>
                 <input type="number" id="sequence" value="{{ old('sequence', $books->sequence ?? '') }}" name="sequence">
             </div>
             <button type="submit" class="submit-btn">
                 {{ isset($books) ? 'Update' : 'Submit' }}
             </button>

             <div class="note">All fields marked with * are required.</div>
         </form>
     </div>

     <script>
         document.getElementById("imageUpload").addEventListener("change", function() {
             const file = this.files[0];
             if (file) {
                 const reader = new FileReader();
                 reader.onload = function(e) {
                     const preview = document.getElementById("imagePreview");
                     preview.src = e.target.result;
                     preview.style.display = "block";
                 };
                 reader.readAsDataURL(file);
             }
         });
     </script>

     @endsection