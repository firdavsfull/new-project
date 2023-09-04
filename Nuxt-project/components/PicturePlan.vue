<template>
       <form class="layouts">
            <div class="container-xl mt-4">
                <div class="progress-container">
                    <div class="d-flex justify-content-between mb-2 mt-3">
                        <span class="fw-bold pt-1 2">Фотография и планировка</span>
                        <button class="btn btn-none fs-5 p-0 m-0 text-primary me-2">
                            <font-awesome-icon :icon="['fas', 'circle-question']" />
                        </button>
                    </div>

                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

            <div class="container-sm">
                <div class="text-container">
                    <span>Параметры Квартиры </span>
                </div>

                <div class="quantity-room-container">
                    <p>Количество Комнат</p>
                    <div class="quantity-room">
                        <label class="quantity-room-item" for="1">
                            <input class="" name="radioInput" type="radio" id="1">
                            <span class="form-control">1</span>
                        </label>
                        <label class="quantity-room-item" for="2">
                            <input name="radioInput" type="radio"  id="2">
                            <span class="form-control">2</span>
                        </label>
                        <label class="quantity-room-item" for="3">
                            <input name="radioInput" type="radio"  id="3">
                            <span class="form-control">3</span>
                        </label>
                        <label class="quantity-room-item" for="4">
                            <input name="radioInput" type="radio"  id="4">
                            <span class="form-control">4</span>
                        </label>
                        <label class="quantity-room-item" for="5">
                            <input name="radioInput" type="radio"  id="5">
                            <span class="form-control">5</span>
                        </label>
                    </div>
                </div>

                <div class="area-room-container">
                    <div class="area-room">
                       <div class="room">
                        <p>Общая площадь</p>
                        <div class="input-area form-control">
                            <input type="number">
                            <div>м<sup>2</sup></div>
                        </div>
                       </div> 

                       <div class="room">
                        <p>Жилая площадь</p>
                        <div class="input-area form-control">
                            <input type="number">
                            <div>м<sup>2</sup></div>
                        </div>
                       </div>
                    </div>
                </div>
                <div class="area-room-container mt-5">
                    <div class="area-room">
                        <div class="room">
                        <p>Кухня</p>
                        <div class="input-area form-control">
                            <input type="number">
                            <div>м<sup>2</sup></div>
                        </div>
                       </div>
                    </div>
                </div>

                <div class="picture-room-container">
                    <span>Фото и планировка - от 5 и больше</span>
                    <div class="picture-room">
                        <div>
                            <font-awesome-icon style="color:darkgray;" :icon="['fas', 'camera']" />
                        </div>
                        <p>На фото не должно быть людей, животных,
                            алкоголя, табака, оружия. Не добавляйте
                            чужие фото, картинки с водяными знаками
                            и рекламу.
                        </p>
                    </div>
                    <div class="choose-picture">
                        <button @click.prevent='change'  style="background-color:rgba(15,72,157,.1); color:#0468ff;" class="btn w-100  fw-bold font-monospace">Выберите файлы</button>
                        <input type="file" multiple style="display:none;" id="">
                    </div>
                </div>

                <div class="video-link-container">
                    <div style="margin-top:24px;">
                        <div style="display:inline;">
                            <span>Видео</span>
                        </div>
                    </div>
                </div>
                <div class="container-input-link">
                    <div style="flex-basis:280px; margin-top:16px">
                        <label for="link-video">
                            Ссылка на Youtube
                        </label>
                        <textarea class="font-monospace"  id="link-video" rows="1" placeholder="https://"></textarea>
                    </div>
                </div>
                <div class="container mt-4 mb-2 d-flex justify-content-end mx-1">
                <next-btn class="btn btn-light text-primary px-4 mx-4" @click.prevent="prew">Назад</next-btn>    
                <next-btn class="btn btn-primary px-4" @click.prevent="next" >Далее</next-btn>
                </div>
                
            </div>
            </div>
        </form>
        
</template>
<script setup>
function next(){
    navigateTo('/feature')
}
function prew(){
    navigateTo('/map')
}

function change(){
    const file =  document.querySelector('.choose-picture > input')
    file.click()
}
</script>

<style scoped>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
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

    .text-container > span{
        font-weight: 700;
        font-size: 16px;
    }
    
    .quantity-room-container{
        width: 100%;
        margin-top: 32px;
    }
    .quantity-room-container > p{
        font-size: 14px;
    }
    .quantity-room{
        display: flex;
        min-width: 40%;
        max-width: 50%;
        /* width: 43%; */
        justify-content: space-between;
        background-color: #fff;
    }
    .quantity-room >label > input{
        display: none;
    }

    .quantity-room >label > input:checked + span{
        border-color: #006cfd;
        background-color: rgba(192, 192, 192, 0.39);
    }
    .quantity-room-item{
        margin-left: 0;
    }

    .area-room-container{
        margin-top: 32px;
        width: 100%;
        height: 90px;
    }
    .area-room{
        display: flex;
        width: 80%;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
    }

