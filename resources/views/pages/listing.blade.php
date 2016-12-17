@extends('layouts.app')

@section('content')
    <div class="wrapper content center-xs">
        <section class="for-sale">
            <div class="vehicle-detail-main">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1">
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="vehicle-detail-gallery">
                                        <div class="photoswipe-container">
                                            <div class="image-slider">
                                                @foreach($listing->images as $image)
                                                    <div>
                                                        <a href="{{ Storage::disk('public')->url($image->path . '/' . $image->name) }}" data-size="600x480">
                                                            <img src="{{ Storage::disk('public')->url($image->path . '/' . $image->name) }}" alt="">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="image-slider-nav">
                                                @foreach($listing->images as $image)
                                                    <img src="{{ Storage::disk('public')->url($image->path . '/' . $image->name) }}">
                                                @endforeach
                                            </div>
                                        </div>
                                        @include('partials.photoswipe')
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="vehicle-detail-header">
                                                <h2>{{$listing->vehicle->brand->name}}
                                                    - {{$listing->vehicle->vehicleModel->name}}</h2>
                                            </div>
                                            <div class="aligner">

                                                <div class="info-basics">
                                                <ul class="vehicle-properties">
                                                    <li>
                                                        <span class="property-name">{{Lang::get('vehicle.firstRegistered')}}</span>
                                                        <span class="property-value">{{$listing->vehicle->present()->first_registered}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="property-name">{{Lang::get('vehicle.kilometers')}}</span>
                                                        <span class="property-value">{{$listing->vehicle->present()->kilometers}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="property-name">{{Lang::get('vehicle.fuelType')}}</span>
                                                        <span class="property-value">{{$listing->vehicle->fuelType->name}}</span>
                                                    </li>
                                                    <li>
                                                        <span class="property-name">{{Lang::get('vehicle.transmission')}}</span>
                                                        <span class="property-value">{{$listing->vehicle->transmission}}</span>
                                                    </li>

                                                </ul>
                                            </div>

                                                <div class="vehicle-detail-contact">
                                                    <a href="#" class="btn btn-block">{{Lang::get('listing.action.info')}}</a>
                                                    <a href="#" class="btn btn-block">{{Lang::get('listing.action.appointment')}}</a>
                                                </div>
                                                <div class="vehicle-detail-tools">
                                                    <a href="#"><i class="fa fa-print" aria-hidden="true"></i> {{Lang::get('listing.action.print')}}</a>
                                                    <a href="mailto:?subject=wijverkopenuwauto.be - Voertuig aanbeveling&amp;body=Hallo,%0D%0A%0D%0A&#10;&#10;Ik heb een voertuig op WijVerkopenUwAuto voor je gevonden:%0D%0A%0D%0A&#10;&#10;Voertuig%0D%0A&#10;________________________________________%0D%0A%0D%0A&#10;&#10;Merk: {{$listing->vehicle->brand->name}}%0D%0A&#10;Model: {{$listing->vehicle->vehiclemodel->name}}%0D%0A&#10;Uitvoering: Dsl 1.6 TDi Sport%0D%0A&#10;Verkoopprijs: {{$listing->price}},-%0D%0A&#10;Kilometerstand: {{$listing->vehicle->present()->kilometers}}%0D%0A&#10;Eerste registratie: {{$listing->vehicle->present()->firstRegistered}}%0D%0A%0D%0A&#10;&#10;Alle details van het voertuig kun je hier vinden: %0D%0A&#10;http%3a%2f%2fwww.wijverkopenuwauto.be%2fte-koop%2f{{$listing->slug}}%0D%0A%0D%0A&#10;Met vriendelijke groeten,">
                                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        {{Lang::get('listing.action.send')}}
                                                    </a>
                                                </div>

                                                <div class="vehicle-detail-share">
                                                    <span>{{Lang::get('listing.action.share')}}</span>
                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                    <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="info-general">
                                    <div class="vehicle-detail-subheader">
                                        <h3>{{Lang::get('listing.title.general')}}</h3>
                                    </div>
                                    <ul>
                                        <li>
                                            {{Lang::get('vehicle.bodyType')}}:
                                            <span>{{$listing->vehicle->body_type}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.power')}}:
                                            <span>{{$listing->vehicle->power}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.gears')}}:
                                            <span>{{$listing->vehicle->n_gears}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.cylinderCapacity')}}:
                                            <span>{!! $listing->vehicle->present()->cylinderCapacity !!}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.cylinders')}}:
                                            <span>{{$listing->vehicle->n_cylinders}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.weight')}}:
                                            <span>{{$listing->vehicle->present()->weightInKilograms}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.co2Emission')}}:
                                            <span>{{$listing->vehicle->present()->co2Emission}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.emissionStandard')}}:
                                            <span>{{$listing->vehicle->emission_standard}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.previousOwners')}}:
                                            <span>{{$listing->vehicle->n_owners}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.doors')}}:
                                            <span>{{$listing->vehicle->n_doors}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.seats')}}:
                                            <span>{{$listing->vehicle->n_seats}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.color')}}:
                                            <span>{{$listing->vehicle->color}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.colorInterior')}}:
                                            <span>{{$listing->vehicle->color_interior}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.interior')}}:
                                            <span>{{$listing->vehicle->interior}}</span>
                                        </li>
                                        <li>
                                            {{Lang::get('vehicle.damaged')}}:
                                            <span>{{($listing->vehicle->damaged == 0) ? 'Nee' : 'Ja'}}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="info-options">
                                    <div class="vehicle-detail-subheader">
                                        <h3>{{Lang::get('listing.title.equipment')}}</h3>
                                    </div>
                                    <ul>
                                        @foreach($listing->vehicle->vehicleProperties as $property)
                                            <li>
                                                <span>{{$property->name}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="info-extra">
                                    <div class="vehicle-detail-subheader">
                                        <h3>{{Lang::get('listing.title.additionalInfo')}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="/js/app.js"></script>
    <script src="/js/all.js"></script>
    <script>
        var goback = $('.slick-prev');
        var goforward = $('.slick-next');
        $(document).ready(slickit());

        $(window).resize(function(){
            slickit();
        });

        function slickit(){
            $('.image-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.image-slider-nav'
            });

            $('.image-slider-nav').slick({
                asNavFor: '.image-slider',
                lazyLoad: 'ondemand',
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    }

                ]
            });
        };

        var initPhotoSwipeFromDOM = function(gallerySelector) {

            // parse slide data (url, title, size ...) from DOM elements
            // (children of gallerySelector)
            var parseThumbnailElements = function(el) {
                var thumbElements = el.childNodes,
                        numNodes = thumbElements.length,
                        items = [],
                        figureEl,
                        linkEl,
                        size,
                        item;

                for(var i = 0; i < numNodes; i++) {

                    figureEl = thumbElements[i]; // <figure> element

                    // include only element nodes
                    if(figureEl.nodeType !== 1) {
                        continue;
                    }

                    linkEl = figureEl.children[0]; // <a> element

                    size = linkEl.getAttribute('data-size').split('x');

                    // create slide object
                    item = {
                        src: linkEl.getAttribute('href'),
                        w: parseInt(size[0], 10),
                        h: parseInt(size[1], 10)
                    };



                    if(figureEl.children.length > 1) {
                        // <figcaption> content
                        item.title = figureEl.children[1].innerHTML;
                    }

                    if(linkEl.children.length > 0) {
                        // <img> thumbnail element, retrieving thumbnail url
                        item.msrc = linkEl.children[0].getAttribute('src');
                    }

                    item.el = figureEl; // save link to element for getThumbBoundsFn
                    items.push(item);
                }

                return items;
            };

            // find nearest parent element
            var closest = function closest(el, fn) {
                return el && ( fn(el) ? el : closest(el.parentNode, fn) );
            };

            // triggers when user clicks on thumbnail
            var onThumbnailsClick = function(e) {
                e = e || window.event;
                e.preventDefault ? e.preventDefault() : e.returnValue = false;

                var eTarget = e.target || e.srcElement;

                // find root element of slide
                var clickedListItem = closest(eTarget, function(el) {
                    return (el.tagName && el.tagName.toUpperCase() === 'DIV');
                });

                if(!clickedListItem) {
                    return;
                }

                // find index of clicked item by looping through all child nodes
                // alternatively, you may define index via data- attribute
                var clickedGallery = clickedListItem.parentNode,
                        childNodes = clickedListItem.parentNode.childNodes,
                        numChildNodes = childNodes.length,
                        nodeIndex = 0,
                        index;

                for (var i = 0; i < numChildNodes; i++) {
                    if(childNodes[i].nodeType !== 1) {
                        continue;
                    }

                    if(childNodes[i] === clickedListItem) {
                        index = nodeIndex;
                        break;
                    }
                    nodeIndex++;
                }



                if(index >= 0) {
                    // open PhotoSwipe if valid index found
                    openPhotoSwipe( index, clickedGallery );
                }
                return false;
            };

            // parse picture index and gallery index from URL (#&pid=1&gid=2)
            var photoswipeParseHash = function() {
                var hash = window.location.hash.substring(1),
                        params = {};

                if(hash.length < 5) {
                    return params;
                }

                var vars = hash.split('&');
                for (var i = 0; i < vars.length; i++) {
                    if(!vars[i]) {
                        continue;
                    }
                    var pair = vars[i].split('=');
                    if(pair.length < 2) {
                        continue;
                    }
                    params[pair[0]] = pair[1];
                }

                if(params.gid) {
                    params.gid = parseInt(params.gid, 10);
                }

                return params;
            };

            var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
                var pswpElement = document.querySelectorAll('.pswp')[0],
                        gallery,
                        options,
                        items;

                items = parseThumbnailElements(galleryElement);

                // define options (if needed)
                options = {

                    // define gallery index (for URL)
                    galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                    getThumbBoundsFn: function(index) {
                        // See Options -> getThumbBoundsFn section of documentation for more info
                        var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                rect = thumbnail.getBoundingClientRect();

                        return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                    }

                };

                // PhotoSwipe opened from URL
                if(fromURL) {
                    if(options.galleryPIDs) {
                        // parse real index when custom PIDs are used
                        // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                        for(var j = 0; j < items.length; j++) {
                            if(items[j].pid == index) {
                                options.index = j;
                                break;
                            }
                        }
                    } else {
                        // in URL indexes start from 1
                        options.index = parseInt(index, 10) - 1;
                    }
                } else {
                    options.index = parseInt(index, 10);
                }

                // exit if index not found
                if( isNaN(options.index) ) {
                    return;
                }

                if(disableAnimation) {
                    options.showAnimationDuration = 0;
                }

                // Pass data to PhotoSwipe and initialize it
                gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
                gallery.init();
            };

            // loop through all gallery elements and bind events
            var galleryElements = document.querySelectorAll( gallerySelector );

            for(var i = 0, l = galleryElements.length; i < l; i++) {
                galleryElements[i].setAttribute('data-pswp-uid', i+1);
                galleryElements[i].onclick = onThumbnailsClick;
            }

            // Parse URL and open gallery if it contains #&pid=3&gid=1
            var hashData = photoswipeParseHash();
            if(hashData.pid && hashData.gid) {
                openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
            }
        };

        // execute above function
        initPhotoSwipeFromDOM('.image-slider');

    </script>
@endsection