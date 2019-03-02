<template>
  <div class="full-product">
    <img :src="'./img/' + image" alt class="full-product_img">
    <div class="full-product_info">
      <h3 class="full-product_header">{{header}}</h3>
      <p class="full-product_type">{{type}}</p>
      <button class="s-btn full-product_btn" @click="$emit('openBasket')">Заказать</button>
      <div class="full-product_infobtn">
        <div
          class="info-btn full-product_subscribe"
          v-if="this.description.length > 1"
          :class="{ active: desc }"
          @click="desc = true, char = false "
        >Описание</div>
        <div
          v-if="this.character.length > 1"
          class="info-btn full-product_character"
          :class="{ active: char }"
          @click="desc = false, char = true"
        >Характеристики</div>
      </div>
      <div class="full-product_infowrap">
        <div class="full-product_subscribe-list" v-if="desc">
          <div class="list-item" v-for="(block, value, key) in description" :key="key">
            <p class="left">{{block.title}}</p>
            <p class="right">{{block.text}}</p>
          </div>
        </div>
        <div class="info-list full-product_character-list" v-if="char">
          <div class="list-item" v-for="(char, value, key) in character" :key="key">
            <div class="title">{{char.title}}</div>
            <div class="text">{{char.text}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FullProduct",
  props: {
    header: String,
    subtext: String,
    type: String,
    image: String,
    character: Array,
    description: Array
  },
  data() {
    return {
      char: true,
      desc: false
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.full-product {
  display: flex;
  align-items: flex-start;
  background-color: #fff;
  width: 300px;
  height: 490px;
  padding: 20px;
  @include respond-to(lp) {
    justify-content: space-between;
    width: 790px;
    min-height: 520px;
    padding: 50px 10px 50px 35px;
  }
  @include respond-to(lg) {
    width: 1000px;
    min-height: 750px;
  }

  &_img {
    display: none;
    @include respond-to(lp) {
      width: 280px !important;
      height: auto;
      display: block;
    }
  }
  &_info {
    display: block;
    width: 100%;
    height: auto;
    @include respond-to(lp) {
      width: 420px;
    }
    @include respond-to(lg) {
      width: 560px;
    }
  }
  &_header {
    font-size: 20px;
    font-family: $gab-r;
    margin-bottom: 5px;
    text-align: center;
    @include respond-to(lp) {
      text-align: left;
      font-size: 24px;
    }
  }
  &_type {
    font-size: 14px;
    font-family: $op-r;
    margin-bottom: 20px;
    text-align: center;
    @include respond-to(lp) {
      text-align: left;
    }
  }
  &_btn {
    background-color: $main-color;
    margin: 0 auto;
    @include respond-to(lp) {
      margin-left: 0;
    }
  }
  &_infobtn {
    display: flex;
    margin: 20px 0 10px;
    font-size: 14px;
    .info-btn {
      margin-right: 20px;
      position: relative;
      height: 30px;
      padding-bottom: 5px;
      color: #656565;
      cursor: pointer;
      &.active {
        color: #000;
        font-family: $op-sb;
        &:after {
          content: "";
          width: 50px;
          height: 2px;
          background: $main-color;
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translate(-50%);
        }
      }
    }
  }

  &_subscribe-list {
    display: flex;
    flex-direction: column;
    overflow: scroll;
    height: 250px;
    font-size: 14px;
    .list-item {
      margin-bottom: 10px;
      display: block;
      height: auto;
      // @include respond-to(lp) {
      //   display: flex;
      //   justify-content: space-between;
      // }
    }
    .left {
      width: 100%;
      // word-wrap: wrap;
      text-align: left;
      color: #000;
      font-family: $op-sb;
      // @include respond-to(lp) {
      //   width: 180px;
      // }
      p {
        display: block;
      }
    }
    .right {
      width: 100%;
      // word-wrap: wrap;
      text-align: left;
      color: #656565;

      p {
        display: block;
      }
    }
  }
  &_character-list {
    font-size: 14px;
    display: flex;
    flex-direction: column;
    overflow-y: scroll;
    height: 250px;
    @include respond-to(lp) {
      height: 330px;
    }
    @include respond-to(lg) {
      height: 460px;
    }
    .list-item {
      margin-bottom: 10px;
      display: block;
      height: auto;
      @include respond-to(lp) {
        display: flex;
        justify-content: space-between;
      }
    }

    .title {
      color: #000;
      font-family: $op-sb;
      @include respond-to(t) {
        width: 180px;
      }
    }
    .text {
      color: #656565;
      @include respond-to(t) {
        width: 240px;
      }
    }
  }
}
</style>
