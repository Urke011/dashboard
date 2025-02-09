import './bootstrap';
import * as bootstrap from 'bootstrap';
import { createApp } from "vue";
import SuccessAlert from './components/SuccessAlert.vue';
import TimeDisplay from './components/TimeDisplay.vue';

const app = createApp({});
app.component('TimeDisplay', TimeDisplay);
app.component('SuccessAlert', SuccessAlert);
app.mount('#app');
