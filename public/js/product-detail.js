document.addEventListener('DOMContentLoaded', () => {

    /* =========================================================
       ELEMENTS
    ========================================================= */

    const mainImage = document.getElementById('pd-main-product-image');

    const thumbnailButtons = document.querySelectorAll(
        '[data-pd-image]'
    );

    const allThumbs = document.querySelectorAll(
        '.pd-thumb-btn, .pd-bottom-thumb-btn'
    );

    const stage = document.getElementById('pd-360-stage');

    const view360Button = document.getElementById(
        'pd-360-button'
    );

    const zoomButton = document.getElementById(
        'pd-zoom-button'
    );

    const modal = document.getElementById(
        'pd-image-modal'
    );

    const modalImage = document.getElementById(
        'pd-modal-image'
    );

    const modalClose = document.getElementById(
        'pd-modal-close'
    );

    const quantityInput = document.getElementById(
        'pd-quantity'
    );

    const minusButton = document.querySelector(
        '[data-qty-minus]'
    );

    const plusButton = document.querySelector(
        '[data-qty-plus]'
    );

    const typeButtons = document.querySelectorAll(
        '.pd-type-btn'
    );

    const addToCartButton = document.getElementById(
        'pd-add-cart'
    );


    /* =========================================================
       VARIABLES
    ========================================================= */

    let selectedProductType =
        typeButtons[0]?.dataset.productType || '';

    let spinTimer = null;

    let currentFrame = 0;


    /* =========================================================
       STOP 360
    ========================================================= */

    function stop360() {

        if (!spinTimer) {
            return;
        }

        clearInterval(spinTimer);

        spinTimer = null;

        view360Button?.classList.remove(
            'pd-spinning'
        );

    }


    /* =========================================================
       ACTIVE THUMBNAIL
    ========================================================= */

    function setActiveThumbnail(button) {

        allThumbs.forEach(item => {

            item.classList.remove(
                'active'
            );

        });

        button?.classList.add(
            'active'
        );

    }


    /* =========================================================
       CHANGE MAIN IMAGE
    ========================================================= */

    function changeMainImage(image, button = null) {

        if (!mainImage || !image) {
            return;
        }

        stop360();

        stage?.classList.remove(
            'pd-is-zoomed'
        );

        if (button) {

            setActiveThumbnail(
                button
            );

        }

        mainImage.style.opacity = '0';

        window.setTimeout(() => {

            mainImage.src = image;

            mainImage.style.opacity = '1';

            if (modalImage) {

                modalImage.src = image;

            }

        }, 110);

    }


    /* =========================================================
       8 THUMBNAIL GALLERY
    ========================================================= */

    thumbnailButtons.forEach(button => {

        button.addEventListener(
            'click',
            () => {

                const image =
                    button.dataset.pdImage;

                changeMainImage(
                    image,
                    button
                );

            }
        );

    });


    /* =========================================================
       360 DEGREE VIEW
    =========================================================
       
       IMPORTANT:
       
       Abhi agar 8 images same hain toh 360 effect same
       image jaisa dikhega.
       
       Baad me 8 different angle images lagane par ye
       automatically un images ko rotate karega.
       
    ========================================================= */

    view360Button?.addEventListener(
        'click',
        () => {

            if (!mainImage) {
                return;
            }


            /*
             * Agar already rotate ho raha hai,
             * click karne par stop.
             */

            if (spinTimer) {

                stop360();

                return;

            }


            /*
             * Sabhi thumbnail images ko frames me lo.
             */

            const frames =
                Array
                    .from(thumbnailButtons)
                    .map(button => ({
                        image:
                            button.dataset.pdImage,

                        button:
                            button
                    }))
                    .filter(frame =>
                        frame.image
                    );


            if (frames.length < 2) {
                return;
            }


            stage?.classList.remove(
                'pd-is-zoomed'
            );


            view360Button.classList.add(
                'pd-spinning'
            );


            currentFrame = 0;


            spinTimer =
                window.setInterval(
                    () => {

                        currentFrame =
                            (
                                currentFrame + 1
                            )
                            %
                            frames.length;


                        const frame =
                            frames[currentFrame];


                        mainImage.src =
                            frame.image;


                        setActiveThumbnail(
                            frame.button
                        );


                        if (modalImage) {

                            modalImage.src =
                                frame.image;

                        }

                    },
                    280
                );

        }
    );


    /* =========================================================
       IMAGE ZOOM MODAL
    ========================================================= */

    zoomButton?.addEventListener(
        'click',
        () => {

            if (
                !mainImage ||
                !modal ||
                !modalImage
            ) {

                return;

            }


            stop360();


            modalImage.src =
                mainImage.src;


            modal.classList.add(
                'active'
            );


            modal.setAttribute(
                'aria-hidden',
                'false'
            );


            document.body.style.overflow =
                'hidden';

        }
    );


    /* =========================================================
       CLOSE ZOOM
    ========================================================= */

    function closeModal() {

        if (!modal) {
            return;
        }


        modal.classList.remove(
            'active'
        );


        modal.setAttribute(
            'aria-hidden',
            'true'
        );


        document.body.style.overflow =
            '';

    }


    modalClose?.addEventListener(
        'click',
        closeModal
    );


    modal?.addEventListener(
        'click',
        event => {

            /*
             * Image ke bahar click karne par close.
             */

            if (event.target === modal) {

                closeModal();

            }

        }
    );


    document.addEventListener(
        'keydown',
        event => {

            if (event.key === 'Escape') {

                closeModal();

            }

        }
    );


    /* =========================================================
       PRODUCT TYPE
    ========================================================= */

    typeButtons.forEach(button => {

        button.addEventListener(
            'click',
            () => {

                typeButtons.forEach(
                    item => {

                        item.classList.remove(
                            'active'
                        );

                    }
                );


                button.classList.add(
                    'active'
                );


                selectedProductType =
                    button.dataset.productType
                    || '';

            }
        );

    });


    /* =========================================================
       QUANTITY HELPERS
    ========================================================= */

    function getQuantity() {

        if (!quantityInput) {

            return 1;

        }


        const value =
            parseInt(
                quantityInput.value,
                10
            );


        if (
            Number.isNaN(value) ||
            value < 1
        ) {

            return 1;

        }


        return value;

    }


    function setQuantity(value) {

        if (!quantityInput) {

            return;

        }


        quantityInput.value =
            Math.max(
                1,
                value
            );

    }


    /* =========================================================
       MINUS QUANTITY
    ========================================================= */

    minusButton?.addEventListener(
        'click',
        () => {

            setQuantity(
                getQuantity() - 1
            );

        }
    );


    /* =========================================================
       PLUS QUANTITY
    ========================================================= */

    plusButton?.addEventListener(
        'click',
        () => {

            setQuantity(
                getQuantity() + 1
            );

        }
    );


    /* =========================================================
       MANUAL QUANTITY
    ========================================================= */

    quantityInput?.addEventListener(
        'change',
        () => {

            setQuantity(
                getQuantity()
            );

        }
    );


    quantityInput?.addEventListener(
        'input',
        () => {

            if (
                quantityInput.value !== '' &&
                Number(quantityInput.value) < 1
            ) {

                quantityInput.value = 1;

            }

        }
    );


    /* =========================================================
       ADD TO CART
    =========================================================
       
       Abhi ye UI feedback hai.
       Laravel cart backend baad me connect kar sakte hain.
       
    ========================================================= */

    addToCartButton?.addEventListener(
        'click',
        () => {

            const quantity =
                getQuantity();


            const originalHTML =
                addToCartButton.innerHTML;


            addToCartButton.innerHTML = `
                <i class="fa-solid fa-check"></i>
                <span>ADDED (${quantity})</span>
            `;


            addToCartButton.disabled =
                true;


            window.setTimeout(
                () => {

                    addToCartButton.innerHTML =
                        originalHTML;


                    addToCartButton.disabled =
                        false;

                },
                1400
            );


            /*
             * Backend connect karte waqt
             * yahan selected data available hai.
             */

            console.log({

                quantity:
                    quantity,

                productType:
                    selectedProductType,

                image:
                    mainImage?.src || ''

            });

        }
    );


    /* =========================================================
       PAGE LEAVE / CLEANUP
    ========================================================= */

    window.addEventListener(
        'beforeunload',
        () => {

            stop360();

        }
    );
    /* =========================================================
   PRODUCT INFORMATION TABS
========================================================= */

const productInfoTabs =
    document.querySelectorAll('[data-pd-tab]');

const productInfoPanels =
    document.querySelectorAll('[data-pd-panel]');


productInfoTabs.forEach(tab => {

    tab.addEventListener('click', () => {

        const target =
            tab.dataset.pdTab;


        /* REMOVE OLD ACTIVE TAB */

        productInfoTabs.forEach(item => {

            item.classList.remove('active');

        });


        /* HIDE OLD CONTENT */

        productInfoPanels.forEach(panel => {

            panel.classList.remove('active');

        });


        /* ACTIVE CLICKED TAB */

        tab.classList.add('active');


        /* SHOW CLICKED TAB CONTENT */

        const selectedPanel =
            document.querySelector(
                `[data-pd-panel="${target}"]`
            );


        selectedPanel?.classList.add('active');

    });

});


/* =========================================================
   FAQ ACCORDION
========================================================= */

const faqItems =
    document.querySelectorAll('.pd-faq-item');


faqItems.forEach(item => {

    const question =
        item.querySelector('.pd-faq-question');


    question?.addEventListener('click', () => {

        const alreadyOpen =
            item.classList.contains('active');


        /* CLOSE ALL FAQS */

        faqItems.forEach(faq => {

            faq.classList.remove('active');

        });


        /* OPEN SELECTED FAQ */

        if (!alreadyOpen) {

            item.classList.add('active');

        }

    });

});

});