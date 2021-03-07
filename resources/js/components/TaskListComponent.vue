<template>
    <div class="container">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">content</th>
                    <th scope="col">person</th>
                    <th scope="col">show</th>
                    <th scope="col">edit</th>
                    <th scope="col">delete</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="task in tasks" :key="task.id">
                    <th scope="row">{{ task.id }}</th>
                    <td>{{ task.title }}</td>
                    <td>{{ task.content }}</td>
                    <td>{{ task.person_in_charge }}</td>
                    <td>
                        <router-link v-bind:to="{name: 'task.show', params: { taskId: task.id.toString() }}">
                            <button class="btn btn-primary">show</button>
                        </router-link>
                    </td>
                    <td>
                        <router-link v-bind:to="{name: 'task.edit', params: { taskId: task.id.toString() }}">
                            <button class="btn btn-success">edit</button>
                        </router-link>
                    </td>
                    <td>
                        <button class="btn btn-danger" v-on:click="deleteTask(task.id)">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data :function () {
        return {
            tasks : {}
        }
    },
    methods: {
        getTasks() {
            axios.get('/api/tasks')
                    .then((res) => {
                        this.tasks = res.data;
                    });
        },
        deleteTask(id) {
            axios.delete('/api/tasks/' + id)
                    .then((res) => {
                        this.getTasks();
                    });
        },
    },
    mounted() {
        this.getTasks();
    }
}
</script>