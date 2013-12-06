$(document).ready(function () {

    // Master Page
    $('#pp-close').click(function () {
        $('#pp-close').hide();
        $('#dialog-message').dialog('close');
        window.location.href = window.location.href;
    });

    // BEGIN: detect IE for the video
    checkVersion();
    // END: detect IE for the video

    // BEGIN: video player
    $("video").click(function () {
        if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) { //test for MSIE x.x;
            // do nothing
        } else {
            if ($(this).hasClass('playing')) {
                $(this).removeClass('playing');
                $(this)[0].pause();
            } else {
                $(this).addClass('playing');
                try {
                    $(this)[0].play();
                } catch (e) { };
            }
        }
    });
    $('.home #main-section header .btn-play').click(function () {
        $('#popup').css({ "left": "0" });
        if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) { //test for MSIE x.x;
            // prep for flash player
        } else {
            $('video')[0].play();
            try {
                $('video')[0].play();
            } catch (e) { };
        }
    });
    $('.btn-close').click(function () {
        $('#popup').css({ "left": "-99999%" });
        if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)) { //test for MSIE x.x;
            // prep for flash player
        } else {
            $('video')[0].pause();
            try {
                $('video')[0].pause();
            } catch (e) { };
        }
    });
    // END: video player


    // BEGIN: learn more page
    $('.tab-section2').css({ "display": "none" });
    $(".controller li a").click(function () {
        $(".controller li a").removeClass('current');
        if ($(this).parent().hasClass('btn1')) {
            $(this).addClass('current');
            $(".tab-section1").css({ "display": "block" });
            $(".tab-section2").css({ "display": "none" });
        } else if ($(this).parent().hasClass('btn2')) {
            $(this).addClass('current');
            $(".tab-section1").css({ "display": "none" });
            $(".tab-section2").css({ "display": "block" });
        }
    });
    $(window).scroll(function () {
        if ($('.stickyheader').length > 0) {
            if ($(window).scrollTop() > $('table').offset().top) {
                $('.stickyheader').css({ "display": "block" });
            } else {
                $('.stickyheader').css({ "display": "none" });
            }
        }
    });
    $("#compareKeku, #compareKeku2").click(function (event) {
        $('#compareChart').toggle();
        event.preventDefault();
    });
    // END: learn more page

    // BEGIN: referral tab controller 
    $('.tab2, .tab3').css({ "display": "none" });
    $('.tab-controller li a').click(function () {
        $('.tab-controller li').removeClass('current');
        $(this).parent().addClass('current');
        $(this).parent().parent().siblings(".tabwrap").css({ "display": "none" });
        var curr_tab = $(this).attr("class");
        curr_tab = curr_tab.replace('open_', '');
        $("." + curr_tab).css({ "display": "block" }).parent();
    });
    // END: referral tab controller

    /* BEGIN: support page
    $(".rating a").mouseenter(function () {
    var hover_star = $(this).attr('class');
    switch (hover_star) {
    case 'star2':
    $(this).siblings('.star1').addClass("hover");
    break;
    case 'star3':
    $(this).siblings('.star1, .star2').addClass("hover");
    break;
    case 'star4':
    $(this).siblings('.star1, .star2, .star3').addClass("hover");
    break;
    case 'star5':
    $(this).siblings('.star1, .star2, .star3, .star4').addClass("hover");
    break;
    default:
    // code to be executed if n is different from case 1 and 2
    }
    }).mouseleave(function () {
    $(this).siblings('.star1, .star2, .star3, .star4, .star5').removeClass("hover");
    });

    $(".rating a").click(function () {
    $(this).parent().removeClass("rate-1 rate-2 rate-3 rate-4 rate-5");
    var which_star = $(this).attr('class');
    switch (which_star) {
    case 'star1':
    $(this).parent().addClass("rate-1");
    break;
    case 'star2':
    $(this).parent().addClass("rate-2");
    break;
    case 'star3':
    $(this).parent().addClass("rate-3");
    break;
    case 'star4':
    $(this).parent().addClass("rate-4");
    break;
    case 'star5':
    $(this).parent().addClass("rate-5");
    break;
    default:
    // code to be executed if n is different from case 1 and 2
    }
    });*/
    // END: support page

    //BEGIN: reg page
    $('#add_number input[type="submit"]').click(function () {
        $('.result').show('fast');
        return false;
    });
    //END: reg page

    // Tooltip  
    (function ($) {
        $.fn.aToolTip = function (options) {
            /** setup default settings */
            var defaults = {
                // no need to change/override
                closeTipBtn: 'aToolTipCloseBtn',
                toolTipId: 'aToolTip',
                // ok to override
                fixed: false,
                clickIt: false,
                inSpeed: 200,
                outSpeed: 100,
                tipContent: '',
                toolTipClass: 'kekuTip',
                xOffset: 5,
                yOffset: 5,
                onShow: null,
                onHide: null
            },
            // This makes it so the users custom options overrides the default ones
    	settings = $.extend({}, defaults, options);

            return this.each(function () {
                var obj = $(this);
                /** Decide weather to use a title attr as the tooltip content */
                if (obj.attr('title')) {
                    // set the tooltip content/text to be the obj title attribute
                    var tipContent = obj.attr('title');
                } else {
                    // if no title attribute set it to the tipContent option in settings
                    var tipContent = settings.tipContent;
                }
                /** Build the markup for aToolTip */
                var buildaToolTip = function () {
                    $('body').append("<div id='" + settings.toolTipId + "' class='" + settings.toolTipClass + "'><p class='aToolTipContent'>" + tipContent + "</p></div>");

                    if (tipContent && settings.clickIt) {
                        $('#' + settings.toolTipId + ' p.aToolTipContent')
					.append("<a id='" + settings.closeTipBtn + "' href='#' alt='close'>close</a>");
                    }
                },

                /** Position aToolTip */
			    positionaToolTip = function () {
			        $('#' + settings.toolTipId).css({
			            top: (obj.offset().top - $('#' + settings.toolTipId).outerHeight() - settings.yOffset) + 'px',
			            left: (obj.offset().left + obj.outerWidth() + settings.xOffset) + 'px'
			        })
				    .stop().fadeIn(settings.inSpeed, function () {
				        if ($.isFunction(settings.onShow)) {
				            settings.onShow(obj);
				        }
				    });
			    },
                /** Remove aToolTip */
		        removeaToolTip = function () {
		            // Fade out
		            $('#' + settings.toolTipId).stop().fadeOut(settings.outSpeed, function () {
		                $(this).remove();
		                if ($.isFunction(settings.onHide)) {
		                    settings.onHide(obj);
		                }
		            });
		        };

                /** Decide what kind of tooltips to display */
                // Regular aToolTip
                if (tipContent && !settings.clickIt) {
                    // Activate on hover	
                    obj.hover(function () {
                        // remove already existing tooltip
                        $('#' + settings.toolTipId).remove();
                        obj.attr({ title: '' });
                        buildaToolTip();
                        positionaToolTip();
                    }, function () {
                        removeaToolTip();
                    });
                }

                // Click activated aToolTip
                if (tipContent && settings.clickIt) {
                    // Activate on click	
                    obj.click(function (el) {
                        // remove already existing tooltip
                        $('#' + settings.toolTipId).remove();
                        obj.attr({ title: '' });
                        buildaToolTip();
                        positionaToolTip();
                        // Click to close tooltip
                        $('#' + settings.closeTipBtn).click(function () {
                            removeaToolTip();
                            return false;
                        });
                        return false;
                    });
                }

                // Follow mouse if enabled
                if (!settings.fixed && !settings.clickIt) {
                    obj.mousemove(function (el) {
                        $('#' + settings.toolTipId).css({
                            top: (el.pageY - $('#' + settings.toolTipId).outerHeight() - settings.yOffset),
                            left: (el.pageX + settings.xOffset)
                        });
                    });
                }

            }); // END: return this
        };
    })(jQuery);
    // End. Tooltip 
});


