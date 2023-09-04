<template>
    <ul class="lists">
        <li class="service">

            <div>
                <font-awesome-icon class="fas" :icon="['fas', 'search']" />
            </div>
            <a href="#">Новый поиск</a>
        </li>
        <li class="service" @click="Announ()">
            <div >
                <!-- <font-awesome-icon class="fas" :icon="['fas', 'circle-plus']" /> -->
                <Icon class="font-awe" name="uil:plus-circle" color="#152242"/>
                <!-- <img class="fas" src="C:\Users\pc1\Downloads\Laravel 10\plus.png" alt=""> -->
                
                
            </div>
            <a >Разместить oбъявление</a>
        </li>

        <li class="service">
            <div>
                <font-awesome-icon class="fas" :icon="['far', 'heart']" />
            </div>
            <a href="#">Избранное</a>
        </li>
        <li class="service">
            <div>
                <font-awesome-icon class="fas" :icon="['far', 'comment']" />
            </div>
            <a href="#">Сообщение</a>
        </li>
        <li class="service">
            <div>
                <font-awesome-icon class="fas" :icon="['far', 'building']" />
            </div>
            <a href="#">&nbsp;Куплю / Сниму</a>
        </li>
        
        <Search/>
    </ul>
</template>
<script setup>
const route = useRoute()
const {isShow, toggleShow, active} = useSwitch()
function Announ(){
    if (navigator.maxTouchPoints) {
        navigateTo('/announ')
        isShow.value = false
        active.value = false
        document.body.style.overflow='auto'
    }else{
            isShow.value = true
        }
    
}


</script>

<style scoped>
.fas{
    color: #152242;
    height: 23px;
}
.lists{
    margin: 0;
    padding: 0;
    list-style-type: none;
}
.lists li a{
    color: #152242;
    margin-left: 20px;
    text-decoration: none;
    font-family: Lato,Arial,sans-serif;
    letter-spacing: -1px;
    
}
.font-awe{
    margin-right: -2px;
}
.service{
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 10px 16px;
    font-size: 25px;
    line-height: 22px;
}

.service > a{
    font-size: 17px;
    font-weight: 550;
    font-family: Lato,Arial,sans-serif;

}

@media screen and (min-width:640px){
    .lists > .service:nth-child(2){
        display: none;
    }
}
</style>