//  open mobile slideout header
$('.atom-header-bar-collapse-menu > i').click(function(){

    $('.atom-header-bar-buttons, .atom-header-bar-phone-address-and-buttons').addClass('slideout');

    $('.atom-header-bar-buttons.slideout').css('-webkit-backdrop-filter', '');
    $('.atom-header-bar-buttons.slideout').css('-webkit-backdrop-filter', 'blur(8px)');

});

$('.atom-header-bar-collapse-exit').click(function() {
    $('.atom-header-bar-buttons').removeClass('slideout');
});

//  watch the window resize, if our header menu items go outside the screen collapse.
$(window).resize(function() {
    
    var headerBarLeftPos = $('.atom-header-bar-buttons').position().left;
    var headerBarWidth = $('.atom-header-bar-buttons').width();
    var scrollWidth = $('.atom-header-bar-buttons')[0].scrollWidth;
   
    if(isHeaderBarOverflowing($('.atom-header-bar-buttons')))
    {
        console.log('overflow');
    }
    
});



//  contact forms
$(document).ready(function() {


    $('#atom_contact_form').submit(function(e) {

        $('.atom-contact-error').removeClass('show');

        e.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute('6LceXowgAAAAACXcuBx_hM23521qZQmno9eRK6NV', {action: 'submit'}).then(function(token){
                var nameVal = $('#atom_contact_name').val();
                var phoneVal = $('#atom_contact_phone').val();
                var emailVal = $('#atom_contact_email').val();
                var websiteVal = $('#atom_contact_website').val();
                var websiteTypeVal = $('#atom_contact_website_type').val();
                var messageVal = $('textarea#atom_contact_message').val();

                var formValid = ValidateForm();

                if(formValid){

                    $.ajax({
                        type: 'POST',
                        cache: false,
                        url: '/ajax/contact-form.php',
                        data: 'name=' + nameVal + '&phone=' + phoneVal + '&email=' + emailVal + '&website=' + websiteVal + '&websiteType=' + websiteTypeVal + '&message=' + messageVal,
                        success:function(e){

                            var response = jQuery.parseJSON(e);

                            if(response.success){
                                notification('success');
                            }
                            else{
                                notification('failed');
                            }
                        },
                        error: function(e) {

                            var response = jQuery.parseJSON(e);

                            console.log('Something went wrong processing your message.\n' . response.errorMessage);

                            notification('error');
                            
                        }
                    });
                }
                else {
                    // notification('failed');
                }
            });
        });
    });

    if($(document).scrollTop() >= 150){
        $('.atom-header.invisible').addClass('bg-white');
    }
});

function ValidateForm(){

    var passedValidation = true;

    const form = $('#atom_contact_form');
    
    const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const websiteRegex = /^[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)$/;
    const phoneRegex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;


    var nameVal = $('#atom_contact_name').val();
    var phoneVal = $('#atom_contact_phone').val();
    var emailVal = $('#atom_contact_email').val();
    var websiteVal = $('#atom_contact_website').val();
    var messageVal = $('#atom_contact_message').val();

    //  if it's a valid email
    if(nameVal == ''){
        passedValidation = false;
        markFieldAsIncorrect('name');
    }
    if (messageVal == ''){
        passedValidation = false;
        markFieldAsIncorrect('message');
    }
    if (!phoneRegex.test(phoneVal)){
        passedValidation = false;
        markFieldAsIncorrect('phone');
    }
    if(!emailRegex.test(emailVal)) {
        passedValidation = false;
        markFieldAsIncorrect('email');
    }
    if(websiteVal != '' && !websiteRegex.test(websiteVal)){
        passedValidation = false;
        markFieldAsIncorrect('website');
    }

    return passedValidation;
};

function clearForm(formID){
    $(':input', formID)
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .prop('checked', false)
        .prop('selected', false);
}

function notification(type){

    switch(type){
        case 'success':
            clearForm('#atom_contact_form');
            $('.atom-notification-icon').html('<i class="fa-solid fa-check"></i>');
            $('.atom-notification-message').text("Success");
            break;
        case 'failed':
            $('.atom-notification-icon').html('<i class="fa-solid fa-x"></i>');
            $('.atom-notification-message').text("Failed");
            break;
        case 'error':
            $('.atom-notification-icon').html('<i class="fa-solid fa-circle-exclamation"></i>');
            $('.atom-notification-message').text("Error");
            break;
        default: 
            $('.atom-notification-icon').html('<i class="fa-solid fa-question"></i>');
            $('.atom-notification-message').text(type);
            break;
    }

    $('.atom-notification').css('display', 'flex').delay(1500).fadeOut();
}

function markFieldAsIncorrect(field,message){
    $('.atom-contact-error.' + field).addClass('show');
}


const isHeaderBarOverflowing = (object) => $('.atom-header-bar-buttons').width() + $('.atom-header-bar-buttons').position().left > $(window).width();

//  removes the invisible class when the header goes below 150px scroll length, adds invisible class when header is above 150px scroll length.
$(window).scroll(function(){
    //  invisible
    if ($(document).scrollTop() <= 150) {
        $('.atom-header.invisible').removeClass('bg-white');
        $('.atom-header.invisible .atom-logo-header > img').attr('src', $('.atom-logo-header > img').data('alt-logo'));
    }
    //  solid
    else {
        $('.atom-header.invisible').addClass('bg-white');
        $('.atom-header.invisible .atom-logo-header > img').attr('src', $('.atom-logo-header > img').data('logo'));
    }
});



//  fix for scrollbars on macos
if (navigator.userAgent.match(/OS X.*Safari/) && ! navigator.userAgent.match(/Chrome/)) {
    $('body').addClass('safari');
 }
 
 

 
 