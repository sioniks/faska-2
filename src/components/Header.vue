<template>
  <header class="header">
    <div class="container">
      <nav class="header-nav">
        <div class="logo"></div>
        <ul class="nav-list" :class="{ 'is-open': openMenu }" @click.self="openMenu = !openMenu">
          <li class="nav-li" v-for="(item, value, key) in info[0].menu" :key="key">
            <a
              :href="'#' + item.link"
              class="nav-link"
              @click="openMenu = !openMenu"
            >{{ item.title }}</a>
          </li>
          <svg class="icon-svg close-icon" @click="openMenu = !openMenu">
            <use xlink:href="#icon-cross"></use>
          </svg>
        </ul>
        <div class="menu-btn" @click="openMenu = !openMenu">
          <svg class="icon-svg">
            <use xlink:href="#icon-menu"></use>
          </svg>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
import json from "../../public/data/data.json";

export default {
  name: "Header",
  data() {
    return {
      info: json,
      openMenu: false
    };
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.header {
  background: #090700;
  height: 70px;
  width: 100%;
  position: fixed;
  z-index: 200;
  @include respond-to(lg) {
    height: 128px;
  }
  &-nav {
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: space-between;
  }
}
.logo {
  background-image: url("../../public/img/logo.png");
  width: 90px;
  height: 40px;
  background-size: 90%;
  background-repeat: no-repeat;
  background-position: center center;
  left: 15px;
  position: relative;
  @include respond-to(lp) {
    width: 170px;
    height: 70px;
    left: 0;
  }
}
.nav-list {
  display: flex;
  align-items: center;
  list-style-type: none;

  position: fixed;
  width: 95vw;
  height: 95vh;
  background: #000;
  top: 2.5vh;
  left: 2.5vw;
  flex-direction: column;
  justify-content: center;
  transition: all 1s ease;
  transform: translateX(-120%);
  z-index: 10;
  &.is-open {
    transform: translateX(0);
    .close-icon {
      display: block;
      @include respond-to(lp) {
        display: none;
      }
    }
  }
  @include respond-to(lp) {
    transform: translateX(0);
    height: 100%;
    position: relative;
    flex-direction: row;
    width: auto;
    background: none;
    top: unset;
    left: unset;
  }
}
.nav-link {
  color: #ccc;
  margin-left: 36px;
  font-size: 14px;
  font-family: $gab-r;
  transition: all 0.5s ease;

  &:hover {
    color: #fff;
  }
}
.nav-li {
  margin-bottom: 25px;
  @include respond-to(lp) {
    margin-bottom: 0;
  }
}
.menu-btn {
  display: block;
  position: absolute;
  right: 15px;
  top: 18px;
  width: 30px;
  height: 30px;
  cursor: pointer;

  @include respond-to(lp) {
    display: none;
  }
  .icon-svg {
    fill: #fff;
  }
}

.close-icon {
  fill: #fff;
  position: absolute;
  top: 20px;
  right: 20px;
  width: 20px;
  height: 20px;
  display: none;
  cursor: pointer;
}
</style>
