<template>
  <main>
    <picture>
      <img src="../assets/images/banner0.png" alt="" />
    </picture>

    <div class="infor">
      <h1 class="text-center">Lý do tạo ra HIBIKA</h1>
    </div>

    <div class="our-fav container">
      <div class="row container-fluid">
        <div class="col-lg-6">
          <h2 class="text-center">
            Cách điều hành các quán Cafee ở Việt Nam cần được thay đổi
          </h2>
          <p>
            Là 4 sinh viên Hedspi mang trong mình hoài bão lớn lao cùng một chút
            nông nổi của tuổi trẻ, chỉ đơn giản chúng tôi thấy việc quản lý các
            quán Caffe ở Việt Nam đang đi theo một lối mòn, không hề bứt phá,
            thoát khỏi cái bóng các cửa hàng caffe trước đó ở Việt Nam. Chỉ đơn
            giản là vậy
          </p>
          <button type="button" class="btn contact">Liên hệ</button>
        </div>
        <div class="col-lg-6">
          <img src="../assets/images/about_us_img.jpg" alt="" />
        </div>
      </div>

      <div class="temp2">
        <h1 class="title1">Tôi và caffe</h1>
        <p>
          Tìm kiếm cho mìnfh một khoảng lặng, <br />
          hay đơn giản là tận hưởng sự sô bồ của chúng
        </p>
      </div>
      <div style="display: flex; justify-content: flex-end">
        <div class="temp1">
          <div class="temp1-text">
            <h1>Caffe, sách và tôi</h1>
            <p>
              Bước vào phía đặt hàng của quán, <br />
              gọi cho mình cốc Americano, <br />
              bất giác thấy quyển sách tôi ngỡ<br />
              đã đọc chúng từ rất lâu rồi.<br />
              Có cảm giác deja deja vu đang<br />
              len lỏi trong tâm trí tôi. <br />
              Tôi cầm lấy quyển sách đó, <br />
              ngồi xuống và đắm mình trong <br />
              tiết trời mưa xuân tháng Giêng.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="member">
      <div class="infor">
        <h1 class="text-center">Thành viên</h1>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-12 member-info">
            <div class="member-img">
              <picture>
                <img src="../assets/images/DSC08721.JPG" alt="" />
              </picture>
            </div>
            <h4>Nguyễn Thị Hạnh</h4>
            <p class="border-bt">Code FE và BE admin</p>
            <p>hanh.nt194552@sis.hust.edu.vn</p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 member-info">
            <div class="member-img">
              <picture>
                <img src="../assets/images/DSC08721.JPG" alt="" />
              </picture>
            </div>
            <h4>Lê Thị Hà</h4>
            <p class="border-bt">Code FE user</p>
            <p>ha.lt194544@sis.hust.edu.vn</p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 member-info">
            <div class="member-img">
              <picture>
                <img src="../assets/images/DSC08721.JPG" alt="" />
              </picture>
            </div>
            <h4>Lê Thanh Giang</h4>
            <p class="border-bt">Code FE và BE user</p>
            <p>giang.lt194541@sis.hust.edu.vn</p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 member-info">
            <div class="member-img">
              <picture>
                <img src="../assets/images/DSC08721.JPG" alt="" />
              </picture>
            </div>
            <h4>Hoàng Đức Thiện</h4>
            <p class="border-bt">Code FE admin</p>
            <p>thien.hd194681@sis.hust.edu.vn</p>
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
      title: 'HIBIKA| About us',
    }
  },
}
</script>

<style lang="scss" scoped>
@import '../style/pages/about-us.scss';
</style>

