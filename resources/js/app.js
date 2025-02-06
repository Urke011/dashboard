import './bootstrap';
import * as bootstrap from 'bootstrap';
import { createApp } from "vue";

import TimeDisplay from './components/TimeDisplay.vue';

const app = createApp({
    components: {
        TimeDisplay
    },
});

app.mount('#app');
