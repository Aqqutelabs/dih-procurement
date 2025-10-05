// Tab functionality
document.querySelectorAll(".vertiqal-nav-tab").forEach((tab) => {
    tab.addEventListener("click", function () {
        document
            .querySelectorAll(".vertiqal-nav-tab")
            .forEach((t) => t.classList.remove("active"));
        this.classList.add("active");
    });
});

// Compliance dropdown toggle
document
    .querySelector(".vertiqal-compliance-toggle")
    .addEventListener("click", function () {
        const submenu = document.querySelector(".vertiqal-compliance-submenu");
        const icon = this.querySelector("i");

        if (submenu.style.display === "none" || submenu.style.display === "") {
            submenu.style.display = "block";
            icon.classList.remove("fa-chevron-down");
            icon.classList.add("fa-chevron-up");
        } else {
            submenu.style.display = "none";
            icon.classList.remove("fa-chevron-up");
            icon.classList.add("fa-chevron-down");
        }
    });

// Add hover effects and interactions
document.querySelectorAll(".vertiqal-tender-item").forEach((item) => {
    item.addEventListener("mouseenter", function () {
        this.style.transform = "translateX(5px)";
    });

    item.addEventListener("mouseleave", function () {
        this.style.transform = "translateX(0)";
    });
});

// Bid button click handler
document.querySelectorAll(".vertiqal-btn-bid").forEach((button) => {
    button.addEventListener("click", function () {
        const originalText = this.textContent;
        this.textContent = "Bidding...";
        this.disabled = true;

        setTimeout(() => {
            this.textContent = originalText;
            this.disabled = false;
            alert("Bid submitted successfully!");
        }, 1500);
    });
});

// Stats card animation on load
document.addEventListener("DOMContentLoaded", function () {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    });

    document.querySelectorAll(".vertiqal-stat-card").forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = `all 0.5s ease ${index * 0.1}s`;
        observer.observe(card);
    });
});
