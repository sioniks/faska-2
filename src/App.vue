<template>
  <div id="app">
    <main-header/>
    <section
      class="info info-section"
      :style="{ backgroundImage: 'url(./img/' + info[1].blockOneImg + ')' }"
    >
      <div class="container">
        <div class="info-block">
          <h2 class="s-header info-header">{{ info[1].blockOneHeader }}</h2>
          <div class="s-text info-text">{{ info[1].blockOneText }}</div>
          <a :href="'#product'" class="s-btn wb info-btn">{{ info[1].blockOneBtn }}</a>
        </div>
      </div>
    </section>
    <section id="about" class="about about-section">
      <div class="container">
        <div class="about-block">
          <h2 class="s-header about-header">{{info[2].blockTwoHeader}}</h2>
          <div class="s-text about-text">
            <p>{{info[2].blockTwoText1}}</p>
            <p>{{info[2].blockTwoText2}}</p>
          </div>
          <a :href="'#product'" class="s-btn bb about-btn">{{info[2].blockTwoBtn}}</a>
        </div>
        <img class="about-img" :src="'./img/' + info[2].blockTwoImg" alt>
      </div>
    </section>
    <section
      id="advantages"
      class="advantages advantages-section"
      :style="{ backgroundImage: 'url(./img/' + info[3].blockThreeImg + ')' }"
    >
      <div class="container">
        <div class="advantages-block">
          <div class="s-header advantages-header">{{info[3].blockThreeHeader}}</div>
        </div>
        <div class="advantages-info_wrap">
          <div
            class="advantages-info-item"
            v-for="(block, value, key) in info[3].blockThreeItems"
            :key="key"
          >
            <div class="info-logo" :style="{ backgroundImage: 'url(./img/' + block.icon + ')' }"></div>
            <div class="info-title">{{block.title}}</div>
            <div class="info-text">{{block.text}}</div>
          </div>
        </div>
      </div>
    </section>
    <section id="technology" class="technology technology-section">
      <div class="container">
        <div class="technology-block">
          <div class="s-header technology-header">{{info[4].blockFourHeader}}</div>
          <div class="s-text technology-text">
            <p>{{info[4].blockFourText1}}</p>
            <p>{{info[4].blockFourText2}}</p>
          </div>
          <a :href="'#product'" class="s-btn bb technology-btn">Ассортимент</a>
        </div>
        <img class="technology-img" :src="'./img/' + info[4].blockFourImg" alt>
      </div>
    </section>
    <section
      id="shema"
      class="shema shema-section"
      :style="{ backgroundImage: 'url(./img/' + info[5].blockFiveImg + ')' }"
    >
      <div class="container">
        <div class="shema-block">
          <div class="s-header shema-title">{{info[5].blockFiveHeader}}</div>
          <div class="shema-road">
            <div
              class="shema-road_item"
              v-for="(block, value, key) in info[5].blockFiveItems"
              :key="key"
            >
              <div class="shema-icon" :style="{ backgroundImage: 'url(./img/' + block.icon + ')' }"></div>
              <div class="shema-text">{{block.title}}</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="product" class="product product-section">
      <div class="container">
        <div class="s-header product-header">{{info[6].productionHeader}}</div>
        <div class="product-slider_wrap">
          <carousel
            ref="carousel1"
            :items="items"
            :margin="15"
            :loop="true"
            :nav="true"
            :navText="navText"
          >
            <one-product
              v-for="(block, value, key) in info[6].productionItems"
              :header="block.header"
              :subtext="block.subtext"
              :image="block.image"
              :key="key"
              :productIndex="block.id"
              @openBasket="activeBasket = true, itemForBuy.push({img: block.image, title: block.header, count: 1, size: block.volume[0].size, price: block.volume[0].price, volume: block.volume})"
              @openInfo="fullslider = true, goToSlide(block.id - 1)"
            />
          </carousel>
        </div>
      </div>

      <div class="product-fullslider_wrap" v-if="fullslider" @click.self="fullslider = false">
        <div class="product-fullslider">
          <div class="fullslider-close" @click="fullslider = false">
            <svg class="icon-svg">
              <use xlink:href="#icon-cross"></use>
            </svg>
          </div>
          <carousel
            ref="carousel2"
            :items="1"
            :margin="15"
            :loop="true"
            :nav="true"
            :navText="navText2"
            :startPosition="activeSlide"
          >
            <one-full-product
              v-for="(block, value, key) in info[6].productionItems"
              :header="block.header"
              :type="block.type"
              :image="block.image"
              :character="block.character"
              :description="block.description"
              :key="key"
              @openBasket="activeBasket = true, itemForBuy.push({img: block.image, title: block.header, count: 1, volume: block.volume})"
            />
          </carousel>
        </div>
      </div>
    </section>
    <section
      class="offers offers-section"
      :style="{ backgroundImage: 'url(./img/' + info[7].blockOfferBg + ')' }"
    >
      <div class="container">
        <img class="offers-img" :src="'./img/' + info[7].blockOfferImg" alt>
        <div class="offers-block">
          <img class="offers-decor" src="../public/img/arrow.png" alt>
          <div class="s-header offers-header">{{info[7].blockOfferHeader}}</div>
          <div class="s-text offers-text">
            <p>{{info[7].blockOfferText}}</p>
          </div>
          <a :href="'#product'" class="s-btn db offers-btn">{{info[7].blockOfferBtn}}</a>
        </div>
      </div>
    </section>

    <section class="gallery gallery-section">
      <div class="gallery-wrap">
        <carousel
          :items="itemsGallery"
          :margin="15"
          :loop="true"
          :dots="false"
          :nav="true"
          :navText="navText"
        >
          <img
            v-for="(block, value, key) in info[9].blockGalleryItems"
            :key="key"
            :src="'./img/footer/' + block.image"
            alt
            class="gallery-img"
          >
        </carousel>
      </div>
    </section>
    <div class="mini-basket" v-if="activeBasket && itemForBuy.length" @click="openForm = !openForm">
      <span class="item-counter">{{itemForBuy.length}}</span>
      <svg class="icon-svg">
        <use xlink:href="#icon-cart"></use>
      </svg>
    </div>
    <!-- <basket v-if="openForm" @closeBasket="openForm = false" :itemForBuy="itemForBuy"/> -->
    <cart v-if="openForm" @closeBasket="openForm = false" :itemForBuy="itemForBuy"/>
    <popup-success/>
    <main-footer/>
  </div>
