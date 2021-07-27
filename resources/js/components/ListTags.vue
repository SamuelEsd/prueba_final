<template>
    <div>
        <button @click="status = !status"> change status</button> {{ status }}
    </div>
</template>

<script>
export default {
    props: ['id'],
    data() {
        return {
            status: false,
        }
    }
}
</script>

<style>
    
</style>