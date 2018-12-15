<template>
<div>
    <v-app id="inspire">
        <!-- temporary -->
        <v-navigation-drawer right temporary v-model="right" fixed></v-navigation-drawer>
        <!-- temporary -->
        <v-navigation-drawer fixed :color="color" :clipped="$vuetify.breakpoint.lgAndUp" app v-model="drawer">
            <v-list dense id="navigation">
                <!-- <v-img :aspect-ratio="16/9" src="storage/ps/landS.jpg">
                    <v-layout pa-2 column fill-height class="lightbox white--text">
                        <v-spacer></v-spacer>
                        <v-flex shrink>
                            <div class="subheading">{{ user.name }}</div>
                            <div class="body-1">{{ user.email }}</div>
                        </v-flex>
                    </v-layout>
                </v-img> --> 
                <template>
                    <v-card>
                        <!-- <v-card style="background: url('storage/ps/landS.jpg')"> -->
                        <router-link to="/dashboard" class="v-list__tile v-list__tile--link">
                            <div class="v-list__tile__action">
                                <i aria-hidden="true" class="icon material-icons">dashboard</i>
                            </div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">Dashboard</div>
                            </div>
                        </router-link>

                        <router-link to="/Adminproducts" class="v-list__tile v-list__tile--link">
                            <div class="v-list__tile__action">
                                <i aria-hidden="true" class="icon material-icons">dialpad</i>
                            </div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">My Products</div>
                            </div>
                        </router-link>
                        <router-link to="/Admincategories" class="v-list__tile v-list__tile--link">
                            <div class="v-list__tile__action">
                                <i aria-hidden="true" class="icon material-icons">settings</i>
                            </div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">Manage Categories</div>
                            </div>
                        </router-link>
                        <router-link to="/AdminSubCat" class="v-list__tile v-list__tile--link">
                            <div class="v-list__tile__action">
                                <i aria-hidden="true" class="icon material-icons">account_circle</i>
                            </div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">Manage Subcategories</div>
                            </div>
                        </router-link>

                        <v-list-group prepend-icon="dialpad">
                            <v-list-tile slot="activator">
                                <v-list-tile-title>Orders</v-list-tile-title>
                            </v-list-tile>
                            <router-link to="/AdminOrders" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>map</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Manage Orders</v-list-tile-title>
                            </router-link>
                            <router-link to="/Adminpayments" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>attach_money</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Manage Payments</v-list-tile-title>
                            </router-link>
                        </v-list-group>

                       <router-link to="/menu" class="v-list__tile v-list__tile--link">
                            <div class="v-list__tile__action"><i aria-hidden="true" class="icon material-icons">account_circle</i></div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">
                                    Menu
                                </div>
                            </div>
                        </router-link>
                        
                         <!--    <router-link to="/print" class="v-list__tile v-list__tile--link" v-if="user.can['prin']">
                            <div class="v-list__tile__action"><i aria-hidden="true" class="icon material-icons">print</i></div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">
                                    print
                                </div>
                            </div>
                        </router-link>
                        <router-link to="/reports" class="v-list__tile v-list__tile--link" v-if="user.can['view reports']">
                            <div class="v-list__tile__action"><i aria-hidden="true" class="icon material-icons">book</i></div>
                            <div class="v-list__tile__content">
                                <div class="v-list__tile__title">
                                    Reports
                                </div>
                            </div>
                        </router-link>
                        
                        <v-list-group prepend-icon="book" v-if="user.can['outscan', 'inscan']">
                            <v-list-tile slot="activator">
                                <v-list-tile-title>Scan Shipments</v-list-tile-title>
                            </v-list-tile>

                            <router-link to="/scanner" class="v-list__tile theme--light" style="text-decoration: none">
                                <div class="v-list__tile__action"><i class="fa fa-barcode nav_icon"></i></div>
                                <div class="v-list__tile__content">
                                    <div class="v-list__tile__title">
                                        Scan Shipments
                                    </div>
                                </div>
                            </router-link>
                            <router-link to="/filter" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>business</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Delivery Report</v-list-tile-title>
                            </router-link>
                        </v-list-group>

                        <v-list-group prepend-icon="account_circle" v-if="user.can['view users']">
                            <v-list-tile slot="activator">
                                <v-list-tile-title>User&Roles</v-list-tile-title>
                            </v-list-tile>

                            <router-link to="/users" class="v-list__tile theme--light" style="text-decoration: none" id="link-router">
                                <v-list-tile-action>
                                    <v-icon>people_outline</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Manage Users</v-list-tile-title>
                            </router-link>
                            <router-link to="/roles" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>gavel</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title> Manage Roles</v-list-tile-title>
                            </router-link>
                        </v-list-group>

                        <v-list-group prepend-icon="insert_drive_file" v-if="user.can['view branches']">
                            <v-list-tile slot="activator">
                                <v-list-tile-title>Branches$Countries</v-list-tile-title>
                            </v-list-tile>

                            <router-link to="/branches" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>book</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Branches</v-list-tile-title>
                            </router-link>
                            <router-link to="/country" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>map</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Countries</v-list-tile-title>
                            </router-link>

                            <router-link to="/status" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>question_answer</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title> Shipment status</v-list-tile-title>
                            </router-link>
                        </v-list-group>

                        

                        <v-list-group prepend-icon="attach_money" v-if="user.can['view finance']">
                            <v-list-tile slot="activator">
                                <v-list-tile-title>Finance</v-list-tile-title>
                            </v-list-tile>
                            <router-link to="/finance" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>business</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Finace</v-list-tile-title>
                            </router-link>
                            <router-link to="/charges" class="v-list__tile theme--light" style="text-decoration: none">
                                <v-list-tile-action>
                                    <v-icon>attach_money</v-icon>
                                </v-list-tile-action>
                                <v-list-tile-title>Charges</v-list-tile-title>
                            </router-link>
              </v-list-group>-->
                    </v-card>
                </template>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar dark app :color="color" :clipped-left="$vuetify.breakpoint.lgAndUp" fixed>
            <v-toolbar-title style="width: 600px" class="ml-0 pl-3">
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>Healthwise Pharmacy
                <!-- <img src="storage/logo1.jpg" alt="" style="width: 60px; height: 60px; border-radius: 25%;"> -->
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-tooltip bottom style="margin-right: 10px;">
                <v-btn icon class="mx-0" @click="openShipment" slot="activator">
                    <v-icon color="white darken-2" large>mail</v-icon>
                </v-btn>
                <span>New Orders</span>
            </v-tooltip>
            <v-divider vertical></v-divider>
            <!-- <Notifications :user="user"></Notifications> -->
            <a href="/" class="v-btn v-btn--flat theme--dark white--text">Site</a>
            <v-divider vertical></v-divider>
            <!-- <chattyNoty :user="user"></chattyNoty> -->
            <!-- <v-icon @click.stop="right = !right" style="cursor: pointer">apps</v-icon> -->
            <form action="/logout" method="post">
                <input type="hidden" name="_token" :value="csrf">
                <v-btn flat color="white" type="submit">Logout</v-btn>
            </form>
        </v-toolbar>
    </v-app>

    <v-snackbar :timeout="timeout" bottom="bottom" :color="Scolor" right="right" v-model="snackbar">
        {{ message }}
        <v-icon dark right>check_circle</v-icon>
    </v-snackbar>
