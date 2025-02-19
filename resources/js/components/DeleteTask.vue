<template>
    <span @click="deleteTask()" class="btn-click">
        <img src="./public/images/trash.png" alt="trash-icon">
    </span>
    <div style="position: absolute; top: 0; left: 0; width: 100%; text-align: center;">
        <div v-if="visible" class="alert alert-success">
            {{ successMessage }}
        </div>
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
    setup(props) {
        //console.log("Task ID:", props.taskId);
        const successMessage = ref('');
        const visible = ref(false);
        const deleteTask = async () => {
            try {
                const response = await axios.delete(`/todo/${props.taskId}`);
                console.log(response.data.message); // Log the success message
                window.location.href = '/';
                successMessage.value = response.data.message;
                visible.value = true;
            } catch (error) {
                console.error("Error deleting task:", error);
                alert("Error deleting task. Please try again.");
            }
        };

        return {
            deleteTask,
            successMessage,
            visible,
        };
    },
};
</script>



<style scoped>
.btn-click {
    cursor: pointer;
}
</style>
