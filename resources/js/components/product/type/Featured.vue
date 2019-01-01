<template>
<v-container fluid grid-list-md>
    <v-data-iterator :items="featured" :rows-per-page-items="rowsPerPageItems" :pagination.sync="pagination" content-tag="v-layout" row wrap>
        <v-toolbar slot="header" class="mb-2" color="white darken-5" dark flat>
            <v-toolbar-title style="color: #000; margin: auto;">Featured</v-toolbar-title>
        </v-toolbar>

        <v-flex slot="item" slot-scope="props" xs12 sm6 md4 lg3>
            <v-card>
                <v-card-title>
                    <h4>{{ props.item.name }}</h4>
                </v-card-title>
                <v-divider></v-divider>
                <v-content>
                    <div class="image-container">
                        <img class="d-block w-100" :src="'/storage/products/'+props.item.image" alt="First slide"
                    :class="{'selected': isSelected(props.item.id)}" @mouseover="hoverCard(props.item.id)" @mouseout="hoverCard(-1)">

                        <!-- <div class="after">This is some content</div> -->
                        <div class="caption after text-center" :class="{'selected': isSelected(props.item.id)}">
                            <!-- <v-btn color="primary" flat style="margin: auto;" @click="view(prod)">view prod</v-btn>  -->
                            <div id="tooltip">
                                <v-tooltip bottom class="" data-wow-delay="0.4s">
                                    <v-btn icon class="mx-0" slot="activator" @click="view(props.item)" style="margin-top: 100px;">
                                        <v-icon color="info darken-2" small>visibility</v-icon>
                                    </v-btn>
                                    <span>view product</span>
                                </v-tooltip>
                                <v-tooltip bottom class="" data-wow-delay="0.8s">
                                    <v-btn icon class="mx-0" slot="activator" @click="wishList(props.item)" style="margin-top: 100px;">
                                        <v-icon color="success darken-2" small>favorite</v-icon>
                                    </v-btn>
                                    <span>Wish list</span>
                                </v-tooltip>
                                <v-tooltip bottom class="" data-wow-delay="1.2s">
                                    <v-btn icon class="mx-0" slot="activator" @click="addToCart(props.item.id)" style="margin-top: 100px;">
                                        <v-icon color="orange darken-2" small>shopping_cart</v-icon>
                                    </v-btn>
                                    <span>Add To Cart</span>
                                </v-tooltip>
                            </div>
                        </div>
                    </div>
                </v-content>
            </v-card>
        </v-flex>
    </v-data-iterator>
</v-container>
</template>

<script>
export default {
    data: () => ({
        rowsPerPageItems: [4, 8, 12],
        pagination: {
            rowsPerPage: 4
        },
        selectedCard: -1,
        featured: [],
    }),
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

        addToCart(cart) {
            eventBus.$emit("addCartEvent", cart);
        },
    },
    mounted() {
        axios.get('/featured')
            .then((response) => {
                this.featured = response.data
            })
    },
}
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
