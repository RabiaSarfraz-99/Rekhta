 <div class="navigation">
   <div class="left">
     <div class="logo">
       <a href="/" title="Logo" aria-label="Logo" class="logoImg"><img
           width="78"
           alt="Best poetry resource in urdu"
           class="lazyloaded"
           src="{{ asset('assets/images/RekhtaLogo.png') }}" />
       </a>
     </div>
     <div class="navbar">
       <ul>
         <li><a href="/poets?wref=rweb" target="_self">POETS</a></li>
         <li><a href="/couplets?wref=rweb" target="_self">SHER</a></li>
         <li>
           <a href="/urdudictionary?wref=rweb" target="_self">DICTIONARY</a>
         </li>
         <li>
           <a href="/ebooks?wref=rweb?wref=rweb" target="_self">E-BOOKS</a>
         </li>
         <li><a href="/prose?wref=rweb" target="_self">PROSE</a></li>
         <li>
           <a href="https://blog.rekhta.org/?wref=rweb" target="_blank">BLOG</a>
         </li>
         <li><a href="/shayari?wref=rweb" target="_self">SHAYARI</a></li>
         <li><a href="/daily-quiz?wref=rweb" target="_self">QUIZ</a></li>
         <li><a href="/qaafiya?wref=rweb" target="_self">QAAFIYA</a></li>
         <li class="MoreMenuBtn" style="opacity: 1">
           <a href="">MORE</a>
           <ul class="subMenu">
             <li><a href="/taqti?wref=rweb" target="_self">TAQTI</a></li>
             <li>
               <a href="/explorer?wref=rweb" target="_self">EXPLORER</a>
             </li>
             <li>
               <a href="/publications?wref=rweb" target="_self">PUBLICATIONS</a>
             </li>
           </ul>
         </li>
       </ul>
     </div>
   </div>
   <div class="right">
     <div class="Search">
       <div class="searchbar">
         <fieldset>
           <div class="searchBox">
             <form method="GET" action="{{ route('search') }}">
               <div class="searcIcon">
                 <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
               </div>
               <input type="text" name="q" value="{{ request('q') }}" placeholder="Search..." class="search-box">
             </form>
           </div>
           <div class="microphone">
             <button class="mic">
               <i class="fa-solid fa-microphone"></i>
             </button>
           </div>
         </fieldset>
       </div>
     </div>

     <div class="language">
       <div class="dropdown">
         <p>ENG</p>
       </div>
     </div>
     <div class="logIn">
       <a href="">LOG IN</a>
     </div>
     <div class="notification">
       <div class="grid-icon">
         <span></span><span></span><span></span> <span></span><span></span><span></span> <span></span><span></span><span></span>
       </div>
     </div>
     <div class="getApp">
       <a href="">Get App</a>
     </div>
     <div class="donate">
       <a href="">Donate</a>
     </div>
   </div>
 </div>
 <div class="opt-block">
   <i class="fa-solid fa-caret-up"></i>
   <div class="option">
     <ul>
       <li value="ENG" class="active">ENG</li>
       <li value="HIN">HIN</li>
       <li value="URD">URD</li>
     </ul>
   </div>
 </div>

 <div class="opt-block">
   <i class="fa-solid fa-caret-up"></i>
   <div class="option">
     <ul>
       <li value="ENG" class="active">ENG</li>
       <li value="HIN">HIN</li>
       <li value="URD">URD</li>
     </ul>
   </div>
 </div>

 <script>
   const micButton = document.querySelector('.mic');
   const searchInput = document.querySelector('.search-box');

   // Check if browser supports speech recognition
   const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

   if (SpeechRecognition) {
     const recognition = new SpeechRecognition();
     recognition.lang = 'ur-PK';
     recognition.interimResults = false;
     recognition.maxAlternatives = 1;

     micButton.addEventListener('click', () => {
       recognition.start();
       micButton.innerText = 'Listening...'; // Optional UI feedback
     });

     recognition.addEventListener('result', (event) => {
       const transcript = event.results[0][0].transcript;
       searchInput.value = transcript;
       micButton.innerHTML = '<i class="fa-solid fa-microphone"></i>'; // Reset icon
     });

     recognition.addEventListener('end', () => {
       micButton.innerHTML = '<i class="fa-solid fa-microphone"></i>'; 
     });

     recognition.addEventListener('error', (event) => {
       alert('Speech recognition error: ' + event.error);
       micButton.innerHTML = '<i class="fa-solid fa-microphone"></i>'; 
     });
   } else {
     micButton.disabled = true;
     micButton.title = 'Speech recognition not supported in this browser.';
   }
 </script>