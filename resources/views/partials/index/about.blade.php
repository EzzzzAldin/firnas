<section class="about-section" data-aos="fade-down">
    <div class="about-data container position-relative">
        <h2 class="text-center ms-3">نبذة عنا:</h2>

        <ul class="mt-5" id="about-List">
            <li class="mt-2" data-aos="fade-right">
                ليست مجرد وكالة تسويق ، فمنذ عام 2018 نساعد العلامات التجارية علي التواصل مع جمهورها، وتحقيق نمو اكبر
                عبر الإنترنت.

            </li>
            <li class="mt-5 second-li" data-aos="fade-right">
                يعمل فريقنا من المبدعين والمطورين وخبراء التسويق الإلكتروني جنبًا إلى جنب مع كل عميل لتقديم حلول مخصصة
                عالية التأثير، تشمل تحسين محركات البحث ، التسويق عبر وسائل التواصل الاجتماعي، الحملات الإعلانية الممولة،
                صناعة المحتوى، بناء العلامة التجارية، الإنتاج الإعلامي، وتطوير المواقع الإلكترونية.


            </li>
        </ul>
        <div class="main-img position-absolute">
            <img src="{{ asset('assets/imgs/Frame 67.png') }}" alt="Right Image" class="img-fluid big-img" />
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth < 768) {
            const listItems = document.querySelectorAll(".about-section ul li");


            listItems.forEach((li, index) => {
                if (index > 0) {
                    li.classList.add("hidden-li");
                }
            });


            const toggleBtn = document.createElement("span");
            toggleBtn.textContent = "المزيد";
            toggleBtn.classList.add("read-toggle-btn");

            const ul = document.querySelector(".about-section ul");
            ul.parentNode.insertBefore(toggleBtn, ul.nextSibling);


            toggleBtn.addEventListener("click", function() {
                const hiddenItems = document.querySelectorAll(".about-section ul li.hidden-li");
                const isHidden = hiddenItems[0].style.display === "" || hiddenItems[0].style.display ===
                    "none";

                if (isHidden) {

                    hiddenItems.forEach(li => li.style.display = "list-item");
                    this.textContent = "الاقل";
                } else {

                    hiddenItems.forEach(li => li.style.display = "none");
                    this.textContent = "المزيد";
                }
            });
        }
    });
</script>
