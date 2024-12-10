document.addEventListener("DOMContentLoaded", function () {
    // Limit category selection to 5 items
    const categorySelect = document.getElementById("sale-categories");

    if (categorySelect) {
        categorySelect.addEventListener("change", function () {
            const selectedOptions = Array.from(categorySelect.selectedOptions);
            if (selectedOptions.length > 5) {
                alert("You can select a maximum of 5 categories at a time.");
                selectedOptions.slice(5).forEach(option => option.selected = false);
            }
        });
    }

    // Ensure "To Date" is after "From Date"
    const startDateInput = document.getElementById("start-date");
    const endDateInput = document.getElementById("end-date");

    if (startDateInput && endDateInput) {
        startDateInput.addEventListener("change", function () {
            if (startDateInput.value && endDateInput.value && endDateInput.value < startDateInput.value) {
                endDateInput.value = "";
                alert("The end date cannot be before the start date.");
            }
        });

        endDateInput.addEventListener("change", function () {
            if (startDateInput.value && endDateInput.value < startDateInput.value) {
                alert("The end date cannot be before the start date.");
                endDateInput.value = "";
            }
        });
    }
});
