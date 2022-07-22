<template>
    <body>
        <h1 class="text-center container">Liên hệ</h1>
        <div class="container">
            <form class="row g-3" @submit.prevent="submit">
                <div
                    class="col-md-6"
                    :class="{ 'form-group--error': $v.user.name.$error }"
                >
                    <label for="" class="form-label">Tên<span> *</span></label>
                    <input
                        id=""
                        v-model.trim="$v.user.name.$model"
                        type="text"
                        class="form-control background-style"
                    />
                    <div v-if="$v.user.name.$anyError">
                        <div
                            v-if="!$v.user.name.required"
                            class="error"
                            style="color: red"
                        >
                            Yêu cầu nhập tên
                        </div>
                        <div
                            v-if="!$v.user.name.alpha"
                            class="error"
                            style="color: red"
                        >
                            Trường têt chỉ chứa text
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label
                        for="inputPassword4"
                        class="form-label"
                        :class="{ 'form-group--error': $v.user.phone.$error }"
                        >Số điện thoại <span>*</span></label
                    >
                    <input
                        id="inputPassword4"
                        v-model.trim="$v.user.phone.$model"
                        type="tel"
                        class="form-control background-style"
                    />

                    <div v-if="$v.user.phone.$anyError">
                        <div
                            v-if="!$v.user.phone.required"
                            class="error"
                            style="color: red"
                        >
                            Yêu cầu nhập số điện thoại
                        </div>
                        <div
                            v-if="!$v.user.phone.numeric"
                            class="error"
                            style="color: red"
                        >
                            Số điện thoại không hợp lệ
                        </div>

                        <div
                            v-if="
                                (!$v.user.phone.maxLength ||
                                    !$v.user.phone.minLength) &&
                                $v.user.phone.numeric
                            "
                            class="error"
                            style="color: red"
                        >
                            Từ 9 đến 13 số
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <label
                        for="inputEmail4"
                        class="form-label"
                        :class="{ 'form-group--error': $v.user.email.$error }"
                        >Địa chỉ email <span>*</span></label
                    >
                    <input
                        id="inputEmail4"
                        v-model.trim="$v.user.email.$model"
                        type="email"
                        class="form-control background-style"
                        placeholder="Email"
                    />
                    <div v-if="$v.user.email.$anyError">
                        <div
                            v-if="!$v.user.email.required"
                            class="error"
                            style="color: red"
                        >
                            Yêu cầu nhập email
                        </div>
                        <div
                            v-if="!$v.user.email.email"
                            class="invald-feedback"
                            style="color: red"
                        >
                            Email không hợp lệ
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label
                        for="inputState"
                        class="form-label"
                        :class="{ 'form-group--error': $v.user.option.$error }"
                        >Chọn vấn đề bạn muốn liên hệ với chúng tôi bên dưới
                        <span>*</span></label
                    >
                    <select
                        id="inputState"
                        v-model.trim="$v.user.option.$model"
                        class="form-select background-style font-style"
                    >
                        <option value="1">Dịch vụ</option>
                        <option value="2">Thêm thông tin</option>
                        <option value="3">Khác</option>
                    </select>
                    <div v-if="$v.user.option.$anyError">
                        <div
                            v-if="!$v.user.option.required"
                            class="error"
                            style="color: red"
                        >
                            Hãy lựa chọn 1 trong các vấn đề trên
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label
                        for="floatingTextarea2"
                        class="form-lable"
                        :class="{
                            'form-group--error': $v.user.feedback.$error,
                        }"
                        >Tin nhắn phản hồi <span>*</span></label
                    >
                    <textarea
                        id="floatingTextarea2"
                        v-model.trim="$v.user.feedback.$model"
                        class="form-control background-style"
                        rows="5"
                    ></textarea>
                    <div v-if="$v.user.feedback.$anyError">
                        <div
                            v-if="!$v.user.feedback.required"
                            class="error"
                            style="color: red"
                        >
                            Yêu cầu nhập trường tin nhắn
                        </div>
                    </div>
                </div>
                <div class="text-start color-text">
                    Bằng việc ấn nút submit, tôi chấp nhận
                    <a href="">Điều khoản sử dụng</a> của trang này
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                    <div
                        v-if="response.name !== undefined"
                        class="valid-feedback"
                        style="display: block"
                    >
                        Chúng tôi đã nhận được phản hồi của bạn, xin cảm ơn !!!
                    </div>
                </div>
            </form>
        </div>
    </body>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import {
    required,
    email,
    numeric,
    minLength,
    maxLength,
    alpha,
} from 'vuelidate/lib/validators'

export default {
    layout: 'AuthPage',

    data() {
        return {
            user: {
                submitStatus: null,
                name: '',
                email: '',
                phone: '',
                feedback: '',
                option: null,
            },
            response: '',
            error: '',
        }
    },

    head() {
        return {
            title: 'HIBIKA| Contact form',
        }
    },

    validations: {
        user: {
            name: {
                required,
                alpha,
                maxLength: maxLength(100),
            },
            email: {
                required,
                email,
            },
            phone: {
                required,
                numeric,
                minLength: minLength(9),
                maxLength: maxLength(13),
            },
            feedback: {
                required,
            },
            option: {
                required,
            },
        },
    },

    methods: {
        async submit() {
            this.$v.$touch()
            if (!this.$v.user.$invalid) {
                try {
                    await this.$axios
                        .$post('/contact', this.user)
                        .then((response) => {
                            this.response = response
                        })
                } catch (errors) {
                    this.error = errors
                }
            }
        },
    },
}
</script>

<style lang="scss" scoped >
@import '../style/pages/contact-form.scss';
</style>