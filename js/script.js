// ページが読み込まれた後にスクリプトが動作するようにします。
document.addEventListener("DOMContentLoaded", function () {
  // .nav_button というクラスを持つ要素を探し、変数に格納します。
  var navButton = document.querySelector(".nav_button");

  // navButton がクリックされたときに実行される関数を設定します。
  navButton.addEventListener("click", function () {
    // body タグに 'is-open' クラスがあれば削除し、なければ追加します。
    document.body.classList.toggle("is-open");
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var swiper = new Swiper(".mv_slide", {
    slidesPerView: "auto",
    spaceBetween: 10,
    centeredSlides: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    speed: 1000,
  });
});
