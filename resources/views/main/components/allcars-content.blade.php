<div class="all-cars-wrapper">
    <div class="all-cars-section">
            <div class="header">
                <div class="lines"></div>
                <div><h3>Car Rentals</h3></div>
                <div class="lines"></div>
            </div>

        <div class="all-cars-row">


        <!-- CAR PRODUCT -->
            @foreach($addcar as $item)
                @if ($item->is_active == true)
                <div class="car-wrapper">
             
                        <div class="car-col-1">

                        <img src="/images/uploads/{{ $item->carphoto }}"
                        id="allcars-img" style="object-fit: cover;"/>
                        </div>


                        <div class="car-col-2">

                            <div class="d-flex flex-column" style="gap: 10px;">
                                <span class="text-center car-card-title">{{ $item->brand}} {{ $item->model}}</span>
                                <span class=""><p class="transmission">{{ $item->transmission}} Transmission</p></span>
                            </div>

                                <p class="location">{{ $item->carlocation}}</p>

                            <div class="d-flex flex-column align-items-start prices" style="gap: 10px;">
                                <span><h6>₱ {{ number_format($item->dailyrate) }} / Daily</h6></span>
                                <span><h6>₱ {{ number_format($item->weeklyrate) }} / Weekly</h6></span>
                                <span><h6>₱ {{ number_format($item->monthlyrate) }} / Monthly</h6></span>
                            </div>

                            <div class="d-flex flex-column align-items-start mt-1" style="gap: 10px;">
                                <span><h6><i class="fas fa-user" style="margin-right: 10px;"></i>{{ $item->seats }} Seaters</h6></span>
                                <span><h6><i class="fas fa-gas-pump" style="margin-right: 10px;"></i>{{ $item->fuel }}</h6></span>
                            </div>

                            
                            <div class="carbuttons">
                                <a href="/bookingforms/{{ $item->slug }}" class="btn-checkout text-decoration-none">
                                    <span><i class="fas fa-caret-right"></i></span>
                                    <span>BOOK NOW</span>
                                </a>
                            </div>

                        </div>

                </div>
                @endif
            
            @endforeach


        </div>
    </div>
</div>