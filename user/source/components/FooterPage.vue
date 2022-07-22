<template>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <h3>About us</h3>
                    <ul>
                        <li>
                            <NuxtLink class="nuxtlink" to="/"
                                >Trang chủ</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink class="nuxtlink" to="/menu"
                                >Menu</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink class="nuxtlink" to="/contact-form"
                                >Liên hệ</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink class="nuxtlink" to="/about-us"
                                >Về chúng tôi</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h3>Terms</h3>
                    <ul>
                        <li>
                            <NuxtLink class="nuxtlink" to="/term-of-use"
                                >Điều khoản sử dụng</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink class="nuxtlink" to="/privacy-policy"
                                >Chính sách bảo mật</NuxtLink
                            >
                        </li>
                        <li>
                            <NuxtLink class="nuxtlink" to="/faq">FAQ</NuxtLink>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <h3>
                        <img src="../assets/images/phone-icon.png" alt="" />
                        Điện thoạt đặt hàng: 1800 6936
                    </h3>
                    <h3>
                        <img src="../assets/images/location-icon.png" alt="" />
                        Liên hệ
                    </h3>
                    <p>
                        Tầng 3-4 Hub Building 195/10E Điện Biên Phủ, P.15 , Quận
                        Bình Thạnh, thành phố Hồ Chí Minh
                    </p>
                </div>
                <div class="col-12 col-lg-3">
                    <img src="../assets/images/facebook-icon.svg" alt="" />
                    <img src="../assets/images/instagram-icon.svg" alt="" />
                </div>
            </div>
        </div>

        <div v-cloak id="app">
            <transition name="fade">
                <div
                    v-show="scY > 500"
                    id="pagetop"
                    class="fixed right-0 bottom-0"
                    @click="toTop"
                >
                    <img
                        src="https://www.donguri-bake.co.jp/resources/images/common/btn-pt.png"
                        alt=""
                        width="90"
                        height="90"
                    />
                </div>
            </transition>
        </div>
    </footer>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'

export default {
    data() {
        return {
            scTimer: 0,
            scY: 0,
        }
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll)
    },
    methods: {
        handleScroll() {
            if (this.scTimer) return
            this.scTimer = setTimeout(() => {
                this.scY = window.scrollY
                clearTimeout(this.scTimer)
                this.scTimer = 0
            }, 100)
        },
        toTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth',
            })
        },
    },
}
</script>

<style scoped>
@import '../style/layouts/_footer.scss';

#pagetop {
    position: fixed;
    right: 45px;
}

#pagetop img {
    margin-bottom: 50px;
    cursor: pointer;
    border-radius: 70px;
}
</style>