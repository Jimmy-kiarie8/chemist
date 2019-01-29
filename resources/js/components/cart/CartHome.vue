<template>
  <div>
    <headerP></headerP>
    <div v-show="loader" style="text-align: center; width: 100%; margin-top: 200px;">
      <v-progress-circular :width="3" indeterminate color="red" style="margin: 1rem"></v-progress-circular>
    </div>
    <section class="cart bgwhite p-t-70 p-b-100" v-show="!loader">
      <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
          <div class="wrap-table-shopping-cart bgwhite">
            <table class="table-shopping-cart">
              <tr class="table-head">
                <th class="column-1"></th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4 p-l-70">Quantity</th>
                <th class="column-5">Total</th>
              </tr>

              <tr class="table-row" v-for="cart in carts" :key="cart.id">
                <td class="column-1">
                  <div class="cart-img-product b-rad-4 o-f-hidden">
                    <img :src="'/storage/products/'+cart.item.image" alt="IMG-PRODUCT">
                  </div>
                </td>
                <td class="column-2">{{ cart.item.name }}</td>
                <td class="column-3">{{ cart.item.price }}</td>
                <td class="column-4">
                  <div class="flex-w bo5 of-hidden w-size17">
                    <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>
                                    <p style="text-align: center; margin: auto;">{{ cart.qty }}</p>

									<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" :value="cart.qty">

									<v-btn class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                    </v-btn>-->
                    <v-btn icon small @click="subtructCart(cart.item.id)">
                      <!-- <v-icon>minimize</v-icon> -->
                      <i class="fa fa-minus"></i>
                    </v-btn>
                    <p style="text-align: center; margin: auto;">{{ cart.qty }}</p>
                    <v-btn icon small @click="addToCart(cart.item.id)">
                      <v-icon>add</v-icon>
                    </v-btn>
                  </div>
                </td>
                <td class="column-5">{{ cart.price }}</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
          <div class="flex-w flex-m w-full-sm">
            <div class="size11 bo4 m-r-10">
              <input
                class="sizefull s-text7 p-l-22 p-r-22"
                type="text"
                name="coupon-code"
                placeholder="Coupon Code"
              >
            </div>

            <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
              <!-- Button -->
              <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Apply coupon</button>
            </div>
          </div>

          <div class="size10 trans-0-4 m-t-10 m-b-10">
            <!-- Button -->
            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Update Cart</button>
          </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
          <h5 class="m-text20 p-b-24">Cart Totals</h5>

          <!--  -->
          <div class="flex-w flex-sb-m p-b-12">
            <span class="s-text18 w-size19 w-full-sm">Subtotal:</span>
            
            <span class="m-text21 w-size20 w-full-sm">KSH {{ getSubTotal }}</span>
          </div>

          <!--  -->
          <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
            <span class="s-text18 w-size19 w-full-sm">Shipping:</span>

            <div class="w-size20 w-full-sm">
              <p
                class="s-text8 p-b-23"
              >There are no shipping methods available. Please double check your address, or contact us if you need any help.</p>

              <span class="s-text19">Calculate Shipping</span>

              <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                <select class="selection-2" name="country">
                  <option>Select a country...</option>
                  <option>US</option>
                  <option>UK</option>
                  <option>Japan</option>
                </select>
              </div>

              <div class="size13 bo4 m-b-12">
                <input
                  class="sizefull s-text7 p-l-15 p-r-15"
                  type="text"
                  name="state"
                  placeholder="State /  country"
                >
              </div>

              <div class="size13 bo4 m-b-22">
                <input
                  class="sizefull s-text7 p-l-15 p-r-15"
                  type="text"
                  name="postcode"
                  placeholder="Postcode / Zip"
                >
              </div>

              <div class="size14 trans-0-4 m-b-10">
                <!-- Button -->
                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Update Totals</button>
              </div>
            </div>
          </div>

          <!--  -->
          <div class="flex-w flex-sb-m p-t-26 p-b-30">
            <span class="m-text22 w-size19 w-full-sm">Total:</span>
            
            <span class="m-text21 w-size20 w-full-sm">KSH {{ getTotal }}</span>
          </div>

          <div class="size15 trans-0-4">
            <!-- Button -->
            <form action="/createpayment" method="post">
              <input type="hidden" name="_token" :value="csrf">
              <button
                type="submit"
                style="height: 44px;"
                class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"
              >Proceed to Checkout</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import headerP from "../include/Headerpartial";
export default {
  components: {
    headerP
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      carts: [],
      loader: false,
      totalPrice: 0,
      discount: 0,
      coupon: ""
    };
  },
  methods: {
    getCart() {
      axios.get("/getCart").then(response => {
          eventBus.$emit("StoprogEvent");
        this.carts = response.data;
        this.loader = false;
        eventBus.$emit("cartEvent", response.data);
      });
    },

    subtructCart(cart) {
      eventBus.$emit("progressEvent");
      // eventBus.$emit("loadingRequest");
      axios
        .post(`/subToCart/${cart}`)
        .then(response => {
          eventBus.$emit("StoprogEvent");
          eventBus.$emit("cartEvent", response.data);
          eventBus.$emit("alertRequest", 'Cart Reduced');
          this.carts = response.data;
          // this.message = "added";
          // this.snackbar = true;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.loading = false;
          this.errors = error.response.data.errors;
        });
    },
    addToCart(cart) {
      eventBus.$emit("addCartEvent", cart);
    }
  },
  mounted() {
    this.loader = true;
    this.getCart();
  },
  created() {
    eventBus.$on("cartEvent", data => {
      this.carts = data;
      this.cartAdd = true;
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
  }
};
</script>

<style>
</style>
