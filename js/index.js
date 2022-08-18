// Dark Mode
// $('.toggle').click(()=>{})
$( ".toggle" ).on( "click", darkMode);

function darkMode(){
  if($('body').hasClass('bodyDark')) {

    // $('.btn-close').removeClass('buttonCloseDark')
    // $('.aboutSpan').removeClass('aboutSpanDark')
    // $('.aboutImg').removeClass('aboutImgDark')
    $('.pengantarKontak p').removeClass('pengantarKontakDark');
    $('.cekNama').removeClass('cekNamaDark');
    $("textarea").attr('style', 'border-bottom : 1px solid black !important')
    $('.textarea label').removeClass('textareaDark');
    $('.textarea textarea').removeClass('textareaDark');
    $('.email input').removeClass('inputEmailDark');
    $('.email label').removeClass('inputEmailDark');
    $("input[type='text']").attr('style', 'border-bottom : 1px solid black !important')
    $('.name label').removeClass('labelNameDark');
    $('.name input').removeClass('inputNameDark');
    $('.kontakH1 h1').removeClass('kontakH1Dark');
    $('.kontak').removeClass('kontakDark');
    $('.cardTeam p').removeClass('parafTeamDark')
    $('.teamJudul h1').removeClass('teamJudulh1Dark');
    $('.containerTeam').removeClass('containerTeamDark')
    $('.card-title').removeClass('card-titleDark');
    $('.project').removeClass('projectDark')
    $('.projectJudul').removeClass('projectJudulH1Dark');
    $('.aboutConText').removeClass('aboutConTextDark');
    $('.containerAbout').removeClass('containerAboutDark')
    $('.containerNotification').removeClass('containerNotificationDark');
    $('.canvasResponContainer').removeClass('canvasResponContainerDark');
    $('.intro p').removeClass('intropDark')
    $('.intro h1').removeClass('introh1Dark')
    $('.nav-link').each((ind,val)=>{
      $(val).removeClass('navDark')
    })
    $('.logo').removeClass('logoDark');
    $('path').attr('fill','rgb(240,242,245)')
    $('.toggle-moon').removeClass('iconDark');
    $('.toggle-sun').removeClass('iconDark');
    $('.circle').removeClass('dark-mode');
    $( ".toggle" ).removeClass('iconDark');
    $('.circle').removeClass('dark-mode');
    $('body').removeClass('bodyDark')
    $('.background').removeClass('backgroundDark');

  }else{

    // $('.aboutSpan').addClass('aboutSpanDark')
    // $('.aboutImg').addClass('aboutImgDark')
    $('.pengantarKontak p').addClass('pengantarKontakDark');
    $('.cekNama').addClass('cekNamaDark');
    $("textarea").attr('style', 'border-bottom : 1px solid rgba(255,255,255,0.8) !important')
    $('.textarea label').addClass('textareaDark');
    $('.textarea textarea').addClass('textareaDark');
    $('.email input').addClass('inputEmailDark');
    $('.email label').addClass('inputEmailDark');
    $("input[type='text']").attr('style', 'border-bottom : 1px solid rgba(255,255,255,0.8) !important')
    $('.name label').addClass('labelNameDark');
    $('.name input').addClass('inputNameDark');
    $('.kontakH1 h1').addClass('kontakH1Dark');
    $('.kontak').addClass('kontakDark');
    $('.cardTeam p').addClass('parafTeamDark')
    $('.teamJudul h1').addClass('teamJudulh1Dark');
    $('.containerTeam').addClass('containerTeamDark')
    $('.card-title').addClass('card-titleDark');
    $('.project').addClass('projectDark')
    $('.projectJudul').addClass('projectJudulH1Dark');
    $('.aboutConText').addClass('aboutConTextDark');
    $('.containerAbout').addClass('containerAboutDark');
    $('.containerNotification').addClass('containerNotificationDark');
    $('.canvasResponContainer').addClass('canvasResponContainerDark');
    $('.intro p').addClass('intropDark')
    $('.intro h1').addClass('introh1Dark')
    $('.nav-link').each((ind,val)=>{
      $(val).addClass('navDark')
    })
    $('.logo').addClass('logoDark');
    $('path').attr('fill','rgb(26,53,95)')
    $('.toggle-moon').addClass('iconDark');
    $('.toggle-sun').addClass('iconDark');
    $('.circle').addClass('dark-mode');
    $( ".toggle" ).addClass('iconDark');
    $('.background').addClass('backgroundDark');
    $('.circle').addClass('dark-mode');
    $('body').addClass('bodyDark')

  }
}
/*Cek Form Kontak*/
const cekNama =  /^[a-zA-Z\s]{2,100}$/;
const polaregexEmail = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,8}$/;
const regexEmail = /^([\.\_a-zA-Z0-9]+)@([a-zA-Z]+)\.([a-zA-Z]){2,3}\.[a-zA-Z]{1,3}$/;

$('#name').keydown(function(){
    if (cekNama.test($('#name').val())) {
        $('.iconNama i').first().css('display','inline-block');
        $('.iconNama i').last().css('display','none')
    }else{
        $('.iconNama i').first().css('display','none');
        $('.iconNama i').last().css('display','inline-block')
    }
})

$('#name').blur(function(){
    if ($('#name').val() == '') {
        $('.iconNama i').first().css('display','none');
        $('.iconNama i').last().css('display','none');  
    }
})

$('#email').keydown(function(){
    if (polaregexEmail.test($('#email').val()) || regexEmail.test($('#email').val())) {
        $('.iconEmail i').first().css('display','inline-block');
        $('.iconEmail i').last().css('display','none')
        $('.cekEmail').css('opacity','0')
    }else{
        $('.iconEmail i').first().css('display','none');
        $('.iconEmail i').last().css('display','inline-block')
        $('.cekEmail').css('opacity','0.5')
    }
})

$('#email').blur(function(){
    if ($('#email').val() == '') {
        $('.iconEmail i').first().css('display','none');
        $('.iconEmail i').last().css('display','none');
        $('.cekEmail').css('opacity','0')
    }
})

$('.alert-success').hide();
$('.alert-danger').hide();
$('.button2').hide();

$('form').on('submit', function(e){
    $('.alert-success').hide();
    $('.alert-danger').hide();
    e.preventDefault();
    if (cekNama.test($('#name').val()) && polaregexEmail.test($('#email').val()) || regexEmail.test($('#email').val()) ) {
        setTimeout(() => {
            $('.button1').hide();
            $('.button2').show();
            $('.alert-success').show();
            $('#email').val('');
            $('#name').val('');
            $('#komentar').val('');
            $('.iconNama i').css('display','none');
            $('.iconEmail i').css('display','none');
        }, "1000")
        $('.button1').show();
        $('.button2').hide();
    }else{
        $('.alert-danger').show();
    }
})

 // Swiper JS
var swiper = new Swiper(".mySwiper", {
        observer: true,
        observeParents: true,
        keyboard: true,
        mousewheel: true,
        slidesPerView: 4,
        spaceBetween: 30,
        freeMode: true,
        watchSlidesProgress: true,
        grabCursor: 'true',
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints:{
            0: {
                slidesPerView: 1,
            },
            720: {
                slidesPerView: 3,
            },
            950: {
                slidesPerView: 4,
            }
        }
});