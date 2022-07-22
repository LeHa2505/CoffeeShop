<template>
    <main>
        <div class="container">
            <div class="row">
                <div class="faq-wrapper">
                    <div class="header">
                        <h1>FAQ - frequently asked question</h1>
                    </div>

                    <!--Part 1-->
                    <div class="fqa-inner">
                        <div class="fqa-item">
                            <div class="fqa-title">
                                <label> 1. Chúng tôi là ai </label>
                                <button
                                    href="#info1"
                                    class="btn-plus"
                                    data-bs-toggle="collapse"
                                >
                                    <i class="fas fa-plus 2x faq-plus"></i>
                                </button>
                            </div>

                            <div id="info1" class="content collapse">
                                <p>
                                    Bốn sinh viên Hedspi với niềm đam mê cháy
                                    bỏng khao khát muốn thay đổi thị trường
                                    coffe Việt Nam hiện nay bằng những sản phẩm
                                    đặt cả linh hồn vào trong đó.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--Part 2-->
                    <div class="fqa-inner">
                        <div class="fqa-item">
                            <div class="fqa-title">
                                <label>
                                    2. Tại sao chọn thị trường Việt Nam
                                </label>
                                <button
                                    href="#info2"
                                    class="btn-plus"
                                    data-bs-toggle="collapse"
                                >
                                    <i class="fas fa-plus 2x faq-plus"></i>
                                </button>
                            </div>

                            <div id="info2" class="content collapse">
                                <p>
                                    Hành trình trăm bước bắt đầu từ những bước
                                    đầu tiên. Chúng tôi sẽ bắt đầu từ Việt Nam,
                                    sau đó chúng tôi sẽ mang sản phẩm đến Nhật
                                    Bản và rộng hơn, các nước sử dụng ngôn ngữ
                                    Tiếng anh là ngôn ngữ chính. Hãy chờ đón
                                    chúng mình nhé!!!
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="fqa-inner">
                        <div class="fqa-item">
                            <div class="fqa-title">
                                <label>
                                    3. Điều gì khiến bốn sinh viên It như các
                                    bạn lại khao khát như vậy
                                </label>
                                <button
                                    href="#info3"
                                    class="btn-plus"
                                    data-bs-toggle="collapse"
                                >
                                    <i class="fas fa-plus 2x faq-plus"></i>
                                </button>
                            </div>

                            <div id="info3" class="content collapse">
                                <p>
                                    Làm việc gì mà không có đam mê, không có cái
                                    tâm thì sẽ không bao giờ làm được gì cả. Chỉ
                                    đơn giản, chúng tôi kế thừa những ý chí mạnh
                                    mẽ đó, mang đến sản phẩm tốt nhất cho người
                                    sử dụng.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="fqa-inner">
                        <div class="fqa-item">
                            <div class="fqa-title">
                                <label>
                                    4. Tương lai các bạn có kế hoạch gì
                                </label>
                                <button
                                    href="#info4"
                                    class="btn-plus"
                                    data-bs-toggle="collapse"
                                >
                                    <i class="fas fa-plus 2x faq-plus"></i>
                                </button>
                            </div>

                            <div id="info4" class="content collapse">
                                <p>
                                    Kế hoạch dài hạn thì là vậy, còn kế hoạch
                                    ngắn hạn, đơn giản chỉ là mang đến cho người
                                    dùng trải nghiệm tốt nhất.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="fqa-inner">
                        <div class="fqa-item">
                            <div class="fqa-title">
                                <label>
                                    5. Các bạn có lời gì gửi gắm tới những người
                                    yêu thích sản phẩm của các bạn không
                                </label>
                                <button
                                    href="#info5"
                                    class="btn-plus"
                                    data-bs-toggle="collapse"
                                >
                                    <i class="fas fa-plus 2x faq-plus"></i>
                                </button>
                            </div>

                            <div id="info5" class="content collapse">
                                <p>
                                    Cảm ơn các bạn đã luôn đồng hành chúng tôi,
                                    chúng tôi sẽ cố hết mình để không khiến các
                                    bạn thất vọng.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'

export default {
    layout: 'AuthPage',
    head() {
        return {
            title: 'HIBIKA| FAQ',
        }
    },
}
</script>



<style lang="scss" scoped>
@import '../style/pages/faq.scss';
</style>