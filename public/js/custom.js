
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
    const fileInfo = document.getElementById('fileInfo');
    if (files && files.length > 0) {
        // Clear previous file info
        fileInfo.innerHTML = '';
        // Loop through each file
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const fileDiv = document.createElement('div');
            const fileLink = document.createElement('a');
            // Display file information and link
            fileDiv.innerHTML = `File ${i + 1}: ${file.name} (${formatBytes(file.size)})`;
            fileLink.href = URL.createObjectURL(file);
            fileLink.target = '_blank';
            fileLink.textContent = 'View File';
            // Append file info and link to fileInfo div
            fileInfo.appendChild(fileDiv);
            fileInfo.appendChild(fileLink);
            fileInfo.appendChild(document.createElement('br'));
        }
        // Display file info
        fileInfo.style.display = 'block';
    } else {
        // Hide file info if no files are selected
        fileInfo.style.display = 'none';
    }
}
// Function to format file size
function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}
