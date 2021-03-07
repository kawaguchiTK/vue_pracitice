<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="id" class="col-sm-3 col-form-label">id</label>
                        <input type="text"  id="id" class="col-sm-9 form-control-plaintext" readonly v-model="task.id">
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">title</label>
                        <input type="text" id="title" class="col-sm-9 form-control" v-model="task.title">
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">content</label>
                        <input type="text" id="content" class="col-sm-9 form-control" v-model="task.content">
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">person in charge</label>
                        <input type="text" id="person-in-charge" class="col-sm-9 form-control" v-model="task.person_in_charge">
                    </div>
                    <button type="submit" class="btn btn-primary">submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        taskId: String
    },
    data: function () {
        return {
            task: {}
        }
    },
    methods: {
        getTask() {
            axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        this.task = res.data;
                    });
        },
        submit() {
            axios.put('/api/tasks/' + this.taskId, this.task)
                    .then((res) => {
                        // this.$router でルーティング全体の情報にコンポーネントからアクセスできる
                        this.$router.push({name: 'task.list'})
                    });
        },
    },
    mounted() {
        this.getTask();
    }
}
</script>