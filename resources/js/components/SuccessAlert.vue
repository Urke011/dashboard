<template>
    <div v-if="visible" class="alert alert-success">
        {{ message }}
    </div>
</template>

<script>
export default {
    props: {
        message: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            visible: true,
        };
    },
    mounted() {
        setTimeout(() => {
            this.visible = false;
        }, 5000);
    },
};
</script>

<style scoped>
.alert {
    padding: 10px;
    border: 1px solid green;
    background-color: #d4edda;
    color: #155724;
    border-radius: 4px;
    width: 100%;
    position: fixed;
    top: 20px;
    z-index: 1000;
    text-align: center;
    /* Smooth disappearance */
    transition: opacity 0.5s ease;
}


</style>
