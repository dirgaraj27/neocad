
// geting service list according to service type in case form
function getServices(serviceTypeId) {
    // Make AJAX request to fetch services based on service type ID
    $.ajax({
        url: '/get-services/' + serviceTypeId,
        type: 'GET',
        success: function(response) {
            // Clear existing options
            $('#servicesDropdown').empty();
            // Add placeholder option for service dropdown
            $('#servicesDropdown').append('<option value="">-- Select Service --</option>');
            // Append new options based on response
            response.forEach(function(service) {
                $('#servicesDropdown').append('<option value="' + service.id + '">' + service.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
// Get price and assing in any field according to service
    function updateTotalCost(serviceId) {
    // Make AJAX request to fetch service price based on service ID
    $.ajax({
        url: '/get-service-price/' + serviceId,
        type: 'GET',
        success: function(response) {
            // Check if response is not empty and contains a service price
            if (response && response.price) {
                // Update total cost input field with the fetched price
                $('#totalCostInput').val(response.price);
            } else {
                console.error('No price found for the selected service.');
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
$(document).ready(function() {
    // Function to clear the price input field
    function clearPriceInput() {
        $('#totalCostInput').val('');
    }
    // Listen for changes in the service type dropdown
    $('select[name="service_type_id"]').change(function() {
        // If the selected value is empty (default option), clear the price input field
        if ($(this).val() === '') {
            clearPriceInput();
        }
    });
});
    $(document).ready(function() {
        // Function to show or hide pickup details based on the selected pickup value
        function togglePickupDetails() {
            if ($('#pickupYes').is(':checked')) {
                $('.pickupDetails').show();
            } else {
                $('.pickupDetails').hide();
            }
        }
        // Call the function initially to set the initial state
        togglePickupDetails();
        // Listen for changes in the pickup radio buttons
        $('input[name="pickup"]').change(function() {
            togglePickupDetails();
        });
    });
// multiple file upload and file preview-case form
function previewFiles(event) {
    const files = event.target.files; // Get the selected files
    const fileInfoDiv = document.getElementById('fileInfo');
    fileInfoDiv.innerHTML = ''; // Clear previous file info
    // Loop through each selected file
    for (const file of files) {
        // Create a div element for each file
        const fileDiv = document.createElement('div');
        fileDiv.textContent = `${file.name} (${formatFileSize(file.size)})`; // Display file name and size

        // Append the file div to the file info div
        fileInfoDiv.appendChild(fileDiv);
    }

    // Display the file info div
    fileInfoDiv.style.display = 'block';
}

// Function to format file size in human-readable format
function formatFileSize(bytes) {
    const kb = 1024;
    const mb = kb * 1024;
    const gb = mb * 1024;

    if (bytes >= gb) {
        return (bytes / gb).toFixed(2) + ' GB';
    } else if (bytes >= mb) {
        return (bytes / mb).toFixed(2) + ' MB';
    } else if (bytes >= kb) {
        return (bytes / kb).toFixed(2) + ' KB';
    } else {
        return bytes + ' bytes';
    }
}
