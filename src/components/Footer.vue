<template>
  <footer class="footer">
    <div class="container">
      <nav class="footer-nav">
        <div class="logo"></div>
        <ul class="nav-list">
          <li v-for="(item, value, key) in info[0].menu" :key="key">
            <a :href="'#' + item.link" class="nav-link">{{ item.title }}</a>
          </li>
        </ul>
        <div class="footer-social">
          <h5 class="footer-social-title">Мы в соц сетях</h5>
          <div class="footer-social-links">
            <a
              class="link"
              target="_blank"
              v-for="(item, value, key) in info[10].socialItems"
              :key="key"
              :href="item.link"
            >
              <svg class="icon-svg">
                <use v-bind:xlink:href="item.icon"></use>
              </svg>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </footer>
</template>

<script>
import json from "../../public/data/data.json";

export default {
  name: "Footer",
  data() {
    return {
      info: json
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.footer {
  background-image: url("../../public/img/footer-bg.png");
  background-size: 200%;
  background-repeat: no-repeat;
  background-position: top center;
  background-color: #000;
  height: 360px;
  @include respond-to(lp) {
    background-size: 100%;
    height: 200px;
  }
  @include respond-to(lg) {
    height: 300px;
  }
  &-nav {
    display: flex;
    flex-direction: column;
    height: 100%;
    align-items: center;
    padding-top: 50px;
    padding-bottom: 30px;
    justify-content: space-between;
    @include respond-to(t) {
      flex-direction: row;
    }
    @include respond-to(lg) {
      padding-top: 120px;
    }
  }
  &-social {
    width: 220px;
    height: 60px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    @include respond-to(lp) {
      align-items: flex-start;
      padding-left: 80px;
    }
    &-title {
      color: #fff;
    }
    .link {
      margin: 0 5px;
    }
    .link:not(:first-child) {
      @include respond-to(lp) {
        margin: 0 5px;
      }
    }
  }
}
.logo {
  background-image: url("../../public/img/logo.png");
  width: 100px;
  height: 40px;
  background-size: 90%;
  background-repeat: no-repeat;
  background-position: center center;
  @include respond-to(lp) {
    width: 170px;
    height: 70px;
  }
}
.nav-list {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 50%;
  list-style-type: none;
  @include respond-to(lp) {
    flex-direction: row;
  }
}
.nav-link {
  color: #ccc;
  font-size: 12px;
  font-family: $gab-r;
  transition: all 0.5s ease;
  @include respond-to(lp) {
    margin-left: 15px;
    &:hover {
      color: #fff;
    }
  }
}
.icon-svg {
  fill: #fff;
  width: 20px;
  height: 20px;
  transition: all 0.5s ease;
  @include respond-to(lp) {
    &:hover {
      fill: $main-color;
    }
  }
}
</style>
