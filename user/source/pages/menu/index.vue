<template>
  <section>
    <div class="about margintop">
      <h2 class="about-title text-center">
        Xuân, hạ, thu, đông, sản phẩm thay đổi theo mùa<br />
        Chúng tôi mang đến cho các bạn <br />
        "Bánh ngọt 4 mùa HIBIKA"
      </h2>
      <p class="about-content text-center">
        Tại HIBIKA, tất cả các sản phẩm bánh kẹo đều theo mùa. <br />
        Những gì tinh túy nhất, đặc trưng nhất của bốn mùa tại đất nước mặt trời
        mọc đều được chúng tôi gửi gắm vào sản phẩm bánh kẹo của chúng tôi.
        <br />

        Tùy từng mùa thì chúng tôi đều mang đến cho các bạn sản phẩm đặc trưng
        nhất với những hương vị sẽ bùng nổ vị giác của các bạn.
        <br />

        Dòng sản phẩm bánh HIBIKA chúng tôi chỉ chuẩn bị theo mùa, nên trước khi
        tiến tới chi nhánh của chúng tôi và <br />
        thưởng thức sản phẩm, bạn hãy ghé qua trang chủ chúng tôi để nhận những
        thông tin sớm nhất.<br />
        <span class="fw-bold" style="font-size: 1.2rem; ">Điện thoạt đặt hàng: 1800 6936</span>
      </p>

      <div class="about-more">
        <a href="#" class="about-more-link">
          <div class="inside">
            <div class="about-more-img">
              <img src="../../assets/images/about_more.jpg" alt="about-more" />
            </div>

            <div class="about-more-info">
              <img
                src="../../assets/images/hibika_logo.svg"
                alt=""
                class="about-logo"
              />

              <h4 class="about-more-title">Kẹo bốn mùa mùa đông</h4>

              <p class="about-more-date">11 / 17 ～ 2 / 28</p>
              <p class="about-more-content">
                Những chiếc bánh có họa tiết hoa trà xứ lạnh<br />
                nở những bông hoa đỏ tươi vào mùa đông<br />

                Hãy thưởng thức hương vị tinh tế chỉ có trong mùa đông.<br />
              </p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <section class="menu-item" style="position: relative">
      <div class="container my-md-4 bd-layout">
        <aside class="bd-sidebar">
          <nav id="bd-docs-nav" class="collapse bd-links sticky-top">
            <ul class="mb-0 py-3 pt-md-1">
              <li class="mb-1">
                <button
                  class="btn-d-inline-flex align-items-center rounded btn"
                  data-bs-toggle="collapse"
                  data-bs-target="#all"
                  @click="getDataMenu('all')"
                >
                  <span :class="{ active: active.all === true }">Tất cả</span>
                </button>
              </li>
              <li class="mb-1">
                <button
                  class="btn-d-inline-flex align-items-center rounded btn"
                  data-bs-toggle="collapse"
                  data-bs-target="#coffee"
                  @click="getDataMenu('coffee')"
                >
                  <span
                    :class="{
                      active: active.coffee === true,
                    }"
                    >Cà phê</span
                  >
                </button>
              </li>
              <li class="mb-1">
                <button
                  class="btn-d-inline-flex align-items-center rounded btn"
                  data-bs-toggle="collapse"
                  data-bs-target="#tea"
                  @click="getDataMenu('tea')"
                >
                  <span
                    :class="{
                      active: active.tea === true,
                    }"
                    >Trà</span
                  >
                </button>
              </li>
              <li class="mb-1">
                <button
                  class="btn-d-inline-flex align-items-center rounded btn"
                  data-bs-toggle="collapse"
                  data-bs-target="#cake"
                  @click="getDataMenu('cake')"
                >
                  <span
                    :class="{
                      active: active.cake === true,
                    }"
                    >Bánh</span
                  >
                </button>
              </li>
            </ul>
          </nav>
        </aside>
        <main class="bd-main order-1">
          <div
            :class="{
              block: active.coffee === true,
              display:
                active.coffee === true ||
                active.tea === true ||
                active.cake === true,
            }"
          >
            <h1 class="title coffee">Cà phê</h1>
            <div class="row">
              <div
                v-for="item in coffee_product.objects"
                :key="item.id"
                :class="{ display: item.status !== 1 }"
                class="col-4"
              >
                <picture>
                  <img :src="url_file + item.link_image" alt="" />

                  <NuxtLink
                    :to="{
                      path: `/menu/detail/${item.id}`,
                    }"
                    class="image-content text-center"
                    >{{ item.title }}</NuxtLink
                  >
                </picture>
              </div>
            </div>
          </div>

          <div
            :class="{
              block: active.tea === true,
              display:
                active.coffee === true ||
                active.tea === true ||
                active.cake === true,
            }"
          >
            <h1 class="title">Trà</h1>
            <div class="row">
              <div
                v-for="item in tea_product.objects"
                :key="item.id"
                :class="{ display: item.status !== 1 }"
                class="col-4"
              >
                <picture>
                  <img :src="url_file + item.link_image" alt="" />
                  <NuxtLink
                    :to="{
                      path: `/menu/detail/${item.id}`,
                      params: { tea_product },
                    }"
                    class="image-content text-center"
                    >{{ item.title }}</NuxtLink
                  >
                </picture>
              </div>
            </div>
          </div>

          <div
            :class="{
              block: active.cake === true,
              display:
                active.coffee === true ||
                active.tea === true ||
                active.cake === true,
            }"
          >
            <h1 class="title">Bánh</h1>
            <div class="row">
              <div
                v-for="item in cake_product.objects"
                :key="item.id"
                :class="{ display: item.status !== 1 }"
                class="col-4"
              >
                <picture>
                  <img :src="url_file + item.link_image" alt="" />
                  <NuxtLink
                    :to="{
                      path: `/menu/detail/${item.id}`,
                      params: { cake_product },
                    }"
                    class="image-content text-center"
                    >{{ item.title }}</NuxtLink
                  >
                </picture>
              </div>
            </div>
          </div>
        </main>
      </div>
    </section>
  </section>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
