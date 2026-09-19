document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | SOLASTA HOMEPAGE
    |--------------------------------------------------------------------------
    */

    const hero = document.querySelector('.solasta-hero');

    if (!hero) {
        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Subtle mouse movement on desktop
    |--------------------------------------------------------------------------
    */

    const image = hero.querySelector('.solasta-hero-image');

    if (
        image &&
        window.matchMedia('(min-width: 1024px)').matches &&
        !window.matchMedia('(prefers-reduced-motion: reduce)').matches
    ) {

        hero.addEventListener('mousemove', (event) => {

            const rect = hero.getBoundingClientRect();

            const x =
                (event.clientX - rect.left)
                / rect.width
                - 0.5;

            const y =
                (event.clientY - rect.top)
                / rect.height
                - 0.5;

            image.style.objectPosition =
                `${50 + (x * 2)}% ${50 + (y * 2)}%`;

        });


        hero.addEventListener('mouseleave', () => {

            image.style.objectPosition =
                '50% 50%';

        });

    }

});

/* =========================================================
   CATEGORY SECTION SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const categorySection =
        document.querySelector(
            '.solasta-category-section'
        );

    if (!categorySection) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    const categoryHeader =
        categorySection.querySelector(
            '.category-reveal'
        );


    const categoryCards =
        categorySection.querySelectorAll(
            '.category-card-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        categoryHeader?.classList.add(
            'category-visible'
        );


        categoryCards.forEach(
            card => {
                card.classList.add(
                    'category-visible'
                );
            }
        );


        return;
    }


    document.documentElement.classList.add(
        'category-motion-ready'
    );


    const headerObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        entry.target.classList.add(
                            'category-visible'
                        );


                        headerObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold: .18
            }
        );


    if (categoryHeader) {
        headerObserver.observe(
            categoryHeader
        );
    }


    const cardObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        const cards =
                            Array.from(
                                categoryCards
                            );


                        const index =
                            cards.indexOf(
                                entry.target
                            );


                        entry.target.style.transitionDelay =
                            `${Math.min(
                                index * 70,
                                280
                            )}ms`;


                        entry.target.classList.add(
                            'category-visible'
                        );


                        cardObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold: .12
            }
        );


    categoryCards.forEach(
        card => {
            cardObserver.observe(
                card
            );
        }
    );

});

/* =========================================================
   FEATURED PRODUCTS SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const productsSection =
        document.querySelector(
            '.solasta-products-section'
        );

    if (!productsSection) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    const productsHeader =
        productsSection.querySelector(
            '.products-reveal'
        );


    const productCards =
        productsSection.querySelectorAll(
            '.product-card-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        productsHeader?.classList.add(
            'products-visible'
        );


        productCards.forEach(
            card => {
                card.classList.add(
                    'products-visible'
                );
            }
        );


        return;
    }


    document.documentElement.classList.add(
        'products-motion-ready'
    );


    const headerObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        entry.target.classList.add(
                            'products-visible'
                        );


                        headerObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold: .18
            }
        );


    if (productsHeader) {
        headerObserver.observe(
            productsHeader
        );
    }


    const cardObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        const cards =
                            Array.from(
                                productCards
                            );


                        const index =
                            cards.indexOf(
                                entry.target
                            );


                        entry.target.style.transitionDelay =
                            `${Math.min(
                                index * 70,
                                280
                            )}ms`;


                        entry.target.classList.add(
                            'products-visible'
                        );


                        cardObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold: .12
            }
        );


    productCards.forEach(
        card => {
            cardObserver.observe(
                card
            );
        }
    );

});

/* =========================================================
   ABOUT SECTION SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const aboutSection =
        document.querySelector(
            '.solasta-about-section'
        );

    if (!aboutSection) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    const aboutMedia =
        aboutSection.querySelector(
            '.about-reveal'
        );


    const aboutFeatures =
        aboutSection.querySelectorAll(
            '.about-feature-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        aboutMedia?.classList.add(
            'about-visible'
        );


        aboutFeatures.forEach(
            item => {

                item.classList.add(
                    'about-visible'
                );

            }
        );


        return;
    }


    document.documentElement.classList.add(
        'about-motion-ready'
    );


    const mediaObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        entry.target.classList.add(
                            'about-visible'
                        );


                        mediaObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold:
                    .15
            }
        );


    if (aboutMedia) {

        mediaObserver.observe(
            aboutMedia
        );

    }


    const featureObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(
                    entry => {

                        if (
                            !entry.isIntersecting
                        ) {
                            return;
                        }


                        const items =
                            Array.from(
                                aboutFeatures
                            );


                        const index =
                            items.indexOf(
                                entry.target
                            );


                        entry.target.style.transitionDelay =
                            `${Math.min(
                                index * 90,
                                270
                            )}ms`;


                        entry.target.classList.add(
                            'about-visible'
                        );


                        featureObserver.unobserve(
                            entry.target
                        );

                    }
                );

            },
            {
                threshold:
                    .15
            }
        );


    aboutFeatures.forEach(
        item => {

            featureObserver.observe(
                item
            );

        }
    );

});

/* =========================================================
   TRUSTED PARTNERS SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const partnersSection =
        document.querySelector(
            '.solasta-partners-section'
        );

    if (!partnersSection) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    const partnersBlock =
        partnersSection.querySelector(
            '.partners-reveal'
        );


    const partnerItems =
        partnersSection.querySelectorAll(
            '.partner-item-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        partnersBlock?.classList.add(
            'partners-visible'
        );


        partnerItems.forEach(item => {

            item.classList.add(
                'partners-visible'
            );

        });


        return;
    }


    document.documentElement.classList.add(
        'partners-motion-ready'
    );


    const blockObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    entry.target.classList.add(
                        'partners-visible'
                    );


                    blockObserver.unobserve(
                        entry.target
                    );

                });

            },
            {
                threshold: .18
            }
        );


    if (partnersBlock) {
        blockObserver.observe(
            partnersBlock
        );
    }


    const itemObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    const items =
                        Array.from(
                            partnerItems
                        );


                    const index =
                        items.indexOf(
                            entry.target
                        );


                    entry.target.style.transitionDelay =
                        `${Math.min(
                            index * 80,
                            320
                        )}ms`;


                    entry.target.classList.add(
                        'partners-visible'
                    );


                    itemObserver.unobserve(
                        entry.target
                    );

                });

            },
            {
                threshold: .15
            }
        );


    partnerItems.forEach(item => {

        itemObserver.observe(
            item
        );

    });

});

/* =========================================================
   PROJECT SECTION SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const projectSection =
        document.querySelector(
            '.solasta-projects-section'
        );

    if (!projectSection) {
        return;
    }


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    const projectContent =
        projectSection.querySelector(
            '.projects-reveal'
        );


    const projectImages =
        projectSection.querySelectorAll(
            '.project-image-reveal'
        );


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        projectContent?.classList.add(
            'projects-visible'
        );


        projectImages.forEach(image => {

            image.classList.add(
                'projects-visible'
            );

        });


        return;
    }


    document.documentElement.classList.add(
        'projects-motion-ready'
    );


    const contentObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    entry.target.classList.add(
                        'projects-visible'
                    );


                    contentObserver.unobserve(
                        entry.target
                    );

                });

            },
            {
                threshold: .18
            }
        );


    if (projectContent) {

        contentObserver.observe(
            projectContent
        );

    }


    const imageObserver =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    const images =
                        Array.from(
                            projectImages
                        );


                    const index =
                        images.indexOf(
                            entry.target
                        );


                    entry.target.style.transitionDelay =
                        `${index * 90}ms`;


                    entry.target.classList.add(
                        'projects-visible'
                    );


                    imageObserver.unobserve(
                        entry.target
                    );

                });

            },
            {
                threshold: .15
            }
        );


    projectImages.forEach(image => {

        imageObserver.observe(
            image
        );

    });

});

/* =========================================================
   NEWSLETTER CTA SCROLL ANIMATION
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const ctaSection =
        document.querySelector(
            '.solasta-cta-section'
        );

    if (!ctaSection) {
        return;
    }


    const items =
        ctaSection.querySelectorAll(
            '.cta-reveal'
        );


    const reduceMotion =
        window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;


    if (
        reduceMotion ||
        !('IntersectionObserver' in window)
    ) {

        items.forEach(item => {

            item.classList.add(
                'cta-visible'
            );

        });

        return;
    }


    document.documentElement.classList.add(
        'cta-motion-ready'
    );


    const observer =
        new IntersectionObserver(
            entries => {

                entries.forEach(entry => {

                    if (!entry.isIntersecting) {
                        return;
                    }


                    const allItems =
                        Array.from(items);


                    const index =
                        allItems.indexOf(
                            entry.target
                        );


                    entry.target.style.transitionDelay =
                        `${index * 90}ms`;


                    entry.target.classList.add(
                        'cta-visible'
                    );


                    observer.unobserve(
                        entry.target
                    );

                });

            },
            {
                threshold: .18
            }
        );


    items.forEach(item => {

        observer.observe(item);

    });

});

/* =========================================================
   SOLASTA HEADER
========================================================= */

