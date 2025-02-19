<template>
    <span @click="showConfirm = true" class="btn-click">
        <img :src="trashIcon" alt="trash-icon">
    </span>

    <div v-if="showConfirm" class="modal-overlay">
        <div class="modal-content">
            <h3 class="modal-title">Delete Task</h3>
            <p>Are you sure you want to remove this task?<br>
                This action cannot be undone.</p>
            <div class="modal-buttons">
                <button @click="deleteTask" class="btn-confirm">Yes, Delete</button>
                <button @click="showConfirm = false" class="btn-cancel">Cancel</button>
            </div>
        </div>
    </div>
    <div v-if="visible" class="alert alert-success" style="position: fixed; top: 0; left: 0; width: 100%; text-align: center;">
        <p>{{ successMessage }}</p>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";

export default {
    props: {
        taskId: {
            type: Number,
            required: true
        }
    },
    computed: {
        trashIcon() {
            return `${window.location.origin}/images/trash.png`;
        }
    },
    setup(props) {
        const successMessage = ref('');
        const visible = ref(false);
        const showConfirm = ref(false);

        const deleteTask = async () => {
            try {
                const response = await axios.delete(`/todo/${props.taskId}`);
                successMessage.value = response.data.message;
                visible.value = true;
                showConfirm.value = false;
                setTimeout(() => {
                    window.location.href = '/';
                }, 1000);
            } catch (error) {
                console.error("Error deleting task:", error);
                alert("Error deleting task. Please try again.");
            }
        };

        return {
            deleteTask,
            successMessage,
            visible,
            showConfirm
        };
    },
};
</script>

<style scoped>
.btn-click {
    cursor: pointer;
}

.modal-overlay {
    position: fixed;
    top: -15%;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 100;
}

.modal-content {
    background: #151c1d;
    padding: 20px;
    border: 3px solid #dc3545;
    border-radius: 8px;
    text-align: center;
    max-width: 400px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.modal-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.modal-buttons {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-confirm, .btn-cancel {
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.btn-confirm {
    background: #dc3545;
    color: white;
}

.btn-cancel {
    background: #1e2228;
    color: white;
}
</style>
