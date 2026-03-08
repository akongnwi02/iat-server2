/*
  Imports the routes, store, and i18n to use with the Vue app.
*/
import { createApp } from 'vue';
import router from './routes.js';
import store from './store.js';
import i18n from './i18n';

// Import styles and UI libraries
import "@fortawesome/fontawesome-free/css/all.min.css";
import 'bootstrap/dist/css/bootstrap.min.css';

import 'mdb-vue-ui-kit/css/mdb.min.css';
import 'vue3-toastify/dist/index.css'

// Import components
import Layout from './layouts/Layout.vue';
import BalanceBar from './components/global/BalanceBar.vue';
import Toastify from 'vue3-toastify'

// Load on the frontend dashboard only

// register the configuration from window
if (window.configuration) {
    store.commit('setConfiguration', window.configuration)
}

// Create Vue app
const app = createApp({});

// Register plugins
app.use(router);
app.use(store);
app.use(i18n);
app.use(Toastify, {
    autoClose: 7000,
    position: 'top-center',
})

// Register global components
// Balance bar shown at the top of the page
app.component('balance-bar', BalanceBar);
// Main layout components for user dashboard
app.component('layout', Layout);

// Mount the app on dashboard page only
app.mount('#app');

// Optional: Google Analytics (if still needed)
// router.afterEach((to) => {
//   ga('set', 'page', to.path);
//   ga('send', 'pageview');
// });
