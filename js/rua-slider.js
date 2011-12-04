
// Expects multiple divs full of images

// Add reallyvisible property
$.expr[ ":" ].reallyvisible = function(a){ return !(jQuery(a).is(':hidden') || jQuery(a).parents(':hidden').length); };

function activateTopSlide() {
    var ind = 0;
    $.container.find('div.image-set').each(function() {
        if (ind == $.firstPos) {
            $(this).css('display', 'block');
        } else {
            $(this).css('display', 'none');
        }
        ind++;
    });
    $.subPos = 0;
    activateSubSlide();
}

function activateSubSlide() {
    var slideImages = [];
    var slideDiv = $($.container.find('div.image-set:reallyvisible'));
    var ind = 0;
    slideImages = slideDiv.find('div.slide-image');
    slideDiv.find('div.slide-image').each(function () {
        if (ind == $.subPos) {
            slideDiv.find('div.slide-image').css('display', 'none');
            $(this).css('display', 'block');
            $(this).find('.slide-caption').show('fast');
        }
        ind++;
    });
    if ($.subPos == 0)
        $('#slide-left').css('display', 'none');
    else
        $('#slide-left').css('display', 'block');

    var imageCount = slideImages.length;

    if ($.subPos < imageCount - 1)
        $('#slide-right').css('display', 'block');
    else
        $('#slide-right').css('display', 'none');
}

function goLeft() {
    if ($.subPos > 0)
        $.subPos--;
    activateSubSlide();
    return false;
}

function goRight() {
    var imageCount = $.container.find('div.image-set:reallyvisible').find('div.slide-image').length;
    if ($.subPos < imageCount - 1)
        $.subPos++;
    activateSubSlide();
    return false;
}

function topLevelClick() {
    var clicked = $(this);
    var slideContainer = clicked.parent();
    var foundIndex = undefined;
    var sDivs = slideContainer.find('a.slide-thumb');
    var curInd = 0;
    var thisId = clicked.attr('id');
    sDivs.each(function () {
        if ($(this).attr('id') == clicked.attr('id'))
            foundIndex = curInd;
        curInd++;
    });
    $.subPos = 0;
    $.firstPos = foundIndex;
    activateTopSlide();
    return false;
}

$.fn.ruaSlider = function (options) {
    $.rsOptions = options;
    var container = $($(this).parent());
    var divs = $(this).find('div.image-set');
    var firstDiv = true;
    var slideContainer = $('<div id="slide-container"></div>');
    var dIndex = 0;
    var left = $('<a href="#" id="slide-left" class="slide-nav">Prev</a>');
    var right = $('<a href="#" id="slide-right" class="slide-nav">Next</a>');

    left.click(goLeft);
    right.click(goRight);
    $(this).append(left);
    $(this).append(right);

    divs.each(function(index, value) {
        var setDiv = $(this);
        var firstImage = true;
        var images = setDiv.find('img');
        var setTitle = setDiv.attr('title');
        dIndex++;
        var iIndex = 0;
        $.firstPos = 0;
        $.subPos = 0;
        setDiv.find('a').each(function() {
            var anchor = $(this);
            var fullImage = anchor.attr('href');
            var image = anchor.find('img');
            var imgDisplay = (firstImage) ? 'block' : 'none';
            var imgSrc = image.attr('src');
            iIndex++;
            if (firstImage) {
                var slide = $('<a style="background-image: url(\'' + imgSrc + '\');" class="slide-thumb" href="#" id="slide-' + dIndex + '">&nbsp;</a>');
                slide.attr('title', setTitle);
                slide.css('text-decoration', 'none');
                slide.click(topLevelClick);
                slideContainer.append(slide);
                firstImage = false;
            } else {
                var theSlide = $('<div class="slide-image" style="display: ' + imgDisplay + '; background-image: url(\'' + imgSrc + '\');"></div>');

                // Retrieve the caption from the image alt attribute.
                if (image.attr('alt') && image.attr('alt').length > 0) {
                    var theCaption = $('<div style="display: none;" class="slide-caption">' + image.attr('alt') + '</div>');
                    theSlide.append(theCaption);
                    theSlide.mouseenter(function () {
                        theCaption.show('fast');
                    });
                    theSlide.mouseleave(function () {
                        theCaption.hide('fast');
                    });
                }
                theSlide.click(function() {
                    $.fancybox.open([{
                        href: fullImage
                    }], {
                        'transitionIn'  :  'elastic',
                        'transitionOut'  :  'elastic',
                        'speedIn'    :  300, 
                        'speedOut'    :  100, 
                        'overlayShow'  :  false
                    });
                    return false;
                });
                theSlide.css('cursor', 'pointer');
                setDiv.append(theSlide);

            }
            image.remove();
            anchor.remove();
            setDiv.css('display', imgDisplay);
        });
        if (firstDiv)
            firstDiv = false;
    });
    $.container = container;
    slideContainer.insertBefore($(this));
    activateTopSlide();
}

$(document).ready(function () {
    $('#rua-slider').ruaSlider();
});
