<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card v-if="dialog">
            <v-card-title fixed>
                <v-spacer></v-spacer>
                <v-btn icon dark @click="close">
                    <v-icon color="black">close</v-icon>
                </v-btn>
            </v-card-title>

            <div class="card">
                <div class="card-header">
                    <ul class="list-group text-center">
                        <li class="list-group-item active">{{ order.buyer_id }}'s' Orders</li>
                    </ul>
                </div>
                <div class="card-body" v-for="cart in order.cart" :key="cart.id">
                    <li class="list-group-item">
                        <span class="badge" style="float: right; color: #fff; background: #000;">{{ cart.item.price }}</span>
                        {{ cart.item.name }} | {{ cart.qty }}
                    </li>
                </div>
                <div class="card-footer">
                    <b>Tax:
                        <span class="badge" style="float: right; color: #fff; background: #f00;">Ksh{{ getSubTotal }}</span>
                    </b>
                    <strong>Subtotal:
                        <span class="badge" style="float: right; color: #fff; background: #f00;">Ksh{{ getSubTotal }}</span>
                    </strong>
                </div>
            </div>
            <v-card-actions>
                <v-btn flat @click="close">Close</v-btn>
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
            carts: [],
            order: [],
            totalPrice: '',
            discount: 0,
        };
    },
    methods: {
        close() {
            // eventBus.$emit("closeRequest", product);
            this.dialog = false;
        }
    },
    created() {
        eventBus.$on("viewOrdEvent", data => {
            this.order = data;
            this.carts = data.cart;
            this.dialog = true;
        });
    },
    
    computed: {
        getSubTotal() {
            if (this.carts.length > 0) {
                this.totalPrice = 0;
                for (let index = 0; index < this.carts.length; index++) {
                    const element = this.carts[index];
                    this.totalPrice = parseInt(element.price) + this.totalPrice;
                }
            }
            return this.totalPrice;
        },
        getTotal() {
            if (this.carts.length > 0) {
                return parseInt(this.getSubTotal) - this.discount;
            }
        }
    },
};
</script>

<style scoped>
.badge, .badge-danger, .badge-dark, .badge-default, .badge-info, .badge-primary, .badge-secondary, .badge-success, .badge-warning {
    font-size: 12px !important;
}
</style>
