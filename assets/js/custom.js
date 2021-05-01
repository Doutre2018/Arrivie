window.onload = () => {

    $('#temoignages').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
    //hide menu when down, show when up
    // var prevScrollpos = window.pageYOffset;
    // window.onscroll = function () {
    //     var currentScrollPos = window.pageYOffset;
    //     if (prevScrollpos > currentScrollPos) {
    //         document.getElementById("header").style.top = "0px";
    //     } else {
    //         document.getElementById("header").style.top = "-150px";
    //     }
    //     prevScrollpos = currentScrollPos;
    // }
    const barsbtn = document.getElementById('bars-btn');
    const navbar = document.querySelector('.navbar')
    barsbtn.onclick = () => {
        console.log(navbar.style.maxHeight)
        if (navbar.style.maxHeight === '100vh') {
            navbar.style.maxHeight = '0';
        }
        else {
            navbar.style.maxHeight = '100vh';
        }
    }

}