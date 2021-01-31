@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.points.map'))

@section('breadcrumb-links')
    @include('backend.points.electricity.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.points.electricity') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7">
                    @include('backend.points.electricity.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div id="googleMap" style="width:100%;height:650px;"></div>

        </div><!--card-body-->
    </div><!--card-->
@endsection
@push('after-scripts')
    <script type="text/javascript">

        var points = {!! json_encode($points) !!};
        function InitMap() {
            var locations = [];
            var point;
            for (point of points) {
                locations.push({
                    lat: point.gps_lat,
                    lng: point.gps_long,
                    label: point.name.charAt(0).toUpperCase(),
                    draggable: false,
                    title: point.name,
                    www: `/admin/point/electricity/${point.uuid}/edit`
                })
            }

            console.log('the locations', locations);
            

            var map = new google.maps.Map(document.getElementById('googleMap'), {
                center: {
                    lat: locations[0].lat,
                    lng: locations[0].lng
                }, zoom: 10
            });
            var markers = locations.map(function (location, i) {
                var contentString = "<a href=\"" + location.www + "\"><strong>" + location.title + "</strong></a>";
                var infoWindow = new google.maps.InfoWindow({content: contentString, maxWidth: 200});
                var marker = new google.maps.Marker({
                    position: location,
                    label: location.label,
                    map: map,
                    title: location.title,
                    contentString: contentString
                });
                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });
                return marker;
            });
        }
        if (window.google && window.google.maps) {
            InitMap();
        }

    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('services.google.maps.key')}}&callback=InitMap&libraries=&v=weekly"></script>
@endpush