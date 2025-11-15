// Minimal JS for the demo login page (UI-only)
document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById("loginForm");
    if (!form) return;
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        // Basic client-side validation visual
        if (!form.checkValidity()) {
            form.classList.add("was-validated");
            return;
        }
        // Redirect to dashboard.php after successful validation
        window.location.href = "/dashboard.php";
    });
});
