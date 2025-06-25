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
         <h2>Create New Record</h2>
         <form action="{{ route ('herolisting') }}" method="POST">
         @csrf
             <!-- CSRF token (required in frameworks like Laravel) -->
             <!-- <input type="hidden" name="_token" value="YOUR_CSRF_TOKEN"> -->

             <div class="form-group">
                 <label for="link">Link*</label>
                 <input type="text" id="link" name="link" required>
             </div>

             <div class="form-group">
                 <label for="image">Upload Image *</label>
                 <input type="file" id="imageUpload" name="image" accept="image/*">
                 <img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 200px; margin-top: 10px;">
             </div>

             <!-- <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone">
    </div>

    <div class="form-group">
      <label for="role">Role</label>
      <select id="role" name="role">
        <option value="">-- Select Role --</option>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
        <option value="viewer">Viewer</option>
      </select>
    </div>

    <div class="form-group">
      <label for="notes">Additional Notes</label>
      <textarea id="notes" name="notes" placeholder="Enter any remarks..."></textarea>
    </div>
--> 
    <button type="submit" class="submit-btn">Submit</button>

    <div class="note">All fields marked with * are required.</div>
         </form>
     </div>
<script>
  document.getElementById("imageUpload").addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        const preview = document.getElementById("imagePreview");
        preview.src = e.target.result;
        preview.style.display = "block";
      };
      reader.readAsDataURL(file);
    }
  });
</script>

     @endsection