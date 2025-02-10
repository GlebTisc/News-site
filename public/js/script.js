let videos = document.querySelectorAll("video");
const SERVER_ROOT = "https://simple-blog";

//Воспроизведение видео
let controlVideo = function() {
    let parent = this.parentElement;
    let button = parent.getElementsByTagName("button")[0];

    if(button.classList.contains("active")) {
        this.pause();
        button.style.display = "block";
    }
    else {
        this.play();
        button.style.display = "none";
    }

    button.classList.toggle("active");
}

for(let elem of videos) {
    elem.addEventListener("click", controlVideo);
}

let menuToggle = function() {
    let menu = document.querySelector("nav ul");

    if(menu.classList.contains("menu-show")) {
        menu.classList.remove("menu-show");
    }
    else {
        menu.classList.add("menu-show");;
    }
}

let menuBtn = document.querySelector(".menuToggle");
menuBtn.addEventListener("click", menuToggle);

window.addEventListener("resize", () => {
    let menu = document.querySelector("nav ul");

    if(window.innerWidth > 768) {
        menu.classList.remove("menu-show");
    }
});

let links = document.querySelectorAll(".clickable");

if(links) {
    for(let link of links) {
        link.addEventListener('click', () => {
            let id = link.id;
            let newsId = id.match(/\d+/g).join('');
            window.location.href = `/news/${newsId}`;
        });
    }
}
