import './bootstrap';
import * as bootstrap from 'bootstrap';
import { createApp } from "vue";
import SuccessAlert from './components/SuccessAlert.vue';
import TimeDisplay from './components/TimeDisplay.vue';
import DeleteTask from './components/DeleteTask.vue';
import router from './router';

const app = createApp({});
app.component('TimeDisplay', TimeDisplay);
app.component('SuccessAlert', SuccessAlert);
app.component('DeleteTask', DeleteTask);

app.use(router); // Use the router
app.mount('#app');
