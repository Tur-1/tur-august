<template>
    <div class="col-xl-3 col-lg-4 col-md-4 col-6 mb-4">
        <div class="card">
            <span class="card-img-top" />

            <div class="card-body d-flex flex-column p-1">
                <span class="text-1" />
                <span class="text-2" />
                <span class="text-3" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.card {
    border: none;
}
.card-img-top {
    width: 245px;
    height: 350px;
    background-color: #eee;
    border-radius: 5px;
}

.text-1,
.text-2,
.text-3 {
    background-color: #eee;
    border-radius: 5px;
    margin-bottom: 5px;
    height: 12px;
}
.text-1 {
    width: 60px;
}
.text-2 {
    width: 90px;
}
.text-3 {
    width: 70px;
}
</style>
