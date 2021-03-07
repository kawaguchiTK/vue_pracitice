<template>
<div class="container-fluid bg-dark mb-3">
    <div class="container">
        <nav class="navbar navbar-dark">
            <span class="navbar-brand mb-0 h1">Vue Laravel SPA</span>
            <div>
                <router-link v-bind:to="{name: 'task.list'}">
                    <button class="btn btn-success">list</button>
                </router-link>
                <router-link v-bind:to="{name: 'task.create'}">
                    <button class="btn btn-success">add</button>
                </router-link>
            </div>
        </nav>
    </div>
</div>
</template>

<script>
// コンポーネント化したい場合に使う この記述で他の場所からも呼び出せるようにする
export default {}
</script>