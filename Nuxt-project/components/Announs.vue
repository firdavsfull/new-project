<template>
    <div class="layouts">
        
        <!-- <Announ class="content"/> -->
        <announ>

        </announ>
        <!-- <picture-plan/> -->
    </div>
</template>

<style scoped>

.layouts{
        overflow: auto; 
        display: flex;
        flex-direction: column;
        position: relative;
        z-index: 92;
        height: 100vv;
    }


</style>
<script setup>
onMounted(()=>{
    document.body.style.overflow = 'auto';
})
</script>
