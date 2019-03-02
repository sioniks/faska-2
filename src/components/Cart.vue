<template>
  <div class="basket">
    <div class="basket-wrap" @click.self="$emit('closeBasket')">
      <div class="basket-container">
        <div class="basket-close" @click="$emit('closeBasket')">
          <svg class="icon-svg">
            <use xlink:href="#icon-cross"></use>
          </svg>
        </div>
        <h3 class="basket-header">Вы добавили товар в корзину</h3>
        <div class="items-title">
          <p class="items-title_type">Тара</p>
          <p class="items-title_count">Колличество</p>
          <p class="items-title_price">Цена</p>
        </div>
        <form @submit.prevent="submitForm" class="basket-form">
          <div class="input-group item" v-for="(item, key) in itemForBuy" :key="key">
            <img :src="'./img/' + item.img" alt class="item-img">
            <div class="item-name">{{item.title}}</div>
            <!-- <input name="type" type="text"  value> -->
            <div class="item__character--wrap">
              <div class="item__type">
                <label for="tupe" class="item__label item__type--title">Виберите тару:</label>
                <select id="type" @change="onChange(selected[key], key)" v-model="selected[key]">
                  <option
                    v-for="(option, key) in item.volume"
                    :value="option.size"
                    :selected="selected[key]"
                    :key="key"
                  >{{option.size}}</option>
                </select>
              </div>

              <div class="item-count">
                <label for="count" class="item__label item__type--title">Колличество:</label>
                <div class="input-wrap">
                  <button
                    type="button"
                    class="count-minus count-btn"
                    @click="item.count -= 1"
                    :disabled="item.count === 1"
                  >
                    <svg class="icon-svg">
                      <use xlink:href="#icon-minus"></use>
                    </svg>
                  </button>
                  
                  <input
                    id="count"
                    name="count"
                    type="text"
                    class="item__label item-counter"
                    :value="item.count"
                    disabled
                  >
                  <button type="button" class="count-plus count-btn" @click="item.count += 1">
                    <svg class="icon-svg">
                      <use xlink:href="#icon-plus"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="item-price">
                <label for="price" class="item__label item__type__title">Цена:</label>
                <!-- v-if="selected[key]" -->
                <input
                  name="price"
                  id="price"
                  type="text"
                  class="item-price__input"
                  :value="item.price * item.count  + ' грн'"
                  disabled
                >
              </div>
            </div>
            <div class="item-remove" @click="removeProduct(key)">
              <svg class="icon-svg">
                <use xlink:href="#icon-cross"></use>
              </svg>
            </div>
          </div>
          {{selected}}
          <div class="input-group totalprice">
            <label for="totalptice" class="totalprice-header">Итого:</label>
            <input
              v-if="selected.length"
              id="totalptice"
              name="totalptice"
              type="text"
              class="totalprice-value"
              :value="totalSum() + ' грн'"
              disabled
            >
          </div>

          <h3 class="basket-header">Оставить заявку</h3>
          <div class="bio">
            <div class="input-group">
              <label class="bio-title" for="fio">Имя и фамилия</label>
              <input v-model="fio" class="bio-input" type="text" name="fio" id="fio">
            </div>
            <div class="input-group">
              <label class="bio-title" for="tel">Мобильный номер *</label>
              <input
                v-model="tel"
                class="bio-input"
                type="tel"
                name="tel"
                id="mobile"
                placeholder="099-99-99-999"
                pattern="^[0-9]{10}$"
                title="0999999999"
                required
              >
            </div>
            <div class="input-group">
              <label class="bio-title" for="email">Ел.почта *</label>
              <input
                class="bio-input"
                type="text"
                name="email"
                id="mail"
                placeholder="example@domaine.com"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                title="name@domain.etc"
                v-model="email"
                required
              >
            </div>
            <span class="error-massage">* - поля обязательные для заполнениея</span>
            <button class="btn-submit" type="submit" :disabled="this.tel.length < 10">Заказать</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Cart",
  props: {
    itemForBuy: Array,
    cartTotal: Number
  },

  data() {
    return {
      cost: 1,
      selected: [],
      total: 0,
      fio: "",
      tel: "",
      email: ""
    };
  },
  methods: {
    totalSum: function() {
      let val = [];
      for (let i = 0; i < this.itemForBuy.length; i++) {
        let newItem = this.itemForBuy[i].price * this.itemForBuy[i].count;
        val.push(newItem);
      }
      let result = val.reduce((sum, current) => {
        return sum + current;
      }, 0);

      return result;
    },
    removeProduct: function(product) {
      this.itemForBuy.splice(product, 1);
      this.selected.splice(product, 1);
      if (this.itemForBuy.length < 1) {
        this.$emit("closeBasket");
      }

      // console.log(product);
    },
    onChange(item, key) {
      const { size, price } = this.itemForBuy[key].volume.find(
        ({ size }) => size === item
      );
      this.itemForBuy[key].size = size;
      this.itemForBuy[key].price = price;
    },
    submitForm() {
      // let data = new FormData();
      // data.append("fio", this.fio);
      // data.append("tel", this.tel);
      // data.append("email", this.email);
      fetch("file.php", {
        method: "post",
        body: JSON.parse(
          JSON.stringify({
            fio: this.fio,
            tel: this.tel,
            email: this.email
          })
        ),
        // body: data,
        credentials: "same-origin",
        headers: {
          "content-type": "application/json"
        }
      })
        .then(resp => {
          console.log(resp);
          return resp.json();
        })
        .catch(err => {
          console.log(err);
        });
    }

    // qty: function(product, dir) {
    //   for (let i = 0; i < this.itemForBuy.length; i++) {
    //     let newItem = this.itemForBuy[i];
    //     if (dir === 1) {
    //       newItem.count = newItem.count + 1;
    //     } else if (dir === 2) {
    //       newItem.count = newItem.count - 1;
    //     }
    //   }
    // }
  }
};
</script>

