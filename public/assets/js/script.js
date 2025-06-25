document.addEventListener("DOMContentLoaded", function () {
    const poetryData = [
        {
            lines: `na jaane kis kī hameñ umr bhar talāsh rahī\njise qarīb se dekhā vo dūsrā niklā`,
            poet: "Khalilur Rahman Azmi",
            link: "https://www.rekhta.org/poets/vafa-malikpuri?wref=rweb",
        },
        {
            lines: `koī deewānā kehtā hai koī pāgal samajhtā hai\nmagar dhartī kī bechainī ko bas bādal samajhtā hai`,
            poet: "Kumar Vishwas",
            link: "https://www.rekhta.org/poets/kumar-vishwas?wref=rweb",
        },
        {
            lines: `hazāroñ ḳhvāhisheñ aisī ki har ḳhvāhish pe dam nikle\nbahut nikle mire armān lekin phir bhī kam nikle`,
            poet: "Mirza Ghalib",
            link: "https://www.rekhta.org/poets/mirza-ghalib?wref=rweb",
        },
    ];
    // const slideImages = [
    //   {
    //     images: "assets/images/slide1.jpg",
    //     link: "https://www.rekhta.org/top-sher/zindagi-tere-liye-zahr-piya-hai-maine-khalilur-rahman-azmi?ref=25060113345019",
    //   },
    //   {
    //     images: "assets/images/slide2.jpg",
    //     link: "https://www.rekhta.org/poets/krishn-bihari-noor/couplets?ref=25052917205863",
    //   },
    //   {
    //     images: "assets/images/slide3.jpg",
    //     link: "https://rekhtabooks.com/products/urdu-tarot-brooch-enamel-pins?ref=RO&ref=25052417074073",
    //   },
    //   {
    //     images: "assets/images/slide4.jpg",
    //     link: "https://www.rekhta.org/poets/krishn-bihari-noor/couplets?ref=25052917205863&lang=ur",
    //   },
    //   {
    //     images: "assets/images/slide5.jpg",
    //     link: "https://www.rekhta.org/top-sher/zindagi-tere-liye-zahr-piya-hai-maine-khalilur-rahman-azmi?ref=25060113345019&lang=ur",
    //   },
    // ];
    fetch(herosliderdata)
        .then((response) => response.json())
        .then((slideImages) => {
            const topSlider = document.querySelector(".top-slider");

            if (topSlider) {
                slideImages.forEach((slide) => {
                    const a = document.createElement("a");
                    // a.href = slide.link;
                    a.className = "slide";
                    const img = document.createElement("img");
                    img.src = `assets/uploades/heroslider/${slide.image}`;
                    img.alt = "";
                    a.appendChild(img);
                    topSlider.appendChild(a);
                });
            }

            $(document).ready(function () {
                $(".top-slider").slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true,
                    autoplay: false,
                    autoplaySpeed: 3000,
                    prevArrow: $(".prev"),
                    nextArrow: $(".next"),

                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                            },
                        },
                    ],
                });
                fetch(topshayaridata)
                    .then((response) => response.json())
                    .then((poetryData) => {
                        const sliderContainer =
                            document.querySelector(".top-5-slider");

                        poetryData.forEach((item) => {
                            const slide = document.createElement("div");
                            slide.classList.add("slide");
                            slide.innerHTML = `
    <div class="poetry">
      <pre class="poem">${item.shayari}</pre>
    </div>
    <div class="poetName x2">
      <a href="${item.link}" target="_blank">${item.poet}</a>
    </div>
  `;
                            sliderContainer.appendChild(slide);
                        });

                        $(".top-5-slider").slick({
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: true,
                            autoplay: false,
                            autoplaySpeed: 3000,
                            prevArrow: $(""),
                            nextArrow: $(""),
                            responsive: [
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 1,
                                    },
                                },
                            ],
                        });
                    });
            });
        });
    // const poetryCards = [
    //   {
    //     title: "Couplets of Amjad Islam Amjad",
    //     image: "assets/images/couplets-of-amjad-islam-amjad_Medium.png",
    //     url: "/top-20-couplets-of-amjad-islam-amjad?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of shakeb jalali",
    //     image: "assets/images/couplets-of-shakeb-jalali_Medium.png",
    //     url: "/top-20-couplets-of-shakeb-jalali?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Obaidullah Aleem",
    //     image: "assets/images/couplets-of-obaidullah-aleem_Medium.png",
    //     url: "/top-20-couplets-of-obaidullah-aleem?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Abbas Tabish",
    //     image: "assets/images/couplets-of-abbas-tabish_Medium.png",
    //     url: "/top-20-couplets-of-abbas-tabish?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Nasir Kazmi",
    //     image: "assets/images/couplets-of-nasir-kazmi_Medium.png",
    //     url: "/top-20-couplets-of-nasir-kazmi?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Zeb Ghauri",
    //     image: "assets/images/couplets-of-zeb-ghauri_Medium.png",
    //     url: "/top-20-couplets-of-zeb-ghauri?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Sarwat Husain",
    //     image: "assets/images/couplets-of-sarwat-husain_Medium.png",
    //     url: "/top-20-couplets-of-sarwat-husain?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Dagh Dehlvi",
    //     image: "assets/images/couplets-of-dagh-dehlvi_Medium.png",
    //     url: "/top-20-couplets-of-dagh-dehlvi?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Rajinder Manchanda Bani",
    //     image: "assets/images/couplets-of-rajinder-manchanda-bani_Medium.png",
    //     url: "/top-20-couplets-of-rajinder-manchanda-bani?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Irfan Siddiqui",
    //     image: "assets/images/couplets-of-irfan-siddiqui_Medium.png",
    //     url: "/top-20-couplets-of-irfan-siddiqui?wref=rweb",
    //   },
    //   {
    //     title: "Couplets of Shakeel Badayuni",
    //     image: "assets/images/couplets-of-shakeel-badayuni_Medium.png",
    //     url: "/top-20-couplets-of-shakeel-badayuni?wref=rweb",
    //   },
    //   {
    //     title: "Train Shayari",
    //     image: "assets/images/train-shayari_Medium.png",
    //     url: "/top-20-train-shayari?wref=rweb",
    //   },
    // ];

    fetch(poetrycollectiondata)
        .then((response) => response.json())
        .then((poetryCards) => {
            const wrapper = document.querySelector(
                ".poetry-collection-wrapper"
            );
            if (wrapper) {
                poetryCards.forEach((card) => {
                    const div = document.createElement("div");
                    div.className = "poetry-collection-card";
                    div.innerHTML = `
    <a href="${card.url}" title="${card.title}" aria-label="${card.title}">
      <div class="poetry-collection-card-content">
        <div class="poetry-collection-card-img">
          <img
            src=assets/uploades/poetrycollection/${card.image}  
            alt="${card.title}"
            width="259"
            height="210"
          />
        </div>
        <h3>${card.title}<span class="HeadingFade"></span></h3>
      </div>
    </a>
  `;
                    wrapper.appendChild(div);
                });
            }
            $(wrapper).on(
                "init reInit afterChange",
                function (event, slick, currentSlide) {
                    const slideIndex = currentSlide || 0;
                    const $prevArrow = $(".p-prev");
                    const $nextArrow = $(".p-next");

                    if (slideIndex === 0) {
                        $prevArrow.hide();
                    } else {
                        $prevArrow.show();
                    }

                    // Disable "next" if at the last slide
                    if (
                        slideIndex >=
                        slick.slideCount - slick.options.slidesToShow
                    ) {
                        $nextArrow.hide();
                    } else {
                        $nextArrow.show();
                    }
                }
            );

            $(wrapper).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                initialSlide: 0,
                infinite: false,
                arrows: true,
                dots: false,
                autoplay: false,
                prevArrow:
                    '<button class="p-prev custom-arrow">&#10094;</button>',
                nextArrow:
                    '<button class="p-next custom-arrow">&#10095;</button>',
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } },
                ],
            });
        });
    const books = [
        {
            title: "Mahakavi Kalidas - Combo set (Hindi)",
            author: "Kalidas",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/f32fd064-f407-453c-8317-73d88b586067.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/mahakavi-kalidas-combo-set?wref=rweb",
            rating: "",
        },
        {
            title: "Rukhsat Karo Mujhe Combo Set (Hindi)",
            author: "Munawwar Rana",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/bfa85f22-94c9-4874-8f39-5d2952442479.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/rukhsat-karo-mujhe-combo-set?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Manto Ke Afsanay Combo Set",
            author: "Saadat Hasan Manto",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/767cda53-41d4-49c0-a128-cec5500fd923.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/manto-ke-afsanay-combo-set?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Osho ka Satya Book Combo Set (Hindi)",
            author: "Osho, Shashikant ‘Sadaiv’",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/29c57a01-c68a-4ed0-ad13-d55d64389f13.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/osho-ka-satya-book-combo-set?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Charagon Ka Safar Combo (Waseem Barelvi) (Hindi)",
            author: "Waseem Barelvi",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/468c4aa4-39fd-48e5-83b3-8288fc394834.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/charagon-ka-safar-combo?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Hum Gunahagar Auratein- Book Combo Set (Hindi)",
            author: "Fahmida Riaz, Parveen Shakir, Zehra Nigaah, Kishwar Naheed",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/82e01dac-528c-4bf5-9002-e0b1f76f2265.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/hum-gunahagar-auratein-book-combo-set?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Kucch Nadani Aur Combo Set - Selected Works of Gulzar (Urdu)",
            author: "Gulzar",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/37c770ba-aaf5-4944-a007-d625f836555a.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/kucch-nadani-aur-combo-set-selected-works-of-gulzar-urdu?ref=rekhta&cid=mc?wref=rweb",
            rating: "Urdu",
        },
        {
            title: "Urdu Learning Set (Hindi)",
            author: "Sayyed, Asad Ali, Abdur Rasheed & Rekhta Team",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/d7bd0174-89f1-432a-b6d5-7909ac1fe998.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/urdu-learning-set-hindi?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Gulshan Ka Kaarobar Combo Set (Hindi)",
            author: "Faiz Ahmed Faiz",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/c7efc29a-c7c9-4708-90ea-34d56ac130eb.jpg?v=1748962824",
            link: "https://rekhtabooks.com/products/gulshan-ka-kaarobar-combo-set?ref=rekhta&cid=mc?wref=rweb",
            rating: "",
        },
        {
            title: "Bacho ki Jadui Duniya Combo (Hindi)",
            author: "Naima Jafri Pasha, Irfan Jafri, Azra Naqvi",
            image: "https://www.rekhta.org/Images/Ebooks/EBook_ECommerce/e3148741-f64d-4a13-8de2-6469e0bbb5bc.jpg?v=1749126797",
            link: "https://rekhtabooks.com/products/bacho-ki-jadui-duniya-combo?ref=rekhta&amp;cid=mc?wref=rweb",
            rating: "",
        },
    ];
    const url = document.querySelector(".book-slider").dataset.url;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (books) {
            books.forEach(function (book) {
                $(".book-slider").append(`
                    <div class="book-slide">
                        <a href="${book.link}" target="_blank">
                            <img src=assets/uploades/books/${
                                book.image
                            } alt="${book.title}" />
                            <div class="book-detail">
                                <p class="bookTitle"><a target="_blank" title="${
                                    book.title
                                }" href="${book.link}">${book.title}</a></p>
                                <p class="bookTitle overflow">${book.author}</p>
                                <p class="bookRating">${book.rating || ""}</p>
                            </div>
                        </a>
                    </div>
                `);
            });
            $(".book-slider").on(
                "init reInit afterChange",
                function (event, slick, currentSlide) {
                    const slideIndex = currentSlide || 0;
                    const $prevArrow = $(".p-prev");
                    const $nextArrow = $(".p-next");

                    $prevArrow.toggle(slideIndex !== 0);
                    $nextArrow.toggle(
                        slideIndex <
                            slick.slideCount - slick.options.slidesToShow
                    );
                }
            );
            $(".book-slider").slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                initialSlide: 0,
                infinite: false,
                arrows: true,
                dots: false,
                delay: 2000,
                autoplay: true,
                prevArrow:
                    '<button class="p-prev custom-arrow">&#10094;</button>',
                nextArrow:
                    '<button class="p-next custom-arrow">&#10095;</button>',
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } },
                ],
            });
        },
        error: function (xhr, status, error) {
            console.error("Error fetching books:", error);
        },
    });

    const poetinfo = [
        {
            title: "Did You Know?",
            profile: "",
            name: "",
            link: "",
            content:
                "Nastaleeq is a beautiful script in which Urdu is written, which was designed in Iran in the fourteenth and fifteenth centuries. ‘Naskh’ is the script in which Arabic is usually written. And Taleeq is a Persian script. Both of them were merged to become Nastaleeq. It is interesting to note that in Urdu the word Nastaleeq is used for a cultured, well mannered and refined person.",
            backgroundColor:
                "linear-gradient(45deg, rgba(142, 197, 252, 1) 0%, rgba(224, 195, 252, 1) 100%);",
        },

        {
            title: "Did You Know?",
            profile: "images/sara-shagufta.png",
            name: "Sara Shagufta",
            link: "https://www.rekhta.org/Poets/sara-shagufta/nazms",
            content:
                "was a modernist Pakistani poet. Born in a lower-class family, her family migrated to Karachi from Punjab during the partition of India. Hers was a life of struggles. Belonging to a poor and uneducated family, she wanted to rise socially through education but could not pass her matriculation. She got married when she was 17. This was followed by three more unsuccessful marriages.&nbsp; She was deeply hurt with the death of her new born son and the indifference of her husbands. Badly treated by her husbands and society alike inspired her to write poetry and she continued to write with rare zeal. Suffering from a mental illness, she had to be admitted into an asylum. After an unsuccessful suicide attempt, she finally committed suicide at an early age of 29, by throwing herself before a train.",
            backgroundColor:
                "linear-gradient(45deg, rgba(255, 182, 168, 1) 0%, rgba(255, 204, 138, 1) 100%)",
        },

        {
            title: "Did You Know?",
            profile: "images/ameer-khusrau.png",
            name: "Ameer Khusrau",
            link: "https://www.rekhta.org/Poets/sara-shagufta/nazms",
            content:
                "The first notable example of literary Urdu can be found in the works of Amir Khusrau, who lived<br>from 1253 to 1325. Khusro was a pioneer in the literary use of the language, and his works<br>included folksongs, riddles, and traditional couplets known as dohas. He was a spiritual disciple of Hazrat Nizamuddin Auliya of Delhi. Khusro died in October 1325, six months after the death of his spiritual master, and his tomb is in Nizamuddin Dargah, next to that of Nizamuddin Auliya.<br>",
            backgroundColor: "#fce4ec",
        },
    ];

    $(document).ready(function () {
        const $slider = $("#didYK-slider");

        poetinfo.forEach((item, index) => {
            const slide = `
        <div class="didYK-slide" style="background: ${item.backgroundColor};">
          <h2>${item.title}</h2>

          ${
              item.profile
                  ? `<div class="profile-container"><img class="profile" src="${item.profile}" alt="${item.name}"></div>`
                  : ""
          }

          <div class="didYK-wrap">
            <p class="didYK-text content-clamp" id="content-${index}">
              ${
                  item.name
                      ? `<a href="${item.link}" target="_blank" class="poet-name">${item.name}</a><br><br>`
                      : ""
              }
              ${item.content}
            </p>
            <a href="javascript:void(0);" class="see-more" data-id="${index}">See More</a>
          </div>
        </div>
      `;
            $slider.append(slide);
        });

        $slider.slick({
            slidesToShow: 1,
            arrows: true,
            dots: false,
            adaptiveHeight: true,
        });

        $(document).on("click", ".see-more", function () {
            const index = $(this).data("id");
            const $text = $(`#content-${index}`);
            $text.toggleClass("expanded");
            $(this).text($text.hasClass("expanded") ? "See Less" : "See More");
        });
    });

    //
    // const shayariCards = [
    //     {
    //         title: "Mohabbat ke raaste mein: Zeeshan Sahil",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/mohabbat-ke-raaste-mein-zeeshan-sahil_Medium.png",
    //         url: "/collections/mohabbat-ke-raaste-mein-zeeshan-sahil/?wref=rweb",
    //     },
    //     {
    //         title: "Nusrat Fateh Ali Khan ki gaayi hui Ghazalein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/nusrat-fateh-ali-khan-ki-gaayi-hui-ghazalein_Medium.png",
    //         url: "/collections/nusrat-fateh-ali-khan-ki-gaayi-hui-ghazalein/?wref=rweb",
    //     },
    //     {
    //         title: "Mashoor Dakni Ghazlein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/mashoor-dakni-ghazlein_Medium.png",
    //         url: "/collections/mashoor-dakni-ghazlein/?wref=rweb",
    //     },
    //     {
    //         title: "Jan Nisar Akhtar ki 5 nazmein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/jan-nisar-akhtar-ki-5-nazmein_Medium.png",
    //         url: "/collections/jan-nisar-akhtar-ki-5-nazmein/?wref=rweb",
    //     },
    //     {
    //         title: "GHAZAL KI SHAAM MOHAMMED RAFI KE NAAM",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/ghazal-ki-shaam-mohammed-rafi-ke-naam_Medium.png",
    //         url: "/collections/ghazal-ki-shaam-mohammed-rafi-ke-naam/?wref=rweb",
    //     },
    //     {
    //         title: "Noon Meem Rashid ki nazmein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/noon-meem-rashid-ki-nazmein_Medium.png",
    //         url: "/collections/noon-meem-rashid-ki-nazmein/?wref=rweb",
    //     },
    //     {
    //         title: "Top 10 Nazms in 2022",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/top-10-nazms-in-2022-2_Medium.png",
    //         url: "/collections/top-10-nazms-in-2022-2/?wref=rweb",
    //     },
    //     {
    //         title: "Muntakhab Sahir Ludhianvi",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/best-5-ghazal-of-sahir-ludhianvi_Medium.png",
    //         url: "/collections/best-5-ghazal-of-sahir-ludhianvi/?wref=rweb",
    //     },
    //     {
    //         title: "Farhat Ehsaas ki das khoobsoorat ghazlein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/farhat-ehsaas-ki-das-khoobsoorat-ghazlein_Medium.png",
    //         url: "/collections/farhat-ehsaas-ki-das-khoobsoorat-ghazlein/farhat-ehsas?wref=rweb",
    //     },
    //     {
    //         title: "Akhtar ul Iman: Tum hi ho- Chuninda Nazmein",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/ShayariCollections/akhtar-ul-iman-tum-hi-ho-chuninda-nazmein_Medium.png",
    //         url: "/collections/akhtar-ul-iman-tum-hi-ho-chuninda-nazmein/?wref=rweb",
    //     },
    // ];
    fetch(shayaricollectiondata)
        .then((response) => response.json())
        .then((shayariCards) => {
            const shayariwrapper = document.querySelector(
                ".shayari-collection-wrapper"
            );
            if (shayariwrapper) {
                shayariCards.forEach((card) => {
                    const div = document.createElement("div");
                    div.className = "shayari-collection-card";
                    div.innerHTML = `
    <a href="${card.url}" title="${card.title}" aria-label="${card.title}">
      <div class="shayari-collection-card-content">
        <div class="shayari-collection-card-img">
          <img
           src=assets/uploades/shayaricollection/${card.image}  
            alt="${card.title}"
            width="259"
            height="210"
          />
        </div>
        <h3>${card.title}<span class="HeadingFade"></span></h3>
      </div>
    </a>
  `;
                    shayariwrapper.appendChild(div);
                });
            }
            $(shayariwrapper).on(
                "init reInit afterChange",
                function (event, slick, currentSlide) {
                    const slideIndex = currentSlide || 0;
                    const $prevArrow = $(".p-prev");
                    const $nextArrow = $(".p-next");

                    if (slideIndex === 0) {
                        $prevArrow.hide();
                    } else {
                        $prevArrow.show();
                    }

                    // Disable "next" if at the last slide
                    if (
                        slideIndex >=
                        slick.slideCount - slick.options.slidesToShow
                    ) {
                        $nextArrow.hide();
                    } else {
                        $nextArrow.show();
                    }
                }
            );

            $(shayariwrapper).slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                initialSlide: 0,
                infinite: false,
                arrows: true,
                dots: false,
                autoplay: false,
                prevArrow:
                    '<button class="p-prev custom-arrow">&#10094;</button>',
                nextArrow:
                    '<button class="p-next custom-arrow">&#10095;</button>',
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } },
                ],
            });
        });
    // recommendedPoets
    // const recommendedpoets = [
    //     {
    //         name: "Bashir Badr",
    //         url: "/Poets/bashir-badr?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/bashir-badr_Medium.png",
    //     },
    //     {
    //         name: "Ahmad Mushtaq",
    //         url: "/Poets/ahmad-mushtaq?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/ahmad-mushtaq_Medium.png",
    //     },
    //     {
    //         name: "Fahmida Riaz",
    //         url: "/Poets/fahmida-riaz?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/fahmida-riaz_Medium.png",
    //     },
    //     {
    //         name: "Javed Akhtar",
    //         url: "/Poets/javed-akhtar?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/javed-akhtar_Medium.png",
    //     },
    //     {
    //         name: "Shaheen Abbas",
    //         url: "/Poets/shaheen-abbas?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/shaheen-abbas_Medium.png",
    //     },
    //     {
    //         name: "Nushur Wahidi",
    //         url: "/Poets/nushur-wahidi?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/nushur-wahidi_Medium.png",
    //     },
    //     {
    //         name: "Firaq Gorakhpuri",
    //         url: "/Poets/firaq-gorakhpuri?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/firaq-gorakhpuri-1_Medium.png",
    //     },
    //     {
    //         name: "Saqi Farooqi",
    //         url: "/Poets/saqi-faruqi?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/saqi-farooqi_Medium.png",
    //     },
    //     {
    //         name: "Zeb Ghauri",
    //         url: "/Poets/zeb-ghauri?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/zeb-ghauri_Medium.png",
    //     },
    //     {
    //         name: "Meeraji",
    //         url: "/Poets/meeraji?wref=rweb",
    //         image: "https://rekhta.pc.cdn.bitgravity.com/Images/Cms/collectionSeries/RecommendedPoets/meeraji_Medium.png",
    //     },
    // ];
    fetch(recommendedpoetsdata)
        .then((response) => response.json())
        .then((recpoetsCard) => {
            const recpoetswrapper = document.querySelector(
                ".rec-poets-collection-wrapper"
            );
            if (recpoetswrapper) {
                recpoetsCard.forEach((card) => {
                    const div = document.createElement("div");
                    div.className = "rec-poets-collection-card";
                    div.innerHTML = `
    <a href="${card.url}" title="${card.title}" aria-label="${card.title}">
      <div class="rec-poets-collection-card-content">
        <div class="rec-poets-collection-card-img">
          <img
           src=assets/uploades/recommendedpoets/${card.image}  
            alt="${card.title}"
            width="259"
            height="210"
          />
        </div>
        <h3>${card.name}<span class="HeadingFade"></span></h3>
      </div>
    </a>
  `;
                    recpoetswrapper.appendChild(div);
                });

                $(recpoetswrapper).on(
                    "init reInit afterChange",
                    function (event, slick, currentSlide) {
                        const slideIndex = currentSlide || 0;
                        const $prevArrow = $(".p-prev");
                        const $nextArrow = $(".p-next");

                        if (slideIndex === 0) {
                            $prevArrow.hide();
                        } else {
                            $prevArrow.show();
                        }

                        // Disable "next" if at the last slide
                        if (
                            slideIndex >=
                            slick.slideCount - slick.options.slidesToShow
                        ) {
                            $nextArrow.hide();
                        } else {
                            $nextArrow.show();
                        }
                    }
                );

                $(recpoetswrapper).slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    initialSlide: 0,
                    infinite: false,
                    arrows: true,
                    dots: false,
                    autoplay: false,
                    prevArrow:
                        '<button class="p-prev custom-arrow">&#10094;</button>',
                    nextArrow:
                        '<button class="p-next custom-arrow">&#10095;</button>',
                    responsive: [
                        { breakpoint: 1024, settings: { slidesToShow: 3 } },
                        { breakpoint: 768, settings: { slidesToShow: 2 } },
                        { breakpoint: 480, settings: { slidesToShow: 1 } },
                    ],
                });
            }
        });
    // Libary books data
    // const booksData = [
    //     {
    //         title: "Iqbal Dulhan",
    //         author: "Bashiruddin Ahmad Dehlvi",
    //         year: "1908",
    //         category: "Moral and Ethical",
    //         image: "assets/images/small_iqbal-dulhan-bashiruddin-ahmad-dehlvi-ebooks.jpg",
    //     },
    //     {
    //         title: "Mughal Tahzeeb",
    //         author: "Mahboob-Ullah Mujeeb",
    //         year: "1965",
    //         category: "",
    //         image: "assets/images/small_mughal-tahzeeb-mahboob-ullah-mujeeb-ebooks-1.jpg",
    //     },
    //     {
    //         title: "Shumara Number-002",
    //         author: "Mohammad Hasan",
    //         year: "1970",
    //         category: "Asri Adab",
    //         image: "assets/images/small_asri-adab-shumara-number-002-dr-mohammad-hasan-magazines-2.jpg",
    //     },
    //     {
    //         title: "Kulliyat-e-Anwar Shaoor",
    //         author: "Anwar Shuoor",
    //         year: "2015",
    //         category: "Kulliyat",
    //         image: "assets/images/small_kulliyat-e-anwar-shaoor-anwar-shuoor-ebooks.jpg",
    //     },
    //     {
    //         title: "Audhoot Ka Tarana",
    //         author: "",
    //         year: "1958",
    //         category: "Nazm",
    //         image: "assets/images/small_audhoot-ka-tarana-naghma-e-qalandari-ebooks.jpg",
    //     },
    // ];
    // learn more slides data
    fetch(learnmoredata)
        .then((response) => response.json())
        .then((moreslidesData) => {
            const moreslider = document.querySelector(".more-slider");
            if (moreslider) {
                moreslidesData.forEach((slide) => {
                    const cards = document.createElement("div");
                    cards.className = "more-cards";
                    cards.innerHTML = `
            <div class="more-card">
              <div class="more-crd-img">
                <img src="assets/uploades/learnmore/${slide.image}" alt="">
              </div>
              <div class="more-txt">
                <h4>${slide.title}</h4>
                <p>${slide.subtitle}</p>
              </div>
              <div class="more-btn">
                <a href="${slide.link}"><span>Learn More<i class="fa-solid fa-arrow-up-right-from-square"></i></span></a>
              </div>
            </div>
    `;
                    moreslider.appendChild(cards);
                });

                $(document).ready(function () {
                    $(".more-slider").slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autoplay: false,
                        arrows: true,
                        infinite: false,
                        variableWidth: true,
                        prevArrow:
                            '<button class="p-prev custom-arrow">&#10094;</button>',
                        nextArrow:
                            '<button class="p-next custom-arrow">&#10095;</button>',
                        responsive: [
                            {
                                breakpoint: 992,
                                settings: {
                                    slidesToShow: 2,
                                },
                            },
                            {
                                breakpoint: 576,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                        ],
                    });
                });
            }
        });
    fetch(librarybookdata)
        .then((response) => response.json())
        .then((booksData) => {
            const container = document.querySelector(".library-cards");

            if (container) {
                booksData.forEach((book) => {
                    const card = document.createElement("div");
                    card.className = "book-card";
                    card.innerHTML = `
    <div class="card-content">
      <div class="backg-image" style="background-image: url('assets/uploades/librarybook/${
          book.image
      }');"></div>
      <div class="card-txt">
        <p class="b-title"${
            book.title === "" ? ' style="visibility: hidden;"' : ""
        }>${book.title}</p>
        <p class="b-author" ${
            !book.author ? ' style="visibility: hidden;"' : ""
        }>${book.author}</p>
        <div class="book-info">
          <p class="year"${!book.year ? ' style="visibility: hidden;"' : ""}>${
                        book.year
                    }</p>
          <p class="category"${
              !book.catagory ? ' style="visibility: hidden;"' : ""
          }>${book.catagory}</p>
        </div>
      </div>
    </div>
  `;
                    container.appendChild(card);
                });
            }
        });

    const optionBlock = document.querySelector(".opt-block");
    console.log(optionBlock);
    const selectLAng = document.querySelector(".language");
    selectLAng.addEventListener("click", () => {
        if (
            optionBlock.style.display === "none" ||
            optionBlock.style.display === ""
        ) {
            optionBlock.style.display = "flex";
        } else {
            optionBlock.style.display = "none";
        }
    });
});
