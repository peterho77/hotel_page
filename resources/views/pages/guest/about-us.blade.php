<x-base-layout>
    <x-guest.breadcrumb-section title="Our Rooms" :items="[
        'Home' => route('home-page'),
        'About Us' => route('about-us-page')
    ]" />

    <div class="about-us-page-section | padding-block-400">
        <div class="container">
            <div class="about-us__text | padding-block-400 row">
                <div class="col-lg-6">
                    <div class="about-us__title | flow" style="--flow-spacer:1em">
                        <h2 class="fs-secondary-heading">Welcome to Sona.</h2>
                        <p>Built in 1910 during the Belle Epoque period, this hotel is located in the center of Paris,
                            with easy access to the city’s tourist attractions. It offers tastefully decorated rooms.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <ul class="about-us__services-list | flow" style="--flow-spacer:.75em">
                        <li class="align-center">
                            <svg class="icon service-icon" data-size="small">
                                <use xlink:href="{{asset('icon/guest/services-icons.svg#check')}}">
                                </use>
                            </svg>
                            <span class="fs-700">20% Off On Accommodation.</span>
                        </li>
                        <li class="align-center">
                            <svg class="icon service-icon" data-size="small">
                                <use xlink:href="{{asset('icon/guest/services-icons.svg#check')}}">
                                </use>
                            </svg>
                            <span class="fs-700">Complimentary Daily Breakfast</span>
                        </li>
                        <li class="align-center">
                            <svg class="icon service-icon" data-size="small">
                                <use xlink:href="{{asset('icon/guest/services-icons.svg#check')}}">
                                </use>
                            </svg>
                            <span class="fs-700">3 Pcs Laundry Per Day</span>
                        </li>
                        <li class="align-center">
                            <svg class="icon service-icon" data-size="small">
                                <use xlink:href="{{asset('icon/guest/services-icons.svg#check')}}">
                                </use>
                            </svg>
                            <span class="fs-700">Free Wifi.</span>
                        </li>
                        <li class="align-center">
                            <svg class="icon service-icon" data-size="small">
                                <use xlink:href="{{asset('icon/guest/services-icons.svg#check')}}">
                                </use>
                            </svg>
                            <span class="fs-700">Discount 20% On F&B</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="about-us__services | padding-block-600 row row-gap-3">
                <div class="col-lg-4">
                    <div class="about-us__services-item | set-bg-img" data-set-bg="./img/about/about-p1.jpg">
                        <span class="about-us__services-item-title">Restaurants</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-us__services-item | set-bg-img" data-set-bg="./img/about/about-p2.jpg">
                        <span class="about-us__services-item-title">Travel & Camping</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-us__services-item | set-bg-img" data-set-bg="./img/about/about-p3.jpg">
                        <span class="about-us__services-item-title">Event & Party</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="gallery-section | padding-block-400">
        <div class="container">
            <div class="gallery__text | text-center padding-block-400 flow" style="--flow-spacer:.5em">
                <span class="label">Our Gallery</span>
                <h2 class="fs-secondary-heading">Discover Our Work</h2>
            </div>
            <div class="gallery__list | row row-gap-2 padding-block-600">
                <div class="col-lg-6 | flow" style="--flow-spacer:1em">
                    <div class="gallery-item | set-bg-img" data-set-bg="./img/gallery/gallery-1.jpg" style="--bg-item-height:240px">
                        <div class="gallery-item__content | align-center justify-center"><span
                                class="gallery-item__title">Room luxury</span></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="gallery-item | set-bg-img align-center justify-center"
                                data-set-bg="./img/gallery/gallery-4.jpg" style="--bg-item-height:240px">
                                <div class="gallery-item__content | align-center justify-center">
                                    <span class="gallery-item__title">Room luxury
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="gallery-item | set-bg-img" data-set-bg="./img/gallery/gallery-3.jpg"
                                style="--bg-item-height:240px">
                                <div class="gallery-item__content | align-center justify-center"><span
                                        class="gallery-item__title">Room luxury</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gallery-item | set-bg-img" data-set-bg="./img/gallery/gallery-2.jpg">
                        <div class="gallery-item__content | align-center justify-center"><span
                                class="gallery-item__title">Room luxury</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>