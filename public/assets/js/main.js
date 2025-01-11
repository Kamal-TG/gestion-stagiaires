/* Activate Pooper Tooltip */
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))


/*
 * Make anchor links in tables update current URL
 * AJAX for table anchor links
 */

// Store the original URL when the page loads
const originalUrl = window.location.href;

const anchorElements = document.querySelectorAll(".send-query");
anchorElements.forEach((anchor) => {
  anchor.addEventListener("click", (event) => {
    event.preventDefault()

    const targetElement = event.currentTarget

    const href = targetElement.getAttribute("href")
    window.history.pushState(null, "", href);

    const requestedUrl = new Request(href)
    fetch(requestedUrl)
      .then((response) => {
        if (!response.ok) {
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
document.querySelectorAll(".modal:not(.no-old-query)").forEach((modal) => {
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
    id: "name",
    targetColumns: ["Nom", "Prénom"],
    searchQuery: "",
    rowsToHide: [],
  },
  {
    id: "annee_etude",
    targetColumns: ["Année Étude"],
    searchQuery: "",
    rowsToHide: [],
  },
  {
    id: "code_bac",
    targetColumns: ["Bac"],
    searchQuery: "",
    rowsToHide: [],
  },
  {
    id: "annee_bac",
    targetColumns: ["Année Bac"],
    searchQuery: "",
    rowsToHide: [],
  },
];

/**
 * add event listeners to each filter
 * Also fill select
*/
filters.forEach((filter) => {
  const input = document.querySelector(`.filters #${filter.id}`)
  
  if (! input) {
    return
  }

  const eventToHandle = input.tagName.toLowerCase() === "input" ? "input" : "change"

  // get index of each column
  let columnsIndex = []
  filter.targetColumns.forEach((column) => {
    columnsIndex.push(getIndexOfColumn(column))
  })

  input.addEventListener(eventToHandle, (event) => {
    const searchQuery = event.currentTarget.value.trim().toLowerCase()
    filter.rowsToHide = getVisibleRows(searchQuery, columnsIndex)
    showVisibleRowsOnly()
  })

  // add options for select
  if (input.tagName.toLowerCase() === "select" && columnsIndex.length === 1) {
    addOptionsFromTable(input, columnsIndex[0], filter.id === "code_bac")
  }
})

function getIndexOfColumn(columnName) {
  const tableHead = Array.from(table.tHead.rows[0].cells)
  return tableHead.indexOf(tableHead.find((head) => head.textContent === columnName))
}

function addOptionsFromTable(element, columnIndex, useTitle = false) {
  const sorted = Array.from(tableRows).sort((a, b) =>
    a.cells[columnIndex].textContent.localeCompare(
      b.cells[columnIndex].textContent
    )
  );

  sorted.forEach((row, index, array) => {
    if (row.children.length === 1) {
      return
    }

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


/*
 * Notes Inputs Activation
 */

document.querySelector(".modal#showNotes")?.addEventListener("shown.bs.modal", function () {
  const radios = document.querySelectorAll('input[type="radio"]')
  radios.forEach((radio) => {
    radio.addEventListener("change", (event) => {
      if (! event.currentTarget.checked) {
        return
      }
      event.currentTarget.closest("td").querySelector("input.note").disabled = false
    })
  })
})
