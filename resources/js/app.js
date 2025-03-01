import './bootstrap';
import * as bootstrap from 'bootstrap';
import { createApp } from "vue";
import SuccessAlert from './components/SuccessAlert.vue';
import TimeDisplay from './components/TimeDisplay.vue';
import DeleteTask from './components/DeleteTask.vue';
import Mp3Player from './components/Mp3Player.vue';
import router from './router';

const app = createApp({});
app.component('TimeDisplay', TimeDisplay);
app.component('SuccessAlert', SuccessAlert);
app.component('DeleteTask', DeleteTask);
app.component('Mp3Player', Mp3Player);
app.use(router);
app.mount('#app');