document.addEventListener('DOMContentLoaded', () => {

    const header =
        document.querySelector(
            '.solasta-header'
        );

    if (!header) {
        return;
    }


    const toggle =
        header.querySelector(
            '.solasta-mobile-toggle'
        );


    const mobileMenu =
        header.querySelector(
            '.solasta-mobile-menu'
        );


    const mobileProducts =
        header.querySelector(
            '.solasta-mobile-products'
        );


    const mobileProductsButton =
        mobileProducts?.querySelector(
            'button'
        );


    /* =========================
       MOBILE MENU
    ========================== */

    toggle?.addEventListener(
        'click',
        () => {

            const isOpen =
                mobileMenu.classList.toggle(
                    'open'
                );


            toggle.classList.toggle(
                'active',
                isOpen
            );


            toggle.setAttribute(
                'aria-expanded',
                isOpen
                    ? 'true'
                    : 'false'
            );

        }
    );


    /* =========================
       MOBILE PRODUCTS
    ========================== */

    mobileProductsButton?.addEventListener(
        'click',
        () => {

            mobileProducts.classList.toggle(
                'open'
            );

        }
    );


    /* =========================
       CLOSE AFTER LINK CLICK
    ========================== */

    mobileMenu
        ?.querySelectorAll('a')
        .forEach(link => {

            link.addEventListener(
                'click',
                () => {

                    mobileMenu.classList.remove(
                        'open'
                    );

                    toggle?.classList.remove(
                        'active'
                    );

                    toggle?.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }
            );

        });


    /* =========================
       CLOSE ON RESIZE
    ========================== */

    window.addEventListener(
        'resize',
        () => {

            if (
                window.innerWidth > 900
            ) {

                mobileMenu?.classList.remove(
                    'open'
                );

                toggle?.classList.remove(
                    'active'
                );

                toggle?.setAttribute(
                    'aria-expanded',
                    'false'
                );

            }

        }
    );

});