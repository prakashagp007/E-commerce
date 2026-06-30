// =========================
// Mobile Menu Toggle
// =========================

const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("show");
});

// =========================
// Tab Switching
// =========================

const tabButtons = document.querySelectorAll(".tab-btn");
const tabContents = document.querySelectorAll(".tab-content");

tabButtons.forEach(button => {

    button.addEventListener("click", () => {

        // Remove active class from all buttons
        tabButtons.forEach(btn => btn.classList.remove("active"));

        // Add active class to clicked button
        button.classList.add("active");

        // Hide all tab contents
        tabContents.forEach(tab => {
            tab.classList.remove("active");
        });

        // Show selected tab
        const target = button.getAttribute("data-tab");
        document.getElementById(target).classList.add("active");

        // Close mobile menu after click
        if (window.innerWidth <= 768) {
            navMenu.classList.remove("show");
        }

    });

});

// =========================
// Close Mobile Menu
// When Screen Becomes Desktop
// =========================

window.addEventListener("resize", () => {

    if (window.innerWidth > 768) {
        navMenu.classList.remove("show");
    }

});

// =========================
// Optional:
// Close Mobile Menu
// When Clicking Outside
// =========================

document.addEventListener("click", (e) => {

    if (
        window.innerWidth <= 768 &&
        !navMenu.contains(e.target) &&
        !menuToggle.contains(e.target)
    ) {
        navMenu.classList.remove("show");
    }

});
