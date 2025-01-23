function Carousel(carousel, elements, firstElem, config, pagination = null, leftArrow = null, rightArrow = null) {
    this.carousel = carousel;
    this.carouselElements = elements;
    this.firstElement = firstElem;
    this.leftArrow = leftArrow;
    this.rightArrow = rightArrow;
    this.pagination = pagination;

    this.options = config;
    Carousel.start(this);
}

Carousel.prototype.prevElem = function(num) {
    num = num || 1;

    let prevElem = this.currentElem;
    this.currentElem -= num;

    if(this.currentElem < 0) {
        this.currentElem = this.elementsCount - 1;
    }

    if(!this.options.loop) {
        if(this.currentElem == 0) {
            this.leftArrow.style.display = "none";
        }

        this.rightArrow.style.display = "block";
    }

    this.carouselElements[this.currentElem].style.opacity = 1;
    this.carouselElements[this.currentElem].style.zIndex = 2;
    this.carouselElements[prevElem].style.opacity = 0;
    this.carouselElements[prevElem].style.zIndex = 1;

    if(this.options.pagination) {
        this.activateDot(this.currentElem);
        this.disableDot(prevElem);
    }
}

Carousel.prototype.nextElem = function(num) {
    num = num || 1;

    let prevElem = this.currentElem;
    this.currentElem += num;

    if(this.currentElem >= this.elementsCount) {
        this.currentElem = 0;
    }

    if(!this.options.loop) {
        if(this.currentElem == this.elementsCount - 1) {
            this.rightArrow.style.display = "none";
        }

        this.leftArrow.style.display = "block";
    }

    this.carouselElements[this.currentElem].style.opacity = 1;
    this.carouselElements[this.currentElem].style.zIndex = 2;
    this.carouselElements[prevElem].style.opacity = 0;
    this.carouselElements[prevElem].style.zIndex = 1;

    if(this.options.pagination) {
        this.activateDot(this.currentElem);
        this.disableDot(prevElem);
    }
}

Carousel.prototype.activateDot = function(num) {
    this.allDots[num].classList.add("active");
}

Carousel.prototype.disableDot = function(num) {
    this.allDots[num].classList.remove("active");
}

Carousel.start = function(carousel) {
    carousel.elementsCount = carousel.carouselElements.length;
    carousel.currentElem = 0;

    let bgtime = getTime();

    function getTime() {
        return new Date().getTime();
    }

    function setAutoScroll() {
        carousel.autoScroll = setInterval(function() {
            let fntime = getTime();

            if(fntime - bgtime + 10 > carousel.options.interval) {
                bgtime = fntime;
                carousel.nextElem();
            }
        }, carousel.options.interval);
    }

    if(carousel.elementsCount <= 1) {
        carousel.options.auto = false;
        carousel.options.pagination = false;
        carousel.options.arrows = false;
        carousel.leftArrow.style.display = "none";
        carousel.rightArrow.style.display = "none";
    }

    if(carousel.elementsCount >= 1) {
        carousel.firstElement.style.opacity = 1;
        carousel.firstElement.style.zIndex = 2;
    }

    if(!carousel.options.loop) {
        carousel.leftArrow.style.display = "none";
        carousel.options.auto = false;
    }
    else if(carousel.options.auto) {
        setAutoScroll();

        for(let elem of carousel.carouselElements) {
            elem.addEventListener('mouseenter', function() {
                clearInterval(carousel.autoScroll);
            }, false);
        }

        for(let elem of carousel.carouselElements) {
            elem.addEventListener('mouseleave', setAutoScroll, false);
        }
    }

    if(carousel.options.arrows) {
        carousel.leftArrow.addEventListener('click', function() {
            let fntime = getTime();

            if(fntime - bgtime > 500) {
                bgtime = fntime;
                carousel.prevElem();
            }
        }, false);

        carousel.rightArrow.addEventListener('click', function() {
            let fntime = getTime();

            if(fntime - bgtime > 500) {
                bgtime = fntime;
                carousel.nextElem();
            }
        }, false);
    }
    else {
        if(carousel.leftArrow && carousel.rightArrow) {
            carousel.leftArrow.style.display = "none";
            carousel.rightArrow.style.display = "none";
        }
    }

    if(carousel.options.pagination) {
        let dots = "", diffNum;

        for(let i = 0; i < carousel.elementsCount; i++) {
            dots += "<span class='carousel-button'></span>";
        }

        carousel.pagination.innerHTML = dots;
        carousel.allDots = document.querySelectorAll(`span.${carousel.options.dotClass}`);

        for(let i = 0; i < carousel.elementsCount; i++) {
            carousel.allDots[i].addEventListener('click', function() {
                diffNum = Math.abs(i - carousel.currentElem);

                if(i < carousel.currentElem) {
                    bgtime = getTime();
                    carousel.prevElem(diffNum);
                }
                else if(i > carousel.currentElem) {
                    bgtime = getTime();
                    carousel.nextElem(diffNum);
                }
            }, false);
        }

        carousel.activateDot(0);

        for(let i = 1; i < carousel.elementsCount; i++) {
            carousel.disableDot(i);
        }
    }
}

let carouselConfig = {
    loop: true,                 // Бесконечное зацикливание слайдера
	auto: true,                 // Автоматическое пролистывание
	interval: 5000,             // Интервал между пролистыванием элементов (мс)
	arrows: false,              // Пролистывание стрелками
	pagination: true,           // Индикаторные точки
    dotClass: "carousel-button" // Класс для точек
}

let sliderConfig = {
    loop: true,
	auto: false,
	interval: null,
	arrows: true,
	pagination: false,
    dotClass: null
}

let carousel = document.querySelector(".carousel");
let elements = carousel.querySelectorAll(".carousel-item");
let firstElement = elements ? elements[0] : null;
let pagination = document.querySelector(".carousel-buttons");

new Carousel(carousel, elements, firstElement, carouselConfig, pagination);

let slider = document.querySelectorAll(".carousel")[1];
let sliderElements = document.querySelectorAll(".carousel-page");
let firstSliderElement = document.querySelector(".carousel-page");
let [leftArrow, rightArrow] = document.querySelectorAll(".carousel-arrows div");

new Carousel(slider, sliderElements, firstSliderElement, sliderConfig, null, leftArrow, rightArrow);
