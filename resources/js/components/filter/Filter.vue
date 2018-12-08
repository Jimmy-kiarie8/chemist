<template>
<v-app>
    <div v-show="loader" style="text-align: center; width: 100%; margin-top: 200px;">
        <v-progress-circular :width="3" indeterminate color="red" style="margin: 1rem"></v-progress-circular>
    </div>
    <!-- <img src="storage/cover/land.jpg" alt="" style="height: 200px;"> -->
    <v-layout wrap class="container" v-show="!loader">
        <!-- <v-flex sm3>
        <mySidebar></mySidebar>
    </v-flex> -->
        <!-- <h1 class="text-center">{{ category.name }}</h1><br> -->
        <!-- <v-divider></v-divider> -->
        <v-flex sm12 v-if="products.data.length >= 1">
            <v-layout wrap>
                <v-flex sm3 v-for="(bestS, index) in products.data" :key="index" :ref="`bestS_${index}`" @mouseover="hoverCard(index)" @mouseout="hoverCard(-1)">
                    <v-card>
                        <v-card-title id="container">
                            <h4 class="text-center">{{ bestS.name }}</h4><br>
                        </v-card-title>
                            <v-divider></v-divider>
                            <v-card-text>
                                <div class="image-container">
                                    <img class="d-block w-100" :src="'/storage/products/'+bestS.image" alt="First slide"
                    :class="{'selected': isSelected(index)}" @mouseover="hoverCard(index)" @mouseout="hoverCard(-1)">

                                    <!-- <div class="after">This is some content</div> -->
                                    <div class="caption after text-center" :class="{'selected': isSelected(index)}">
                                        <!-- <v-btn color="primary" flat style="margin: auto;" @click="view(bestS)">view bestS</v-btn>  -->
                                        <div id="tooltip">
                                            <v-tooltip bottom class="" data-wow-delay="0.4s">
                                                <v-btn icon class="mx-0" slot="activator" @click="view(bestS)" style="margin-top: 100px;">
                                                    <v-icon color="info darken-2" small>visibility</v-icon>
                                                </v-btn>
                                                <span>view bestS</span>
                                            </v-tooltip>
                                            <v-tooltip bottom class="" data-wow-delay="0.8s">
                                                <v-btn icon class="mx-0" slot="activator" @click="wishList(bestS)" style="margin-top: 100px;">
                                                    <v-icon color="success darken-2" small>favorite</v-icon>
                                                </v-btn>
                                                <span>Wish list</span>
                                            </v-tooltip>
                                            <v-tooltip bottom class="" data-wow-delay="1.2s">
                                                <v-btn icon class="mx-0" slot="activator" @click="addToCart(bestS.id)" style="margin-top: 100px;">
                                                    <v-icon color="orange darken-2" small>shopping_cart</v-icon>
                                                </v-btn>
                                                <span>Add To Cart</span>
                                            </v-tooltip>
                                        </div>
                                    </div>
                                </div>
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-text>
                                <h4 class="text-center">{{ bestS.name }}</h4>
                                <!-- <v-divider></v-divider> -->
                                <p class="text-center">KSH {{ bestS.price }}</p>
                            </v-card-text>
                    </v-card>
                </v-flex>
                <div v-show="nextPage" style="text-align: center; width: 100%;">
                    <v-progress-circular :width="3" indeterminate color="red" style="margin: 1rem"></v-progress-circular>
                </div>
                <div class="text-xs-center" style="margin: auto; width: 100%;">
                    <v-pagination v-model="products.current_page" :length="products.last_page" total-visible="4" @input="next(products.path, products.current_page, 'bestSell')" circle></v-pagination>
                </div>
                <v-snackbar :timeout="timeout" top="top" :color="color" right="right" v-model="snackbar">
                    {{ message }}
                    <v-icon dark right>check_circle</v-icon>
                </v-snackbar>
            </v-layout>
            <v-divider></v-divider>
        </v-flex>
        <p class="text-center" v-else>No items in this Category</p>
        <myShow></myShow>
    </v-layout>
</v-app>
</template>

<script>
import myShow from '../home/Show'
export default {
    components: {
        myShow
    },
    data() {
        return {
            products: {
                data: []
            },
            timeout: 5,
            snackbar: false,
            color: "black",
            message: "",
            nextPage: false,
            showP: false,
            selectedCard: -1,
            featured: [],
            bestSell: [],
            newProduct: [],
            category: [],
            loader: false,
        };
    },
    methods: {
        hoverCard(selectedIndex) {
            this.selectedCard = selectedIndex;
            // this.animateCards()
        },
        isSelected(cardIndex) {
            return this.selectedCard === cardIndex;
        },
        view(product) {
            eventBus.$emit("viewProEvent", product);
        },
        wishList() {},
        addToCart(cart) {
            eventBus.$emit("addCartEvent", cart);
        },

        next(page, current_page, resp) {
            // console.log(resp)
            this.nextPage = true;
            axios
                .post(page + `?page=` + current_page, this.form)
                .then(response => {
                    this.nextPage = false;
                    if (resp === 'featured') {
                        // alert('featered')
                        this.featured = response.data;
                    } else if (resp === 'newProduct') {
                        // alert('newProduct')
                        this.newProduct = response.data;
                    } else if (resp === 'bestSell') {
                        // alert('bestSell')
                        this.bestSell = response.data;
                    } else {
                        // alert('nooop')
                    }
                });
        },
        // next(page) {
        //     this.nextPage = true;
        //     axios
        //         .get(
        //             this.products.path + `?page=` + this.products.current_page,
        //             this.form
        //         )
        //         .then(response => {
        //             this.nextPage = false;
        //             this.products = response.data;
        //         });
        // },
        getProducts() {
            axios
                .get("/products")
                .then(response => {
                    this.products = response.data;
                })
                .catch(error => {
                    this.loading = false;
                    this.errors = error.response.data.errors;
                });
        }
    },
    mounted() {
        // this.loader = true
        // console.log(this.$route.query)
        // this.products = this.$route.query.products
        this.loader = false
    },

    created() {
        this.loader = true
        eventBus.$on("filterEvent", data => {
            // console.log(this.$route.query)
            // this.category = data
            this.products = data
            this.loader = false
        });
    },
    // beforeUpdate() {
    //     alert('update')
    // },

};
</script>

<style scoped>
.w-100 {
    height: 230px;
    transition: height 0.3s, opacity 0.3s;
}

.w-100.selected {
    transition: height 0.6s, opacity 0.6s;
    /* zoom: 1.2; */
    opacity: 0.8;
}

.caption {
    display: none;
}

.caption.selected {
    transition: height 0.6s, opacity 0.6s;
    display: block;
}

#container {
    position: relative;
    width: 100%;
    height: 100%;
}

#container.after {
    position: absolute;
    color: #000;
    display: none;
}

#container:hover.after {
    display: block;
    background: rgba(0, 0, 0, 6);
}

.image-container {
    position: relative;
    height: 230px;
    width: 100%;
}

.image-container .after {
    position: absolute;
    top: 0;
    left: 0;
    height: 230px;
    width: 100%;
    display: none;
    color: #fff;
}

.image-container:hover .after {
    display: block;
    background: rgba(0, 0, 0, 0.6);
}

#tooltip .v-btn {
    background: rgba(240, 240, 240, 0.26);
}

#tooltip .v-btn:hover {
    background: rgba(0, 0, 0, 0.24);
}

.v-btn .v-btn__content .v-icon {
    box-shadow: 0 9px 30px -6px rgba(255, 54, 54, 0.5);
}

/* .theme--light.v-pagination .v-pagination__item {
    display: none !important;
} */
</style>
