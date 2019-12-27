const header = document.querySelector(".header.fixed");
const hiddenClass = "hidden";
let timeout;

/**
 * Handle event.
 */
const handleEvent = () => {
    // Clear timeout and remove the hidden class on triggered event.
    clearTimeout(timeout);
    header.classList.remove(hiddenClass);

    // Set a new timeout.
    timeout = setTimeout(() => {
        header.classList.add(hiddenClass);
    }, 3000);
};

// Only use it on fixed headers.
if (header) {
    // Initial call.
    handleEvent();
    // Add the event listener for mouse movement.
    document.addEventListener("mousemove", handleEvent);
}
