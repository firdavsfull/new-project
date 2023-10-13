<template>
    <div class="min-h-[100vh] m-[10px]  bg-[white] flex w-full" >
         <div class="mt-[20px] m-[10px] flex w-full" style="backdrop-filter: 8px;">
            <ul style="list-style: none;" class="m-[0] p-[0] w-full">
                <li class="flex-wrap my-[15px] flex flex-col justify-center p-[8px] bg-[silver] w-[100%]" v-for="(announ,index) of myAnnoun" :key="index" >
                <div class="flex m-0 p-0">
                    <div class="h-full m-[0] w-[200px]">
                        <img class="w-[200px] h-full" :src="`http://192.168.100.45:8000/api/image/small/${announ.image}`">
                    </div>
                    <div class="flex h-[100px] ml-[10px]">
                        <h3 class="flex text-[18px]">
                            <p>{{ announ.title }}</p>
                        &nbsp;
                        <span>({{announ.price}}c.)</span>
                        </h3>
                        
                    </div>
                </div>
                <div class="flex items-center justify-between h-[40px] bg-[white] mt-[5px]">
                    <div class="flex">
                        <div class="flex h-[max-content] ml-[10px]">
                            <button class="border-1 border-green-500 rounded-[3px] px-[10px] text-primary h-[max-content]" @click="updateAnnoun">изменить</button>
                        </div>
                        <div class="flex h-[max-content] ml-[10px]">
                            <button class="border-1 border-green-500 rounded-[3px]
                            px-[10px] text-danger h-[max-content]"
                            @click="updateAnnoun">удалить</button>
                        </div>
                    </div>
                    <div class="w-[max-content] flex border-red-500 items-center bg-[black]/30 h-full">
                        <p class="text-[14px] ">Просмотр: <span>0</span></p>
                    </div>
                </div>        
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>

function updateAnnoun(){

}
const myAnnoun = ref()
const user =  JSON.parse(localStorage.getItem('owner'))[1];
onMounted(async()=>{
    await fetch('http://192.168.100.45:8000/api/get_announs_by_user',{
        method:'post',
        headers:{
            "Content-Type":"application/json",
            Authorization:'Bearer '+JSON.parse(localStorage.getItem('owner'))[0]
        },
        body:JSON.stringify(user)
    })
    .then(res=>res.json())
    .then(res=>{
        myAnnoun.value = res
        console.log(res);
    })
})
</script>