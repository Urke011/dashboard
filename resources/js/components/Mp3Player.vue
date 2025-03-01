<script setup>
import { ref, onMounted, watch } from "vue";

const audio = ref(null);
const currentTime = ref(0);
const isPlaying = ref(false);
const autoplayBlocked = ref(false);

// Function to get the audio path
const getAudioPath = () => "/audio/theelevatorbossanova.mp3";


onMounted(() => {
    // Retrieve the last played time and playback state from localStorage
    currentTime.value = parseFloat(localStorage.getItem("audioTime")) || 0;
    isPlaying.value = localStorage.getItem("isPlaying") === "true";

    if (audio.value) {
        // Set the current time of the audio when the component loads
        audio.value.currentTime = currentTime.value;

        // Try to play the audio if it was previously playing
        if (isPlaying.value) {
            audio.value.play().then(() => {
                isPlaying.value = true;
            }).catch(() => {
                autoplayBlocked.value = true; // Mark autoplay as blocked
                isPlaying.value = false;
            });
        }
    }
});

watch(currentTime, (newTime) => {
    localStorage.setItem("audioTime", newTime);
});


watch(isPlaying, (newState) => {
    localStorage.setItem("isPlaying", newState);
});

const updateTime = () => {
    if (audio.value) {
        currentTime.value = audio.value.currentTime;
    }
};

const togglePlay = () => {
    if (audio.value) {
        if (audio.value.paused) {
            audio.value.play().then(() => {
                isPlaying.value = true;
                autoplayBlocked.value = false;
            }).catch(() => {
                autoplayBlocked.value = true;
            });
        } else {
            audio.value.pause();
            isPlaying.value = false;
        }
    }
};
</script>
<style scoped>
    .btn-mp3player button{
        background-color: #1e2228;
        color: #8e959d;
        border: 1px solid #fff;
        margin: 0.5%;
        border-radius: 5%;
        padding: 0.1rem 0.5rem;
        width: 100%;
        font-size: small;
    }
</style>

<template>
    <div class="btn-mp3player">
        <!-- Audio element with event to track the current time -->
        <audio ref="audio" @timeupdate="updateTime" loop>
            <source :src="getAudioPath()" type="audio/mpeg"/>
            Your browser does not support the audio element.
        </audio>

        <!-- Button is shown only if autoplay was blocked -->
        <button v-if="autoplayBlocked" @click="togglePlay">Continue to Play</button>
        <button v-else @click="togglePlay">
            {{ isPlaying ? "Pause" : "Play" }}
        </button>
    </div>
</template>
