<div>
    <li class="nav-item">
        <a class="nav-link btn-icon dropdown-toggle float-end  " id="reviews-btn">
            <i class="material-icons md-notifications animation-shake"></i>
            <span class="badge rounded-pill">{{ count($reviews) }}</span>
        </a>
    </li>

    <ul class="dropdown-reviews-menu ">

        <li class="list-group-item text-center ">
            <h4>Reviews</h4>
        </li>
        <div @if (count($reviews) > 5) style="overflow-y: scroll; max-height: 450px" @endif>
            @forelse ($reviews as $review)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-lg-2 col-2  text-center">
                            <img src="{{ $review['user_avatar'] }}" class="rounded-circle ">
                        </div>
                        <div class="col-lg-8 col-8 col-sm-8 col-8">
                            <strong class="text-info"> {{ $review['user_name'] }}</strong>
                            <div class="text-sm-start text-break"
                                style=" text-overflow: ellipsis;  overflow: hidden;  white-space: nowrap;">
                                {{ $review['comment'] }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-content-center">
                            <small class="text-sm-secondary mt-2">
                                {{ $review['date'] }}
                            </small>

                            <a href="{{ route('admin.reviews.show', $review['id']) }}"
                                class="btn btn-sm text-secondary ">
                                show
                            </a>

                        </div>
                    </div>
                </li>
            @empty
                <li class="text-center font-md p-4">
                    No Reviews Found
                </li>
            @endforelse
        </div>



        <li class="text-center p-3 list-group-item">
            <a href="{{ route('admin.reviews.index') }}">View All</a>
        </li>

    </ul>
</div>
@push('script')
    <script>
        let reviewsBtn = document.getElementById("reviews-btn");

        reviewsBtn.addEventListener('click', (e) => {
            let reviewsMenu = document.querySelector('.dropdown-reviews-menu');


            if (reviewsMenu.style.display === "none") {
                reviewsMenu.style.display = "block";
            } else {
                reviewsMenu.style.display = "none";
            }
        });
    </script>
@endpush
