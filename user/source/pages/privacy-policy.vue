<template>
 <body>
   <h1 class="heading">
        Privacy Policy
    </h1>
    <main>
        <div class="main-section">

            <!--Part 1-->
            <h3 class="title">
                The kinds of information we collect and hold 
            </h3>

            <div class="content">
                <p class="paragraph">Depending on the particular circumstances, we may collect and hold a range of different 
                    information about you. This can include your name, date of birth, contact details 
                    (including address, email address, phone number or mobile telephone number) occupation, driver's licence number, 
                    and financial inform
                    ation (such as credit card or bank account numbers). This is not an exhaustive list. </p>
                <p class="paragraph">You might also need to provide personal information about other individuals to us 
                    (e.g. about your authorized representatives). If so, we rely on you to inform those individuals
                     that you are providing their personal information to us and to advise them about this statement. </p>
            </div>

            <!--Part 2-->
            <h3 class="title">
                How we collect your information?
            </h3>

            <div class="content">
                <p class="paragraph"> We mainly collect information from you directly (such as where you provide
                     information to us when you visit our premises or website, complete an application form or 
                     agreement for one of our products, or contact us with a query or request).
                      However, we may also collect your information in a number of other ways, including:  </p>
                <p class="paragraph">
                    <ul class="list-info">
                        <li class="list-info-item">from third parties such as our related entities, business partners,
                             credit reporting bodies, wholesale or other customers, or your representatives </li>
                        <li class="list-info-item">from publicly available sources of information; or</li>
                        <li class="list-info-item">when we are legally authorised or required to do so.</li>
                    </ul>
                </p>
                <p class="paragraph">If you choose not to provide us with certain information about you,
                     we may not be able to provide you with the products or services you require.</p>
            </div>
        
        

    </div>

    </main>
 </body>
   
</template>

<script>
export default {
    layout: 'AuthPage',
    head() {
        return {
            title: 'HIBIKA| Privacy Policy',
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../style/pages/term-of-use.scss';
</style>