export default {
  layout: 'AuthPage',
  data() {
    return {
      coffee_product: '',
      tea_product: '',
      cake_product: '',
      all: 0,
      coffee: 1,
      tea: 2,
      cake: 3,
      images: [],
      active: { all: true, coffee: false, tea: false, cake: false },
      url_file: process.env.URL_FILE,
      status: {
        active: 1,
        not_active: 0,
      },
    }
  },
  head() {
    return {
      title: 'HIBIKA| Menu',
    }
  },
  created() {
    this.getCoffeeProduct()
    this.getTeaProduct()
    this.getCakeProduct()
  },
  mounted() {
    this.importAll(require.context('../../assets/images/', true))
  },
  methods: {
    async getCoffeeProduct() {
      this.coffee_product = await this.$axios.$get(
        `/product/category/${this.coffee}`
      )
    },
    async getTeaProduct() {
      this.tea_product = await this.$axios.$get(`/product/category/${this.tea}`)
    },
    async getCakeProduct() {
      this.cake_product = await this.$axios.$get(
        `/product/category/${this.cake}`
      )
    },
    importAll(r) {
      r.keys().forEach((key) =>
        this.images.push({ pathLong: r(key), pathShort: key })
      )
    },
    getDataMenu(string) {
      if (string === 'all') {
        this.active.all = true
        this.active.coffee = false
        this.active.tea = false
        this.active.cake = false
      }
      if (string === 'coffee') {
        this.active.all = false
        this.active.coffee = true
        this.active.tea = false
        this.active.cake = false
      }
      if (string === 'tea') {
        this.active.all = false
        this.active.coffee = false
        this.active.tea = true
        this.active.cake = false
      }
      if (string === 'cake') {
        this.active.all = false
        this.active.coffee = false
        this.active.tea = false
        this.active.cake = true
      }
    },
  },
}
</script>

<style lang="scss" scoped>
@import '../../style/pages/menu.scss';
@import '../../style/pages/index/main.scss';
.active:before {
  display: inline;
}
.display {
  display: none;
}
.block {
  display: block;
}

#display {
  display: none;
}
</style>