<template>
       <form class="layouts">
            <div class="container-xl mt-4">
                <div class="progress-container container">
                    <div class="d-flex justify-content-between mb-2 mt-3">
                        <span class="fw-bold pt-1 2">Мебель и техника</span>
                        <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                            <font-awesome-icon :icon="['fas', 'circle-question']" />
                        </button>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:65%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="container-sm">
                    <div class="text-container" style="font-weight:normal; color:#152242;">
                        <span>В квартире есть </span>
                    </div>
                    <div class="container w-100">
                        <div class="col mt-4" style="color:#152242;">

                             <div class="row mt-2">
                                <div class="preview-window">
                                    <div class="balcon w-25 mt-3" >
                                        <span for="#balcon" class="mb-2 fw-bold text-nowrap" style="font-family:lato, sans-seif">мебель</span>
                                        <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">

                                            <label for="checkbox-2" class="me-2">
                                                <input data-name="На кухне" @change="selecTechnics" type="checkbox" id="checkbox-2" class="d-none">
                                                <span class="form-control">На кухне</span>
                                            </label>

                                            <label for="checkbox3">
                                                <input data-name="В комнатах" @change="selecTechnics" type="checkbox" id="checkbox3" class="d-none">
                                                <span class="form-control">В комнатах</span>
                                            </label>
                                        </div>   
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Ванная комната</p>
                                        

                                        <div class="d-flex text-nowrap mt-2" style="font-family:lato, sans-serif;">
                                            <label for="checkbox-4" class="me-2">
                                                <input  @change="selecTechnics" data-name="Ванна" type="checkbox" id="checkbox-4" class="d-none">
                                                <span class="form-control">Ванна</span>
                                            </label>

                                            <label for="checkbox-5" class="me-2">
                                                <input @change="selecTechnics" data-name="Душевая кабина" type="checkbox" id="checkbox-5" class="d-none">
                                                <span class="form-control">Душевая кабина</span>
                                            </label>

                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies  ">
                                    <div class="balcon ">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Техника</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <label for="option5">
                                            <input @change="selecTechnics" data-name="Кондиционер" type="checkbox" class="btn-check d-none" name="options" id="option5" autocomplete="off">
                                            <span class="form-control me-2 my-1">Кондиционер</span>
                                            </label>

                                            <label for="option6">
                                            <input @change="selecTechnics" data-name="Холодильник" type="checkbox" class="btn-check d-none" name="options" id="option6" autocomplete="off">
                                            <span class="form-control me-2 my-1">Холодильник</span>
                                            </label>

                                            <label for="option7">
                                            <input @change="selecTechnics" data-name="Телевизор" type="checkbox" class="btn-check d-none" name="options " id="option7" autocomplete="off" >
                                            <span class="form-control me-2 my-1">Телевизор</span>
                                            </label>

                                            <label  for="option8">
                                            <input @change="selecTechnics" data-name="Посудомоечная машина" type="checkbox" class="btn-check  d-none" name="options" id="option8" autocomplete="off">
                                             <span class="form-control my-1">Посудомоечная машина</span>   
                                            </label>

                                            <label  for="option9">
                                            <input @change="selecTechnics" data-name="Стиральная маншина" type="checkbox" class="btn-check  d-none" name="options" id="option9" autocomplete="off">
                                            <span class="form-control my-1">Стиральная маншина</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="contrainer-balconies  ">
                                    <div class="balcon">
                                        <p for="#balcon" class="mb-1 mt-2 fw-bold" style="font-family:lato, sans-seif">Связь</p>
                                        

                                        <div class="container-repair  flex-wrap d-flex text-nowrap">
                                            <input @change="selecTechnics" data-name="Интернет" type="checkbox" class="btn-check d-none" name="options" id="option10" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option10">Интернет</label>

                                            <input @change="selecTechnics" data-name="Телефон" type="checkbox" class="btn-check d-none" name="options" id="option11" autocomplete="off">
                                            <label class="form-control me-2 my-1" for="option11">Телефон</label>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4 mb-2 d-flex justify-content-end mx-1 ">
                        <next-btn class="px-4 mx-4 btn btn-light mx-4 text-primary" @click.prevent="prew">Назад</next-btn>
                        <next-btn class="px-4 btn  btn-primary" @click.prevent="next">Далее</next-btn>
                    </div>
                </div>
            </div>
        </form>
        
