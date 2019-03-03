<template>
  <div class="popup__wrap">
    <div class="popup">
      <svg class="icon-svg shop">
        <use xlink:href="#icon-shopbag"></use>
      </svg>
      <svg class="icon-svg close">
        <use xlink:href="#icon-cross"></use>
      </svg>
      <h3 class="popup__header">Вы успешно оформили заявку</h3>
      <div class="popup__text">
        <span>Заявка принята в оработку, с Вами свяжется наш менеджер!</span>
        <span>С лучшими пожеланиями, Fasko organic</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PopupSuccess"
};
</script>

<style lang='scss'>
.popup__wrap {
  position: fixed;
  top: 0;
  left: 0;
  z-index: -100;
  width: 100vw;
  height: 100vh;
  background: rgba(#000, 0.5);
  transition: all 0.5s ease;
  visibility: hidden;
  visibility: visible;
  z-index: 100;
  // &.is-active {
  //   visibility: visible;
  //   z-index: 100;
  // }
}
.popup {
  @include position(center);
  width: 728px;
  height: 251px;
  background-color: #ffffff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.icon-svg {
  &.close {
    position: absolute;
    width: 14px;
    height: 14px;
    top: 10px;
    right: 10px;
    fill: #ccc;
  }
  &.shop {
    width: 64px;
    height: 60px;
  }
}
.popup__header {
  position: relative;
  font-size: 24px;
  margin-bottom: 1.4em;
  &:after {
    position: absolute;
    content: "";
    display: block;
    background-color: #d7d7d7;
    height: 1px;
    width: 10em;
    bottom: -0.4em;
    left: 50%;
    transform: translate(-50%);
  }
}
.popup__text {
  color: #000;
  width: 80%;
  text-align: center;
  span {
    display: block;
  }
}
</style>
