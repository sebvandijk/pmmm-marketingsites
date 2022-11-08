import '../scss/app.scss'

// wait until DOM is ready
const initApp = () => {


    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.body.classList.add("headerFix");
        } else {
            document.body.classList.remove("headerFix");
        }
    }

    // smooth scroll on anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

}

document.addEventListener('DOMContentLoaded', initApp)