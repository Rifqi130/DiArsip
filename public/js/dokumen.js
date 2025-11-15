// Dokumen page interactions
document.addEventListener("DOMContentLoaded", function () {
    // Initialize tooltips
    const tooltips = document.querySelectorAll("[title]");
    tooltips.forEach((el) => {
        if (typeof bootstrap !== "undefined") {
            new bootstrap.Tooltip(el);
        }
    });

    // Table row interactions
    const tableRows = document.querySelectorAll(".dokumen-row");
    tableRows.forEach((row) => {
        row.addEventListener("mouseenter", () => {
            row.style.cursor = "pointer";
        });
    });

    // Search functionality (demo)
    const searchInput = document.querySelector(
        'input[placeholder="Cari dokumen..."]'
    );
    if (searchInput) {
        searchInput.addEventListener("keyup", function (e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll(".dokumen-row");
            rows.forEach((row) => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? "" : "none";
            });
        });
    }

    // Filter button interactions
    const filterButtons = document.querySelectorAll(".btn-group .btn");
    filterButtons.forEach((btn) => {
        btn.addEventListener("click", function () {
            filterButtons.forEach((b) => b.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // Category filter (demo)
    const categorySelect = document.querySelector(".form-select-sm");
    if (categorySelect) {
        categorySelect.addEventListener("change", function (e) {
            console.log("Selected category:", e.target.value);
            // Akan diterapkan fungsi filter di sini
        });
    }

    // Edit button handler (demo)
    const editButtons = document.querySelectorAll(".btn-outline-primary");
    editButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            alert("Edit dokumen - Fitur dalam pengembangan");
        });
    });

    // Delete button handler (demo)
    const deleteButtons = document.querySelectorAll(".btn-outline-danger");
    deleteButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Apakah Anda yakin ingin menghapus dokumen ini?")) {
                alert("Dokumen dihapus - Fitur dalam pengembangan");
            }
        });
    });

    // Pagination demo
    const paginationLinks = document.querySelectorAll(".pagination .page-link");
    paginationLinks.forEach((link) => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            if (
                !this.parentElement.classList.contains("disabled") &&
                !this.parentElement.classList.contains("active")
            ) {
                document
                    .querySelector(".pagination .page-item.active .page-link")
                    .parentElement.classList.remove("active");
                this.parentElement.classList.add("active");
            }
        });
    });
});
