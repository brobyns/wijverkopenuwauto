@extends('layouts.app')

@section('content')
<div class="container content center-xs">
    <section class="section--contact">
        {{ Form:: open(array('action' => 'ContactController@contactRequest')) }}
        <div class="row">
            <div class="col-xs-12">
                <h2>Vragen?</h2>
                <h3>Neem gerust contact op met ons</h3>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::text('name', null,
                            array('required',
                                  'class'=>'input-manual',
                                  'placeholder'=>'Your name')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::text('email', null,
                                array('required',
                                      'class'=>'input-manual',
                                      'placeholder'=>'Your email address')) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {!! Form::text('subject', null,
                                array('required',
                                      'class'=>'input-manual',
                                      'placeholder'=>'Subject')) !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                {!! Form::textarea('subject', null,
                    array('required','class'=>'input-manual',
                            'placeholder'=>'Message')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                {!! Form::submit('Contact Us!',
                     array('class'=>'input-submit')) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </section>
    <section class="section--maps">
        <div id="map">

        </div>
    </section>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        initMap();
    });
    function initMap() {
        var myLatLng = {lat: 50.816830, lng: 4.511723};
        var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 14,
            scrollwheel: false,
            styles: [{"featureType":"landscape","stylers":[{"hue":"#FFBB00"},{"saturation":43.400000000000006},{"lightness":37.599999999999994},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#FFC200"},{"saturation":-61.8},{"lightness":45.599999999999994},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":51.19999999999999},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FF0300"},{"saturation":-100},{"lightness":52},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#0078FF"},{"saturation":-13.200000000000003},{"lightness":2.4000000000000057},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#00FF6A"},{"saturation":-1.0989010989011234},{"lightness":11.200000000000017},{"gamma":1}]}]
        });
        var marker = new google.maps.Marker({
            map: map,
            position: myLatLng,
            title: 'Dr. Michel Robyns'
        });
    }
    google.maps.event.addListener(map, 'click', function(event){
        if (map.draggable) {
            this.setOptions({draggable:false});
        } else {
            this.setOptions({draggable:true});
        }
        if (map.scrollwheel) {
            this.setOptions({scrollwheel:false});
        } else {
            this.setOptions({scrollwheel:true});
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt5y3GX_RhFAnvJFgzBhCptyIkWvOJiAI&callback=initMap"
        async defer></script>
@endsection