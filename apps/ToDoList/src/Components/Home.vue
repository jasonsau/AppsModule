<script>
    import { defineComponent } from 'vue';
    export default defineComponent({
        data() {
            return {
                task: "",
                taskList: [
                    {
                        id: 1,
                        name: 'Task 1',
                        completed: false
                    },
                    {
                        id: 2,
                        name: 'Task 2',
                        completed: true
                    }
                ]
            }
        },
        methods: {
            changeStatus(task) {
                task.completed = !task.completed;
            },
            addTask() {
                if (this.task.length > 0) {
                    this.taskList.push({
                        id: this.taskList.length + 1,
                        name: this.task,
                        completed: false
                    });
                    this.task = "";
                }
            },
            deleteTask(task) {
                this.taskList = this.taskList.filter(t => t.id !== task.id);
            }
        }
    })
</script>

<template>
    <h1>ToDo List</h1>
    <v-text-field
        label = "New Task"
        v-model="task"
        class = "input"
        @keydown.enter="addTask"
    >
    </v-text-field>
    <v-list class = "list">
        <div
            class = "list__item"
            v-for="(task, index) in taskList"
            :key="index"
        >
            <div @click="changeStatus(task)" style = "width: 90%; display: inline-block" >
                <div
                    :class = "{'list__radio': true, 'list__radi--checked': task.completed}"
                    :id="task.id"
                >
                </div>
                <label class = "list__label" :for = "task.id">{{task.name}}</label>
            </div>
            <button style="width: 10%; display: inline-block" @click="deleteTask(task)">
                x
            </button>
        </div>
    </v-list>
    <RouterView></RouterView>
</template>

<style scoped>
    h1 {
        text-align: center;
    }
    .input {
        margin:auto;
        margin-top: 20px;
        max-width: 500px;
    }
    .list {
        margin:auto;
        background-color: #2d3748;
        margin-top: 20px;
        max-width: 500px;
        border-radius: 15px;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .list__item {
        max-width: 500px;
        color: white;
        padding: 10px;
        margin: auto;
        cursor: pointer;
    }
    .list__item:hover {
        background-color: #4a5568;
    }
    .list__radio {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background-color: #4a5568;
        display: inline-block;
        margin-right: 10px;
        vertical-align: middle;
    }
    .list__radi--checked {
        background-color: #38b2ac;
    }

    .list__label {
        display: inline-block;
        vertical-align: middle;
    }

</style>
