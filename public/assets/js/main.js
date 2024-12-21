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

        const href = event.currentTarget.getAttribute("href")
        window.history.pushState(null, "", href);

        const requestedUrl = new Request(href)
        const modalId = event.currentTarget.getAttribute("data-bs-target")
        const modal = document.querySelector(`${modalId} .modal-body`)
        fetch(requestedUrl)
            .then((response) => {
                if (! response.ok) {
                    throw new Error(`Can't fetch data from ${requestedUrl.url}`);
                }
                return response.text()
            })
            .then((data) => {
                modal.innerHTML = data
            })
            .catch((error) => {
                console.error(error.message)
                modal.innerText = "Pas d'informations"
            })
    })
})

// Restore the original URL when the modal is closed
const modal = document.getElementById("showTrainee");
modal.addEventListener("hidden.bs.modal", function () {
    window.history.replaceState(null, "", originalUrl);
});

