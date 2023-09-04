<template>
    <div class="navigations">
            <ul class="list" @click="show">
                <li v-if="!responce" class="service" @click="logOut()">
                    <div>
                        <font-awesome-icon style="font-size:1.15em;" :icon="['fas', 'right-to-bracket']" />   
                    </div>
                    <a >Войти</a>
                </li>
                <li class="flex w-[200px] items-center" @click="logOut">
                    <div v-if="responce" class="user"  style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-LrvIVmzeZeZD2B2ORYLqh4vSvvikDmvEueeOA3iPZrol4NCKI6u5ndItGrfs_wwLdWo&usqp=CAU');">
                    </div>
                    <span  class="ml-[10px] font-bold" v-for="resp of responce" :key="resp">
                        <span style="font-family: Lato,Arial,sans-serif;" v-for="item of resp" :key="item">+992 {{item.phone_number}}</span>
                    </span>
                </li>
                    <li class="bottom"></li>
                
                    <Services/>
                
            </ul>
        </div>
</template>
<script setup>
const {isShow,active,showMadoal} = useSwitch()
const {responce} = getData()
    const phone = ref()
   
    function logOut(){
        if (responce.value) {
        active.value = false
        document.body.style.overflow ='auto';    
            showMadoal.value = false
    } else  {
        showMadoal.value = true

        }
        
    }
</script>

<style scoped>

.navigations {
    width: 100%;    
    position: absolute;
    top: 55px;
}
.list{
    margin: 0;
    padding: 0;
    list-style-type: none;
    overflow-y: auto;
}
.list > .service > a{
    color: #152242;
    text-decoration: none;
    font-family: Lato,Arial,sans-serif;
    font-size: 17px;
    font-weight: 550;
    margin-left: 20px;
    letter-spacing: -.5px;
}
.service{
    /* height: 25px; */
    width: 100%;
    display: flex;
    align-items: center;
    cursor: pointer;
    color: #152242;
    padding: 14px 16px;
    font-weight: 500;
    font-size: 20px;
    line-height: 22px;
}
.bottom{
    padding: 14px 16px;
}
.bottom::before{
    display: block;
    position: absolute;
    left: 7px;
    content: '';
    width: 95%;
    height: 1.3px;
    background-color: #e8e9ec;
    }

    
    .user{
        max-width: 80px;
        /* min-width: 35px; */
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background-position: center;
        background-size: 120%;
        background-repeat: no-repeat;
        outline: none;
        cursor: pointer;
        margin-left: 10px;
    }
</style>