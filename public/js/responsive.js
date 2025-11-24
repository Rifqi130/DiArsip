// Responsive Navigation Handler
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.querySelector(".sidebar");
    const sidebarToggle = document.querySelector(".sidebar-toggle");

    // Show/hide button based on screen size at load
    function checkScreenSize() {
        if (window.innerWidth <= 480) {
            if (sidebarToggle) {
                sidebarToggle.style.display = "block";
            }
        } else {
            if (sidebarToggle) {
                sidebarToggle.style.display = "none";
            }
            if (sidebar) {
                sidebar.classList.remove("active");
            }
        }
    }

    // Initial check
    checkScreenSize();

    // Handle sidebar toggle button click
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", function (e) {
            e.preventDefault();
            if (sidebar) {
                sidebar.classList.toggle("active");
            }
        });
    }

    // Handle window resize
    window.addEventListener("resize", function () {
        checkScreenSize();
    });

    // Close menu when clicking on navigation links
    const navLinks = document.querySelectorAll(".nav-link, .menu-item a");
    navLinks.forEach((link) => {
        link.addEventListener("click", function () {
            if (sidebar && window.innerWidth <= 480) {
                sidebar.classList.remove("active");
            }
        });
    });
});

// Touch swipe support for mobile menu
let touchStartX = 0;
let touchEndX = 0;

document.addEventListener(
    "touchstart",
    function (e) {
        touchStartX = e.changedTouches[0].screenX;
    },
    false
);

document.addEventListener(
    "touchend",
    function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    },
    false
);

function handleSwipe() {
    const sidebar = document.querySelector(".sidebar");
    if (!sidebar || window.innerWidth > 767) return;

    // Swipe from left to right - open menu
    if (touchEndX - touchStartX > 50) {
        sidebar.classList.add("active");
    }

    // Swipe from right to left - close menu
    if (touchStartX - touchEndX > 50) {
        sidebar.classList.remove("active");
    }
}
