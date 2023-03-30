import './bootstrap';

import '../sass/app.scss';

import * as bootstrap from 'bootstrap';

//tool tips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$('#opn-cls-btn button').on('click', function() {
   if ($(this).hasClass('open-btn')) {
     $(this).removeClass('open-btn').addClass('close-btn');
     $('#side_nav').css('margin-left', '0');
     $(this).css('margin-left', '250px');
     $('i.fa-bars-staggered').removeClass('fa-bars-staggered').addClass('fa-xmark');
   } else {
     $(this).removeClass('close-btn').addClass('open-btn');
     $('#side_nav').css('margin-left', '-250px');
     $(this).css('margin-left', '0');
     $('i.fa-xmark').removeClass('fa-xmark').addClass('fa-bars-staggered');
   }
 });
 

