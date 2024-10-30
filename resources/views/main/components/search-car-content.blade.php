<section style="margin-top: 110px;" class="all-cars-section">
    <p class="pb-4">Search Cars</p>

    @if (count($cars) > 0)
    <p>Search Results for "{{ $searchTerm }}"</p>

    <div class="all-cars-row">

         <!-- CAR PRODUCT -->
         @foreach($cars as $item)
                @if ($item->is_active == true)
                <div class="car-wrapper">
                    <a href="/mainviewcar/{{ $item->slug }}" class="text-dark car-link" style="text-decoration: none;" title="View Car">
                
                        <div class="car-col-1">

                        <img src="/images/uploads/{{ $item->carphoto }}"
                        id="allcars-img" style="object-fit: cover;"/>
                        </div>


                        <div class="car-col-2">

                            <div class="d-flex" style="gap: 10px;">
                                <h5 class="brand"><strong>{{ $item->brand}} {{ $item->model}}</strong></h5> 
                                <p class="transmission">{{ $item->transmission}}</p>
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
                                <span><h6><i class="fas fa-fill" style="margin-right: 10px;"></i>{{ $item->color }}</h6></span>

                            </div>
                    </a>
                            
                            <div class="carbuttons">
                                <a href="/mainviewcar/{{ $item->slug }}" class="btn-addcart">
                                    <span><i class="far fa-car"></i></span>
                                    <span>VIEW CAR</span>
                                </a>
                                

                                <a href="/bookingforms/{{ $item->slug }}" class="btn-checkout text-decoration-none">
                                    <span><i class="fas fa-caret-right"></i></span>
                                    <span>BOOK NOW</span>
                                </a>
                            
                            </div>

                        </div>

                </div>
                @endif
            
            @endforeach

    @else
    <p>No results found for "{{ $searchTerm }}".</p>
    @endif
</section>