 document.getElementById("searchBox").addEventListener("input", function() {
            let query = this.value;
            let suggestionsBox = document.getElementById("suggestions");

            if (query.length < 1) {
                suggestionsBox.style.display = "none";
                return;
            }

            fetch("auto_search.php?query=" + encodeURIComponent(query))
                .then(response => response.json())
                .then(data => {
                    suggestionsBox.innerHTML = "";
                    if (data.length > 0) {
                        suggestionsBox.style.display = "block";
                        data.forEach(item => {
                            let link = document.createElement("a");
                            link.href = item.link; // Set the product link
                            link.textContent = item.name; // Set the product name
                            link.target = "_blank"; // Open in a new tab (optional)
                            
                            suggestionsBox.appendChild(link);
                        });
                    } else {
                        suggestionsBox.style.display = "none";
                    }
                })
                .catch(error => console.error("Error:", error));
        });

        document.addEventListener("click", function(e) {
            if (!document.getElementById("searchBox").contains(e.target)) {
                document.getElementById("suggestions").style.display = "none";
            }
        });