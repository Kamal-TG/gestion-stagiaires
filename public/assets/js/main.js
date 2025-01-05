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
        
        const targetElement = event.currentTarget

        const href = targetElement.getAttribute("href")
        window.history.pushState(null, "", href);

        const requestedUrl = new Request(href)
        fetch(requestedUrl)
            .then((response) => {
                if (! response.ok) {
                    throw new Error(`Can't fetch data from ${requestedUrl.url}`);
                }
                return response.text()
            })
            .then((data) => {
                const targetModalId = targetElement.getAttribute("data-bs-target")
                if (targetModalId) {
                    const modal = document.querySelector(`.modal${targetModalId} .modal-body`)
                    modal.innerHTML = data
                }
            })
            .catch((error) => {
                console.error(error.message)
                modal.innerText = "Pas d'informations"
            })
    })
})

// Restore the original URL when the modal is closed
document.querySelectorAll(".modal").forEach((modal) => {
    modal.addEventListener("hidden.bs.modal", function () {
        window.history.replaceState(null, "", originalUrl)
    })
})


/*
 * Table Filters
 */

const table = document.querySelector("table#dataTable")
const tableBody = table.tBodies[0]
const tableRows = tableBody.rows

const filters = [
    {
        id: 'name',
        targetColumns: [1, 2],
        searchQuery: '',
        rowsToHide: []
    },
    {
        id: 'annee_etude',
        targetColumns: [4],
        searchQuery: '',
        rowsToHide: []
    },
    {
        id: 'code_bac',
        targetColumns: [5],
        searchQuery: '',
        rowsToHide: []
    },
    {
        id: 'annee_bac',
        targetColumns: [6],
        searchQuery: '',
        rowsToHide: []
    },
]

/**
 * add event listeners to each filter
 * Also fill select
 */ 
filters.forEach((filter) => {
    const input = document.querySelector(`.filters #${filter.id}`)
    const eventToHandle = input.tagName.toLowerCase() === "input" ? "input" : "change"
    input.addEventListener(eventToHandle, (event) => {
        const searchQuery = event.currentTarget.value.trim().toLowerCase()
        filter.rowsToHide = getVisibleRows(searchQuery, filter.targetColumns)
        showVisibleRowsOnly()
    })

    // add options for select
    if (input.tagName.toLowerCase() === "select" && filter.targetColumns.length === 1) {
        addOptionsFromTable(input, filter.targetColumns[0], filter.id === "code_bac")
    }
})


function addOptionsFromTable(element, columnIndex, useTitle = false) {
  const sorted = Array.from(tableRows).sort((a, b) =>
    a.cells[columnIndex].textContent.localeCompare(
      b.cells[columnIndex].textContent
    )
  );

  sorted.forEach((row, index, array) => {
    const cellText = row.cells[columnIndex].textContent;
    const cellTitle = row.cells[columnIndex].title;

    // distinct rows
    if (
      array
        .map((row) => row.cells[columnIndex].textContent)
        .indexOf(cellText) !== index
    ) {
      return;
    }

    const option = document.createElement("option");
    option.setAttribute("value", cellText);
    option.innerText = cellText;
    if (useTitle) {
      option.innerText = cellTitle;
    }
    element.appendChild(option);
  });
}

function getVisibleRows(searchQuery, columnsIndex) {
  const rowsToHide = [];

  for (const tableRow of tableRows) {
    tableRow.style.visibility = null;

    let cellText = "";
    for (const columnIndex of columnsIndex) {
      cellText += tableRow.cells[columnIndex].textContent.toLowerCase();
      cellText += " ";
    }
    cellText = cellText.trim();

    const queryResult = cellText.includes(searchQuery);

    if (!queryResult) {
      rowsToHide.push(tableRow);
    }
  }

  return rowsToHide;
}


function showVisibleRowsOnly() {
    filters.forEach((filter) => {
        filter.rowsToHide.forEach((row) => {
            row.style.visibility = "collapse"
        })
    })
}

document.querySelector(".filters button[type='reset']").addEventListener("click", () => {
    filters.forEach((filter) => {
        filter.rowsToHide.forEach((row) => {
            row.style.visibility = null
        })
    })
})
