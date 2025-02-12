<template>
    <div>
        <p class="gold-font fs-1">{{ currentTime }}</p>
    </div>
</template>

<script>
import { ref, onMounted, onBeforeUnmount } from 'vue';

export default {
    setup() {
        const currentTime = ref(getCurrentTime());

        function getCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            return `${hours}:${minutes}:${seconds}`;
        }

        function updateTime() {
            currentTime.value = getCurrentTime();
        }

        let interval = null;

        onMounted(() => {
            interval = setInterval(updateTime, 1000);
        });

        onBeforeUnmount(() => {
            clearInterval(interval);
        });

        return { currentTime };
    },
};
</script>
