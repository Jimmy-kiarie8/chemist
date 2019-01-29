<template>
  <v-app id="inspire" v-scroll="onScroll">
    <vue-topprogress ref="topProgress"></vue-topprogress>
    <!-- <v-app id="inspire"> -->
    <header class="header2" id="headerq">
      <!-- Header desktop -->
      <div class="wrap_header fixed-header2 trans-0-4">
        <!-- Logo -->
        <router-link @click.native="progressBar" to="/" class="logo">
          <img src="/storage/logo.png" alt="IMG-LOGO">
        </router-link>

        <!-- Mini Menu -->
        <div class="wrap_menu" id="header2">
          <nav class="menu">
            <ul class="main_menu">
              <li>
                <router-link @click.native="progressBar" to="/">Home</router-link>
              </li>

              <li>
                <router-link @click.native="progressBar" to="/shop">Shop</router-link>
              </li>

              <li>
                <router-link @click.native="progressBar" to="/cartHome">Cart</router-link>
              </li>

              <li>
                <router-link @click.native="progressBar" to="/about">About Us</router-link>
              </li>

            </ul>
          </nav>
        </div>

        <!-- Header Icon -->
        <div class="header-icons">
          <a href="#" class="header-wrapicon1 dis-block">
            <img src="/storage/icons/icon-header-01.png" class="header-icon1" alt="ICON">
          </a>
          
          <span class="linedivide1"></span>

          <div class="header-wrapicon2">
            <img
              src="/storage/icons/cart.png"
              class="header-icon1 js-show-header-dropdown"
              alt="ICON"
            >
            <span class="header-icons-noti">{{ cartItems.length }}</span>

            <!-- Header cart noti -->
            <myCart></myCart>
          </div>
          <span class="linedivide2"></span>
          <div class="header-wrapicon2">
            <img
              src="/storage/icons/wish.png"
              class="header-icon1 js-show-header-dropdown"
              alt="ICON"
            >
            <span class="header-icons-noti">{{ wishItems.length }}</span>

            <!-- Header cart noti -->
            <myWish></myWish>
          </div>
        </div>
      </div>

      <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2" style="background: transparent; z-index: 100; margin-top: -54px;">
          <div class="topbar-social">
            <a href="#" class="topbar-social-item fa fa-facebook"></a>
            <a href="#" class="topbar-social-item fa fa-instagram"></a>
            <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
            <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
            <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
          </div>

          <!-- Logo2 -->
          <a href="index.html" class="logo2">
            <img src="/storage/logo.png" alt="IMG-LOGO">
          </a>

          <div class="topbar-child2">
            <span class="topbar-email">healthwise@example.com</span>

            <div class="topbar-language rs1-select2">
              <select class="selection-1" name="time">
                <option>KSH</option>
              </select>
            </div>

            <!--  -->
            <a href="#" class="header-wrapicon1 dis-block m-l-30">
              <img src="/storage/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>
            
            <span class="linedivide1"></span>

            <div class="header-wrapicon2 m-r-13">
              <img
                src="/storage/icons/cart.png"
                class="header-icon1 js-show-header-dropdown"
                alt="ICON"
              >
              <span class="header-icons-noti">{{ cartItems.length }}</span>

              <!-- Header cart noti -->
              <myCart></myCart>
            </div>
            <div class="header-wrapicon2 m-r-13">
              <img
                src="/storage/icons/wish.png"
                class="header-icon1 js-show-header-dropdown"
                alt="ICON"
              >
              <span class="header-icons-noti">{{ wishItems.length }}</span>

              <!-- Header cart noti -->
              <myWish></myWish>
            </div>
          </div>
        </div>

        <div class="wrap_header" style="background: transparent; z-index: 100;">
          <!-- Main Menu -->
          <div class="wrap_menu" id="header1">
            <nav class="menu">
              <ul class="main_menu">
                <li>
                  <router-link @click.native="progressBar" to="/">Home</router-link>
                </li>

                <li>
                  <router-link @click.native="progressBar" to="/shop">Shop</router-link>
                </li>

                <li>
                  <router-link @click.native="progressBar" to="/cartHome">Cart</router-link>
                </li>

                <li>
                  <router-link @click.native="progressBar" to="/about">About Us</router-link>
                </li>
              </ul>
            </nav>
          </div>

          <!-- Header Icon -->
          <div class="header-icons"></div>
        </div>
      </div>

      <!-- Header Mobile -->
      <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="index.html" class="logo-mobile">
          <img src="/storage/logo.png" alt="IMG-LOGO" style="max-width: 100px;">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
          <!-- Header Icon mobile -->
          <div class="header-icons-mobile">
            <a href="#" class="header-wrapicon1 dis-block">
              <img src="/storage/icons/icon-header-01.png" class="header-icon1" alt="ICON">
            </a>
            
            <span class="linedivide2"></span>

            <div class="header-wrapicon2">
              <img
                src="/storage/icons/cart.png"
                class="header-icon1 js-show-header-dropdown"
                alt="ICON"
              >
              <span class="header-icons-noti">{{ cartItems.length }}</span>

              <!-- Header cart noti -->
              <myCart></myCart>
            </div>
            <span class="linedivide2"></span>
            <div class="header-wrapicon2">
              <img
                src="/storage/icons/wish.png"
                class="header-icon1 js-show-header-dropdown"
                alt="ICON"
              >
              <span class="header-icons-noti">{{ wishItems.length }}</span>

              <!-- Header cart noti -->
            <myWish></myWish>
            </div>
          </div>

          <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </div>
        </div>
      </div>

      <!-- Menu Mobile -->
      <div class="wrap-side-menu">
        <nav class="side-menu">
          <ul class="main-menu">
            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
              <span class="topbar-child1">Free shipping for standard order over Ksh1000</span>
            </li>

            <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
              <div class="topbar-child2-mobile">
                <span class="topbar-email">healthwise@example.com</span>

                <div class="topbar-language rs1-select2">
                  <select class="selection-1" name="time">
                    <option>KSH</option>
                  </select>
                </div>
              </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
              <div class="topbar-social-mobile">
                <a href="#" class="topbar-social-item fa fa-facebook"></a>
                <a href="#" class="topbar-social-item fa fa-instagram"></a>
                <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
              </div>
            </li>

            <li>
              <router-link @click.native="progressBar" to="/" style="color: #333">Home</router-link>
              <!-- <a href="index.html">Home</a> -->
              <!-- <ul class="sub_menu">
                <li>
                  <a href="index.html">Homepage V1</a>
                </li>
                <li>
                  <a href="home-02.html">Homepage V2</a>
                </li>
                <li>
                  <a href="home-03.html">Homepage V3</a>
                </li>
              </ul>-->
            </li>

            <li>
              <router-link @click.native="progressBar" to="/shop" style="color: #333">Shop</router-link>
            </li>

            <li>
              <router-link @click.native="progressBar" to="/cartHome" style="color: #333">Cart</router-link>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <v-fab-transition v-if="offsetTop >= 400">
      <v-btn
        color="pink"
        v-scroll-to="'#headerq'"
        dark
        fab
        fixed
        bottom
        right
        ref="button"
      >
        <v-icon>keyboard_arrow_up</v-icon>
      </v-btn>
    </v-fab-transition>
    <v-snackbar
      :timeout="timeout"
      :bottom="y === 'bottom'"
      :color="Scolor"
      :left="x === 'left'"
      v-model="snackbar"
    >
      {{ message }}
      <v-icon dark right>check_circle</v-icon>
    </v-snackbar>
    <!-- <Show></Show> -->
  </v-app>
