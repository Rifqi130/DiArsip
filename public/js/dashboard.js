// Dashboard interactions
document.addEventListener("DOMContentLoaded", function () {
    // Sidebar toggle
    const sidebarToggle = document.querySelector(".sidebar-toggle");
    const wrapper = document.querySelector(".wrapper");

    if (sidebarToggle && wrapper) {
        sidebarToggle.addEventListener("click", () => {
            wrapper.classList.toggle("sidebar-collapsed");
        });
    }

    // Table row hover effect
    const tableRows = document.querySelectorAll("table tbody tr");
    tableRows.forEach((row) => {
        row.addEventListener("mouseenter", () => {
            row.style.cursor = "pointer";
        });
    });

    // Initialize tooltips
    const tooltips = document.querySelectorAll("[title]");
    tooltips.forEach((el) => {
        new bootstrap.Tooltip(el);
    });

    // Initialize dropdowns
    const dropdowns = document.querySelectorAll(".dropdown-toggle");
    dropdowns.forEach((dropdown) => {
        new bootstrap.Dropdown(dropdown);
    });
});