</div>
</template>

<script>
// import Notifications from "../notification/Notification";
// let AddShipment = require("../shipments/AddShipment");
// import chattyNoty from '../notification/chattyNoty'
export default {
    components: {
        // Notifications,
        // AddShipment
        //  chattyNoty
    },
    props: ["user"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            color: "#132f51",
            dialog: false,
            drawer: true,
            right: null, 
            snackbar: false,
            timeout: 5000,
            Scolor: '',
            message: "Success"
        };
    },
    methods: {
        openShipment() {
            this.dialog = true;
        },
        close() {
            this.dialog = false;
        },

        showalert() {
            this.message = "success";
            this.Scolor = "black";
            this.snackbar = true;
        }
    },
    created() {
        eventBus.$on('alertRequest', data => {
            this.showalert()
        })
    },
    mounted() {
        // axios.post('/getLogo')
        //     .then((response) => {
        //         this.company = response.data
        //     })
        //     .catch((error) => {
        //         this.errors = error.response.data.errors
        //     })
    }
};
</script>

<style scoped>
.v-expansion-panel__container:hover {
    border-radius: 10px !important;
    width: 90% !important;
    margin-left: 15px !important;
    background: #e3edfe !important;
    color: #1a73e8 !important;
}

.theme--light {
    background-color: #212120 !important;
    /* background: url('storage/logo1.jpg') !important; */
    color: #fff !important;
}
</style>
