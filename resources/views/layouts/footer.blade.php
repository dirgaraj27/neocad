

<div class="sidebar-overlay" data-reff></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/app.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/feather.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/jquery.slimscroll.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/select2.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"
    type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('plugins/datatables/datatables.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/jquery.waypoints.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/jquery.counterup.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('plugins/apexchart/apexcharts.min.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('plugins/apexchart/chart-data.js')}}" type="de667d3c5b38e24430cc5358-text/javascript"></script>
<script src="{{ asset('js/moment.min.js')}}" type="a3b96eccf10c7aa8aa2d933f-text/javascript"></script>
<script src="{{ asset('js/fullcalendar.min.js')}}" type="a3b96eccf10c7aa8aa2d933f-text/javascript"></script>
<script src="{{ asset('js/jquery.fullcalendar.js')}}" type="a3b96eccf10c7aa8aa2d933f-text/javascript"></script>
<script src="{{ asset('js/rocket-loader.min.js')}}" data-cf-settings="de667d3c5b38e24430cc5358-|49" defer></script>
<script src="{{ asset('js/custom.js')}}"></script>
<script>
    $(document).ready(function() {
        // Double click event handler to enable editing
        $('tbody').on('dblclick', 'input[type="text"].price-field', function() {
            $(this).prop('readonly', false);
            $(this).closest('tr').find('button.update-price').prop('disabled', false);
        });

        // Update button click event handler
        $('tbody').on('click', 'button.btn-primary', function() {
            // Get the new price value
            var newPrice = $(this).closest('tr').find('input[type="text"].price-field').val();

            // Perform update operation here, for now, let's just log the new price
            console.log('New Price:', newPrice);

            // Disable editing after update
            $(this).closest('tr').find('input[type="text"].price-field').prop('readonly', true);
            $(this).prop('disabled', true);
        });
    });
</script>