// open popup - no chrome
function wopen(url, name, w, h) {
    // Fudge factors for window decoration space.
    // In my tests these work well on all platforms & browsers.
    w += 32;
    h += 96;
    var win = window.open(url,
    name,
    'width=' + w + ', height=' + h + ', ' +
    'location=no, menubar=no, ' +
    'status=no, toolbar=no, scrollbars=no, resizable=no');
    win.resizeTo(w, h);
    win.focus();
}
// end/ open popup - no chrome

function getInternetExplorerVersion() {
    // Returns the version of Internet Explorer or a -1 (indicating the use of another browser).
    var rv = -1; // Return value assumes failure.
    if (navigator.appName == 'Microsoft Internet Explorer') {
        var ua = navigator.userAgent;
        var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
        if (re.exec(ua) != null)
            rv = parseFloat(RegExp.$1);
    }
    return rv;
}

function checkVersion() {
    var msg = "You're not using Internet Explorer.";
    var ver = getInternetExplorerVersion();
    if (ver > -1) {
        if (ver == 8.0 || ver == 7.0) {
            $('video').css({ "display": "none" });
            $('.IE_video').css({ "display": "block" });
        } else {
            // 
        }
    }
}

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regexS = "[\\?&]" + name + "=([^&#]*)";
    var regex = new RegExp(regexS);
    var results = regex.exec(window.location.search);

    if (results == null)
        return "";
    else
        return decodeURIComponent(results[1].replace(/\+/g, " "));
}

