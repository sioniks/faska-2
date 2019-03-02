<template>
  <section id="review" class="review review-section">
    <div class="container">
      <div class="review-wrap">
        <div class="s-header review-header">{{info[8].blockReviewHeader}}</div>
        <carousel :items="1" :loop="true" :navText="navText">
          <div
            class="one-review"
            v-for="(block, value, key) in info[8].blockReviewItems"
            :key="key"
          >
            <p class="s-text review-text">{{block.text}}</p>
            <p class="review-author">{{block.author}}</p>
          </div>
        </carousel>
      </div>
      <img :src="'./img/' + info[8].blockReviewImg" class="review-img" alt>
    </div>
  </section>
</template>

<script>
export default {
  name: "Reiew"
};
</script>

<style lang='scss'>
.review {
  &-section {
    height: 570px;
    width: 100%;
    @include respond-to(lp) {
      height: 670px;
    }
  }
  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    @include respond-to(lp) {
      flex-direction: row;
    }
  }
  &-header {
    color: #000;
    text-align: center;
    @include respond-to(lp) {
      text-align: left;
    }
  }
  &-wrap {
    height: 300px;
    width: 300px;
    @include respond-to(lp) {
      height: 400px;
      width: 400px;
    }
  }
  &-text {
    color: #000;
    text-align: center;
  }
  &-author {
    text-align: right;
    margin-top: 15px;
    margin-right: 10px;
    font-size: 14px;
    color: #000;

    @include respond-to(lp) {
      font-size: 16px;
    }
  }
  &-img {
    width: 300px;
    @include respond-to(lp) {
      width: auto;
    }
  }
  .one-review {
    padding: 0 30px;
  }
  .owl-nav {
    position: absolute;
    top: 30%;
    left: 0;
    transform: translate(0, -50%);
    height: 50px;
    width: 100%;
    .owl-prev {
      position: absolute;
      left: -10px;
    }
    .owl-next {
      position: absolute;
      right: -10px;
    }
  }
  .owl-dots {
    margin-top: 10px;
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
</style>
