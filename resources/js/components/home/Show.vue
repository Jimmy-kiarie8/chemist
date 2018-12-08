<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="1000px">
        <v-card v-if="dialog">
            <v-card-title>
                <h1 class="headline" style="margin-left: 43%;">{{ productD.name }}</h1>
                <v-spacer></v-spacer>
                <v-btn icon dark @click="close">
                    <v-icon color="black">close</v-icon>
                </v-btn>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-layout wrap>
                    <v-flex sm6>
                        <img :src="'/storage/products/'+productD.image" alt="" style="height: 300px; width: 300px;">
                    </v-flex>
                    <v-divider vertical></v-divider>
                    <v-flex sm4 offset-sm1>
                        {{ productD.name }}
                        <v-divider></v-divider>
                        {{ productD.description }}

                    </v-flex>
                </v-layout>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-tooltip bottom>
                    <v-btn icon class="mx-0" @click="addToCart()" slot="activator">
                        <v-icon color="orange darken-2">shopping_cart</v-icon>
                    </v-btn>
                    <span>Add To Cart</span>
                </v-tooltip>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click.native="close">Close</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>
</template>

<script>
export default {
    data() {
        return {
            dialog: false,
            productD: [],
        }
    },
    methods: {
        addToCart() {
            eventBus.$emit("addCartEvent", this.productD.id);
        },
        close() {
            // eventBus.$emit("closeRequest", product);
            this.dialog = false
        }
    },
    created() {
        eventBus.$on("viewProEvent", data => {
            this.productD = data;
            this.dialog = true;
        });
    }
}
</script>

<style>

</style>
