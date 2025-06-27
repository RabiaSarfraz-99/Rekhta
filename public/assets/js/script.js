(function ($) {
    /* ───── 1. Global arrow markup ───── */
    const prevArrowTpl =
        '<button type="button" class="p-prev custom-arrow" aria-label="Previous slide">&#10094;</button>';
    const nextArrowTpl =
        '<button type="button" class="p-next custom-arrow" aria-label="Next slide">&#10095;</button>';

    /* ───── 2. Generic initializer with auto-hide logic ───── */
    function initSlider($el, opts = {}) {
        if (!$el.length) return;

        const defaults = {
            slidesToShow: 4,
            slidesToScroll: 1,
            infinite: false,
            arrows: true,
            dots: false,
            autoplay: false,
            prevArrow: prevArrowTpl,
            nextArrow: nextArrowTpl,
        };
        const config = $.extend(true, {}, defaults, opts);

        // Arrow visibility
        $el.on("init reInit afterChange", function (e, slick, cur) {
            const i = cur || 0;
            const $prev = $(this).find(".p-prev");
            const $next = $(this).find(".p-next");

            if (
                slick.options.infinite ||
                slick.slideCount <= slick.options.slidesToShow
            ) {
                $prev.show();
                $next.show();
            } else {
                $prev.toggle(i !== 0);
                $next.toggle(i < slick.slideCount - slick.options.slidesToShow);
            }
        });

        $el.slick(config);
    }

    /* ───── 3. When DOM is ready, build all sliders ───── */
    document.addEventListener("DOMContentLoaded", () => {
        /* ---------- Top hero slider ---------- */
        fetch(herosliderdata)
            .then((response) => response.json())
            .then((slideImages) => {
                const topSlider = document.querySelector(".top-slider");

                if (topSlider) {
                    slideImages.forEach((slide) => {
                        const a = document.createElement("a");
                        a.className = "slide";
                        const img = document.createElement("img");
                        img.src = `assets/uploades/heroslider/${slide.image}`;
                        img.alt = "";
                        a.appendChild(img);
                        topSlider.appendChild(a);
                    });
                }

                // Initialize Slick after content is loaded
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
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                },
                            },
                        ],
                    });
                });
            });
        /* ---------- Poetry TOP-5 slider (static) ---------- */
        (function () {
            const poetryData = [
                {
                    lines: `na jaane kis kī hameñ umr bhar talāsh rahī
jise qarīb se dekhā vo dūsrā niklā`,
                    poet: "Khalilur Rahman Azmi",
                    link: "https://www.rekhta.org/poets/vafa-malikpuri?wref=rweb",
                },
                {
                    lines: `koī deewānā kehtā hai koī pāgal samajhtā hai
magar dhartī kī bechainī ko bas bādal samajhtā hai`,
                    poet: "Kumar Vishwas",
                    link: "https://www.rekhta.org/poets/kumar-vishwas?wref=rweb",
                },
                {
                    lines: `hazāroñ ḳhvāhisheñ aisī ki har ḳhvāhish pe dam nikle
bahut nikle mire armān lekin phir bhī kam nikle`,
                    poet: "Mirza Ghalib",
                    link: "https://www.rekhta.org/poets/mirza-ghalib?wref=rweb",
                },
            ];
            const $top5 = $(".top-5-slider");
            poetryData.forEach((p) => {
                const l = p.lines.split(/\r?\n|\/|\\|\|/);
                $("<div>", { class: "slide" })
                    .html(
                        `<div class="sher"><p>${l[0] || ""}</p><p>${
                            l[1] || ""
                        }</p></div>
                     <div class="poetName x2"><a href="${
                         p.link
                     }" target="_blank">${p.poet}</a></div>`
                    )
                    .appendTo($top5);
            });
            initSlider($top5, { slidesToShow: 1 });
        })();

        /* ---------- Poetry-collection cards ---------- */
        fetch(poetrycollectiondata)
            .then((r) => r.json())
            .then((cards) => {
                const $wrap = $(".poetry-collection-wrapper");
                cards.forEach((c) =>
                    $("<div>", { class: "poetry-collection-card" })
                        .html(
                            `<a href="${c.url}" title="${c.title}" aria-label="${c.title}">
                           <div class="poetry-collection-card-content">
                             <div class="poetry-collection-card-img">
                               <img src="assets/uploades/poetrycollection/${c.image}" alt="${c.title}" width="259" height="210">
                             </div>
                             <h3>${c.title}<span class="HeadingFade"></span></h3>
                           </div>
                         </a>`
                        )
                        .appendTo($wrap)
                );
                initSlider($wrap); // default 4-up
            });

        /* ---------- Books slider (AJAX) ---------- */
        $.getJSON($(".book-slider").data("url"), (books) => {
            const $books = $(".book-slider");
            books.forEach((b) =>
                $("<div>", { class: "book-slide" })
                    .html(
                        `<a href="${b.link}" target="_blank">
                       <img src="assets/uploades/books/${b.image}" alt="${
                            b.title
                        }">
                       <div class="book-detail">
                         <p class="bookTitle"><a target="_blank" href="${
                             b.link
                         }">${b.title}</a></p>
                         <p class="bookTitle overflow">${b.author}</p>
                         <p class="bookRating">${b.rating || ""}</p>
                       </div>
                     </a>`
                    )
                    .appendTo($books)
            );
            initSlider($books, {
                slidesToShow: 5,
                infinite: true,
                autoplay: true,
                responsive: [
                    { breakpoint: 1024, settings: { slidesToShow: 3 } },
                    { breakpoint: 768, settings: { slidesToShow: 2 } },
                    { breakpoint: 480, settings: { slidesToShow: 1 } },
                ],
            });
        });

        /* ---------- Any later sliders (shayari, poets, learn-more…) ----------
           Build the DOM first, then simply:
           initSlider($('.your-wrapper'), { slidesToShow: 4 … });
        --------------------------------------------------------------------- */
    });
})(jQuery);
