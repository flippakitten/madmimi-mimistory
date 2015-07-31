$(document).ready(function() {

    $('#headingColor').click(function(){
        $('#colorpicker').farbtastic('#headingColor');
        $('#colorpicker').fadeIn('slow');
    });
    $('#headingColor').blur(function(){
        $('#colorpicker').hide();
    });
    $('#textColor').click(function(){
        $('#colorpicker2').farbtastic('#textColor');
        $('#colorpicker2').fadeIn('slow');
    });
    $('#textColor').blur(function(){
        $('#colorpicker2').hide();
    });
    $('#linkColor').click(function(){
        $('#colorpicker3').farbtastic('#linkColor');
        $('#colorpicker3').fadeIn('slow');
    });
    $('#linkColor').blur(function(){
        $('#colorpicker3').hide();
    });
    $('.preview').click(function(){
        $('#previewDiv').fadeIn('slow');
        var headingColor = $('#headingColor').val();
        var linkColor = $('#linkColor').val();
        var textColor = $('#textColor').val();
        $('#previewDiv').css('color',textColor);
        $('#previewHeading').css('color',headingColor);
        $('#previewLink').css('color',linkColor);
    });

  });