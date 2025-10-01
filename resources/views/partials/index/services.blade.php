<section class="services" data-aos="fade-right">
    <div class="overlay-dark"></div>

    <div class="main-img position-absolute w-100 h-100">
        <img src="{{ asset('assets/imgs/Frame 15.webp') }}" alt="Right Image"
            class="img-fluid big-img w-100 h-100 object-fit-cover" />
    </div>

    <h2 class="title-main position-relative">الخدمات:</h2>

    <div class="container">
        <div class="services-data mt-5">
            <div class="row align-items-stretch" id="desktop-layout">
                <div class="col-md-4 d-flex flex-column align-items-end gap-4" data-aos="fade-up-right">
                    <div class="service-box text-start">
                        <img src="{{ asset('assets/imgs/Frame 17.webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>التسويق الإلكتروني</h5>
                        <p>واصل الوصول إلى جمهورك، وعزّز حضورك، ونمِّ أعمالك عبر الإنترنت من خلال استراتيجيات تسويق
                            رقمية فعّالة تعزز الظهور والتفاعل والمبيعات، وتحقق نتائج قابلة للقياس.
                        </p>
                    </div>

                    <div class="service-box text-start">
                        <img src="{{ asset('assets/imgs/NEWicon (2).webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>الاستشارات التجارية</h5>
                        <p>نساعد الشركات على العمل بذكاء أكبر من خلال تقديم إرشاد استراتيجي وحلول للتحول الرقمي مصممة
                            خصيصًا لتحقيق أهدافكم.
                        </p>
                    </div>

                    <div class="service-box text-start">
                        <img src="{{ asset('assets/imgs/Frame 16.webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>العلامة التجارية </h5>
                        <p>نصمم هويات تعكس قصتك وتترك انطباعًا يدوم.
                        </p>
                    </div>
                </div>

                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="phone-frame">

                        <img src="{{ asset('assets/imgs/Websiteservices.webp') }}" alt="" class="w-100"
                            style="border-radius: 40px;">
                    </div>
                </div>

                <div class="col-md-4 d-flex flex-column align-items-start gap-3" data-aos="fade-up-left">
                    <div class="service-box text-end">
                        <img src="{{ asset('assets/imgs/Frame 18.webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>التسويق غير الإلكتروني</h5>
                        <p>اصنع تأثيرًا قويًا في العالم الواقعي من خلال الحملات الإبداعية المطبوعة والإعلامية والميدانية
                            التي تجذب الانتباه.
                        </p>
                    </div>

                    <div class="service-box text-end">
                        <img src="{{ asset('assets/imgs/NEWicon (1).webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>الإنتاج الإعلامي</h5>
                        <p>، إنتاج إعلامي عالي الجودة يروي قصة علامتك التجارية بتأثير قوي بداية من الفكرة حتى النسخة
                            النهائية نحول رؤيتك إلى واقع.العلامة التجارية
                        </p>
                    </div>

                    <div class="service-box text-end">
                        <img src="{{ asset('assets/imgs/Frame 20.webp') }}" alt="Service 1" class="img-fluid mb-2"
                            style="max-width: 60px" />
                        <h5>البرمجيات </h5>
                        <p>نطوّر حلول برمجية ذكية وقابلة للتوسع، تعالج تحديات الأعمال الحقيقية وتدعم النمو المستدام على
                            المدى الطويل. </p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 d-none d-sm-block" data-aos="fade-up">
                <a href="{{ url('/services') }}" class="view-all btn btn-outline-dark px-4 py-2">
                    المزيد
                </a>
            </div>

            {{-- Mobile Layout --}}
            <div class="d-flex flex-column gap-4 d-md-none align-items-center ms-3" id="mobile-layout">
                <div class="phone-frame">
                    <img src="{{ asset('assets/imgs/Websiteservices.webp') }}" alt="" class="w-100"
                        style="border-radius: 40px;">
                </div>

                <div class="swiper mySwiper-service">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/Frame 17.webp') }}" alt="Service 1" class="img-fluid mb-2"
                                style="max-width: 60px" />
                            <h5>التسويق الإلكتروني</h5>
                            <p>واصل الوصول إلى جمهورك، وعزّز حضورك، ونمِّ أعمالك عبر الإنترنت من خلال استراتيجيات تسويق
                                رقمية فعّالة تعزز الظهور والتفاعل والمبيعات، وتحقق نتائج قابلة للقياس.
                            </p>
                        </div>

                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/Frame 18.webp') }}" alt="Service 1" class="img-fluid mb-2"
                                style="max-width: 60px" />
                            <h5>التسويق غير الإلكتروني</h5>
                            <p>اصنع تأثيرًا قويًا في العالم الواقعي من خلال الحملات الإبداعية المطبوعة والإعلامية
                                والميدانية التي تجذب الانتباه.
                            </p>
                        </div>

                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/NEWicon (2).webp') }}" alt="Service 1"
                                class="img-fluid mb-2" style="max-width: 60px" />
                            <h5>الاستشارات التجارية</h5>
                            <p>نساعد الشركات على العمل بذكاء أكبر من خلال تقديم إرشاد استراتيجي وحلول للتحول الرقمي
                                مصممة خصيصًا لتحقيق أهدافكم.
                            </p>
                        </div>

                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/NEWicon (1).webp') }}" alt="Service 1"
                                class="img-fluid mb-2" style="max-width: 60px" />
                            <h5>الإنتاج الإعلامي</h5>
                            <p>، إنتاج إعلامي عالي الجودة يروي قصة علامتك التجارية بتأثير قوي بداية من الفكرة حتى النسخة
                                النهائية نحول رؤيتك إلى واقع.العلامة التجارية
                            </p>
                        </div>

                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/Frame 16.webp') }}" alt="Service 1" class="img-fluid mb-2"
                                style="max-width: 60px" />
                            <h5>العلامة التجارية </h5>
                            <p>نصمم هويات تعكس قصتك وتترك انطباعًا يدوم.
                            </p>
                        </div>

                        <div class="swiper-slide service-box-mobile text-start">
                            <img src="{{ asset('assets/imgs/Frame 20.webp') }}" alt="Service 1" class="img-fluid mb-2"
                                style="max-width: 60px" />
                            <h5>البرمجيات </h5>
                            <p>نطوّر حلول برمجية ذكية وقابلة للتوسع، تعالج تحديات الأعمال الحقيقية وتدعم النمو المستدام
                                على المدى الطويل. </p>

                        </div>
                    </div>
                </div>
                {{-- <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/Frame 17.webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Online Marketing</h5>
                    <p>Reach your audience, boost your presence, and grow online through driving visibility, engagement,
                        and sales with powerful digital marketing strategies that deliver measurable results.
                    </p>
                </div>

                <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/Frame 18.webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Offline Marketing</h5>
                    <p>Make a bold impact in the real world with creative print, media, and on-ground campaigns that get
                        noticed.
                    </p>
                </div>

                <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/NEWicon (2).webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Business Consultation</h5>
                    <p>We help businesses work smarter with strategic guidance and digital transformation solutions
                        tailored to your goals.

                    </p>
                </div>

                <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/NEWicon (1).webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Media Production</h5>
                    <p>From concept to coordination, we deliver seamless event experiences that reflect your brand’s
                        vision and values.
                    </p>
                </div>

                <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/Frame 16.webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Branding</h5>
                    <p> We build identities that tell your story and leave a lasting impression.
                    </p>
                </div>

                <div class="service-box text-start">
                    <img src="{{ asset('assets/imgs/Frame 20.webp') }}" alt="Service 1" class="img-fluid mb-2"
                        style="max-width: 60px" />
                    <h5>Software</h5>
                    <p>We develop smart, scalable software solutions that solve real business problems and support
                        long-term growth.</p>
                </div> --}}


                <div class="text-center" data-aos="fade-up">
                    <a href="{{ url('/services') }}" class="view-all btn btn-outline-dark px-4 py-2">
                        مشاهدة الكل
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
