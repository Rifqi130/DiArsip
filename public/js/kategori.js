// Kategori page interactions
document.addEventListener("DOMContentLoaded", function () {
    // Initialize category tree toggles
    const toggleButtons = document.querySelectorAll(".kategori-toggle");
    toggleButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.stopPropagation();
            const contentId = this.getAttribute("data-toggle");
            const content = document.getElementById(contentId);

            if (content) {
                content.classList.toggle("collapsed");
                this.classList.toggle("collapsed");

                // Change icon direction
                const icon = this.querySelector("i");
                if (icon) {
                    icon.style.transform = content.classList.contains(
                        "collapsed"
                    )
                        ? "rotate(0deg)"
                        : "rotate(90deg)";
                }
            }
        });
    });

    // Make category headers clickable for toggle
    const categoryHeaders = document.querySelectorAll(".kategori-header");
    categoryHeaders.forEach((header) => {
        const toggle = header.querySelector(".kategori-toggle");
        if (!toggle) return;

        header.addEventListener("click", function (e) {
            if (e.target !== toggle && !toggle.contains(e.target)) {
                toggle.click();
            }
        });
    });

    // Form submission for adding new category
    const addCategoryBtn = document.querySelector(".modal-footer .btn-primary");
    if (addCategoryBtn) {
        addCategoryBtn.addEventListener("click", function () {
            const form = document.getElementById("tambahKategoriForm");
            const nama = document.getElementById("kategoriNama").value;
            const parent = document.getElementById("kategoriParent").value;
            const deskripsi =
                document.getElementById("kategoriDeskripsi").value;

            if (nama.trim() === "") {
                alert("Nama kategori tidak boleh kosong");
                return;
            }

            // Demo success
            alert(`Kategori "${nama}" berhasil ditambahkan!`);

            // Reset form
            form.reset();

            // Close modal
            const modal = bootstrap.Modal.getInstance(
                document.getElementById("tambahKategoriModal")
            );
            if (modal) {
                modal.hide();
            }
        });
    }

    // Initialize Bootstrap tooltips if available
    const tooltips = document.querySelectorAll("[title]");
    tooltips.forEach((el) => {
        if (typeof bootstrap !== "undefined") {
            new bootstrap.Tooltip(el);
        }
    });

    // Hover effects on category items
    const categoryItems = document.querySelectorAll(".kategori-item");
    categoryItems.forEach((item) => {
        item.addEventListener("mouseenter", function () {
            this.style.transition = "all 0.3s ease";
        });
    });

    // Sub-category selection (demo)
    const subCategories = document.querySelectorAll(
        ".sub-kategori .kategori-header"
    );
    subCategories.forEach((sub) => {
        sub.addEventListener("click", function (e) {
            e.stopPropagation();
            const name = this.querySelector(".kategori-name").textContent;
            console.log("Selected sub-category:", name);
            // Akan diterapkan fungsi pemilihan di sini
        });
    });

    // Search in categories (demo)
    const searchInput = document.querySelector('input[type="search"]');
    if (searchInput) {
        searchInput.addEventListener("keyup", function (e) {
            const searchTerm = e.target.value.toLowerCase();
            const items = document.querySelectorAll(".kategori-item");

            items.forEach((item) => {
                const text = item.textContent.toLowerCase();
                item.style.display = text.includes(searchTerm) ? "" : "none";
            });
        });
    }

    // Initialize all categories as expanded on load
    const allContents = document.querySelectorAll(".kategori-content");
    allContents.forEach((content) => {
        // Initially hidden (collapsed state)
        content.classList.add("collapsed");
        const btn = document.querySelector(`[data-toggle="${content.id}"]`);
        if (btn) {
            btn.classList.add("collapsed");
        }
    });
});

// Expand all categories
function expandAllCategories() {
    const allContents = document.querySelectorAll(".kategori-content");
    allContents.forEach((content) => {
        content.classList.remove("collapsed");
        const btn = document.querySelector(`[data-toggle="${content.id}"]`);
        if (btn) {
            btn.classList.remove("collapsed");
        }
    });
}

// Collapse all categories
function collapseAllCategories() {
    const allContents = document.querySelectorAll(".kategori-content");
    allContents.forEach((content) => {
        content.classList.add("collapsed");
        const btn = document.querySelector(`[data-toggle="${content.id}"]`);
        if (btn) {
            btn.classList.add("collapsed");
        }
    });
}