<style scoped lang='scss'>
.basket {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100vw;
  height: 100vh;
  display: block;
  // display: none;
  &-close {
    width: 30px;
    height: 30px;
    padding: 2px 5px;
    border-radius: 50%;
    display: block;
    cursor: pointer;
    border: 3px solid $main-color;
    position: absolute;
    right: 2px;
    top: 2px;

    .icon-svg {
      fill: $main-color;
    }
  }
  &-wrap {
    width: 100%;
    height: 100%;
    background: rgba(#000, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  &-container {
    width: 95%;
    height: 500px;
    background: #fff;
    padding: 20px 20px 50px;
    overflow: scroll;
    position: relative;
    @include respond-to(lp) {
      padding: 80px 65px;
      width: 730px;
    }
  }
  &-header {
    font-family: $gab-r;
    font-size: 24px;
    margin-bottom: 30px;
    width: 100%;
    text-align: center;
  }
}
.items-title {
  display: none;
  @include respond-to(lp) {
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: flex-end;
    font-size: 12px;
    font-family: $op-l;
    color: #656565;
    padding-bottom: 5px;
    border-bottom: 1px solid #656565;
    &_type {
      width: 130px;
    }
    &_count {
      width: 120px;
    }
    &_price {
      width: 85px;
    }
  }
}

.item {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  position: relative;
  padding: 20px 0;
  flex-wrap: wrap;
  border-bottom: 1px solid #656565;
  margin-bottom: 10px;
  &-img {
    width: 60px;
    height: 80px;
    order: 2;
    @include respond-to(t) {
      order: 1;
    }
  }
  &-name {
    width: 100%;
    font-size: 12px;
    font-family: $op-r;
    order: 1;
    text-align: center;
    margin-bottom: 10px;
    @include respond-to(t) {
      order: 2;
      width: 185px;
    }
    @include respond-to(lp) {
      font-size: 14px;
      padding-left: 20px;
    }
  }
  &__label {
    font-size: 12px;
    color: rgba(#000, 0.5);
    @include respond-to(t) {
      display: none;
    }
  }
  &__character--wrap {
    order: 3;
    width: calc(100% - 60px);
    display: flex;
    padding-left: 20px;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    height: 100px;
    @include respond-to(t) {
      padding-left: 0;
      width: 335px;
      flex-direction: row;
    }
  }
  &__type {
    width: 100%;
    height: 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    @include respond-to(t) {
      width: 130px;
    }
    select {
      box-shadow: 1px 1px 10px -1px #656565;
      border: none;
      border-radius: 0;
      height: 25px;
      width: 80px;

      .option {
        width: 100%;
      }
    }
    .type-arrow {
      width: 15px;
      height: 15px;
    }
  }
  &-count {
    width: 100%;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    @include respond-to(t) {
      width: 120px;
      justify-content: flex-start;
    }
    .count-btn {
      display: block;
      background: #fff;
      width: 25px;
      height: 25px;
      box-shadow: none;
      border: none;
      .icon-svg {
        margin: 15%;
        width: 70%;
        height: 70%;
        fill: #ccc;
      }
      @include respond-to(lp) {
        &:hover {
          fill: $main-color;
        }
      }
    }

    .input-wrap {
      display: flex;
      justify-content: space-between;
    }
    .item-counter {
      width: 30px;
      height: 25px;
      border: none;
      // background: none;
      text-align: center;
      margin: 0 1px;
      display: inline-block;
      box-shadow: 1px 1px 10px -1px #656565;
    }
  }
  &-price {
    width: 100%;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    @include respond-to(t) {
      width: 85px;
    }
    &__input {
      width: 75px;
      border: none;
      background: none;
      box-shadow: none;
      font-family: $op-r;
      font-size: 14px;
    }
  }
  &-remove {
    position: absolute;
    top: 15px;
    right: -8px;
    width: 15px;
    height: 15px;
  }
}
.totalprice {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  padding-left: 50%;
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 14px;
  &-header {
    font-size: 16px;
    padding-right: 20px;
    font-family: $op-b;
  }
  &-value {
    width: 80px;
    border: none;
    background: none;
    box-shadow: none;
    font-family: $op-b;
  }
}
.bio {
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  @include respond-to(lp) {
    width: 430px;
  }
  .input-group {
    width: 100%;
    height: 70px;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 10px;
    @include respond-to(t) {
      flex-direction: row;
    }
    @include respond-to(lp) {
      height: 40px;
    }
  }
  &-title {
    width: 210px;
    height: 25px;
    line-height: 20px;
    text-align: left;
    display: inline-block;
    padding: 5px 0 5px;
    margin-bottom: 5px;
    @include respond-to(lp) {
      width: 220px;
    }
  }
  &-input {
    width: 210px;
    height: 30px;
    line-height: 30px;
    border: none;
    background: none;
    display: inline-block;
    box-shadow: 1px 1px 10px -1px #656565;
  }
}
.error-massage {
  font-size: 0.7em;
  color: red;
}
.btn-submit {
  width: 210px;
  background-color: $main-color;
  margin-top: 20px;
  padding: 10px 40px;
  border: none;
  font-family: $op-b;
  border: none;
  box-shadow: none;
  border-image: none;
  &:disabled {
    background-color: #656565;
  }
}
</style>
