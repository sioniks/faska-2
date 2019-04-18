<template>
  <div class="one-product">
    <div class="info-link" @click="$emit('openInfo'), productIndex">
      <svg class="icon-svg">
        <use xlink:href="#icon-info"></use>
      </svg>
    </div>
    <img class="one-product_img" :src="'./img/' + image" alt>
    <div class="one-product--hover"></div>
    <div class="one-product_info">
      <h3 class="one-product_header">{{header}}</h3>
      <p class="one-product_subtext">{{subtext}}</p>
      <button class="s-btn one-product_btn" @click.self="$emit('openBasket')">Заказать</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "Product",
  props: {
    header: String,
    subtext: String,
    image: String,
    productIndex: Number,
    character: Array
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.one-product {
  display: block;
  width: 300px;
  height: 525px;
  background: #000;
  overflow: hidden;
  position: relative;
  margin: 0 auto;

  @include respond-to(lp) {
    width: 350px;
    height: 625px;
    &:hover {
      .one-product--hover {
        opacity: 0.3;
      }
      .info-link {
        background: rgba(#000, 0.5);
      }
    }
  }

  .info-link {
    position: absolute;
    width: 150px;
    height: 150px;
    top: -75px;
    right: -75px;
    z-index: 10;
    transition: all 0.5s ease;
    background: rgba($main-color, 0.5);
    transform: rotate(45deg);
    cursor: pointer;
  }
  .icon-svg {
    position: absolute;
    height: 20px;
    width: 20px;
    display: block;
    fill: #fff;
    top: 110px;
    right: 65px;
    transform: rotate(-45deg);
    z-index: 10;
  }
  &_img {
    display: block;
    position: absolute;
    width: 100%;
    height: 345px;
    top: 0;
    left: 0;
    z-index: 1;
    @include respond-to(lp) {
      height: 415px;
    }
  }
  &--hover {
    position: absolute;
    opacity: 0;
    transition: opacity 0.5s ease;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 2;
    background-color: $main-color;
  }
  &_info {
    min-height: 250px;
    width: 100%;
    position: absolute;
    z-index: 3;
    padding: 10px;
    bottom: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    background: #000;
    @include respond-to(lp) {
      // padding: 5px 10px;
      // height: 210px;
      padding: 5px 30px;
    }
  }
  &_header {
    font-size: 16px;
    font-family: $op-b;
    margin-bottom: 15px;
    @include respond-to(lp) {
      font-size: 18px;
      margin-bottom: 20px;
    }
  }
  &_subtext {
    font-size: 12px;
    font-family: $op-r;
    line-height: 1.3;
    margin-bottom: 10px;
    @include respond-to(lp) {
      font-size: 14px;
      margin-bottom: 15px;
    }
  }
  &_btn {
    background-color: $main-color;
    cursor: pointer;
  }
}
.icon-svg {
}
</style>
