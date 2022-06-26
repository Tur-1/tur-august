<template>
    <div class="col-lg-4 col-md-6">
        <div
            id="carouselExampleControls"
            class="carousel slide"
            data-bs-ride="carousel"
        >
            <!-- product  Images -->
            <div class="carousel-inner">
                <div
                    class="carousel-item"
                    v-for="(image, index) in $page.props.productImages"
                    :key="image.id"
                    :class="{ active: index == 0 }"
                >
                    <img
                        :src="image.image_url"
                        class="d-block w-100"
                        alt="..."
                    />
                </div>

                <button
                    class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev"
                >
                    <span
                        class="carousel-control-prev-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button
                    class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExampleControls"
                    data-bs-slide="next"
                >
                    <span
                        class="carousel-control-next-icon"
                        aria-hidden="true"
                    ></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</template>
