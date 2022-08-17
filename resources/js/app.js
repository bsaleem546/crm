import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});


//toast
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const options = {
    timeout: 5000,
};

app.use(Toast, options);

import ContactComponent from './components/Contact.vue';
app.component('contact-component', ContactComponent);

import InfoComponent from './components/Info.vue';
app.component('info-component', InfoComponent);

app.mount('#app');
