<x-base-layout>
    <x-guest.breadcrumb-section title="Our Rooms" :items="[
        'Home' => route('home-page'),
        'Rooms' => route('room-page')
    ]" />

    <div class="room-page-section | padding-block-400">
        <div class="container">
            <ul class="room-list | row">
                <li class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="room-item__image">
                            <img src="{{ asset('./img/room/room-1.jpg') }}" alt="">
                        </div>
                        <div class="room-item__content | padding-block-400 padding-inline-400 flow" style="--flow-spacer:.5rem">
                            <h3 class="room-item__title | text-center fs-normal-heading">Deluxe Room</h3>
                            <div class="justify-center">
                                <button class="button" data-type="inverted">More details</button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="room-item__image">
                            <img src="{{ asset('./img/room/room-2.jpg') }}" alt="">
                        </div>
                        <div class="room-item__content | padding-block-400 padding-inline-400 flow" style="--flow-spacer:.5rem">
                            <h3 class="room-item__title | text-center fs-normal-heading">King Room</h3>
                            <div class="justify-center">
                                <button class="button" data-type="inverted">More details</button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <div class="room-item__image">
                            <img src="{{ asset('./img/room/room-3.jpg') }}" alt="">
                        </div>
                        <div class="room-item__content | padding-block-400 padding-inline-400 flow" style="--flow-spacer:.5rem">
                            <h3 class="room-item__title | text-center fs-normal-heading">Premium Room</h3>
                            <div class="justify-center">
                                <button class="button" data-type="inverted">More details</button>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</x-base-layout>