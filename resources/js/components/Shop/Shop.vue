<template>
  <div>
    <headerP></headerP>
    <div v-show="loader" style="text-align: center; width: 100%; margin-top: 200px;">
      <v-progress-circular :width="3" indeterminate color="red" style="margin: 1rem"></v-progress-circular>
    </div>
    <section class="bgwhite p-t-55 p-b-65" v-show="!loader">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
            <div class="leftbar p-r-20 p-r-0-sm">
              <!--  -->
              <h4 class="m-text14 p-b-7">Categories</h4>

              <ul class="p-b-54">
                <li class="p-t-4">
                  <!-- <v-btn flat color="info" @click="FilterShop(category)">{{ category.name }}</v-btn> -->
                  <!-- <a href="#" class="s-text13 active1">All</a> -->
                  <v-btn raised color="success" @click="catAll" v-if="cat_id === null">All</v-btn>
                  <v-btn flat color="primary" @click="catAll" v-else>All</v-btn>
                </li>

                <li class="p-t-4" v-for="category in categories" :key="category.id">
                  <v-btn
                    raised
                    color="success"
                    @click="catId(category.id)"
                    v-if="category.id === cat_id"
                  >{{ category.name }}</v-btn>
                  <v-btn flat color="primary" @click="catId(category.id)" v-else>{{ category.name }}</v-btn>
                </li>
              </ul>

              <!--  -->
              <h4 class="m-text14 p-b-32">Filters</h4>

              <!-- <div class="filter-price p-t-22 p-b-50 bo3">
                <div class="m-text15 p-b-17">Price</div>

                <div class="wra-filter-bar">
                  <div id="filter-bar"></div>
                </div>

                <div class="flex-sb-m flex-w p-t-16">
                  <div class="w-size11">
                    <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4">Filter</button>
                  </div>

                  <div class="s-text3 p-t-10 p-b-10">
                    Range: KSH 
                    <span id="value-lower">610</span> - KSH 
                    <span id="value-upper">980</span>
                  </div>
                </div>
              </div>-->
              <div class="filter-color p-t-22 p-b-50 bo3">
                <div class="m-text15 p-b-12">Color</div>

                <ul class="flex-w">
                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter1"
                      type="checkbox"
                      name="color-filter1"
                    >
                    <label class="color-filter color-filter1" for="color-filter1"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter2"
                      type="checkbox"
                      name="color-filter2"
                    >
                    <label class="color-filter color-filter2" for="color-filter2"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter3"
                      type="checkbox"
                      name="color-filter3"
                    >
                    <label class="color-filter color-filter3" for="color-filter3"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter4"
                      type="checkbox"
                      name="color-filter4"
                    >
                    <label class="color-filter color-filter4" for="color-filter4"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter5"
                      type="checkbox"
                      name="color-filter5"
                    >
                    <label class="color-filter color-filter5" for="color-filter5"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter6"
                      type="checkbox"
                      name="color-filter6"
                    >
                    <label class="color-filter color-filter6" for="color-filter6"></label>
                  </li>

                  <li class="m-r-10">
                    <input
                      class="checkbox-color-filter"
                      id="color-filter7"
                      type="checkbox"
                      name="color-filter7"
                    >
                    <label class="color-filter color-filter7" for="color-filter7"></label>
                  </li>
                </ul>
              </div>

              <div class="search-product pos-relative bo4 of-hidden">
                <input
                  class="s-text7 size6 p-l-23 p-r-50"
                  type="text"
                  name="search-product"
                  placeholder="Search Products..."
                >
                
                <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                  <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
            <!--  -->
            <div class="flex-sb-m flex-w p-b-35">
              <div class="flex-w">
                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                  <!-- <v-layout wrap> -->
                  <v-flex xs12 sm12>
                    <v-select
                      :items="items"
                      v-model="itemSelect"
                      label="Filter By"
                      single-line
                      item-text="state"
                      item-value="abbr"
                      return-object
                      persistent-hint
                      @change="FilterShop"
                    ></v-select>
                  </v-flex>

                  <!-- </v-layout> -->
                  <!-- <select class="selection-2" name="sorting">
                    <option>Default Sorting</option>
                    <option>Popularity</option>
                    <option>Price: low to high</option>
                    <option>Price: high to low</option>
                  </select>
                  -->
                </div>
                <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                  <v-flex xs12 sm12>
                    <v-select
                      :items="price"
                      v-model="priceSelect"
                      label="Filter By Price"
                      single-line
                      item-text="state"
                      item-value="state"
                      return-object
                      persistent-hint
                      @change="FilterShop"
                    ></v-select>
                  </v-flex>
                  <!-- <select class="selection-2" name="sorting">
                    <option>Price</option>
                    <option>KSH 0.00 - KSH 50.00</option>
                    <option>KSH 50.00 - KSH 100.00</option>
                    <option>KSH 100.00 - KSH 150.00</option>
                    <option>KSH 150.00 - KSH 200.00</option>
                    <option>KSH 200.00+</option>
                  </select>-->
                </div>
              </div>

              <span class="s-text8 p-t-5 p-b-5">Showing 1–12 of 16 results</span>
            </div>

            <!-- Product -->
            <div class="row">
              <div
                class="col-sm-12 col-md-6 col-lg-4 p-b-50"
                v-for="product in products.data"
                :key="product.id"
              >
                <!-- Block2 -->
                <div class="block2">
                  <div
                    class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew"
                    v-if="product.new_product === 1"
                  >
                    <img :src="'/storage/products/'+product.image" alt="IMG-PRODUCT">

                    <div class="block2-overlay trans-0-4">
                      <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                      </a>

                      <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <v-btn color="success" @click="addToCart(product.id)">Add to Cart</v-btn>
                      </div>
                    </div>
                  </div>

                  <div class="block2-img wrap-pic-w of-hidden pos-relative" v-else>
                    <img :src="'/storage/products/'+product.image" alt="IMG-PRODUCT">

                    <div class="block2-overlay trans-0-4">
                      <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                      </a>

                      <div class="block2-btn-addcart w-size1 trans-0-4">
                        <!-- Button -->
                        <v-btn color="primary" @click="addToCart(product.id)">Add to Cart</v-btn>
                      </div>
                    </div>
                  </div>

                  <div class="block2-txt p-t-20">
                    <a href="#" class="block2-name dis-block s-text3 p-b-5">{{ product.name }}</a>
                    
                    <span class="block2-price m-text6 p-r-5">{{ product.price }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Pagination -->
          <!-- <div class="pagination flex-m flex-w p-t-26">
            <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
            <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
          </div>-->
          <div class="text-xs-center" style="margin: auto; width: 100%;">
            <v-pagination
              v-model="products.current_page"
              :length="products.last_page"
              total-visible="5"
              @input="next(products.path, products.current_page, 'products')"
              circle
            ></v-pagination>
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
      products: [],
      categories: [],
      items: [
        {
          state: "All"
        },
        {
          state: "New",
          abbr: "new_product"
        },
        {
          state: "Popularity",
          abbr: "best_sell"
        },
        {
          state: "Featured",
          abbr: "featured"
        }
      ],
      itemSelect: {
        abbr: "All",
        state: "All"
      },
      price: [
        {
          state: "All"
        },
        {
          state: "0-500"
        },
        {
          state: "501-1000"
        },
        {
          state: "1000-5000"
        }
      ],
      priceSelect: {
        state: "All"
      },
      loader: false,
      cat_id: null
    };
  },
  methods: {
    catId(item) {
      this.cat_id = item;
      this.FilterShop();
    },
    catAll() {
      this.cat_id = null;
      this.FilterShop();
    },
    getProducts() {
      this.loader = true;
      axios
        .get("/products")
        .then(response => {
          this.loader = false;
          this.products = response.data;
        })
        .catch(error => {
          this.loader = false;
          this.errors = error.response.data.errors;
        });
    },
    addToCart(cart) {
      eventBus.$emit("addCartEvent", cart);
    },

    next(page) {
      eventBus.$emit("progressEvent");
      axios
        .post(this.products.path + `?page=` + this.products.current_page, {
          item: this.cat_id,
          price: this.priceSelect,
          itemSelect: this.itemSelect
        })
        .then(response => {
          eventBus.$emit("StoprogEvent");
          this.products = response.data;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.errors = error.response.data.errors;
        });
    },
    getCategory() {
      axios
        .get("/categories")
        .then(response => {
          this.categories = response.data;
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    },
    FilterShop(item) {
      eventBus.$emit("progressEvent");
      axios
        .post("/FilterShop", {
          item: this.cat_id,
          price: this.priceSelect,
          itemSelect: this.itemSelect
        })
        .then(response => {
          eventBus.$emit("StoprogEvent");
          this.loader = false;
          this.products = response.data;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.loader = false;
          this.errors = error.response.data.errors;
        });
    }
  },
  mounted() {
    this.loader = true;
    this.FilterShop();
    this.getCategory();
  },
  updated() {},
  beforeRouteLeave (to, from, next) {
    // eventBus.$emit("progressEvent");
    next();
  }
};
</script>

<style scoped>
.wrap-pic-w img {
  height: 300px;
}
</style>
