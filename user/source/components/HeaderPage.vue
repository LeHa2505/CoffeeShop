<template>
    <header>
        <picture>
            <img src="../assets/images/logo.svg" alt="" />
        </picture>
        <nav class="navbar navbar-light">
            <div class="container-fluid justify-content-center">
                <!-- <picture>
                    <img src="../assets/images/logo.svg" alt="" />
                </picture> -->
                <div class="text-center">
                    <ul class="navbar-nav flex-row mb-2 mb-lg-0">
                        <li class="nav-item">
                            <NuxtLink
                                class="nuxtlink nav-link active"
                                aria-current="page"
                                to="/"
                                >Trang chủ</NuxtLink
                            >
                        </li>
                        <li class="nav-item">
                            <NuxtLink class="nuxtlink nav-link" to="/menu"
                                >Menu</NuxtLink
                            >
                        </li>

                        <li class="nav-item">
                            <NuxtLink
                                class="nuxtlink nav-link"
                                to="/contact-form"
                                >Liên hệ</NuxtLink
                            >
                        </li>

                        <li class="nav-item">
                            <NuxtLink
                                class="nuxtlink nav-link"
                                to="/about-us"
                                >Về chúng tôi</NuxtLink
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    id="offcanvasNavbar"
                    class="offcanvas offcanvas-end"
                    tabindex="-1"
                    aria-labelledby="offcanvasNavbarLabel"
                >
                    <div class="offcanvas-header">
                        <button
                            type="button"
                            class="btn-close text-reset btn-close-black"
                            data-bs-dismiss="offcanvas"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <NuxtLink
                                    class="nuxtlink nav-link active"
                                    aria-current="page"
                                    to="/"
                                    >Trang chủ</NuxtLink
                                >
                            </li>
                            <li class="nav-item">
                                <NuxtLink class="nuxtlink nav-link" to="/menu"
                                    >Menu</NuxtLink
                                >
                            </li>

                            <li class="nav-item">
                                <NuxtLink
                                    class="nuxtlink nav-link"
                                    to="/contact-form"
                                    >Liên hệ</NuxtLink
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>

<style scoped>
@import '../style/layouts/_header.scss';
</style>