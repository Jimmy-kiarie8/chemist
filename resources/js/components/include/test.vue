<template>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <!-- Navbar brand -->
    <a class="navbar-brand text-uppercase" href="#">Navbar</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2"
    aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown mega-dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Gadgets
          <span class="sr-only">(current)</span>
        </a>
                <div class="dropdown-menu mega-menu v-3 z-depth-1 primary-color-dark py-5 px-3" aria-labelledby="navbarDropdownMenuLink5">
                    <div class="row">
                        <div class="col-md-5 col-xl-3 sub-menu mb-xl-0 mb-5">
                            <ul class="list-unstyled" style="width: 150%;">
                                <li class="sub-title text-uppercase" v-for="category in categories" :key="category.id">
                                    <a class="menu-item pl-1 mt-2" href="#" style="color: #fff;">
                                        <v-btn flat @click="subcatsM(category)" color="white">{{ category.name }}</v-btn>
                                    </a>
                                    <v-divider></v-divider>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-xl-3 sub-menu mb-xl-0 mb-5 offset-md-3">
                            <ul class="list-unstyled" style="width: 150%;">
                                <li class="sub-title text-uppercase" v-for="subs in subcats" :key="subs.id">
                                    <a class="menu-item pl-1 mt-2" href="#!" style="color: #fff;">
                                        <!-- <v-btn flat @click="subcats(category.id)">{{ subs.name }}</v-btn> -->
                                        {{ subs.name }}
                                    </a>
                                    <v-divider></v-divider>
                                </li>
                            </ul>
                        </div>
                       
                    </div>
                </div>
            </li>

        </ul>

        <!-- Links -->

        <!-- Search form -->
        <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      </div>
        </form>

    </div>
    <!-- Collapsible content -->

</nav>
<!-- Navbar -->
</template>

<script>
export default {
    data() {
        return {
            subcats: [],
            categories: [],
            show: false,
        }
    },
    methods: {
        subcatsM(category) {
            console.log(category)
            this.subcats = category.sub_categories
            this.show = true
        }
    },
    mounted() {
        axios.get("/categories")
            .then(response => {
                this.categories = response.data;
            })
            .catch(error => {
                // this.loading = false;
                this.errors = error.response.data.errors;
            });
    }
}
</script>

<style scoped>
.dropdown:hover .dropdown-menu {
    display: block;
}

.navbar .dropdown-menu {
    width: 700px !important;
}
</style>