</template>

<script>
import json from "../public/data/data.json";
import MainHeader from "./components/Header.vue";
import MainFooter from "./components/Footer.vue";
import OneProduct from "./components/Product.vue";
import OneFullProduct from "./components/FullProduct.vue";
import carousel from "./components/carousel/Carousel";
import Cart from "./components/Cart.vue";
import PopupSuccess from "./components/Popup.vue";

export default {
  name: "app",
  components: {
    MainHeader,
    MainFooter,
    OneProduct,
    OneFullProduct,
    carousel,
    Cart,
    PopupSuccess
  },
  data() {
    return {
      info: json,
      fullslider: false,
      galleryImg: 1,
      active: 1,
      activeBasket: false,
      openForm: false,
      itemForBuy: [],
      window: {
        width: 0,
        height: 0
      },
      items: 1,
      navText: [
        "<img src='./img/left_arrow.png'>",
        "<img src='./img/right_arrow.png'>"
      ],
      navText2: [
        "<img src='./img/left_arrow--c.png'>",
        "<img src='./img/right_arrow--c.png'>"
      ],
      itemsGallery: 1,
      cart: [],
      cartSubTotal: 0,
      cartTotal: 0,
      activeSlide: 1
    };
  },
  created() {
    window.addEventListener("resize", this.handleResize);
    this.handleResize();
  },
  destroyed() {
    window.removeEventListener("resize", this.handleResize);
  },
  methods: {
    log() {
      // setTimeout(() => {
      this.$refs.carousel2.emit("to.owl.carousel", 5);
      // }, 2000);
    },
    goToSlide(num) {
      this.activeSlide = num;
    },
    handleResize() {
      this.window.width = window.innerWidth;
      this.window.height = window.innerHeight;

      if (this.window.width > 767 && this.window.width < 1024) {
        this.items = 2;
        this.itemsGallery = 3;
      } else if (this.window.width > 1024) {
        this.items = 3;
        this.itemsGallery = 4;
      }
    }
  }
};
</script>

