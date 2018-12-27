<template>
<div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div v-for="(product, index) in products.slice(0,20)" :key="index" v-if="index === 0" class="carousel-item active">
                <div class="row">
                    <div class="col-md-4">
                        <img :src="'storage/products/'+product.image" class="d-block w-100" :alt="product.name">
                </div>
                    </div>
                    <!-- {{ iChange() }} -->
                </div>
                <div v-for="(product, index) in products.slice(0,20)" :key="index" v-if="index > 0" class="carousel-item">
                    <!-- {{ iChange() }} -->
                    <div class="row">
                        <div class="col-md-4">
                            <img :src="'storage/products/'+product.image" class="d-block w-100" :alt="product.name"></div>
                        </div>
                    </div>
                </div>
                <a
        class="carousel-control-prev"
        href="#carouselExampleControls"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
                <a
        class="carousel-control-next"
        href="#carouselExampleControls"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
            </div>
        </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
            i: 1,
            next_item: true
        };
    },
    methods: {
        iChange() {
            this.i = this.i + 1
        }
    },
    mounted() {
        axios
            .get("/getProducts")
            .then(response => {
                this.products = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });

        // axios
        //     .get("/newProA")
        //     .then(response => {
        //         this.newProA = response.data;
        //     })
        //     .catch(error => {
        //         // this.loading = false;
        //         this.errors = error.response.data.errors;
        //     });

        // axios
        //     .get("/featuredA")
        //     .then(response => {
        //         this.featuredA = response.data;
        //     })
        //     .catch(error => {
        //         // this.loading = false;
        //         this.errors = error.response.data.errors;
        //     });
    }
};
</script>

<style scoped>
img {
    height: 200px !important;
    width: 200px !important;
}
</style>