</template>

<script>
import * as easings from "vuetify/es5/util/easing-patterns";
import { vueTopprogress } from "vue-top-progress";
import myCart from "../cart/Cartvue";
import myWish from "../wish/Wishvue";
// import Show from "../home/Show";
import myShop from "../Shop/Shop";
import CartHome from "../cart/CartHome";
export default {
  // router,
  components: {
    // Show,
    myWish,
    myShop,
    CartHome,
    myCart
  },
  data() {
    return {
      cartItems: [],
      categories: [],
      menus: [],
      drawer: true,
      right: null,
      snackbar: false,
      y: "bottom",
      x: "left",
      Allusers: [],
      Scolor: "",
      timeout: 5000,
      message: "Success",
      offsetTop: 0,
      duration: 1000,
      easing: "easeInOutCubic",
      easings: Object.keys(easings),
      type: "number",
      wishItems: [],
    };
  },
  methods: {
    progressBar() {
      this.$refs.topProgress.start();

      // Use setTimeout for demo
      // setTimeout(() => {
      //   this.$refs.topProgress.done()
      // }, 10000)
    },

    onScroll(e) {
      this.offsetTop = window.pageYOffset || document.documentElement.scrollTop;
      if (this.offsetTop > 200) {
        eventBus.$emit("changeTra");
      } else {
        eventBus.$emit("changeOpr");
      }
    },
    addToCart(cart) {
      console.log(cart);
      eventBus.$emit("progressEvent");
      // eventBus.$emit("loadingRequest");
      axios
        .post(`/cart/${cart}`)
        .then(response => {
          eventBus.$emit("StoprogEvent");
          eventBus.$emit("cartEvent", response.data);
          // this.cart = response.data
          // this.message = "added";
          eventBus.$emit("alertRequest", "Cart Added");
          // this.snackbar = true;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.loading = false;
          this.errors = error.response.data.errors;
        });
    },
    categoryPro(data) {
      // console.log(data)
      eventBus.$emit("filterEvent", data.id);

      // router.go('')
      // this.$router.push(`/filter/${data.id}`)
    },
    unfilter() {
      this.loadingalert();
      eventBus.$emit("unfilterEvent");
    },
    getCart() {
      axios.get("/getCart").then(response => {
        this.cartItems = response.data;
        eventBus.$emit("cartEvent", response.data);
      });
    },
    getWish() {
      eventBus.$emit("progressEvent");
      axios
        .get("/wish")
        .then(response => {
          eventBus.$emit("StoprogEvent");
          this.wishItems = response.data;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.errors = error.response.data.errors;
        });
    },

    addToWish(item) {
      eventBus.$emit("progressEvent");
      // eventBus.$emit("loadingRequest");
      axios
        .patch(`/wish/${item}`)
        .then(response => {
          eventBus.$emit("alertRequest", "Wishlist updated");
          eventBus.$emit("RefWishEvent");
          eventBus.$emit("StoprogEvent");
          this.getWish()
          // this.snackbar = true;
        })
        .catch(error => {
          eventBus.$emit("StoprogEvent");
          this.errors = error.response.data.errors;
        });
    },

    showalert(data) {
      this.message = data;
      this.Scolor = "black";
      this.snackbar = true;
    },

    loadingalert() {
      this.message = "Loading...";
      this.Scolor = "black";
      this.y = "top";
      this.x = "right";
      this.snackbar = true;
    }
  },
  mounted() {
    // this.progressBar();
    this.getCart();
    this.getWish();
    axios
      .get("/categories")
      .then(response => {
        this.categories = response.data;
      })
      .catch(error => {
        // this.loading = false;
        this.errors = error.response.data.errors;
      });

    axios
      .get("/menus")
      .then(response => {
        this.menus = response.data;
      })
      .catch(error => {
        // this.loading = false;
        this.errors = error.response.data.errors;
      });
  },
  created() {
    eventBus.$on("addCartEvent", data => {
      this.addToCart(data);
    });
    eventBus.$on("WishListEvent", data => {
      this.addToWish(data);
    });
    eventBus.$on("cartEvent", data => {
      this.cartItems = data;
    });
    eventBus.$on("alertRequest", data => {
      this.showalert(data);
    });
    eventBus.$on("loadingRequest", data => {
      this.loadingalert();
    });
    eventBus.$on("progressEvent", data => {
      this.$refs.topProgress.start();
    });
    eventBus.$on("StoprogEvent", data => {
      this.$refs.topProgress.done();
    });
    this.timer = window.setInterval(() => {
      this.getCart();
      // eventBus.$emit("cartEvent", response.data);
    }, 60000);
  },

  computed: {
    target() {
      const value = this[this.type];
      return Number(value);
    },
    // target () {
    //     const value = this[this.type]
    //     if (!isNaN(value)) return Number(value)
    //     else return value
    //   },
    options() {
      return {
        duration: this.duration,
        offsetTop: this.offsetTop,
        easing: this.easing
      };
    }
    // element () {
    //   if (this.selected === 'Button') return this.$refs.button
    //   else if (this.selected === 'Radio group') return this.$refs.radio
    // }
  }
};
</script>

<style scoped>
#header1 .main_menu > li > a {
      color: #fff;
}

#header1 .main_menu > li > a:hover {
      color: #f0aca1;
}
.router-link-exact-active {
  color: #e65540 !important;
}
</style>
