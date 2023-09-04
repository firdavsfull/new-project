<template>
        <button :class="slot" >
            <slot/>
            
            </button>

</template>
<style scoped>
@media screen and (min-width:320px) {
    
    .container-btn{
            display: flex;
            justify-content: center;
        }
        .container-btn > .btn{
            width: 100%;
        }
}


@media screen and (min-width:640px) {
    
    .container-btn{
            display: flex;
            justify-content: end;
        }
        .container-btn > .btn{
            width: max-content;
        }
}
</style>