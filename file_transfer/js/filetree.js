document.addEventListener("DOMContentLoaded", function () {
    const fileTree = document.getElementById("fileTree");
    const selectAllButton = document.getElementById("selectAllButton");
    const downloadSelectedButton = document.getElementById("downloadSelectedButton");

    // Fetch the file list from the server
    fetch("list_files.php")
        .then((response) => response.json())
        .then((data) => {
            // Generate the file tree from the fetched data
            createFileTree(data, fileTree);
        })
        .catch((error) => console.error("Error fetching file list:", error));

    const selectedFiles = new Set();

    function createFileTree(data, parentElement) {
        const ul = document.createElement("ul");

        data.forEach((item) => {
            const li = document.createElement("li");
            li.classList.add("file-item");

            if (item.type === "folder") {
                li.innerHTML = `
                    <span class="folder">${item.name}</span>
                `;
                li.classList.add("collapsed");

                const childrenUl = createFileTree(item.children, li);
                li.appendChild(childrenUl);

                li.addEventListener("click", () => {
                    li.classList.toggle("collapsed");
                });
            } else {
                const checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.value = item.path;
                checkbox.classList.add("checkbox");
                li.appendChild(checkbox);

                li.innerHTML += `
                    <span class="file">${item.name}</span>
                    <button class="download-button">Download</button>
                `;

                const downloadButton = li.querySelector(".download-button");
                downloadButton.addEventListener("click", (event) => {
                    event.stopPropagation();
                    window.location.href = item.path;
                });

                checkbox.addEventListener("change", () => {
                    if (checkbox.checked) {
                        selectedFiles.add(item.path);
                    } else {
                        selectedFiles.delete(item.path);
                    }
                    updateDownloadButtonState();
                });
            }

            ul.appendChild(li);
        });

        parentElement.appendChild(ul);
    }

    function updateDownloadButtonState() {
        if (selectedFiles.size > 0) {
            downloadSelectedButton.removeAttribute("disabled");
        } else {
            downloadSelectedButton.setAttribute("disabled", "");
        }
    }

    selectAllButton.addEventListener("click", () => {
        const checkboxes = document.querySelectorAll('.file-item input[type="checkbox"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = true;
            selectedFiles.add(checkbox.value);
        });
        updateDownloadButtonState();
    });

    downloadSelectedButton.addEventListener("click", () => {
        // Convert the selectedFiles set to an array
        const selectedFilesArray = Array.from(selectedFiles);

        if (selectedFilesArray.length > 0) {
            // Create a query parameter with the selected file paths
            const selectedFilesQueryParam = selectedFilesArray.map((filePath) => {
                return `selectedFiles[]=${encodeURIComponent(filePath)}`;
            }).join('&');

            // Create a download URL for download_selected.php
            const downloadUrl = `download_selected.php?${selectedFilesQueryParam}`;

            // Redirect to the download URL
            window.location.href = downloadUrl;
        }
    });
});
