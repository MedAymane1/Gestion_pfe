// Side bar script
document.addEventListener("DOMContentLoaded", function (event) {

    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
            nav = document.getElementById(navId),
            bodypd = document.getElementById(bodyId),
            headerpd = document.getElementById(headerId)

        // Validate that all variables exist
        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }

    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')

    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'))
            this.classList.add('active')
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink))
});

// Script to show and hide main sections when clicking on sidebar links
let nav_link = document.querySelectorAll(".nav a");
let mainContant = document.querySelectorAll(".cont");

nav_link.forEach(function (ele) {
    ele.onclick = function () {
        mainContant.forEach(function (ele2) {
            if (ele.getAttribute("title") === ele2.getAttribute("id")) {
                mainContant.forEach(function (ele) {
                    ele.classList.remove("active_link");
                    ele.classList.add("unactive_link");
                });
                ele2.classList.remove("unactive_link");
                ele2.classList.add("active_link");
            }
        })
    }
})