function getCookie(cookieName) {
    //alert($.cookie(cookieName));
    return $.cookie(cookieName);
}

function setCookie(cookieName, cookieValue, expiryDays) {
    //$.cookie('_cartGUID', 'B4DC62D8-1914-4096-A38D-CBDA8C92453F', { expires: 30 });
    //alert($.cookie('_cartGUID'));
    $.cookie(cookieName, cookieValue, { expires: expiryDays });
}

function removeCookie(cookieName) {
    return $.removeCookie(cookieName);
}

function getDropdownText(listID) {
    var textArray = []; // array to host dropdown's text
    var dropDown = document.getElementById(listID);

    for (var i = 0; i < dropDown.options.length; i++) { // loop through dropdownList
        textArray.push(dropDown.options[i].text); // add to array
    }
    return textArray;
}

function getDropdownValues(listID) {
    var valuesArray = []; // array to contain dropdown's values
    var dropDown = document.getElementById(listID);

    for (var i = 0; i < dropDown.options.length; i++) { // loop through dropdownList
        valuesArray.push(dropDown.options[i].value); // add to array
    }
    return valuesArray;
}

function showInputFlag(flagDivId, flagNumber) {
    var flagDiv = $("#" + flagDivId);
    flagDiv.css('background-position', '0 ' + (flagNumber * -24).toString() + 'px');
    flagDiv.css('display', 'block');
}

function hideInputFlag(flagDivId) {
    $("#" + flagDivId).css('display', 'none');
}

function transformText(textBoxId) {
    var tBox = $("#" + textBoxId);

    switch (tBox.val()) {
        case "usa":
            tBox.val("United States");
            tBox.keydown(); // trigger keydown event
            break;
    }
}

function getCountryCode(textBoxID, dropdownID) {
    var countryCode;
    var tBox = $("#" + textBoxID);
    var country = tBox.val() == "United States" ? "usa" : tBox.val();

    countryCode = $('#' + dropdownID + ' option').filter(function () {
        return $(this).text().toLowerCase() == country.toLowerCase();
    }).attr('value');
    if (typeof countryCode != 'undefined')
        return countryCode;
    else
        return "";
}

function getCountryID(countryCode, dropDownID) {
    var cid;
    $('#' + dropDownID + ' option').each(function (index) {
        if ($(this).val().toLowerCase() == countryCode) {
            cid = index;
        }
    });
    if (typeof cid != 'undefined')
        return cid;
    else
        return "";
}

function getCountryNameByID(countryID, dropDownID) {
    var countryName;

    $('#' + dropDownID + ' option').each(function (index) {
        if (countryID == index) {
            countryName = $(this).text();
        }
    });
    return countryName;
}

function getCountryNameByCode(countryCode, dropDownID) {
    var countryName;

    $('#' + dropDownID + ' option').each(function (index) {
        if ($(this).val().toLowerCase() == countryCode) {
            countryName = $(this).text();
        }
    });
    return countryName;
}

function sendAsyncEmail(method, ui_element, ui_wait, ui_confirm, email, message, extra) {
    ui_wait.show();
    $('.overlay').css({display: ui_element.css('display')});

    $.ajax({
        type: "POST",
        url: "/WebServices/Email.asmx/" + method,
        data: "{'email':'" + email + "', 'message': '" + message + "', 'extra': '" + extra + "'}",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (msg) {
                sendAsyncEmail_Success(ui_element, ui_wait, ui_confirm);
        }
    });
}

function sendAsyncEmail_Success(ui_element, ui_wait, ui_confirm) {
    ui_wait.hide();
    $('.overlay').css({ display: 'none' });
    ui_confirm.show();
    ui_confirm.delay(3000).fadeOut('slow');
}

function modifyCart(basket, plan) {
    if (typeof (Storage) !== "undefined") {
        //alert('Yes! localStorage and sessionStorage support!');
        var cart = { basket: 0, plans: [] };
        cart.plans.push(plan);

        if (localStorage.cart) {
            //localStorage.cart = Number(localStorage.clickcount) + 1;
            localStorage.removeItem('cart')
        }
        else {
            localStorage.cart = JSON.stringify(cart);
        }
    }
    else {
        alert('Sorry! No web storage support..');
    }
}

Array.prototype.move = function (old_index, new_index) {
    while (old_index < 0) {
        old_index += this.length;
    }
    while (new_index < 0) {
        new_index += this.length;
    }
    if (new_index >= this.length) {
        var k = new_index - this.length;
        while ((k--) + 1) {
            this.push(undefined);
        }
    }
    this.splice(new_index, 0, this.splice(old_index, 1)[0]);
    return this; // for testing purposes
};