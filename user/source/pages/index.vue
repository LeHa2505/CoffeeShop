<template>
  <div id="main">
    <div class="banner">
      <b-carousel
        id="carousel-1"
        v-model="slide"
        class="carousel slide"
        :interval="4000"
        controls
        indicators
        @sliding-start="onSlideStart"
        @sliding-end="onSlideEnd"
      >
        <b-carousel-slide
          img-src="../assets/images/mv_00.jpg"
        ></b-carousel-slide>

        <b-carousel-slide
          img-src="../assets/images/mv_01.jpg"
        ></b-carousel-slide>

        <b-carousel-slide
          img-src="../assets/images/mv_03.jpg"
        ></b-carousel-slide>
      </b-carousel>
    </div>

    <div id="news" class="about">
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
      </p>

      <div class="about-more">
        <a href="#" class="about-more-link">
          <div class="about-more-inside">
            <div class="about-more-img">
              <img src="../assets/images/about_more.jpg" alt="about-more" />
            </div>

            <div class="about-more-info">
              <img
                src="../assets/images/hibika_logo.svg"
                alt=""
                class="about-logo"
              />

              <h4 class="about-more-title">Đồ ngọt bốn mùa mùa đông</h4>

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

    <div class="container-fluid about-shop">
      <h1 class="title">STORE</h1>
      <div class="row shop-content">
        <div class="col-lg-6">
          <div class="about-shop-info">
            <h2>HIBIKA - The coffee shop</h2>
            <h4>Địa chỉ:</h4>
            <p>
              Tầng 3-4 Hub Building 195/10E Điện Biên Phủ, P.15, <br />
              Quận Bình Thạnh, thành phố Hồ Chí Minh.
            </p>
            <span> Chúng tôi luôn mở cửa chào đón bạn </span>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="banner">
            <b-carousel
              id="carousel-1"
              v-model="slide"
              class="carousel slide"
              :interval="4000"
              controls
              indicators
              @sliding-start="onSlideStart"
              @sliding-end="onSlideEnd"
            >
              <b-carousel-slide
                img-src="../assets/images/ban1.jpg"
              ></b-carousel-slide>

              <b-carousel-slide
                img-src="../assets/images/ban2.jpg"
              ></b-carousel-slide>

              <b-carousel-slide
                img-src="../assets/images/ban3.webp"
              ></b-carousel-slide>
            </b-carousel>
          </div>
        </div>
      </div>
    </div>

    <h2 class="title">FAVORITE</h2>

    <infinite-slide-bar
      duration="50s"
      direction="reverse"
      :bar-style="{ padding: '5px 0' }"
    >
      <div class="loop">
        <div
          v-for="item in favorite.objects"
          :key="item.id"
          :class="{ display: item.status !== 1 }"
        >
          <div class="box">
            <div class="slide-img">
              <img :src="url_file + item.link_image" alt="img-1" />
            </div>
            <div class="detail-box">
              <div class="type">
                <NuxtLink :to="`../menu/detail/${item.id}`" class="">{{
                  item.title
                }}</NuxtLink>
              </div>
              <p v-if="item.reduced_price === null" class="price">
                {{ item.price }}đ
              </p>
              <p v-else class="price">
                <del>{{ item.price }} </del> <br />
                {{ item.reduced_price }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </infinite-slide-bar>

    <div class="story frame-margin">
      <h5 class="title text-center">STORIES</h5>

      <div class="story-content container-fluid">
        <div class="coffeeholic">
          <h3 class="story-title"><a href="">Coffeeholic</a></h3>
          <!--Coffee holic-->
          <div class="coffeeholic-box">
            <div class="row coffeeholic-section">
              <div class="col-none-12 col-md-6 col-lg-4">
                <div class="story-box">
                  <div class="story-img">
                    <img
                      src="../assets/images/story/DSC08684.JPG"
                      alt="story-1"
                    />
                  </div>
                  <span class="date"> 01/01/2022 <br /> </span>
                  <div class="article-title">
                    <a href="#" class="">Joie - Góc sân và khoảng trời </a>
                  </div>
                  <p class="article-content">
                    Một trải nghiệm chiều mưa, với cốc trà vải và những khoảng
                    lặng trong cuộc sống này
                  </p>
                </div>
              </div>

              <div class="col-none-12 col-md-6 col-lg-4">
                <div class="story-box">
                  <div class="story-img">
                    <img
                      src="../assets/images/story/DSC08688.JPG"
                      alt="story-1"
                    />
                  </div>
                  <span class="date"> 01/01/2022 <br /> </span>
                  <div class="article-title">
                    <a href="#" class=""
                      >Joie - Góc sân và khoảng trời: Review
                    </a>
                  </div>
                  <p class="article-content">
                    Lý do chúng ta nên dành một buổi chiều để đến đây và thưởng
                    thức những sản phẩm của Joie
                  </p>
                </div>
              </div>

              <div class="col-none-12 col-md-6 col-lg-4">
                <div class="story-box">
                  <div class="story-img">
                    <img
                      src="../assets/images/story/DSC08694.JPG"
                      alt="story-1"
                    />
                  </div>
                  <span class="date"> 01/01/2022 <br /> </span>
                  <div class="article-title">
                    <a href="#" class=""
                      >Joie - Góc sân và khoảng trời: Có xứng đáng với tên gọi
                    </a>
                  </div>
                  <p class="article-content">
                    Liệu có sứng đáng với cái tên trùng với kiệt tác Góc sân và
                    khoảng trời của Trần Đăng Khoa xuất bản năm 1968?
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!--End Coffee holic-->
        </div>

        <div class="teaholic">
          <div class="coffeeholic">
            <h3 class="story-title-2"><a href="">Teaholic</a></h3>

            <!--Tea holic-->
            <div class="coffeeholic-box">
              <div class="row coffeeholic-section">
                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img">
                      <img
                        src="../assets/images/story/DSC08692.JPG"
                        alt="story-1"
                      />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class=""
                        >Từ khi nào mà chúng ta lại lệ thuộc vào caffee
                      </a>
                    </div>
                    <p class="article-content">
                      Để bắt đầu một buổi sáng đầy năng lượng, chúng ta đều bắt
                      đầu bằng một tách caffe. Nhưng điều đó có đúng khi chúng
                      ta quá lạm dụng nó?
                    </p>
                  </div>
                </div>

                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img">
                      <img
                        src="../assets/images/story/DSC08693.JPG"
                        alt="story-1"
                      />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class="">Một chiều chủ nhật mưa xuân </a>
                    </div>
                    <p class="article-content">
                      Tôi luôn tự hỏi, vì sao tôi lại yêu thích sự yên tĩnh. Có
                      phải vì tôi trầm tính, hay chỉ đang tìm kiếm những khoảng
                      lặng trong cuộc đời sinh viên đầy sô bồ của tôi?
                    </p>
                  </div>
                </div>

                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img">
                      <img
                        src="../assets/images/story/DSC08691.JPG"
                        alt="story-1"
                      />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class=""
                        >Mối quan hệ đều dựa trên tách caffee?
                      </a>
                    </div>
                    <p class="article-content">
                      Khi nhỏ chúng ta đi công viên, cánh đồng để làm bạn. Cấp
                      2, 3 chúng ta làm bạn với những bạn cùng lớp. Lên đại học,
                      chúng ta dùng tách caffee để ngỏ lời. Vậy điều đó có đúng?
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!--End teaholic-->
          </div>
        </div>

        <div class="blog">
          <div class="coffeeholic">
            <h3 class="story-title-2"><a href="">Blog</a></h3>
            <div class="coffeeholic-box">
              <div class="row coffeeholic-section">
                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img">
                      <img src="../assets/images/sensei.png" alt="story-1" />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class=""
                        >Một giáo viên đã truyền cảm hứng cho chúng tôi tạo ra
                        trang web này.
                      </a>
                    </div>
                    <p class="article-content">
                      Chúng tôi tạo ra trang web này với tình yêu dành cho cùng
                      một loại cà phê. Chúng tôi hy vọng trang web này sẽ được
                      những người yêu thích cà phê sử dụng trong tương lai.
                    </p>
                  </div>
                </div>

                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img text-center">
                      <img src="../assets/images/sensei_2.jpg" alt="story-1" />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class="">Đôi điều về thầy Phương. </a>
                    </div>
                    <p class="article-content">
                      Là một giáo viên bộ môm Hệ thống thông tin tại SOICT, với
                      niềm đam mê cà phê bất diệt, chúng tôi hi vọng thầy chính
                      là hình mãu tương lai của chúng tôi: người đồng nghiệp
                      kính mến và người thầy mẫu mực
                    </p>
                  </div>
                </div>

                <div class="col-none-12 col-md-6 col-lg-4">
                  <div class="story-box">
                    <div class="story-img">
                      <img
                        src="../assets/images/story/DSC08728.JPG"
                        alt="story-1"
                      />
                    </div>
                    <span class="date"> 01/01/2022 <br /> </span>
                    <div class="article-title">
                      <a href="#" class=""
                        >Caffe: Có đơn thuần chỉ là một loại đồ uống
                      </a>
                    </div>
                    <p class="article-content">
                      Tôi luôn tự hỏi bản thân: "Mình đi caffe để làm gì? Có đơn
                      thuần chỉ là một nơi để thưởng thức tách caffe?". Bạn tôi
                      đã nói: "Caffe không hề đơn thuần là caffe, nó là linh
                      hồn, là bản thân , là mối quan hệ xung quanh". Đến bây
                      giờ, tôi cũng hiểu điều đó.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
export default {
  layout: 'AuthPage',
  data() {
    return {
      slide: 0,
      sliding: null,
      favorite: '',
      images: [],
      url_file: process.env.URL_FILE,
    }
  },
  head() {
    return { title: 'HIBIKA| Best place to drink' }
  },
  created() {
    this.getFavoriteProductApi()
  },
  mounted() {
    this.importAll(require.context('../assets/images/', true))
  },
  methods: {
    onSlideStart(slide) {
      this.sliding = true
    },
    onSlideEnd(slide) {
      this.sliding = false
    },
    async getFavoriteProductApi() {
      this.favorite = await this.$axios.$get('/product/favorite')
    },
    importAll(r) {
      r.keys().forEach((key) =>
        this.images.push({ pathLong: r(key), pathShort: key })
      )
    },
  },
}
</script>

<style lang="scss" scoped>
@import '../style/pages/index.scss';
.lSAction > a {
  background-image: url(../assets/images/controls.png) !important;
}
.loop {
  display: flex;
  justify-content: center;
}

.story-img img {
  // max-width: 546px !important;
  max-height: 415px !important;
}

.display {
  display: none;
}
</style>