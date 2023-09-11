<template>
  <div class="picture-room-container sm:justify-center ">
    <!-- <span>Фото и планировка - от 5 и больше</span> -->
    <span>Фотографии</span>
    <div class="picture-room sm:none">
      <div>
        <font-awesome-icon style="color: darkgray" :icon="['fas', 'camera']" />
      </div>
      <p>
        На фото не должно быть людей, животных, алкоголя, табака, оружия. Не
        добавляйте чужие фото, картинки с водяными знаками и рекламу.
      </p>
    </div>
    <div class="choose-picture sm:flex">
      <button
        @click.prevent="change"
        style="background-color: rgba(15, 72, 157, 0.1); color: #0468ff"
        class="btn md:w-[150px] sm:w-full font-bold font-monospace "
      >
        Выберите файлы
      </button>
      <input type="file" accept="*png" multiple style="display: none" id="" />
    </div>
  </div>
</template>
<script setup>
function change() {
  const file = document.querySelector(".choose-picture > input");
  file.click();
}
</script>

<style scoped>
@media screen and (min-width: 320px) {
  .picture-room-container {
    display: flex;
    width: 100%;
    flex-direction: column;
  }
  .picture-room-container > span {
    font-size: 16px;
    font-family: lato, sans-serif;
    letter-spacing: -0.2;
    font-weight: 700;
    line-height: 24px;
  }
  .picture-room {
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
}

@media screen and (min-width: 640px) {
  .picture-room-container {
    display: flex;
    width: 100%;
    flex-direction: column;
  }
  .picture-room-container > span {
    font-size: 16px;
    font-family: lato, sans-serif;
    letter-spacing: -0.2;
    font-weight: 700;
    line-height: 24px;
  }
  .picture-room {
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
}
</style>