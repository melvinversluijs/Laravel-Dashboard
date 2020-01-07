const header = document.querySelector(".header.fixed");
const toggleHeaderBtn = document.querySelector(".toggle-header");
const hiddenClass = "hidden";

/**
 * Toggle header.
 */
const toggleHeader = () => {
    console.log("triggered");
    header.classList.toggle(hiddenClass);
};

if (header && toggleHeaderBtn) {
    toggleHeaderBtn.addEventListener("click", toggleHeader);
}