<style lang="scss">
.owl-theme .owl-nav [class*="owl-"] {
  background: none !important;

  &:hover {
    color: none !important;
    background: none !important;
  }
}
.info {
  &-section {
    height: 560px;
    background-size: auto 100%;
    background-repeat: no-repeat;
    background-position: 71% bottom;
    @include respond-to(lp) {
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center bottom;
    }
    @include respond-to(lg) {
      height: 690px;
      background-position: center bottom;
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    @include respond-to(t) {
      align-items: flex-end;
      text-align: left;
    }
  }
  &-block {
    width: 80%;
    height: 100%;
    float: right;
    padding-top: 50px;
    padding-right: 10px;
    @include respond-to(t) {
      width: 40%;
      padding-top: 130px;
    }
  }
  &-header {
    color: $main-color;
  }
  &-text {
    margin-bottom: 20px;
    margin-left: 20px;
    @include respond-to(t) {
      font-size: 16px;
      margin-left: 0;
    }
  }
  &-btn {
    margin: auto;
    @include respond-to(t) {
      margin-left: 0;
    }
  }
}
.about {
  &-section {
    height: 660px;
    @include respond-to(t) {
      height: 500px;
    }
    @include respond-to(lp) {
      height: 840px;
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    @include respond-to(t) {
      justify-content: flex-start;
      flex-direction: row;
    }
  }
  &-block {
    width: 90%;
    height: 100%;
    // float: left;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    @include respond-to(t) {
      width: 80%;
      margin: 0 auto;
    }
    @include respond-to(lp) {
      margin: 0;
      width: 30%;
      align-items: flex-start;
    }
  }
  &-header {
    margin-bottom: 30px;
  }
  &-text {
    color: #000;
    text-align: center;
    @include respond-to(lp) {
      text-align: left;
    }
    p {
      margin-bottom: 15px;
    }
  }
  &-btn {
  }
  &-img {
    position: absolute;
    top: 50%;
    right: 0%;
    transform: translate(0%, -50%);
    max-height: 500px;
    max-width: 500px;
    display: none;
    @include respond-to(lp) {
      display: block;
      max-height: 600px;
      max-width: 700px;
    }
  }
}
.advantages {
  &-section {
    height: 950px;
    background-repeat: no-repeat;
    background-size: 100%;
    background-position: left bottom;
    @include respond-to(t) {
      height: 780px;
    }
    @include respond-to(lp) {
      background-size: 100% 100%;
      background-position: center bottom;
    }
    @include respond-to(d) {
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding-top: 50px;
    background: #f8c816;
    position: relative;
    top: 0;
    height: 880px;
    @include respond-to(t) {
      height: 650px;
      width: 100%;
    }
    @include respond-to(lp) {
      padding-top: 150px;
      height: 510px;
      width: 1120px;
      background: none;
    }
  }
  &-header {
    margin-bottom: 30px;
    padding: 0 20px;
    text-align: center;
  }
  &-block {
    width: 100%;
  }
  &-info_wrap {
    display: flex;
    justify-content: space-around;
    flex-direction: column;
    @include respond-to(t) {
      flex-direction: row;
      flex-wrap: wrap;
    }
  }
  &-info-item {
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    @include respond-to(t) {
      width: 45%;
    }
    @include respond-to(lp) {
      width: 27%;
    }
    .info-logo {
      width: 64px;
      height: 64px;
      background-repeat: no-repeat;
      background-size: contain;
      background-position: center center;
      margin: 0 auto;
      margin-bottom: 20px;
    }
    .info-title {
      color: #000;
      font-size: 18px;
      font-family: $op-b;
      margin-bottom: 15px;
    }
    .info-text {
      width: 80%;
      color: #000;
      font-size: 14px;
      line-height: 1.3;
      margin: 0;
      margin-bottom: 20px;
      @include respond-to(lp) {
        width: 100%;
      }
    }
  }
}

.technology {
  &-section {
    height: 500px;
    @include respond-to(lp) {
      height: 840px;
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    @include respond-to(lp) {
      justify-content: flex-end;
      flex-direction: row;
    }
  }
  &-block {
    width: 90%;
    height: 100%;
    float: right;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    @include respond-to(lp) {
      width: 30%;
      align-items: flex-start;
    }
  }

  &-header {
    margin-bottom: 30px;
  }
  &-text {
    color: #000;
    text-align: center;
    @include respond-to(lp) {
      text-align: left;
    }
    p {
      margin-bottom: 15px;
    }
  }
  &-btn {
  }
  &-img {
    position: absolute;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%);
    max-height: 500px;
    max-width: 500px;
    display: none;
    @include respond-to(lp) {
      display: block;
      max-height: 600px;
      max-width: 700px;
    }
  }
}
.shema {
  &-section {
    height: 600px;
    background-size: 400% 100%;
    background-repeat: no-repeat;
    background-position: center;
    @include respond-to(t) {
      height: 500px;
      background-size: 300% 100%;
    }

    @include respond-to(lp) {
      height: 570px;
      background-size: 100% 100%;
      background-repeat: no-repeat;
      background-position: right top;
    }
    @include respond-to(lg) {
    }
  }
  .container {
  }
  &-block {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    padding-top: 115px;
    color: #fff;
    @include respond-to(lp) {
      padding-top: 160px;
    }
  }
  &-title {
    width: 90%;
    text-align: center;
    font-size: 28px;
    @include respond-to(lp) {
      font-size: 48px;
    }
  }
  &-road {
    display: flex;
    align-items: center;
    justify-content: space-around;
    width: 100%;
    flex-wrap: wrap;
    @include respond-to(lp) {
      width: 80%;
    }
  }
  &-road_item {
    width: 42%;
    text-align: center;
    margin-bottom: 25px;
    position: relative;
    &:not(:last-child):after {
      content: url("../public/img/arrow_1.png");
      position: absolute;
      width: 20px;
      height: 20px;
      top: 30%;
      right: -35px;
      transform: translate(-50%);
      display: block;
    }
    &:nth-child(2):after {
      display: none;
    }
    @include respond-to(t) {
      width: 20%;
      &:nth-child(2):after {
        display: block;
      }
    }
  }
  &-icon {
    width: 40px;
    height: 50px;
    background-repeat: no-repeat;
    background-size: contain;
    background-position: bottom center;
    margin: 0 auto;
    margin-bottom: 20px;
    @include respond-to(lp) {
      width: 64px;
      height: 64px;
    }
  }

  &-text {
    font-size: 14px;
    line-height: 1.3;
  }
}
.product {
  &-section {
    height: 660px;
    position: relative;
    @include respond-to(lp) {
      height: 960px;
    }
  }
  &-header {
    margin-top: 40px;
    margin-bottom: 40px;
    text-align: center;
    @include respond-to(lp) {
      margin-top: 80px;
      margin-bottom: 80px;
    }
  }
  &-slider_wrap {
    padding-bottom: 20px;
    width: 300px;
    margin: 0 auto;
    position: relative;
    @include respond-to(t) {
      width: 95%;
    }
    @include respond-to(lp) {
      width: 100%;
    }
  }
  .owl-nav {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(0, -50%);
    height: 50px;
    width: 100%;

    .owl-prev {
      position: absolute;
      left: 0;
    }
    .owl-next {
      position: absolute;
      right: 0;
    }
  }
  .owl-dots {
    margin-bottom: 10px;
    .owl-dot {
      span {
        background: #000;
        width: 13px;
        height: 13px;
      }
      &.active {
        span {
          background: $main-color;
        }
      }
    }
  }
}
.product-fullslider_wrap {
  position: fixed;
  width: 100vw;
  height: 100vh;
  top: 0;
  left: 0;
  background: rgba(#000, 0.5);
  z-index: 101;
  display: flex;
  align-items: center;
  justify-content: center;

  .product-fullslider {
    width: 300px;
    min-height: 490px;
    display: block;
    position: relative;
    @include respond-to(lp) {
      width: 790px;
      min-height: 520px;
    }
    @include respond-to(lg) {
      width: 1000px;
      min-height: 750px;
    }
  }
  .fullslider-close {
    width: 30px;
    height: 30px;
    padding: 2px 5px;
    border-radius: 50%;
    display: block;
    cursor: pointer;
    border: 3px solid $main-color;
    position: absolute;
    right: 11px;
    top: 11px;
    z-index: 10;

    .icon-svg {
      fill: $main-color;
    }
  }
  .owl-carousel .owl-item img {
    display: none;
    @include respond-to(lp) {
      display: block;
    }
  }

  // .owl-nav {
  //   position: relative;
  //   height: 50px;
  //   width: 100%;
  //   transform: translate(0, -8%);
  //   @include respond-to(lp) {
  //     width: 110%;
  //     position: absolute;
  //     top: 97%;
  //     left: -5%;
  //     transform: translate(0, -50%);
  //   }
  //   .owl-prev {
  //     position: absolute;
  //     left: 0;
  //   }
  //   .owl-next {
  //     position: absolute;
  //     right: 0;
  //   }
  // }
  // .owl-dots {
  //   margin-bottom: 10px;
  //   display: none;
  //   @include respond-to(lp) {
  //     display: block;
  //   }
  //   .owl-dot {
  //     span {
  //       background: #fff;
  //       width: 13px;
  //       height: 13px;
  //     }
  //     &.active {
  //       span {
  //         background: $main-color;
  //       }
  //     }
  //   }
  // }
  .owl-nav {
    height: 50px;
    width: 100%;
    position: absolute;
    top: 97%;
    @include respond-to(lp) {
      width: 120%;
      top: 50%;
      left: -10%;
      transform: translate(0, -50%);
    }
    .owl-prev {
      position: absolute;
      left: 0;
    }
    .owl-next {
      position: absolute;
      right: 0;
    }
  }
  .owl-dots {
    display: none;
    @include respond-to(lp) {
      display: block;
    }
    margin-bottom: 10px;
    .owl-dot {
      span {
        background: #fff;
        width: 13px;
        height: 13px;
      }
      &.active {
        span {
          background: $main-color;
        }
      }
    }
  }
}
.offers {
  &-section {
    background-size: 200% 100%;
    background-repeat: no-repeat;
    background-position: center top;
    position: relative;
    height: 500px;
    @include respond-to(lp) {
      height: 570px;
      background-size: 100% 100%;
    }
    @include respond-to(lg) {
      background-size: 100% 100%;
    }
  }
  .container {
    width: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
    @include respond-to(lp) {
      justify-content: flex-end;
    }
  }
  &-block {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    text-align: center;
    @include respond-to(lp) {
      width: 43%;
      text-align: left;
    }
  }
  &-header {
    color: $main-color;
  }
  &-text {
    color: #fff;
    p {
      margin-bottom: 15px;
    }
  }
  &-btn {
    margin: 0 auto;
    &:after {
      content: url("../public/img/right-be.png");
      position: absolute;
      width: 20px;
      height: 20px;
      top: -15px;
      right: -15px;
      display: block;
    }
    &:before {
      content: url("../public/img/left-be.png");
      position: absolute;
      width: 20px;
      height: 20px;
      bottom: -10px;
      left: -20px;
    }
    @include respond-to(lp) {
      margin: 0;
    }
  }
  &-img {
    position: absolute;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%);
    max-height: 500px;
    max-width: 500px;
    display: none;
    @include respond-to(lp) {
      display: block;
    }
  }
  &-decor {
    position: absolute;
    display: block;
    left: -70px;
    top: 42%;
    // width: 60px;
    // height: 90px;
  }
}

.gallery {
  &-section {
    height: 270px;
    background-image: url("../public/img/gallery-bg.png");
    background-repeat: no-repeat;
    background-size: contain;
    background-position: top center;
    position: relative;
    overflow: hidden;
    @include respond-to(t) {
      height: 200px;
    }
    @include respond-to(lp) {
      height: 400px;
    }
    @include respond-to(lg) {
      height: 530px;
    }
  }
  &-wrap {
    background-color: #f8c101;
    width: 116%;
    height: 95%;
    overflow: hidden;
    position: absolute;
    bottom: 0;
    left: -8%;
    padding-bottom: 20px;
    @include respond-to(lp) {
      height: 70%;
    }
  }
  &-img {
    height: auto;
    width: 100%;
    margin: 0;
    @include respond-to(lp) {
      width: 150px;
      margin: 5px;
    }
  }
  .owl-nav {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 50px;
    width: 90%;
    @include respond-to(t) {
      width: 85%;
    }
    .owl-prev {
      position: absolute;
      left: 0;
    }
    .owl-next {
      position: absolute;
      right: 0;
    }
  }
  .owl-dots {
    margin-bottom: 10px;
    .owl-dot {
      span {
        background: #000;
        width: 13px;
        height: 13px;
      }
      &.active {
        span {
          background: $main-color;
        }
      }
    }
  }
}
.mini-basket {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  z-index: 50;
  top: 10%;
  right: 10px;
  width: 50px;
  height: 50px;
  cursor: pointer;
  background-color: #000;
  border-radius: 50%;
  border: 1px solid $main-color;
  @include respond-to(lp) {
    top: 20%;
    right: 20px;
    width: 100px;
    height: 100px;
  }
  .icon-svg {
    width: 60%;
    height: 60%;
    fill: #fff;
  }
  .item-counter {
    position: absolute;
    display: block;
    border-radius: 50%;
    background: $main-color;
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 20px;
    font-size: 12px;
    top: -5px;
    right: -5px;
  }
}
</style>
