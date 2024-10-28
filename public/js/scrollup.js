// $(document).ready(function() {
//     $(window).scroll(function() {
//         const scrollUp = $('#scroll-up');
//         if ($(this).scrollTop() >= 200) {
//             scrollUp.addClass('show-scroll');
//         } else {
//             scrollUp.removeClass('show-scroll');
//         }
//     });
// });


document.addEventListener('DOMContentLoaded', function() {
  window.addEventListener('scroll', function() {
      const scrollUp = document.getElementById('scroll-up');
      const scrollHeight = window.innerHeight * 2; // set the scroll height to twice the viewport height

      if (window.scrollY >= scrollHeight) {
          // show the scroll button if the scroll height is reached
          scrollUp.classList.add('show-scroll');
      } else {
          // hide the scroll button if the scroll height is not reached
          scrollUp.classList.remove('show-scroll');
      }
  });
});

  