.room > p{
    font-size: 14px;
    margin-bottom: 5px;
    }

.input-area{
    display: flex;
    width: 45%;
    justify-content: space-between;
}

    .input-area > input{
        border: none;
        outline: none;
        width: 85px;

    }
    .input-area > button{
        border: none;
        outline: none;
        background: none;
    }
    .input-area > button > sup{
        font-size: 10px;
    }

    .picture-room-container{
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .picture-room-container > span{
        font-size: 16px;
        font-family: lato, sans-serif;
        letter-spacing: -0.2;
        font-weight: 700;
        line-height: 24px;
    }
    .picture-room{
        display: flex;
        align-items: center;
    }
    .picture-room > p {
        margin-top: 10px;
        width: 35%;
        margin-left: 15px;
        font-size: 12px;
        height: max-content;
    }
    .video-link-container{
        display: flex;
        min-width: 100%;
    }
    .video-link-container  span{
        letter-spacing: -0.2px;
        font-weight: 700;
        line-height: 24px;
        font-size: 16px;
        font-style: normal;
        font-stretch: normal;
    }
    .container-input-link{
        display: flex;
        max-width: 100%;

    }
    .container-input-link label{
        display: block;
        margin-bottom: 6px;
        color: #152242;
        font-size: 14px;
        line-height: 20px;
    }
    .container-input-link textarea{
        height: 40px;
        overflow: hidden;
        color: #152242;
        padding: 8px 12px;
        font-size: 16px;
        font-family: monospace;
        line-height: 24px;
        border: 1px solid #ced1d7;
        outline: none;
        width: 100%;
        resize: none;
        border-radius: 4px;
    }
    .container-sm{
        margin-top: 20px;
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

    
    .text-container > span{
        font-weight: 700;
    }
    
    .quantity-room-container{
        width: 100%;
        margin-top: 32px;
    }
    .quantity-room-container > p{
        font-size: 14px;
    }
    .quantity-room{
        display: flex;
        max-width: 10%;
        /* justify-content: space-between; */
        background-color: #fff;
    }
    .quantity-room > label > input{
        display: none;
    }

    .quantity-room >label > input:checked + span{
        border-color: #006cfd;
        background-color: rgba(192, 192, 192, 0.39);
    }
    

    .area-room-container{
        margin-top: 32px;
        width: 100%;
        height: 90px;
    }
    .area-room{
        display: flex;
        width: 80%;
        height: 100%;
        flex-direction: row;
        justify-content: space-between;
    }

.room > p{
    font-size: 14px;
    margin-bottom: 5px;
    }

.input-area{
    display: flex;
    width: 50%;
    justify-content: space-between;
}

    .input-area > input{
        border: none;
        outline: none;
        width: 70%;

    }
    .input-area > button{
        border: none;
        outline: none;
        background: none;
    }
    .input-area > button > sup{
        font-size: 10px;
    }

    .picture-room-container{
        display: flex;
        width: 100%;
        flex-direction: column;
    }
    .picture-room-container > span{
        font-size: 16px;
        font-family: lato, sans-serif;
        letter-spacing: -0.2;
        font-weight: 700;
        line-height: 24px;
    }
    .picture-room{
        display: flex;
        align-items: center;
    }
    .picture-room > p {
        margin-top: 10px;
        width: 35%;
        margin-left: 15px;
        font-size: 12px;
        height: max-content;
    }
    .video-link-container{
        display: flex;
        min-width: 100%;
    }
    .video-link-container  span{
        letter-spacing: -0.2px;
        font-weight: 700;
        line-height: 24px;
        font-size: 16px;
        font-style: normal;
        font-stretch: normal;
    }
    .container-input-link{
        display: flex;
        max-width: 100%;

    }
    .container-input-link label{
        display: block;
        margin-bottom: 6px;
        color: #152242;
        font-size: 14px;
        line-height: 20px;
    }
    .container-input-link textarea{
        height: 40px;
        overflow: hidden;
        color: #152242;
        padding: 8px 12px;
        font-size: 16px;
        font-family: monospace;
        line-height: 24px;
        border: 1px solid #ced1d7;
        outline: none;
        width: 100%;
        resize: none;
        border-radius: 4px;
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
        padding: 20px 35px;
        border-radius: 8px;
    }


    .quantity-room-container{
        width: 100%;
        margin-top: 32px;
    }
    .quantity-room-container > p{
        font-size: 14px;
    }
    .quantity-room{
        display: flex;
        /* min-width: 10%; */
        justify-content: space-between;
        background-color: #fff;
    }
    .quantity-room > label > input{
        display: none;
    }

    .quantity-room >label > input:checked + span{
        border-color: #006cfd;
        background-color: rgba(192, 192, 192, 0.39);
    }
    .quantity-room-item{
        margin-left: 0;
    }
}


</style>