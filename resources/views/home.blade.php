@extends('layouts.app')
@section('title', 'Urdu Poetry, Urdu Shayari of Famous Poets - Rekhta')

@section('content')
<div class="container">

 @include('navbar')
  <div class="top-btn">
    <div class="prev">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="17"
        height="13"
        viewBox="0 0 17 13">
        <path
          d="M12 0 L6 6 L12 12"
          fill="none"
          stroke="white"
          stroke-width="2" />
      </svg>
    </div>
    <div class="next">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="17"
        height="13"
        viewBox="0 0 17 13">
        <path
          d="M0 0 L6 6 L0 12"
          fill="none"
          stroke="white"
          stroke-width="2" />
      </svg>
    </div>
  </div>
  <!-- Slider Wrapper -->
  <div class="top-slider-wrapper" style="position: relative;">
    <div class="top-slider"></div>

    <!-- Custom Navigation Buttons -->
    <div class="top-slider-btn">
      <div class="prev"><i class="fa fa-chevron-left"></i></div>
      <div class="next"><i class="fa fa-chevron-right"></i></div>
    </div>
  </div>

  <!-- top-5 -->
  <div class="top-5">
    <div class="top-5-heading">
      <p>TODAY'S TOP 5 URDU SHAYARI</p>
    </div>
    <div class="top-5-slider"></div>
  </div>
  <!-- poetry-collection -->
  <div class="poetry-collection">
    <h2 class="poetry-collection-Heading">URDU POETRY COLLECTION</h2>
    <div class="poetry-collection-wrapper slider"></div>

    <p class="sectionTagLine">
      Compilation of top 20 hand-picked Urdu shayari on the most
      sought-after subjects and poets
    </p>
    <div class="readFullBgBtn">
      <a
        class="readFull"
        title="See full collection"
        aria-label="See full collection"
        href="/top-20?wref=rweb"
        onclick="javascript:pageTracker._trackPageview('hometop20');">See full collection</a>
    </div>
  </div>
  <!-- crossWordmain -->
  <div class="crossWordmain">
    <div class="crossWordmain-wrapper">
      <div class="crossWordmainInner">
        <div class="crossWordIncontent">
          <h3>URDU CROSSWORD</h3>
          <p>
            Rekhta's online crossword puzzle - the world's first Urdu online
            crossword for free. Developed in collaboration with Amuse Labs,
            these puzzles are specially designed to improve your knowledge
            of Urdu language, literature, and culture. Challenge yourself
            with new crosswords and engage in playful learning.
          </p>
          <a
            class="btn-crossWordPlay"
            href="/games/urdu-crossword?wref=rweb">Start playing</a>
        </div>
        <img
          alt="crosswordhome"
          width="303"
          height="336"
          src="{{ asset('assets/images/crosswordhome.png') }}" />
      </div>
    </div>
  </div>
  <!-- word of the day SECTION -->
  <div class="section-container">
    <div class="small-heading">
      <h2>WORD OF THE DAY</h2>
    </div>
    <div class="big-heading">
      <p>quvvat</p>
    </div>
    <div class="main-heading">
      <ul>
        <li id="item1">क़ुव्वत</li>
        <li id="item2"><i class="fa-solid fa-circle"></i></li>
        <li id="item3">قوّت</li>
      </ul>
    </div>
    <div class="meaning">
      <p>means</p>
    </div>
    <div class="meaning">
      <h3>
        power, force, energy, strength, faculty, virtue, authority,
        strength, wealth, province
      </h3>
    </div>
    <div class="sher">
      <p>
        jab talak quvvat-e-taḳhayyul hai<br />
        aap pahlū se uTh nahīñ sakte
      </p>
    </div>
    <div class="poet">
      <p><span>by</span><a href=""> Fahmi Badayuni</a></p>
    </div>
    <div class="word-search">
      <div class="dictionary">
        <span>DICTIONARY</span>
      </div>
      <div class="word-search-box">
        <input type="text" placeholder="Find Meaning..." />
        <span><i class="fa-solid fa-magnifying-glass"></i></span>
      </div>
    </div>
    <div class="image-con">
      <div class="image">
        <a href=""><img src="{{ asset('assets/images/installapp.png') }}" alt="" /></a>
      </div>
    </div>
  </div>

  <!-- book -->
  <div class="booksection">
    <div class="buyRekhtaBooksSection">
      <h2 class="booksectionHeading">BUY HINDI &amp; URDU BOOKS</h2>

      <div class="book-slider" data-url="{{ route('bookslidedata') }}"></div>
      <div class="booksection-bottom">
        <p class="booksectionTagLine">
          Get latest Urdu books &amp; Hindi books online only on
          Rekhtabooks.com
        </p>
        <a
          class="booksection-readFull"
          title="Browse Rekhtabooks.com"
          aria-label="Browse Rekhtabooks.com"
          target="_blank"
          href="https://rekhtabooks.com/?ref=rekhta&amp;cid=mc">Browse Rekhtabooks.com</a>
      </div>
    </div>
  </div>
  <!-- quiz section  -->
  <section class="quiz">
    <div class="quiz-container">
      <div class="quiz-content">
        <div class="quiz-main-heading">
          <p>
            <span>QUIZ</span>A collection of interesting questions related
            to Urdu poetry, prose and literary history. Play Rekhta Quiz and
            check your knowledge about Urdu!
          </p>
        </div>
        <div class="quiz-form">
          <p class="question">
            How many dots are there in the Urdu word Taswir?
          </p>
          <div class="inputs">
            <label class="" id="" data-question="" data-option="">
              <ins>1</ins>
              <span class="check"></span>
              <input type="radio" name="2" />
            </label>
            <label class="" id="" data-question="" data-option="">
              <ins>2</ins>
              <span class="check"></span>
              <input type="radio" name="3" />
            </label>
            <label class="" id="" data-question="" data-option="">
              <ins>3</ins>
              <span class="check"></span>
              <input type="radio" name="4" />
            </label>
          </div>
        </div>
        <div class="start">
          <a
            title="Start Today’s Quiz"
            aria-label="Start Today’s Quiz"
            href="">Start Today’s Quiz</a>
        </div>
      </div>
    </div>
  </section>
  <!-- download for mobiles -->
  <section>
    <div class="rekhta-install-container">
      <div class="rekhta-content">
        <div class="rekhta-logo">
          <img src="{{ asset('assets/images/RekhtaLogo.png') }}" alt="" />
        </div>
        <p>Rekhta App : World’s largest collection of Urdu poetry</p>
        <div class="download-links">
          <div class="first-link">
            <div class="app-icon">
              <svg class="download-icon" viewBox="0 0 24 24">
                <path
                  d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.61 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"></path>
              </svg>
            </div>
            <div class="app-link">
              <p>DOWNLOAD FOR ANDROID</p>
            </div>
          </div>
          <div class="second-link">
            <div class="app-icon">
              <i class="fa-brands fa-app-store-ios"></i>
            </div>
            <div class="app-link">
              <p>DOWNLOAD FOR ANDROID</p>
            </div>
          </div>
        </div>
        <div class="bg-image">
          <img src="{{ asset('assets/images/apStripImg.png') }}" alt="" />
        </div>
      </div>
    </div>
  </section>
  <!-- didYK -->
  <div class="didYK">
    <div class="didYKwrapper">
      <div class="didYKContainer">
        <div id="didYK-slider" class="didYK-slick-slider"></div>
      </div>
    </div>
  </div>

  <!-- urdu-shayari-collection -->
  <div class="shayari-collection">
    <h2 class="shayari-collection-Heading">SHAYARI COLLECTION</h2>
    <div class="shayari-collection-wrapper slider"></div>

    <div class="shayari-readFullBgBtn">
      <a
        class="shayari-readFull"
        title="See full collection"
        aria-label="See full collection"
        href="/top-20?wref=rweb"
        onclick="javascript:pageTracker._trackPageview('hometop20');">See full collection</a>
    </div>
  </div>
  <!-- Remembering section -->
  <section class="remembering">
    <div class="rememberng-content">
      <div class="remembering-head">
        <h2>REMEMBERING</h2>
      </div>
      <div class="remember-subhead">
        <p>DEATH ANNIVERSARY</p>
      </div>
      <div class="remember-profile">
        <img src="{{ asset('assets/images/quill_round.png') }}" alt="" />
      </div>
      <div class="remember-name">
        <a href="">KAIF AHMED SIDDIQUI</a>
      </div>
      <div class="remember-date">
        <p>1943-1986</p>
      </div>
      <div class="dash">
        <p></p>
      </div>
      <div class="remer-sher">
        <p>
          aaj phir shāḳh se gire patte<br />
          aur miTTī meñ mil ga.e patte
        </p>
      </div>
      <div class="full-profile">
        <a href="">SEE FULL</a>
      </div>
    </div>
  </section>

  <!-- RECOMMENDED POETS-->
  <div class="rec-poets-collection">
    <h2 class="rec-poets-collection-Heading">Recommended Poets</h2>
    <div class="rec-poets-collection-wrapper slider"></div>
    <p class="rec-poets-sectionTagLine">
      Essential collection of Iconic poets – a list that goes beyond the
      realm of fame and populism
    </p>
    <div class="rec-poets-readFullBgBtn">
      <a
        class="rec-poets-readFull"
        title="See full collection"
        aria-label="See full collection"
        href="/top-20?wref=rweb"
        onclick="javascript:pageTracker._trackPageview('hometop20');">See full collection</a>
    </div>
  </div>

  <!-- featured-video-->

  <section class="video-section">
    <div class="video-section-wrapper">
      <div class="video-title">Featured Video</div>
      <div class="videoContainer">
        <div class="video-box">
          <iframe
            src="https://www.youtube.com/embed/jwhuNLn0qtw"
            allowfullscreen></iframe>
        </div>
        <div class="video-info">
          <h3 class="video-title">MEER TAQI MEER</h3>
          <p class="video-subtitle">CELEBRATING 300 YEARS OF MEER</p>
          <button class="share-button">
            <i class="fas fa-share-alt"></i>
          </button>
        </div>

      </div>
    </div>
  </section>
  <!-- E-books Library -->
  <section class="e-books-library">
    <div class="library-content">
      <div class="library-heading">
        <h2>E-BOOKS LIBRARY</h2>
        <div class="library-cards"></div>
        <div class="library-tagline">
          <p>
            Discover books & magazines in the world’s largest online
            collection of Urdu literature
          </p>
          <a href="">VIEW MORE E-BOOKS</a>
        </div>
      </div>
    </div>
  </section>

  <!-- learn More -->
  <section class="laern-more">
    <div class="more-container">
      <div class="more-heading">
        <h3>MORE FROM REKHTA</h3>
      </div>
      <div class="more-slider">

      </div>
    </div>
  </section>
  <footer class="rekhta-footer">
    <!-- Newsletter -->
    <div class="newsletter">
      <h2>SUBSCRIBE TO REKHTA NEWSLETTER</h2>
      <p>Subscribe to Rekhta Newsletter to get all the latest updates</p>
      <div class="newsletter-form">
        <input type="email" placeholder="YOUR E-MAIL HERE">
        <button>SUBSCRIBE</button>
      </div>
      <label class="privacy-check">
        <input type="checkbox"> I have read and I agree to Rekhta <a href="#">Privacy Policy</a>
      </label>
    </div>

    <!-- Main Footer Grid -->
    <div class="footer-grid">
      <div class="footer-col">
        <h4>QUICK LINKS</h4>
        <ul>
          <li><a href="#">Donate</a></li>
          <li><a href="#">Qaafiya Dictionary</a></li>
          <li><a href="#">Taqti</a></li>
          <li><a href="#">Urdu Resources</a></li>
          <li><a href="#">Submit Poetry</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>SITE INFO</h4>
        <ul>
          <li><a href="#">Rekhta Foundation</a></li>
          <li><a href="#">About The Founder</a></li>
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Career</a></li>
          <li><a href="#">Rekhta Explorer</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>OUR WEBSITES</h4>
        <ul>
          <li><a href="#">Hindwi</a></li>
          <li><a href="#">Sufinama</a></li>
          <li><a href="#">Rekhta Dictionary</a></li>
          <li><a href="#">Rekhta Learning</a></li>
          <li><a href="#">Rekhta Books</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>WRITE TO US</h4>
        <form class="contact-form">
          <input type="text" placeholder="NAME">
          <input type="email" placeholder="E-MAIL">
          <select>
            <option selected>SELECT CATEGORY</option>
          </select>
          <textarea placeholder="MESSAGE"></textarea>
          <label class="privacy-check">
            <input type="checkbox"> I have read and I agree to Rekhta <a href="#">Privacy Policy</a>
          </label>
          <button type="submit"><i class="fa fa-paper-plane"></i> SEND MESSAGE</button>
        </form>
      </div>
    </div>

    <!-- Social + Apps -->
    <div class="footer-bottom">
      <div class="social">
        <h4>FOLLOW US</h4>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
        <a href="#"><i class="fab fa-x-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-telegram"></i></a>
      </div>
      <div class="apps">
        <h4>DOWNLOAD REKHTA APP</h4>
        <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg"
          alt="Play Store" height="40">
        <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg"
          alt="App Store" height="40">
      </div>
    </div>

    <div class="copyright">
      <a href="#">PRIVACY POLICY</a> | <a href="#">TERMS OF USE</a> | <a href="#">COPYRIGHT</a>
      <p>© 2025 Rekhta™ Foundation. All rights reserved.</p>
    </div>
  </footer>
</div>


<script>
  const herosliderdata = "{{route('herosliderdata')}}";
  const topshayaridata = "{{route('topshayaridata')}}";
  const learnmoredata = "{{route('learnmoredata')}}";
  const librarybookdata = "{{route('librarybookdata')}}";
  const poetrycollectiondata = "{{route('poetrycollectiondata')}}";
  const shayaricollectiondata = "{{route('shayaricollectiondata')}}";
  const recommendedpoetsdata = "{{route('recommendedpoetsdata')}}";
  const bookslidedata = "{{route('bookslidedata')}}";
</script>


@endsection