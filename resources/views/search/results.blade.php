@extends('layouts.app')
@section('title', 'Urdu Poetry, Urdu Shayari of Famous Poets - Rekhta')

@section('content')
    <style>
        .book-container {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
            justify-content: center;
            align-items: center;
            width: 1000px;
            margin-bottom: 20px;
        }

        .result-container {
            text-align: center;
        }

        .result-container>h1 {
            font-size: 40px;
            font-weight: bolder;
            margin-bottom: 50px;
            padding-top: 115px;
        }

        h5 {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .poetry-collection-card {
            margin-inline: 10px;
        }
    </style>
    <div class="container">

        @include('navbar')
        <!-- search results -->


        <div class="result-container">
            @if ($books->isEmpty() && $poetrycollections->isEmpty() && $librarybooks->isEmpty())
                <h1>No Search Results Found for "{{ $query }}"</h1>
            @else
                <h1>Search Results for "{{ $query }}"</h1>
            @endif
            @if ($query)
                <h5>Librarybooks</h5>
                <div class="book-container">
                    @foreach ($books as $book)
                        <div class="book-slide">
                            <a href="{{ $book->link }}" target="_blank">
                                {{-- Image --}}
                                <img src="{{ asset('assets/uploades/books/' . ($book->image ?? 'default.png')) }}"
                                    alt="{{ $book->title ?? 'Book Cover' }}" />

                                {{-- Book details --}}
                                <div class="book-detail">
                                    {{-- Title with link --}}
                                    <p class="bookTitle">
                                        <a target="_blank" title="{{ $book->title }}" href="{{ $book->link }}">
                                            {{ $book->title }}
                                        </a>
                                    </p>

                                    {{-- Author --}}
                                    <p class="bookTitle overflow">
                                        {{ $book->author }}
                                    </p>

                                    {{-- Rating --}}
                                    <p class="bookRating">
                                        {{ $book->rating ?? '' }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>



                {{-- Orders --}}
                @if ($poetrycollections->isNotEmpty())
                    <h5>Poetrycollections</h5>
                    <div class="book-container">
                        @foreach ($poetrycollections as $card)
                            <div class="poetry-collection-card">
                                <a href="{{ $card->url }}" title="{{ $card->title }}"
                                    aria-label="{{ $card->title }}">
                                    <div class="poetry-collection-card-content">

                                        {{-- Image Section --}}
                                        <div class="poetry-collection-card-img">
                                            <img src="{{ asset('assets/uploades/poetrycollection/' . ($card->image ?? 'default.png')) }}"
                                                alt="{{ $card->title }}" width="259" height="210" />
                                        </div>

                                        {{-- Title --}}
                                        <h3>{{ $card->title }}<span class="HeadingFade"></span></h3>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ($librarybooks->isNotEmpty())
                    {{-- poetrycollections --}}
                    <h5>books collections</h5>
                    <div class="book-container">
                        @foreach ($librarybooks as $book)
                            @php
                                $image = $book->image ?? 'default.png';
                            @endphp

                            <div class="book-card">
                                <div class="card-content">
                                    {{-- Background Image --}}
                                    <div class="backg-image"
                                        style="background-image: url('{{ asset('assets/uploades/librarybook/' . $image) }}');">
                                    </div>

                                    {{-- Book Text --}}
                                    <div class="card-txt">
                                        {{-- Title --}}
                                        <p class="b-title"
                                            @if (empty($book->title)) style="visibility: hidden;" @endif>
                                            {{ $book->title }}
                                        </p>

                                        {{-- Author --}}
                                        <p class="b-author"
                                            @if (empty($book->author)) style="visibility: hidden;" @endif>
                                            {{ $book->author }}
                                        </p>

                                        {{-- Year & Category --}}
                                        <div class="book-info">
                                            <p class="year"
                                                @if (empty($book->year)) style="visibility: hidden;" @endif>
                                                {{ $book->year }}
                                            </p>

                                            <p class="category"
                                                @if (empty($book->catagory)) style="visibility: hidden;" @endif>
                                                {{ $book->catagory }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                @endif

        </div>
        @endif
    </div>
    <!-- poetry-collection -->
    <!-- <div class="poetry-collection">
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
                </div> -->


    <!-- book -->
    <!-- <div class="booksection">
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
                </div> -->

    <!-- E-books Library -->
    <!-- <section class="e-books-library">
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
                </section> -->


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
        const herosliderdata = "{{ route('herosliderdata') }}";
        const topshayaridata = "{{ route('topshayaridata') }}";
        const learnmoredata = "{{ route('learnmoredata') }}";
        const librarybookdata = "{{ route('librarybookdata') }}";
        const poetrycollectiondata = "{{ route('poetrycollectiondata') }}";
        const shayaricollectiondata = "{{ route('shayaricollectiondata') }}";
        const recommendedpoetsdata = "{{ route('recommendedpoetsdata') }}";
        const bookslidedata = "{{ route('bookslidedata') }}";
    </script>


@endsection
