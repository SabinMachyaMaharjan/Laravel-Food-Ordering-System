// /**
// * Template Name: Techie - v4.7.0
// * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
// * Author: BootstrapMade.com
// * License: https://bootstrapmade.com/license/
// */
// (function() {
//     "use strict";
  
//     /**
//      * Easy selector helper function
//      */
   
  
//     /**
//      * Porfolio isotope and filter
//      */
//     window.addEventListener('load', () => {
//       let portfolioContainer = select('.portfolio-container');
//       if (portfolioContainer) {
//         let portfolioIsotope = new Isotope(portfolioContainer, {
//           itemSelector: '.portfolio-item'
//         });
  
//         let portfolioFilters = select('#portfolio-flters li', true);
  
//         on('click', '#portfolio-flters li', function(e) {
//           e.preventDefault();
//           portfolioFilters.forEach(function(el) {
//             el.classList.remove('filter-active');
//           });
//           this.classList.add('filter-active');
  
//           portfolioIsotope.arrange({
//             filter: this.getAttribute('data-filter')
//           });
//           portfolioIsotope.on('arrangeComplete', function() {
//             AOS.refresh()
//           });
//         }, true);
//       }
  
//     });
  
//     /**
//      * Initiate portfolio lightbox 
//      */
//     const portfolioLightbox = GLightbox({
//       selector: '.portfolio-lightbox'
//     });
  
//     /**
//      * Portfolio details slider
//      */
//     new Swiper('.portfolio-details-slider', {
//       speed: 400,
//       loop: true,
//       autoplay: {
//         delay: 5000,
//         disableOnInteraction: false
//       },
//       pagination: {
//         el: '.swiper-pagination',
//         type: 'bullets',
//         clickable: true
//       }
//     });
  
  
//   })()