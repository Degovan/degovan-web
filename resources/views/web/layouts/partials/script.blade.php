   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

   {{-- Slickjs --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

   <script>
      $('.your-class').slick({
         dots: true,
         infinite: true,
         speed: 300,
         slidesToShow: 4,
         slidesToScroll: 4,
         responsive: [
            {
               breakpoint: 1024,
               settings: {
               slidesToShow: 3,
               slidesToScroll: 3,
               infinite: true,
               dots: true
               }
            },
            {
               breakpoint: 600,
               settings: {
               slidesToShow: 2,
               slidesToScroll: 2
               }
            },
            {
               breakpoint: 480,
               settings: {
               slidesToShow: 1,
               slidesToScroll: 1
               }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
         ]
      });
   </script>