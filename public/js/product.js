document.addEventListener('DOMContentLoaded', () => {

    /* =====================================================
       REDUCED MOTION
    ====================================================== */

    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;



    /* =====================================================
       PRODUCT REVEAL
    ====================================================== */

    const revealItems =
        document.querySelectorAll(
            '.product-reveal, .product-card-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        revealItems.forEach(item => {

            item.classList.add(
                'product-visible'
            );

        });

    } else {

        document.documentElement.classList.add(
            'product-motion-ready'
        );


        const revealObserver =
            new IntersectionObserver(
                entries => {

                    entries.forEach(entry => {

                        if (!entry.isIntersecting) {
                            return;
                        }


                        entry.target.classList.add(
                            'product-visible'
                        );


                        revealObserver.unobserve(
                            entry.target
                        );

                    });

                },
                {
                    threshold: 0.12
                }
            );


        revealItems.forEach(
            (item, index) => {

                item.style.transitionDelay =
                    `${Math.min(index * 35, 280)}ms`;


                revealObserver.observe(
                    item
                );

            }
        );

    }



    /* =====================================================
       HERO EXPLORE COLLECTION
    ====================================================== */

    const exploreButton =
        document.querySelector(
            '.product-page-hero-explore'
        );


    exploreButton?.addEventListener(
        'click',
        event => {

            const collection =
                document.getElementById(
                    'products-collection'
                );


            if (!collection) {
                return;
            }


            event.preventDefault();


            collection.scrollIntoView({

                behavior:
                    reduceMotion
                        ? 'auto'
                        : 'smooth',

                block: 'start'

            });

        }
    );



    /* =====================================================
       FRONTEND PAGINATION
    ====================================================== */

    const grid =
        document.getElementById(
            'product-grid'
        );


    /*
     * No product grid means there is nothing
     * else to initialise.
     */

    if (!grid) {
        return;
    }


    const cards =
        Array.from(
            grid.querySelectorAll(
                '[data-product-card]'
            )
        );


    const pagination =
        document.getElementById(
            'product-pagination'
        );


    const pagesContainer =
        document.getElementById(
            'product-pagination-pages'
        );


    const prevButton =
        document.getElementById(
            'product-prev'
        );


    const nextButton =
        document.getElementById(
            'product-next'
        );


    const requestedPerPage =
        Number(
            grid.dataset.perPage || 12
        );


    const perPage =
        Number.isFinite(requestedPerPage)
        && requestedPerPage > 0
            ? requestedPerPage
            : 12;


    const totalPages =
        Math.ceil(
            cards.length / perPage
        );


    let currentPage = 1;



    /* =====================================================
       NO PRODUCTS
    ====================================================== */

    if (cards.length === 0) {

        pagination?.remove();

        return;

    }



    /* =====================================================
       ONLY ONE PAGE
    ====================================================== */

    if (totalPages <= 1) {

        pagination?.remove();


        cards.forEach(card => {

            card.hidden = false;

        });


        return;

    }



    /* =====================================================
       CREATE PAGINATION
    ====================================================== */

    function createPagination() {

        if (!pagesContainer) {
            return;
        }


        pagesContainer.innerHTML = '';


        for (
            let page = 1;
            page <= totalPages;
            page++
        ) {

            const button =
                document.createElement(
                    'button'
                );


            button.type =
                'button';


            button.className =
                'product-pagination-page';


            button.textContent =
                page;


            button.setAttribute(
                'aria-label',
                `Go to page ${page}`
            );


            button.addEventListener(
                'click',
                () => {

                    showPage(
                        page,
                        true
                    );

                }
            );


            pagesContainer.appendChild(
                button
            );

        }

    }



    /* =====================================================
       UPDATE PAGINATION
    ====================================================== */

    function updatePaginationControls() {

        const pageButtons =
            pagesContainer
                ?.querySelectorAll(
                    '.product-pagination-page'
                )
                ?? [];


        pageButtons.forEach(
            (button, index) => {

                const isActive =
                    index + 1 === currentPage;


                button.classList.toggle(
                    'active',
                    isActive
                );


                if (isActive) {

                    button.setAttribute(
                        'aria-current',
                        'page'
                    );

                } else {

                    button.removeAttribute(
                        'aria-current'
                    );

                }

            }
        );


        if (prevButton) {

            prevButton.disabled =
                currentPage === 1;

        }


        if (nextButton) {

            nextButton.disabled =
                currentPage === totalPages;

        }

    }



    /* =====================================================
       SHOW PAGE
    ====================================================== */

    function showPage(
        page,
        shouldScroll = false
    ) {

        currentPage =
            Math.max(
                1,
                Math.min(
                    page,
                    totalPages
                )
            );


        const start =
            (currentPage - 1)
            * perPage;


        const end =
            start + perPage;


        cards.forEach(
            (card, index) => {

                const shouldShow =
                    index >= start
                    &&
                    index < end;


                card.hidden =
                    !shouldShow;


                if (shouldShow) {

                    card.classList.add(
                        'product-visible'
                    );

                }

            }
        );


        updatePaginationControls();


        /* =================================================
           SCROLL BACK TO COLLECTION
        ================================================== */

        if (shouldScroll) {

            const collection =
                document.getElementById(
                    'products-collection'
                );


            collection?.scrollIntoView({

                behavior:
                    reduceMotion
                        ? 'auto'
                        : 'smooth',

                block: 'start'

            });

        }

    }



    /* =====================================================
       PREVIOUS PAGE
    ====================================================== */

    prevButton?.addEventListener(
        'click',
        () => {

            if (currentPage <= 1) {
                return;
            }


            showPage(
                currentPage - 1,
                true
            );

        }
    );



    /* =====================================================
       NEXT PAGE
    ====================================================== */

    nextButton?.addEventListener(
        'click',
        () => {

            if (
                currentPage
                >= totalPages
            ) {
                return;
            }


            showPage(
                currentPage + 1,
                true
            );

        }
    );



    /* =====================================================
       INITIALIZE
    ====================================================== */

    createPagination();

    showPage(
        1,
        false
    );

});