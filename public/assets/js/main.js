/* Activate Pooper Tooltip */
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


/*
 * Make anchor links in tables update current URL
 * AJAX for table anchor links
 */

// Store the original URL when the page loads
const originalUrl = window.location.href;

const anchorElements = document.querySelectorAll(".send-idx")
anchorElements.forEach((anchor) => {
    anchor.addEventListener("click", (event) => {
        event.preventDefault()

        const href = event.currentTarget.href
        
        window.history.pushState(null, "", href);

        const requestedUrl = new Request(href)
        fetch(requestedUrl, {
            method: "GET",
            
        })
            .then((response) => response.text())
            .then((data) => console.log(data))
    })
})

// Restore the original URL when the modal is closed
const modal = document.getElementById("showTrainee");
modal.addEventListener("hidden.bs.modal", function () {
    window.history.replaceState(null, "", originalUrl);
});