</template>
<script setup>

const {announData} = getData()
const facilities = ref([])
const facilities1 = ref([])
const cheks1 = ref(false)
const cheks2 = ref(false)

function selecTechnics(event){
    
    
    
    if (event.target.checked) {
        facilities.value.push(event.target.dataset.name)
    }
    if (!event.target.checked) {
        facilities.value.forEach(item => {
            facilities.value.splice(facilities.value.indexOf(event.target.dataset.name),1)
        });
    }

    
    console.log(facilities.value);
}


function next(){
    announData.value[0] = JSON.parse(localStorage.getItem('announ'))[0]
    announData.value[1] = JSON.parse(localStorage.getItem('announ'))[1]
    announData.value[2] = JSON.parse(localStorage.getItem('announ'))[2]
    announData.value[3] = JSON.parse(localStorage.getItem('announ'))[3]
    announData.value[4] = facilities.value
    localStorage.setItem('announ', JSON.stringify(announData.value))
    navigateTo('/description')
    facilities.value = facilities1.value
}
function prew(){
    navigateTo('/feature')
}

function change(){
    const file =  document.querySelector('.choose-picture > input')
    file.click()
}

onMounted(()=>{
    if (JSON.parse(localStorage.getItem('announ'))[4]) {
        facilities.value = JSON.parse(localStorage.getItem('announ'))[4]
    }else{
        facilities.value = facilities1.value
    }
    let inputs = document.querySelectorAll('.d-none');
    // facilities.value.forEach(item =>{
    //     console.log(item)
    // })
    inputs.forEach(elem  =>{
        facilities.value.forEach(item=>{
            if(elem.dataset.name === item){
                elem.checked = true
            }
        })
    })
})
</script>

<style scoped>
@media screen and (min-width:320px) {
    .progress{
        height: 7px;
        background-color: rgba(138, 187, 218, 0.24);
    }
    /* .progress-container{
        padding: 0 20px;
    } */
    .progress-bar{
        background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;

    }

    .text-container{
        margin-top: 16px;
        margin-left: 12px;
    }
    .text-container > span{
        font-weight: 500;
        font-size: 16px;
        color: #152242;
    }

.container-repair{
    width: 100vw;
    display: flex;
    flex-wrap: nowrap;
    }


}

@media screen and (min-width:640px){
    .container-btn{
            display: flex;
            justify-content: end;
        }
    .layouts{
        display: flex;
        flex-direction: column;
        margin: 0;
        justify-content: center;
        font-family: Lato, sans-serif;
    }
    .container-xl{
        height: max-content;
        display: flex;
        flex-direction: column;
    }
    .progress{
        height: 7px;
        background-color: rgba(138, 187, 218, 0.24);
    }
    /* .progress-container{
        padding: 0 20px;
    } */
    .progress-bar{
        background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;

    }

    .text-container{
        margin-top: 0px;
    }
    .text-container > span{
        font-weight: 700;
        line-height: 24px;
    }  

    .container-repair{
    width: max-content;
    flex-wrap: nowrap;
    }
}

    .progress{
        height: 7px;
    }
    .progress-bar{
        background-image: linear-gradient(to right, #ffe1ff ,#006cfd 99.9%,#006cfd );
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;

    }
    .progress-container{
        padding: 0 20px;
    }
@media screen and (min-width: 1024px) {
    .progress-container{
        width: 30%;
        padding: 15px;
    }
    .progress{
        height: 7px;
    }
        .container-xl{
        display: flex;
        max-width: 1300px;
        flex-direction: row;
        justify-content: space-between;
    }
    .justify-content-between > span{
        font-size: 14px;
    }
    .justify-content-between > button{
        display: none;
    }

     .container-sm{
        width: 67%;
        height: max-content;
        margin-top: 10px;
        margin-bottom: 20px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.16);
        padding: 20px;
        border-radius: 8px;
    }
}
label > span{
    cursor: pointer;
    border: 2px solid rgb(230, 230, 230);
}
label > input:checked + span{
    background-color: rgb(230, 230, 230);
    border: 2px solid #152242;
}

.container-repair{
    width: 60%;
}

.container-repair > .form-control{
    width: max-content;
    cursor: pointer;
    border: 2px solid rgb(230, 230, 230);
}

.container-repair input:checked + .form-control{
     background-color: rgb(230, 230, 230);
    border: 2px solid #152242;
}




</style>