{{-- call the main layout  --}}
@extends('layout')
{{-- for the titile of the page  --}}
@section('title') Product Listing @parent @endsection
{{-- additional style here intended for this blade  --}}
@section('styles')
@endsection
{{-- for the content of the page  --}}
@section('content')
@include('components.header')
@include('components.sidebar')

<label for="region">Region:</label>
    <select id="region">
        <option value="">Select Region</option>
        <!-- Populate regions dynamically -->
    </select>

    <label for="province">Province:</label>
    <select id="province" disabled>
        <option value="">Select Province</option>
        <!-- Populate provinces dynamically -->
    </select>

    <label for="city">City:</label>
    <select id="city" disabled>
        <option value="">Select City</option>
        <!-- Populate cities dynamically -->
    </select>

    <label for="barangay">Barangay:</label>
    <select id="barangay" disabled>
        <option value="">Select Barangay</option>
        <!-- Populate barangays dynamically -->
    </select>

<script>
    // fetch('http://localhost:8000/api/region')
    // .then(response => response.json())
    // .then(data => console.log(data))
    // .catch(error => console.error('Error:', error));
</script>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Fetch and populate regions
        $.get('http://localhost:8000/api/region', function(data) {
            $.each(data, function(index, region) {
                $('#region').append(new Option(region.description, region.id));
            });
        });

        // On region change, fetch provinces
        $('#region').change(function() {
            const regionId = $(this).val();
            $('#province').empty().append(new Option("Select Province", "")).prop('disabled', !regionId);
            $('#city').empty().append(new Option("Select City", "")).prop('disabled', true);
            $('#barangay').empty().append(new Option("Select Barangay", "")).prop('disabled', true);

            if (regionId) {
                $.get(`http://localhost:8000/api/region/${regionId}/provinces`, function(data) {
                    $.each(data, function(index, province) {
                        $('#province').append(new Option(province.description, province.id));
                    });
                });
            }
        });

        // On province change, fetch cities
        $('#province').change(function() {
            const provinceId = $(this).val();
            $('#city').empty().append(new Option("Select City", "")).prop('disabled', !provinceId);
            $('#barangay').empty().append(new Option("Select Barangay", "")).prop('disabled', true);

            if (provinceId) {
                $.get(`http://localhost:8000/api/provinces/${provinceId}/cities`, function(data) {
                    $.each(data, function(index, city) {
                        $('#city').append(new Option(city.description, city.id));
                    });
                });
            }
        });

        // On city change, fetch barangays
        $('#city').change(function() {
            const cityId = $(this).val();
            $('#barangay').empty().append(new Option("Select Barangay", "")).prop('disabled', !cityId);

            if (cityId) {
                $.get(`http://localhost:8000/api/cities/${cityId}/barangays`, function(data) {
                    $.each(data, function(index, barangay) {
                        $('#barangay').append(new Option(barangay.description, barangay.id));
                    });
                });
            }
        });
    });
</script>
@endsection
