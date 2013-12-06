/*

------------------------
|                      |
|    NewCo Main JS     |
|                      |
------------------------

Requires:  jQuery 1.7+
Owner:     Vodafone Online Portal -  BizDev Team

Version:   2.0.13
Modified:  21 August 2013

Modifications:

2.0.13   21 August 2013

- Reverted hack to version .10

2.0.12   20 August 2013

- Fixed below hack

2.0.11   20 August 2013

- Hack added to override mboxDefault faiult on SIM Swap

2.0.10   15 August 2013

- Minor updates for SIM swap

2.0.9   9 July 2013

- Changed balance checker data units

2.0.8   9 July 2013

- Changed 3001 hack to 3000 for work request 11678

2.0.7   3 July 2013

- Change to copy/paste rules

2.0.6 28 May 2013

- Changed option select for card images on card type as now Visa Debit

2.0.5 10 May 2013

- Changed option select for card images on card type in top up as text values changed

2.0.4   23 Apr 2013:
 - Fixed issue with saved card security code box(es)

2.0.3   23 Apr 2013:
 - Fixed issue with card selctor not working
 - added mroe taskflows to card selector

2.0.2   8 April 2013:
 - Correction to "Unlimited" patch


2.0.1   8 April 2013:
 - Toggle fix to disable after PPR (vfRadioToggles)
 - Age verification - Personal details fields disabled
 - Balance checker - more than 100% usage bar
 - Balance checker - Rounding fix for Kb/Mb usage
 - My extras & My settings - toggle fix to stop CTA after PPR
 - My profile - change contact details disabled
 - Merged in vfCardExpiry, vfSelectSavedCard, vfBalanceChecker from BizDev3 version
 - Added 3001/Unlimited mod from BizDev1

 2.0.2  12/7/2013
  - work request fixes


15 Feb 2013: File issued with SureSignal and VF Family Pack
   
*/

//jquery.corner plugin
(function (a) {
    function p(a) { a = parseInt(a).toString(16); return 2 > a.length ? "0" + a : a } function x(g) { for (; g;) { var b = a.css(g, "backgroundColor"); if (b && "transparent" != b && "rgba(0, 0, 0, 0)" != b) return 0 <= b.indexOf("rgb") ? (g = b.match(/\d+/g), "#" + p(g[0]) + p(g[1]) + p(g[2])) : b; if ("html" == g.nodeName.toLowerCase()) break; g = g.parentNode } return "#ffffff" } function y(a, b, c) {
        switch (a) {
            case "round": return Math.round(c * (1 - Math.cos(Math.asin(b / c)))); case "cool": return Math.round(c * (1 + Math.cos(Math.asin(b / c)))); case "sharp": return c -
b; case "bite": return Math.round(c * Math.cos(Math.asin((c - b - 1) / c))); case "slide": return Math.round(c * Math.atan2(b, c / b)); case "jut": return Math.round(c * Math.atan2(c, c - b - 1)); case "curl": return Math.round(c * Math.atan(b)); case "tear": return Math.round(c * Math.cos(b)); case "wicked": return Math.round(c * Math.tan(b)); case "long": return Math.round(c * Math.sqrt(b)); case "sculpt": return Math.round(c * Math.log(c - b - 1, c)); case "dogfold": case "dog": return b & 1 ? b + 1 : c; case "dog2": return b & 2 ? b + 1 : c; case "dog3": return b & 3 ?
b + 1 : c; case "fray": return b % 2 * c; case "notch": return c; case "bevelfold": case "bevel": return b + 1; case "steep": return b / 2 + 1; case "invsteep": return (c - b) / 2 + 1
        }
    } var i = document.createElement("div").style, m = void 0 !== i.MozBorderRadius, s = void 0 !== i.WebkitBorderRadius, n = void 0 !== i.borderRadius || void 0 !== i.BorderRadius, i = document.documentMode || 0, z = a.browser.msie && (8 > a.browser.version && !i || 8 > i), u = a.browser.msie && function () { var a = document.createElement("div"); try { a.style.setExpression("width", "0+0"), a.style.removeExpression("width") } catch (b) { return !1 } return !0 }();
    a.support = a.support || {}; a.support.borderRadius = m || s || n; a.fn.corner = function (g) {
        if (0 == this.length) { if (!a.isReady && this.selector) { var b = this.selector, c = this.context; a(function () { a(b, c).corner(g) }) } return this } return this.each(function () {
            var b, c, i, p, j = a(this), e = [j.attr(a.fn.corner.defaults.metaAttr) || "", g || ""].join(" ").toLowerCase(), t = /keep/.test(e), h = (e.match(/cc:(#[0-9a-f]+)/) || [])[1]; b = (e.match(/sc:(#[0-9a-f]+)/) || [])[1]; var f = parseInt((e.match(/(\d+)px/) || [])[1]) || 10, v = (e.match(/round|bevelfold|bevel|notch|bite|cool|sharp|slide|jut|curl|tear|fray|wicked|sculpt|long|dog3|dog2|dogfold|dog|invsteep|steep/) ||
["round"])[0], A = /dogfold|bevelfold/.test(e), w = { T: 0, B: 1 }, e = { TL: /top|tl|left/.test(e), TR: /top|tr|right/.test(e), BL: /bottom|bl|left/.test(e), BR: /bottom|br|right/.test(e) }, q, l, d, k, r, o; !e.TL && !e.TR && !e.BL && !e.BR && (e = { TL: 1, TR: 1, BL: 1, BR: 1 }); if (a.fn.corner.defaults.useNative && "round" == v && (n || m || s) && !h && !b) e.TL && j.css(n ? "border-top-left-radius" : m ? "-moz-border-radius-topleft" : "-webkit-border-top-left-radius", f + "px"), e.TR && j.css(n ? "border-top-right-radius" : m ? "-moz-border-radius-topright" : "-webkit-border-top-right-radius",
f + "px"), e.BL && j.css(n ? "border-bottom-left-radius" : m ? "-moz-border-radius-bottomleft" : "-webkit-border-bottom-left-radius", f + "px"), e.BR && j.css(n ? "border-bottom-right-radius" : m ? "-moz-border-radius-bottomright" : "-webkit-border-bottom-right-radius", f + "px"); else {
    j = document.createElement("div"); a(j).css({ overflow: "hidden", height: "1px", minHeight: "1px", fontSize: "1px", backgroundColor: b || "transparent", borderStyle: "solid" }); b = parseInt(a.css(this, "paddingTop")) || 0; c = parseInt(a.css(this, "paddingRight")) || 0; i = parseInt(a.css(this,
"paddingBottom")) || 0; p = parseInt(a.css(this, "paddingLeft")) || 0; if (void 0 != typeof this.style.zoom) this.style.zoom = 1; if (!t) this.style.border = "none"; j.style.borderColor = h || x(this.parentNode); t = a(this).outerHeight(); for (q in w) if ((h = w[q]) && (e.BL || e.BR) || !h && (e.TL || e.TR)) {
    j.style.borderStyle = "none " + (e[q + "R"] ? "solid" : "none") + " none " + (e[q + "L"] ? "solid" : "none"); l = document.createElement("div"); a(l).addClass("jquery-corner"); d = l.style; h ? this.appendChild(l) : this.insertBefore(l, this.firstChild); if (h && "auto" !=
t) { if ("static" == a.css(this, "position")) this.style.position = "relative"; d.position = "absolute"; d.bottom = d.left = d.padding = d.margin = "0"; u ? d.setExpression("width", "this.parentNode.offsetWidth") : d.width = "100%" } else if (!h && a.browser.msie) {
    if ("static" == a.css(this, "position")) this.style.position = "relative"; d.position = "absolute"; d.top = d.left = d.right = d.padding = d.margin = "0"; u ? (k = (parseInt(a.css(this, "borderLeftWidth")) || 0) + (parseInt(a.css(this, "borderRightWidth")) || 0), d.setExpression("width", "this.parentNode.offsetWidth - " +
k + '+ "px"')) : d.width = "100%"
} else d.position = "relative", d.margin = !h ? "-" + b + "px -" + c + "px " + (b - f) + "px -" + p + "px" : i - f + "px -" + c + "px -" + i + "px -" + p + "px"; for (d = 0; d < f; d++) k = Math.max(0, y(v, d, f)), r = j.cloneNode(!1), r.style.borderWidth = "0 " + (e[q + "R"] ? k : 0) + "px 0 " + (e[q + "L"] ? k : 0) + "px", h ? l.appendChild(r) : l.insertBefore(r, l.firstChild); if (A && a.support.boxModel && (!h || !z)) for (o in e) if (e[o] && (!h || !("TL" == o || "TR" == o))) if (h || !("BL" == o || "BR" == o)) {
    d = {
        position: "absolute", border: "none", margin: 0, padding: 0, overflow: "hidden",
        backgroundColor: j.style.borderColor
    }; k = a("<div/>").css(d).css({ width: f + "px", height: "1px" }); switch (o) { case "TL": k.css({ bottom: 0, left: 0 }); break; case "TR": k.css({ bottom: 0, right: 0 }); break; case "BL": k.css({ top: 0, left: 0 }); break; case "BR": k.css({ top: 0, right: 0 }) } l.appendChild(k[0]); d = a("<div/>").css(d).css({ top: 0, bottom: 0, width: "1px", height: f + "px" }); switch (o) { case "TL": d.css({ left: f }); break; case "TR": d.css({ right: f }); break; case "BL": d.css({ left: f }); break; case "BR": d.css({ right: f }) } l.appendChild(d[0])
}
}
}
        })
    };
    a.fn.uncorner = function () { if (n || m || s) this.css(n ? "border-radius" : m ? "-moz-border-radius" : "-webkit-border-radius", 0); a("div.jquery-corner", this).remove(); return this }; a.fn.corner.defaults = { useNative: !0, metaAttr: "data-corner" }
})(jQuery);


(function ($) {
    $.fn.vfPasswordChecker = function (options) {
        var defaults = {
            hiddenStrengthTextsClass: 'passwordStrengthTexts',
            containerClass: 'checkerContainer',
            titleClass: 'checkerTitle',
            barContainerClass: 'strengthBarContainer',
            strengthBarOuterClass: 'strengthBarOuter',
            strengthBarClass: 'strengthBar',
            strengthTextClass: 'checkerStrengthText',
            strengthWeakClass: 'strengthWeak',
            strengthFairClass: 'strengthFair',
            strengthStrongClass: 'strengthStrong',
            strengthRegexes: [/[^a-zA-Z0-9]/, /[a-z]+/, /[0-9]+/, /[A-Z]+/]
        };

        var opts = $.extend(defaults, options);

        //Fix by SS for Password Checker
        //Relates to how PPR is done on My Extars
        //Exit the method if Password Checker is built on page load
        if ($('.checkerContainer').length === 1) {
            return;
        }

        var passwordInput = $(this).find('input:password');
        var hiddenMessages = $('.' + opts.hiddenStrengthTextsClass).find(":hidden");
        //exit if no messages - sanity check to prevent javascript failing if hidden messages
        //are missing from the page
        if (!hiddenMessages.length) {
            return;
        }

        //Get messages scraped from page
        messages = new function () {
            var strengthMessages = ['', hiddenMessages[1].value, hiddenMessages[2].value, hiddenMessages[3].value];

            //Error/strength messages
            this.getMessage = function (strengthLevel) {
                return strengthMessages[strengthLevel];
            };

            //Checker title text
            this.getTitleText = function () {
                return hiddenMessages[0].value;
            };

        };

        //Perform actual password strength logic
        checker = new function () {
            this.checkPassword = function (password) {
                var minLength = 6;
                var maxLength = 30;

                var strength = 0;
                if (password.length >= minLength && password.length <= maxLength) {
                    //Use regexs to determine password contents
                    jQuery.each(opts.strengthRegexes, function (i, regexp) {
                        //If strength under 3 (max) and matches regex iterate
                        if (password.match(regexp)) {
                            strength++;
                        }
                    });
                }
                if (strength === 0 || strength === 1) {
                    return strength;
                }
                return strength - 1;
            };
        };

        //Functions for html creation and alteration
        html = new function () {
            var strengthBar;
            var textDiv;

            //Initial html setup
            this.createHtml = function (titleText) {
                var checkerContainer = $('<div class="' + opts.containerClass + '"></div>');

                //IE8 doesn't like corners on container DIVs so only do this in other browsers
                if (!($.browser.msie && parseInt($.browser.version, 10) === 8)) {
                    checkerContainer.corner("5px");
                }

                var titleDiv = $('<div class="' + opts.titleClass + '">' + titleText + '</div>');

                var strengthDiv = $('<div class="' + opts.barContainerClass + '"></div>');
                var strengthBarContainer = $('<span class="' + opts.strengthBarOuterClass + '"></span>').corner("3px");
                strengthBar = $('<span class="' + opts.strengthBarClass + '"></span>').corner("3px");
                strengthDiv.append(strengthBarContainer.append(strengthBar));

                textDiv = $('<div class="' + opts.strengthTextClass + '"></div>');
                textDiv.text(messages.getMessage(0));

                checkerContainer.append(titleDiv, strengthDiv, textDiv);
                $(passwordInput).after(checkerContainer);
            };

            //Modify strength level
            this.changeStrengthLevel = function (strengthLevel) {
                strengthBar.width((strengthLevel / 3) * 100 + '%');
                textDiv.text(messages.getMessage(strengthLevel));
                strengthBar.removeClass(opts.strengthWeakClass + ' ' + opts.strengthFairClass + ' ' + opts.strengthStrongClass);
                strengthBar.addClass(getCssClass(strengthLevel));
            };

            //Returns css class for strength bar appropriate for strength level
            function getCssClass(strengthLevel) {
                if (strengthLevel == 1) {
                    return opts.strengthWeakClass;
                } else if (strengthLevel == 2) {
                    return opts.strengthFairClass;
                } else if (strengthLevel == 3) {
                    return opts.strengthStrongClass;
                }
                return '';
            }
        };

        html.createHtml(messages.getTitleText());

        //This is fired manually by the vfPassword plugin due to the original password 
        //input being hidden and containing a masked value.
        $(passwordInput).on('blur', function () {
            var password = $(passwordInput).val();
            var strengthLevel = checker.checkPassword(password);
            html.changeStrengthLevel(strengthLevel);
        });
        $(passwordInput).on('keyup', function () {
            var password = $(passwordInput).val();
            var strengthLevel = checker.checkPassword(password);
            html.changeStrengthLevel(strengthLevel);
        });
        $(passwordInput).keyup(function (e) {
            if (e.keyCode == 8) {
                var password = $(passwordInput).val();
                var strengthLevel = checker.checkPassword(password);
                html.changeStrengthLevel(strengthLevel);
            }
        });
    };
})(jQuery);

//Vodafone lightbox plugin
//for on-page div content div must have a unique ID and link must have href of format
//#id-of-div-to-show . If the ID of the div and the href do not match it will not work.
(function ($) {
    $.fn.vfLightboxes = function (options) {
        $(this).each(function () {

            var defaults = {
                lightboxClass: 'lightbox_container',
                lightboxOverlayClass: 'lightbox_overlay',
                closeLightboxClass: 'close_lightbox',
                headerClass: 'lightbox_header',
                footerClass: 'lightbox_footer',
                contentSelector: '.lightbox_content',
                lightboxMaskPadding: 100,
                minimumOffset: 50,
                closeLinkId: 'closeLightboxLink',
                fadeTime: 350
            };

            var opts = $.extend(defaults, options);

            var lightboxLink = $(this);
            var lightbox;
            var overlay;
            var header = $('<div class="' + opts.headerClass + '"><a href="#" id="' + opts.closeLinkId + '" class="' + opts.closeLightboxClass + '">Close</a></div>');
            var footer = $('<div class ="' + opts.footerClass + '"></div>');

            //open lightbox
            lightboxLink.on('click', function (event) {
                //if the lightbox doesn't exist, create it
                if (typeof lightbox === 'undefined') {
                    createLightbox();
                }
                event.preventDefault();
                showLightbox();
            });

            function createLightbox() {
                //setup overlay and lightbox
                overlay = $('<div class="' + opts.lightboxOverlayClass + '"></div>');
                overlay.hide();
                lightbox = $('<div class="' + opts.lightboxClass + '"></div>');
                lightbox.prepend(header);
                lightbox.hide();

                //set dynamic size/offset params
                var windowHeight = $(window).height();
                var windowWidth = $(window).width();
                var maxHeight = windowHeight - (2 * opts.minimumOffset);
                var maxWidth = windowWidth - (2 * opts.minimumOffset);

                getLightboxContent();
                lightbox.append(footer);

                //ready overlay for display, cover whole document
                overlay.css('top', '0px');
                overlay.height($(document).height());

                $('body').append(overlay);
                $('body').append(lightbox);

                //set size to content
                lightbox.css('height', 'auto');
                lightbox.css('width', '872');


                //setup top and left offset to dynamically centre the ligthbox
                var topOffset = (windowHeight - lightbox.height()) / 2 < opts.minimumOffset ? opts.minimumOffset : (windowHeight - lightbox.height()) / 2;
                lightbox.offset({ top: $(window).scrollTop() + topOffset, left: (windowWidth - lightbox.width()) / 2 });

                lightbox.corner('5px');

                handleOverflow(maxHeight, maxWidth);

                addLightboxEventHandlers(topOffset);
            }

            function getLightboxContent() {
                var href = lightboxLink.attr('href');
                var content;
                //if # in href then div on page, not a link
                if (href.indexOf("#") === -1) {
                    //from link w/ajax
                    $.get(href, function (data) {

                        content = $(data).find(opts.contentSelector);


                        $(content).show();
                        lightbox.append(content);
                    }, 'text');
                } else {
                    //from page div content
                    content = $('body').find(href).find(opts.contentSelector);
                    $(content).show();
                    lightbox.append(content);
                }
            }

            //handles size out of bounds and applies overflow as required
            function handleOverflow(maxHeight, maxWidth) {
                if (lightbox.height() > maxHeight) {
                    lightbox.height(maxHeight);
                    lightbox.css('overflow-y', 'scroll');
                }
                if (lightbox.width() > maxWidth) {
                    lightbox.width(maxWidth);
                    lightbox.css('overflow-x', 'scroll');
                }
            }

            //event handlers for close link and offset scrolling
            function addLightboxEventHandlers(topOffset) {
                $('.' + opts.closeLightboxClass + ', .' + opts.lightboxOverlayClass).on('click', function (event) {
                    event.preventDefault();
                    hideLightbox();
                });

                $(window).scroll(function () {
                    lightbox.css('top', $(window).scrollTop() + topOffset + 'px');
                });
            }

            function showLightbox() {
                overlay.fadeIn(opts.fadeTime);
                lightbox.fadeIn(opts.fadeTime);
            }

            function hideLightbox() {
                lightbox.fadeOut(opts.fadeTime);
                overlay.fadeOut(opts.fadeTime);
            }
        });
    };
})(jQuery);

// Vodafone Tabs plugin
// Author: Ryan Mitchell (2010), James Westgate (2011) (http://www.sapient.com)
// Version 1.21
(function ($) {

    $.fn.vfTabs = function (config) {

        return this.each(function (i, tabbedContentItem) {

            //adding class of tabHeader and dynamic ID to each header element		
            var headerLevel;
            if ($(this).find('h3').length) {
                headerLevel = 'h3';
            } else {
                headerLevel = 'h4';
            }
            jQuery.each($(this).find(headerLevel), function (j) {
                $(this).attr('id', 'tabContentHeader' + i + j).addClass('tabHeader');;
            });

            var self = this;

            // element-specific code here
            var defaults = {
                activeState: 'activeTabElement',
                tabContainerSelect: '.tabbedContainer',
                tabListClass: 'tabList',
                tabContent: 'tab',
                setHeight: false,
                updateFromHash: true,
                tabbedContentItem: null,
                tabListElement: null,
                tabBoxHeightArray: [],
                tabListItemArray: [],
                tabBoxArray: [],
                previousItem: 0,
                tabId: ''
            };

            //extend/overrule defaults with the passed in config
            var opts = $.extend({}, defaults, config);

            tabbedContentItemElements = $(tabbedContentItem);

            opts.tabId = tabbedContentItemElements.attr('id');
            if (opts.tabId == '' || typeof opts.tabId === "undefined") {
                opts.tabId = 'tabsItem' + i;
                tabbedContentItemElements.attr('id', opts.tabId);
            }
            opts.tabbedContentItem = tabbedContentItemElements;


            //-- Initialise the object

            //check for a custom height
            var aCustomWidth = tabbedContentItemElements.attr('class').match(/tabbedContentHeight_[A-Za-z0-9]*/);
            if (aCustomWidth) {
                opts.setHeight = aCustomWidth[0].replace('tabbedContentHeight_', '');
            }

            //Create the tab list from headers
            opts.tabListElement = $('<ul id="tabList_' + opts.tabId + '" class="' + opts.tabListClass + ' JSTabs"></ul>');
            //get tabs not nested
            var aItems = tabbedContentItemElements.find('.tabLead:not(#' + opts.tabId + ' ' + opts.tabContainerSelect + ' .tabLead), .tabHeader:not(#' + opts.tabId + ' ' + opts.tabContainerSelect + ' .tabHeader)');
            //header creation
            for (var iterator = 0, iLen = aItems.length; iterator < iLen; iterator++) {
                var eItem = aItems[iterator];
                var eLiItem = $('<li id="tab_' + eItem.id + '"><a href="#' + eItem.id + '"><span>' + eItem.innerHTML + '</span></a></li>');
                if (iterator === 0) {
                    eLiItem.addClass('firstTab');
                }
                else if (iterator === aItems.length - 1) {
                    eLiItem.addClass('lastTab');
                }

                opts.tabListElement.append(eLiItem);
                $(eItem).hide();
            }

            //add class to state how many tabs there are
            opts.tabListElement.addClass('contains' + aItems.length + 'Tabs');
            tabbedContentItemElements.prepend(opts.tabListElement);

            var sTabElementFindString = 'ul.' + opts.tabListClass + ' li:not(#' + opts.tabId + ' ul.' + opts.tabListClass + ' ul.' + opts.tabListClass + ' li), div.' + opts.tabContent + ':not(#' + opts.tabId + ' div.' + opts.tabContent + ' div.' + opts.tabContent + ')';
            var eTabElements = tabbedContentItemElements.find(sTabElementFindString);

            var iActionNumbers = eTabElements.length / 2;

            opts.tabListItemArray = eTabElements.slice(0, iActionNumbers);
            opts.tabBoxArray = eTabElements.slice(iActionNumbers);

            for (var k = 0, l = opts.tabBoxArray.length; k < l; k++) {
                if (opts.setHeight) {
                    opts.tabBoxHeightArray[k] = opts.setHeight;
                }
                else {
                    opts.tabBoxHeightArray[k] = $(opts.tabBoxArray[k]).outerHeight();
                }
            }

            var initialTab = 0;

            //if we are tracking hash values, check for a valid initial state
            if (opts.updateFromHash) {
                var sCurrentHash = location.hash;
                var iLen2 = opts.tabListItemArray.length;
                for (var iIndex = 0; iIndex < iLen2; iIndex++) {
                    if (('#' + opts.tabListItemArray[iIndex].id) == sCurrentHash) {
                        initialTab = iIndex;
                        //we're done here!
                        iIndex = iLen2;
                    }
                }
            }
            var tabArray = $.makeArray($(self).find($('.tab')));
            var defaultTab = $(self).find($('.defaultTab'));
            var initialTab = $.inArray(defaultTab[0], tabArray) !== -1 ? $.inArray(defaultTab[0], tabArray) : 0;

            /*if(typeof pageDefaultTab !== "undefined") {
				initialTab = pageDefaultTab;
			}*/

            //Select first item and display it
            selectItem.call(opts.tabListItemArray[initialTab], initialTab);

            //assign click handlers		
            opts.tabListItemArray.each(function (i, element) {

                $(element).bind('click', opts, function (event) {

                    //raise tab click eventon the item, passing through it's index and the tab containers opts
                    $(this).trigger('tabActionEvent', [i, opts]);

                    //process call
                    return selectItem.call(this, i);
                });
            });


            //Tab is selected when clicked, removes the active css class from all tabs in the list
            //Displays the corresponding content box when a tab is clicked	
            function selectItem(i, manualCall) {

                var manualCallLocal = !!manualCall;
                $(opts.tabListElement).find('.' + opts.activeState).removeClass(opts.activeState);

                var targetElement = (!manualCallLocal) ? targetElement = $(this) : $(opts.tabListItemArray[i]);

                targetElement.addClass(opts.activeState);

                //add active state to the child, used for specfic styling in IE6
                targetElement.children('a').addClass(opts.activeState);

                opts.tabBoxArray.hide();
                show(i, manualCallLocal);
                opts.previousItem = i; //here we set the previous item as the current item

                return false;
            };


            //Display tab content div, use a slide open animation, using the height of the last open tab as the start point
            function show(iIndex, manualCall) {

                var height = opts.tabBoxHeightArray[iIndex];
                var tabBox = $(opts.tabBoxArray[iIndex]);

                if (opts.setHeight === false) {

                    tabBox.css({ height: opts.tabBoxHeightArray[opts.previousItem], display: '' })
                    tabBox.animate({ height: height }, 200, function () {

                        //reset styles and hide
                        tabBox.css('height', 'auto');
                        if (!manualCall) $('body').trigger('tabOpenedEvent', [self, iIndex]);
                    });
                }
                else {
                    tabBox.css({ display: '', height: opts.setHeight + 'px' });
                    if (!manualCall) $('body').trigger('tabOpenedEvent', [self, iIndex]);
                }
                return false;
            };
        });
    };

})(jQuery);

//Converts radio buttons into iOS style sliding toggle switches using an image asset
(function ($) {
    $.fn.vfRadioToggles = function (opt) {

        //handles divs and radio groups - for toggleContainer divs we need to get the
        //radio group and pass that and also add the 'js' class to the div
        if ($(this).is('div')) {
            $.each($(this), function (index, thisDiv) {
                var thisGroupsRadioButtons = $(thisDiv).find('input:radio');
                insertRadioToggle(thisGroupsRadioButtons, opt);
            });
            $(this).addClass('js');
        } else {
            insertRadioToggle($(this));
        }

        function insertRadioToggle(thisGroup, opt) {

            if (typeof thisGroup !== "undefined") {

                //hiding radios and labels
                $.each(thisGroup, function (index, thisRadio) {
                    $(thisRadio).addClass('hiddenRadio');
                    $('label[for="' + $(thisRadio).attr('id') + '"]').hide();
                });

                //creating output div with toggle switch
                var toggle = $('<div class="here_' + $(thisGroup[0]).attr('id') + '" tabindex="0"></div>').insertAfter(thisGroup[0]);

                $(toggle).addClass('radioToggle');

                //initialising switch position to off if off radio input is checked
                //and adding relevant class to status span
                if ($(thisGroup[1]).prop("checked")) {
                    $(toggle).css('backgroundPosition', 'right top'); 	// on
                }
                else {
                    $(toggle).css('backgroundPosition', 'left top'); 	// off
                }

                if (typeof opt === 'undefined' || opt['disableClickEvent'] == false) {
                    addEventHandlers(toggle, thisGroup);
                }
                else {
                    if ($(thisGroup[1]).prop("checked")) {
                        $(toggle).css('backgroundPosition', 'right -23px'); 	// on disabled
                    }
                    else {
                        $(toggle).css('backgroundPosition', 'left -23px'); 	// off disabled
                    }
                }
            }
        }


        //binding events to switch background, check correct radio and add correct class to output span
        function addEventHandlers(toggle, thisGroup) {

            $(toggle).on('click', function (e) {

                if ($(thisGroup[1]).prop("checked")) {
                    toggleOn($(this));

                } else {
                    toggleOff($(this));
                }
            });

            //left and right arrow key functionality
            $(toggle).on('keydown', function (e) {
                //we want the tab key to work normally
                if (e.keyCode != 9) {
                    e.preventDefault();
                }
                if (e.keyCode == 37) {
                    toggleOff($(this));
                } else if (e.keyCode == 39) {
                    toggleOn($(this));
                }
            });

            function toggleOn(thisToggle) {

                thisToggle.animate({ backgroundPosition: '0% 0%' }, 200, false, function () {

                });
                // Had to unchain the click event after the animation
                // If you chain it it will not fire event in IE! - SS
                if (thisGroup[0].fireEvent) {
                    thisGroup[0].fireEvent('onclick');

                } else {
                    $(thisGroup[0]).click();
                }
                $(thisGroup[0]).prop("checked", true);
                $(thisGroup[1]).prop("checked", false);

            }

            function toggleOff(thisToggle) {

                thisToggle.animate({ backgroundPosition: '100% 0%' }, 200, false, function () {

                });
                // Had to unchain the click event after the animation
                // If you chain it it will not fire event in IE! - SS
                if (thisGroup[1].fireEvent) {
                    thisGroup[1].fireEvent('onclick');
                } else {
                    $(thisGroup[1]).click();

                }
                $(thisGroup[0]).prop("checked", false);
                $(thisGroup[1]).prop("checked", true);
            }
        }

    };
})(jQuery);

//Creates and displays circular balance gauges
(function ($) {
    $.fn.vfBalanceGauges = function () {

        //converting the balance to £xx.xx format rather than xxxx
        var balanceValue = $('.balanceValue').html(),
			unltd = 'Unlimited';
        if (!isNaN(balanceValue)) {
            balanceValue = balanceValue / 100;
            $('.balanceValue').html('\u00A3' + balanceValue);

        } else {
            $('.balanceValue').html('<span class="balanceNotReturned">Not Available</span>');
        }

        //Make negative values of balance checker show in VF Red
        if (balanceValue < 0) {
            $(".balanceValue").addClass("redText");
        }

        balanceValue = balanceValue.toString();

        //TODO make a switch statment
        //Check for £9.99 for <sup> Insertion
        if (balanceValue.charAt(1) == ".") {
            var first = balanceValue.substring(0, 1);
            var second = balanceValue.substring(1, 4);
            $('.balanceValue').html('&pound;' + first + '<sup>' + second + '</sup>');
        }

        //Check for £99.99 for <sup> Insertion
        if (balanceValue.charAt(2) == ".") {
            var first = balanceValue.substring(0, 3);
            var second = balanceValue.substring(3, 7);
            $('.balanceValue').html('&pound;' + first + '<sup>' + second + '</sup>');
        }

        //Check for £999.99 for <sup> Insertion
        if (balanceValue.charAt(3) == ".") {
            var first = balanceValue.substring(0, 4);
            var second = balanceValue.substring(4, 8);
            $('.balanceValue').html('&pound;' + first + '<sup>' + second + '</sup>');
        }

        //Check for £0.99 or £0.99 or £1.99 minus values <sup> Insertion
        if (balanceValue.charAt(2) == "." && balanceValue.charAt(0) == "-") {
            var first = balanceValue.substring(1, 2);
            var second = balanceValue.substring(2, 5);
            $('.balanceValue').html('-' + '&pound;' + first + '<sup>' + second + '</sup>');
        }

        //Check for £0.99 or £0.99 or £1.99 minus values <sup> Insertion
        if (balanceValue.charAt(0) == "-") {
            var first = balanceValue.substring(1, 2);
            var second = balanceValue.substring(2, 5);
            $('.balanceValue').html('-' + '&pound;' + first + '<sup>' + second + '</sup>');
        }

        $(this).each(function (i, element) {
            $(this).addClass('js');
            //get .remaining 'p' from DOM
            var remainingHtmlPara = $($(this).find('.remaining'));
            var nonNumericRegExp = /^0-9,\./; // was /\D/g; 

            //get total and remaining values from DOM
            var remainingValue = remainingHtmlPara.children('.remainingAmmount').html();
            remainingValue = remainingValue.replace(nonNumericRegExp, '');

            var totalValue = remainingHtmlPara.children('.totalAmmount').html();
            totalValue = totalValue.replace(nonNumericRegExp, '');

            //This process is DEPENDENT on the elements Paragraph tag containing the copy "minutes/data"
            //find what type of packs the user has and apply correct Math
            var balanceType, balanceText = ($(this).find(".remaining").text()).toLowerCase();
            var typeArray = ["minutes", "data", "text"];
            var dataUnitRemaining = "";
            var dataUnitTotal = "";

            for (q = 0; q < typeArray.length; q++) {
                if (balanceText.indexOf(typeArray[q]) > 1) {
                    balanceType = typeArray[q];
                };
            };
            switch (balanceType) {
                case "minutes":
                    if (!isNaN(remainingValue)) {
                        remainingValue = Math.round(remainingValue / 60);
                    } else {
                        remainingValue = 'n/a'
                    }
                    if (!isNaN(totalValue)) {
                        totalValue = Math.round(totalValue / 60);
                    } else {
                        totalValue = 'n/a'
                    }

                    remainingHtmlPara.children('.remainingAmmount').html(remainingValue);
                    remainingHtmlPara.children('.totalAmmount').html(totalValue);
                    if (!isNaN(totalValue) && totalValue >= 3000) {
                        remainingValue = 1;
                        totalValue = 1;
                        remainingHtmlPara.html('Remaining minutes: ' + unltd);
                    }
                    break;
                case "data":

                    if (!isNaN(remainingValue)) {
                        remainingValue = Math.round(remainingValue / 1024); // Converts to Kb

                        // Value here assumed to be kb. If more than 1GB, just display GB value
                        if (remainingValue > 1048576) {
                            remainingValue = parseInt(remainingValue / 1024, 10);
                            totalValue = parseInt(totalValue / 1024, 10); // May not be required
                            dataUnitRemaining = "GB";
                        } else {
                            dataUnitRemaining = "MB";
                        }

                    } else {
                        remainingValue = 'n/a'
                    }
                    if (!isNaN(totalValue)) {
                        totalValue = Math.round(totalValue / 1024);
                        if (totalValue > 1048576) {
                            totalValue = parseInt(totalValue / 1024, 10);
                            totalValue = parseInt(totalValue / 1024, 10); // May not be required
                            dataUnitTotal = "GB";
                        } else {
                            dataUnitTotal = "MB";
                        }
                    } else {
                        totalValue = 'n/a'
                    }

                    remainingHtmlPara.children('.remainingAmmount').html(remainingValue.toString() + dataUnitRemaining);
                    remainingHtmlPara.children('.totalAmmount').html(totalValue.toString() + dataUnitTotal);

                    // Check for large data plan coming soon
                    if (remainingValue > totalValue) {
                        remainingValue = 1024;
                        totalValue = 1024;
                    }

                    break;
                case "text":
                    if (!isNaN(totalValue) && totalValue >= 3000) {
                        remainingValue = 1;
                        totalValue = 1;
                        remainingHtmlPara.html('Remaining text: ' + unltd);
                    }
                    break;
                default:
                    break;
            }

            //check we have a value
            if (remainingValue !== "") {
                //calculate sections needed from values on page
                var percentageUsed = !isNaN(remainingValue / totalValue * 100) ? (remainingValue / totalValue * 100) : 0;

                var balanceBar = $('<div class="remainingBar"><span style="width:' + percentageUsed + '%"></span></div>');
                $(this).append(balanceBar);
            }
        });
    };
})(jQuery);


//Toggles the username type on the registration form between using
//the users email address and allowing manual entry of a username
(function ($) {
    $.fn.vfToggleEmailUsername = function () {
        $(this).each(function () {
            var radioButtons = $(this).find('input:radio');
            var useEmailButton = radioButtons[0];
            var useOwnButton = radioButtons[1];

            //Change in ADF component keeps changing the DOM so this had to change.
            //var usernameInput = $(this).parent().next('span').children('.formrow');
            var usernameInput = $(this).parent().next('span').children();
            usernameInput.hide();

            $(useEmailButton).on('click', function (e) {
                usernameInput.slideUp(200);
            });
            $(useOwnButton).on('click', function (e) {
                usernameInput.slideDown(200);
            });
        });
    };
})(jQuery);

//Adds js class to all checkboxes and checked class to checked checkboxes
(function ($) {
    $.fn.vfCheckboxes = function () {
        $(this).each(function () {
            var checkbox = $(this);
            var parentDiv = $(this).parent('div');
            var label = $('label[for="' + $(this).attr('name') + '"]');
            //initialise classes
            label.addClass('checkbox js');
            parentDiv.addClass('checkbox js');
        });
    };
})(jQuery);

//adds classes to formrows containing radio buttons
//and toggles checked class for labels
(function ($) {
    $.fn.vfRadios = function () {
        $(this).each(function () {
            var radio = $(this);

            if ($(radio).parent().is('td')) {
                radio.parent('td').addClass('radio js');
            } else if ($(radio).parent().is('li')) {
                radio.parent('li').addClass('radio js');
            } else {
                radio.closest('.formRow').addClass('radio js');
            }
            var label = $('label[for="' + radio.attr('id') + '"]');

            if (radio.prop('checked')) {
                label.addClass('checked');
            }

            label.on('click', function (e) {
                var groupName = radio.attr('name');
                var radioGroup = $('input[name="' + groupName + '"]');

                $.each(radioGroup, function () {
                    var id = $(this).attr('id');
                    $('label[for="' + id + '"]').removeClass('checked');
                });

                $(this).addClass('checked');
            });
        });
    };
})(jQuery);

//Tooltip functionality
(function ($) {
    $.fn.vfToolTips = function () {


        //used to flag whether tooltip is currently active so we can
        //prevent multiple tooltips apearing on tabbing in and out
        //of certain browsers
        var tooltipActive = false;
        $(this).each(function () {

            //get the text and hide it
            var thisToolTip = $(this);
            thisToolTip.hide();

            //get parent input and formRow
            var formRow = $(thisToolTip.parent());
            var parentInput = $(formRow.find('input')[0]);

            //create tooltip element
            var helpTextDiv = $('<div class="helpTextOff"></div>');
            var helpTextIcon = $('<span class="icon"></span>');
            helpTextDiv.append(helpTextIcon);
            formRow.append(helpTextDiv);

            formRow.addClass('js');

            //binds
            helpTextIcon.on('mouseover', showToolTip);
            parentInput.on('focus', showToolTip);

            helpTextIcon.on('mouseout', hideToolTip);
            parentInput.on('focusout', hideToolTip);

            function showToolTip(event) {
                //check no active tooltip, not a mouseover on currently focused field and not ,mouseover with active tooltip
                if (!(parentInput.is(':focus') && event.type === 'mouseover') && !tooltipActive && !($('div.helpText').length && event.type === 'mouseover')) {

                    tooltipActive = true;
                    helpTextDiv.removeClass('helpTextOff');
                    helpTextDiv.addClass('helpText');
                    helpTextDiv.append('<div class="messageContainer"><div class="message"><p class="messageText">' + thisToolTip.text() + '</p></div><div class="messageBottom"></div></div>');

                    // checks if the box is hanging of screen
                    var left = $(".messageContainer").offset().left, screenWidth = $(window).width();
                    if ((left + 200) > screenWidth && (screenWidth > !950)) {
                        $(this).next().addClass("messageContainerLeft")
                    }

                }

            }

            function hideToolTip(event) {
                //check if it is a mouseout on the current focused field
                //if conditions met do not hideToolTip
                if (!(parentInput.is(':focus') && event.type === 'mouseout')) {
                    tooltipActive = false;
                    helpTextDiv.removeClass('helpText');
                    helpTextDiv.addClass('helpTextOff');
                    helpTextDiv.children('.messageContainer').remove();
                }
            }
        });
    };
})(jQuery);

(function ($) {
    $.fn.vfMemorableWordHint = function () {
        var hintLink = $('<a href="#" id="hintLink" class="memWordHintLink">Need a hint?</a>');
        var hideHintLink = $('<a href="#" id="hideHintLink" class="memWordHintLink">Hide your hint</a>')

        var memWordHint = $(this);

        memWordHint.before(hintLink);
        memWordHint.before(hideHintLink.hide());

        memWordHint.hide();

        $('#hintLink').on('click', function (event) {
            event.preventDefault();
            memWordHint.slideDown(200);
            hideHintLink.show().css("display", "block");
            hintLink.hide();
        });
        $('#hideHintLink').on('click', function (event) {
            event.preventDefault();
            memWordHint.slideUp(200);
            hintLink.show().css("display", "block");
            hideHintLink.hide();
        });
    };
})(jQuery);

(function ($) {
    $.fn.vfHideSubmitMyExtras = function () {
        $(this).find('input:submit').hide();
    };
})(jQuery);

(function ($) {
    $.fn.vfRememberMeUsernameFocus = function () {
        if ($('#userId').val().length) {
            $('#password').focus();
        }
    };
})(jQuery);

(function ($) {
    $.fn.vfManagePaymentTable = function () {
        //using old fashioned for loop so we can iterate 4 at a time
        //for(var i = 0; i < this.length; i += 4) {
        $(this).each(function (index) {
            var firstRow = $(this);
            var secondRow = $(this).next('tr.hidden');

            //zebra striping table
            if (index === 0 || index % 2 === 0) {
                firstRow.addClass('zebra');
                secondRow.addClass('zebra');
            }

            //individual payment deletion
            var deleteLink = firstRow.find('.action_delete a');
            var cancelLink = secondRow.find('.cancelLink a')

            firstRow.find('.action_delete a').on('click', function (e) {
                e.preventDefault();
                secondRow.slideDown('200');
            });

            secondRow.find('.cancelLink a').on('click', function (e) {
                e.preventDefault();
                secondRow.slideUp('200');
            });
        });

        //handle delete all link outside of table
        var deleteAllSection = $('div.deleteAll');
        var table = deleteAllSection.prev('.zebraTable');
        var deleteAllLink = $('a.deleteAll');

        deleteAllLink.on('click', function (e) {
            e.preventDefault();
            deleteAllLink.hide();
            table.slideUp('200');
            deleteAllSection.slideDown('200');
        });

        $('div.deleteAll a').on('click', function (e) {
            e.preventDefault();
            deleteAllLink.show();
            deleteAllSection.slideUp('200');
            table.slideDown('200');
        });
    };
})(jQuery);



(function ($) {
    $.fn.vfCardExpiry = function () {

        /* ============================================================
        * VF Card Expiry function
        * ============================================================
        * Created by: Robert Greville, VF
        * Last Modified: 18.02.2013
        *
        * Requires further work to extrapolate the date functions
        * Currently sets all dates to **|01|** and calculates expiry
        * based on this index. If its past 1 month (31 days) then it
        * will have expired, otherwise it'll expire soon.
        * ============================================================ */

        var row = $(this).find('tr'),
			exp = row.find('td:eq(1)'),
			expText = $('#expired').val(),
			soonText = $('#expires_soon').val(),
			expired = ' <span>' + expText + '</span>',
			expiringSoon = ' <span>' + soonText + '</span>';

        exp.each(function (e) {
            var expiry = $(this).text(),
				date = expiry.replace(/\//, "/01/20"),
				today = new Date(),
				month = today.getMonth() + 1 + '',
				year = today.getFullYear() + '',
				expiryMonthStart = new Date(date).getTime(),
				oneMonth = 1000 * 60 * 60 * 24 * 31;

            if (month.length === 1) {
                month = '0' + month;
            }

            var target = month + '/01/' + year,
				thisMonthStart = new Date(target).getTime();

            if (expiryMonthStart < thisMonthStart) {
                $(this).parent().addClass('expired-card');
                $(this).addClass('expired').append(expired);
            } else if ((expiryMonthStart - oneMonth) <= thisMonthStart || expiryMonthStart === thisMonthStart) {
                $(this).addClass('expiring').append(expiringSoon);
            }

        });

        if (row.hasClass('expired-card')) {
            var input = $('.expired-card').find('input');
            input.attr('checked', false);
            input.attr('disabled', 'disabled');
        }

    };
})(jQuery);

(function ($) {
    $.fn.vfCardSelect = function () {

        /* ============================================================
        * VF Card Select function
        * ============================================================
        * Created by: Robert Greville, VF
        * Last Modified: 13.02.2013
        * ============================================================ */

        var el = $(this),
			select = el.find('select:eq(0)'),
			card = el.find('#selectedCard');

        select.on('change', function (e) {
            var val = $(e.target).find('option:selected').val();
            switch (val) {
                case '':
                    card.css('background-position', '0 0');
                    break;
                case 'VISA Credit':
                    card.css('background-position', '0 -32px');
                    break;
                case 'VISA Debit':
                    card.css('background-position', '0 -226px');
                    break;
                case 'VISA Electron':
                    card.css('background-position', '0 -96px');
                    break;
                case 'MasterCard':
                    card.css('background-position', '0 -64px');
                    break;
                case 'Maestro':
                    card.css('background-position', '0 -128px');
                    break;
                case 'Solo':
                    card.css('background-position', '0 -193px');
                    break;

            }
        });

    };
})(jQuery);

(function ($) {
    $.fn.vfSelectSavedCard = function () {

        /* ============================================================
        * VF Select Saved Card function for Payment subflow
        * ============================================================
        * Created by: Robert Greville, VF
        * Last Modified: 18.02.2013
        * ============================================================ */

        var el = $(this),
			radio = el.find('input[type=radio]'),
			sec = $('.secCodeContainer'),
			card = $('.use-new-card');

        sec.hide();

        radio.on('click', function (e) {
            if ($(this).parent().parent().parent().hasClass('newCardListContainer')) {
                sec.hide();
                card.show();
            } else {
                card.hide();
                sec.hide();
                $(this).parent().parent().parent().next().show();
            }
        });

        var row = $(this).find('li'),
			exp = row.find('span.expiry span'),
			expText = $('#expired').val(),
			soonText = $('#expires_soon').val(),
			expired = ' <span>' + expText + '</span>',
			expiringSoon = ' <span>' + soonText + '</span>';

        exp.each(function (e) {
            var expiry = $(this).text(),
				date = expiry.replace(/\//, "/01/20"),
				today = new Date(),
				month = today.getMonth() + 1 + '',
				year = today.getFullYear() + '',
				expiryMonthStart = new Date(date).getTime(),
				oneMonth = 1000 * 60 * 60 * 24 * 31;

            if (month.length === 1) {
                month = '0' + month;
            }

            var target = month + '/01/' + year,
				thisMonthStart = new Date(target).getTime();

            if (expiryMonthStart < thisMonthStart) {
                $(this).parent().parent().addClass('expired-card');
                $(this).addClass('expired').append(expired);
            } else if ((expiryMonthStart - oneMonth) <= thisMonthStart || expiryMonthStart === thisMonthStart) {
                $(this).addClass('expiring').append(expiringSoon);
            }

        });

        if (row.hasClass('expired-card')) {
            var input = $('.expired-card').find('input');
            input.attr('checked', false);
            input.attr('disabled', 'disabled');
        }

    };
})(jQuery);




//Show hide link and hide inline success messages
(function ($) {
    $.fn.vfHideInlineSuccessMessage = function () {
        $(this).each(function (index) {
            //insert hide link
            var successDiv = $(this);
            successDiv.prepend($('<a href="#" id="hideMessage' + index + '" class="hideMeLink">hide message</a>'));

            //hide div
            $('#hideMessage' + index).on('click', function (event) {
                event.preventDefault();
                successDiv.slideUp(200);
            });
        });
    };
})(jQuery);

//Added by SS - Step 3 Of Registartion
//If username/email input fails we need to click it so form fields show (PPR refresh and resetting of hide/show depending on click state of radio button)
(function ($) {
    $.fn.vfClickRegistration = function () {
        var labels = $("label");
        var filterLabel = labels.filter('.checked');

        filterLabel.prev('span').find('[type=radio]').click();
    };
})(jQuery);

/*
 * Vodafone Accordion plugin
 * Author: Ryan Mitchell (2010) (http://www.sapient.com)
 * Version 1.3
 * 
 */

(function ($) {

    $.fn.vdfAccordion = function (config) {

        $.fn.vdfAccordion.defaults = {
            headerSelect: ".accordionHeader",
            contentSelect: 'div.accordionContent',
            activeState: 'active',
            inactiveState: 'inactive',
            openState: 'accordOpen',
            closePrevious: true
        };

        var options = $.extend({}, $.fn.vdfAccordion.defaults, config);

        return this.each(function () {
            var $this = $(this);
            var tempAccordion = new Accordion($this, options);
        });
    };

    //Class constructor
    function Accordion(eAccordionContainer, options) {
        var accordionBoxHeights = [];
        var accordionList, accordionBoxes;
        var lastView = false;

        /**
		*	@function - vdf.Tools.Tab.resetView
		*	@description  - This resets the accordion view
		*	@param- void
		*	@returns - false
		**/
        var resetView = function () {
            if (lastView) {
                $(accordionList[lastView.index]).removeClass(options.activeState).addClass(options.inactiveState);
                lastView.content.removeClass(options.openState);
                contract(lastView.content, lastView.height);
            }
        };

        /**
		*	@function - vdf.Tools.Tab.expandView
		*	@description  - Accordion view responds to click and is expanded
		*	@param- iIndexPos
		*	@returns - false
		**/
        var expandView = function (iIndexPos, eItem) {
            $(eItem).removeClass(options.inactiveState).addClass(options.activeState);

            //if this is a new view
            var oContent = $(accordionBoxes[iIndexPos]);
            var iHeight = accordionBoxHeights[iIndexPos];

            if (options.closePrevious === false) {
                lastView = {
                    "index": iIndexPos,
                    "content": oContent,
                    "height": iHeight
                };
            }

            if (oContent.css("display") === "none") {
                if (options.closePrevious) {
                    resetView();
                }
                oContent.addClass(options.openState);
                expand(oContent, iHeight);

                lastView = {
                    "index": iIndexPos,
                    "content": oContent,
                    "height": iHeight
                };
            }
            else {
                resetView();
            }
        };


        //init functions
        accordionList = eAccordionContainer.find(options.headerSelect);
        accordionBoxes = eAccordionContainer.find(options.contentSelect);

        //get all the heights		
        for (var i = 0, j = accordionBoxes.length; i < j; i++) {
            accordionBoxHeights[i] = $(accordionBoxes[i]).height();
        }

        //in order to make the accordion keyboard accessble we need links
        var bAddLinks = false;
        var eA;
        var eChildLinks = $(accordionList[0]).find('a');
        if (eChildLinks.length === 0) {
            bAddLinks = true;
            //create wrapping element used below once
            eA = $('<a href="#"></a>');
        }

        //for each header item
        accordionList.each(function (index, item) {
            var $item = $(item);

            //add a link to enable keyboard navigation
            if (bAddLinks) {
                $item.wrapInner(eA);
            }

            //add click action
            $item.click(function (event) {
                expandView(index, this);
                return false;
            });
            //set init state?
            if ($item.hasClass(options.activeState)) {
                expandView(index, item);
            }
        });

        return this;
    }

    /**
	*	@function - vdf.Tools.Expander.expand
	*	@description  - This expands the relivant responder
	*	@param- eResponder, iCurrentHeight
	*	@returns - false
	**/
    var expand = function (eResponder, iCurrentHeight) {
        eResponder
				.css('height', 0)
				.animate({
				    opacity: 100,
				    height: iCurrentHeight
				}, 200, function () {
				    eResponder.css({ height: '', display: 'block' });
				});

        return false;
    };

    /**
	*	@function - vdf.Tools.Expander.contract
	*	@description  - This expands or contracts the relivant responder
	*	@param- eResponder
	*	@returns - false
	**/
    var contract = function (eResponder) {
        jQuery(eResponder)
				.css('overflow', 'hidden')
				.animate({
				    opacity: 0,
				    height: 0
				}, 400, function () {
				    jQuery(eResponder).css('display', 'none');
				});

        return false;
    };

})(jQuery);



(function ($) {
    $.fn.vfBalanceChecker = function () {

        /* ============================================================
        * VF Balance Checker 2.1
        * ============================================================
        * Created by: Robert Greville, VF
        * Last Modified: 05.03.2013
        * ============================================================ */

        var el = $(this),
			product = el.find('.product .product-detail'),
			extra = el.find('.my-extras');

        // Gets core balance and moves data after decimal point into <sup>
        function balance() {
            var val = $(el).find('.balance-value'),
				bal = val.find('span'),
				txt = bal.text(),
				minus = txt.replace(/\-/, ''),
				na = 'n/a',
				nan = (String(txt)).match(/[^0-9\.\-]+/g);

            if (txt === '' || nan != null) {
                // If null or NaN
                $(val).html(na);
                txt = null;
            }

            // If minus value
            if (txt != null && txt.indexOf('-') === 0) {
                $(bal).text(minus);
                $(val).parent().addClass('minus');
                $(val).prepend('-');
            } else if (txt != null && txt.indexOf('.') === -1) {
                // If no decimal place (whole number, 20 is 20.00 etc.)
                minus = txt + '.00';
            }

            $(bal).html(minus.replace(/\.(\d{2})/, function (m) { return "<sup>" + m + "</sup>"; }));

        }

        // Calculates percentage remaining and uses that for bar width
        function bars() {
            product.each(function () {
                var usage = $(this).find('.product-usage'),
					remaining = usage.find('.remaining').text(),
					allowance = usage.find('.allowance').text(),
					bar = $(this).find('.usage-amount'),
					percent = !isNaN(remaining / allowance * 100) ? (remaining / allowance * 100) : 0,
					text = usage.find('.remaining-text').text(),
					unav = 'Balance unavailable',
					remainingNan = (String(remaining)).match(/[^0-9\.]+/g),
					allowanceNan = (String(allowance)).match(/[^0-9\.]+/g);
                // Unlimited check, else if empty or NaN else fill bar
                if (remaining && allowance === 'Unlimited') {
                    usage.empty();
                    usage.text(allowance + ' ' + text);
                    bar.css('width', '100%');
                    bar.text(allowance);
                } else if (remainingNan != null || allowanceNan != null || remaining === '' || allowance === '') {
                    usage.empty();
                    usage.text(unav);
                    bar.css('width', '0%');
                    bar.text(unav);
                } else {
                    bar.css('width', percent + '%');
                    bar.text(percent + '% remaining');
                }
            });
        }

        // Hide/show of extras
        function extras() {
            var content = extra.find('.product'),
				header = extra.find('h3 a');
            content.hide();
            header.on('click', function (e) {
                e.preventDefault();
                var span = $(this).find('span');
                if (content.is(":visible")) {
                    content.hide();
                    span.removeClass('open');
                } else {
                    content.show();
                    span.addClass('open');
                }
            });
        }

        // Show renewal and queue/expiry states
        // Show renewal and queue/expiry states
        function renewable() {
            var productExpiryText = $("input[name='productExpiryText']").val();
            var productQueuedText = $("input[name='productQueuedText']").val();
            var productDateQueuedText = $("input[name='productDateQueuedText']").val();
            var productRenewableText = $("input[name='productRenewableText']").val();

            // Clean up the DOM
            $("input[name='productExpiryText']").remove();
            $("input[name='productQueuedText']").remove(),
            $("input[name='productDateQueuedText']").remove();
            $("input[name='productRenewableText']").remove();

            $(".product").each(function (index, el) {
                var isRenewable = $(this).find("input[name='renewable']").val() == "1";
                if (!isRenewable) {
                    $(this).find(".renewable-date").hide().remove();
                }

                $(this).find(".balanceDates").each(function (index, el) {
                    var startDateStr = $(this).siblings("input[name='start']").val().trim();
                    var endDateStr = $(this).siblings("input[name='end']").val().trim();

                    // Clean up the DOM
                    $(this).siblings("input[name='start'], input[name='end']").remove();

                    var startDate = new Date(startDateStr == "" ? null : startDateStr);
                    var endDate = new Date(endDateStr == "" ? null : endDateStr);
                    var today = new Date();

                    if (startDate.toString() != "Invalid Date" && endDate.toString() != "Invalid Date") {
                        if (startDateStr == "") {
                            // Queued
                            $(this).text(productQueuedText);
                        }
                        else if (startDate > today) {
                            // Queued with start date
                            $(this).text(productDateQueuedText + " " + startDateStr);
                        }
                        else if (startDateStr != "" && endDateStr != "" && isRenewable) {
                            // Renewable
                            $(this).text(productRenewableText + " " + endDateStr);
                        }
                        else if (startDateStr != "" && endDateStr != "") {
                            // Renewable
                            $(this).text(productExpiryText + " " + endDateStr);
                        }
                    }
                });
            });
        }

        balance();
        bars();
        extras();
        renewable();
    };
})(jQuery);




//Document ready function applying defined functions to html elements
(function ($) {
    $(document).ready(function () {

        if ($('#portlet_loginForm').length > 1) {
            $('#portlet_loginForm').vfRememberMeUsernameFocus();
        }
        $('input:checkbox').vfCheckboxes();
        $('input:radio').vfRadios();
        $('div.tabbedContainer').vfTabs();
        $('div.packElementStatus').vfBalanceGauges();
        $('.toggleUseOwnUsername').vfToggleEmailUsername();
        $('.toggleContainer').vfRadioToggles();
        $('.helpText').vfToolTips();
        $('.lightboxLink').vfLightboxes();
        $('div.portlet_my_extras').vfHideSubmitMyExtras();
        $('.memWordHint').vfMemorableWordHint();
        if ($('.checkPassword').length > 1) {
            $('.checkPassword').vfPasswordChecker();
        }
        $('.portlet_Manage_payment_methods table tbody tr:not(".hidden")').vfManagePaymentTable();
        $('.addHideMe').vfHideInlineSuccessMessage();
        $('.accordionList').vdfAccordion();
        $('.radioContainer.toggleUseOwnUsername').vfClickRegistration();
        $('.portlet_Manage_payment_methods table').vfCardExpiry();
        $('.portlet_payment_subflow .formContainer, .portlet_payment_subflow_saved .formContainer, .portlet_Manage_payment_methods .formContainer, .portlet_topUpForm .formContainer').vfCardSelect();
        $('.portlet_payment_subflow_saved .savedCardsList, .portlet_topUpForm .formContainer').vfSelectSavedCard();
        $('.portlet_balance_checker').vfBalanceChecker();


        /* ============================================================
        * Copy/Paste Requests by UAT
        * ============================================================*/
        // Prevent copy/paste on password inputs as requested by UAT
        $('input:password, div.portlet_myProfile input.validateEmail').bind('cut copy paste', function (event) {
            event.preventDefault();
        });

        $('div.portlet_forgottenPassword input:password').first().unbind('cut copy paste');



        //Disable copy and paste on step 3(final) of registration 
        //$('.portlet_registrationForm input:password').bind('cut copy paste', function(event) {
        //event.preventDefault();
        //});
        //Disable copy and paste on forgotton passowrd inputs 
        //$('.portlet_forgottenPassword input:password').eq(1).bind('cut copy paste', function(event) {
        //event.preventDefault();
        //});
        //$('.portlet_forgottenPassword input:password').eq(2).bind('cut copy paste', function(event) {
        //event.preventDefault();
        //});




    });
})(jQuery);

/*ABILITY TO CHANGE ON/OFF MY PROFILE ELEMENETS VIA PLUGIN. CAN BE DELETED WHEN INSTRUCTED ALL WORKING*/

(function ($) {

    $.fn.myProfileHideShow = function (args) {

        // setup default values
        var defaults = {
            hideAll: false,
            myPassword: false,
            myPin: false,
            myMemorableWord: false,
            aboutMe: false,
            contactDetalis: true,
            emailAddress: false
        };

        // extend the defaults values with arguments passed in
        var opts = $.extend(defaults, args);

        // get all edit links
        var inputs = $(this).find(".editLink a");

        // get parent span elements
        var parentSpan = inputs.closest("span");

        // loop through each span
        parentSpan.each(function (num, element) {

            // use H4 to get context of each button
            var buttonContext = $(this).find("h4").text().toLowerCase();

            // remove all buttons if opts.hideAll
            if (opts.hideAll) {

                // remove all buttons
                $(this).find(".editLink	a").hide();

                // we also need to remove the "add this" links for contact detalis
                if (buttonContext.indexOf("contact details")) {
                    $(this).find("table a").hide();
                }

                return;
            };

            // check for My Password
            if (buttonContext.indexOf("password") >= 0 && opts.myPassword) {

                // remove Button
                $(this).find(".editLink	a").hide();

            };

            // check for My Pin
            if (buttonContext.indexOf("account pin") >= 0 && opts.myPin) {

                // remove Button
                $(this).find(".editLink	a").hide();

            };

            // check for My Memorable Word
            if (buttonContext.indexOf("memorable word") >= 0 && opts.myMemorableWord) {

                // remove Button
                $(this).find(".editLink	a").hide();

            };

            // check for About Me
            if (buttonContext.indexOf("about me") >= 0 && opts.aboutMe) {

                // remove Button
                $(this).find(".editLink	a").hide();

            };

            // check for My Contact details
            if (buttonContext.indexOf("contact details") >= 0 && opts.contactDetalis) {

                // remove Button
                $(this).find(".editLink	a").hide();

                // we also need to remove the "add this" links for contact detalis
                $(this).find("table a").hide();

            };

            // check for My Email Address
            if (buttonContext.indexOf("email address") >= 0 && opts.emailAddress) {

                // remove Button
                $(this).find(".editLink	a").hide();

            };

        });

    };

    /*
	Options for myProfileHideShow

	{ hideAll | myPassword | myPin | myMemorableWord | aboutMe | contactDetalis | emailAddress }

	Setting any of the options to true will hide that element
	e.g:
		$(".portlet_myProfile").myProfileHideShow({
			contactDetalis: true,
			emailAddress: true
		});

	This will hide the Contact Details and Email address buttons

	*/

    $(document).ready(function () {

        $(".portlet_myProfile").myProfileHideShow({

        });

    });

})(jQuery);


/*

Temp Fix for Age Verification to disable the form as system can not handle some form details currently 
If at leaset one value not there on page load - disable the inputs and show error message
If all values are there on page load - just disable the inputs and show no error message
*/

(function ($) {
    $.fn.vfHideForm = function () {

        var test = $(".formRow");

        //Disable these inputs on page load
        test.eq(3).find("select").attr("disabled", true);
        test.eq(4).find("input").attr("disabled", true);
        test.eq(5).find("input").attr("disabled", true);
        test.eq(6).find("select").attr("disabled", true);

        // Find these values from the input
        var value = test.eq(3).find("option:selected").val();
        var value2 = test.eq(4).find("input").val();
        var value3 = test.eq(5).find("input").val();
        var value4 = test.eq(6).find("option:selected").eq(0).val();
        var value5 = test.eq(6).find("option:selected").eq(1).val();
        var value6 = test.eq(6).find("option:selected").eq(2).val();

        var flag = false;

        //Check value status
        if (!value || !value2 || !value3 || !value4 || !value5 || !value6) {

            flag = true;
        };

        // If no values in these inputs then show the temp error message
        if (flag) {
            $("<div class='inlineAlertContainer'><h4>Sorry</h4><p>We don't have enough details to verify your age online. To make any changes to your personal information please call<strong>191</strong>* from your Vodafone mobile or 08700 776655 from any other UK phone.</p><p><span class='smallText'>*Calls to 191 from a Vodafone Pay as you go mobile are free. If you opt to speak to an advisor you'll pay 25p for the whole call.</span></p></div>").insertAfter('.portlet_age_verification p:first');
        };

    };

})(jQuery);


(function ($) {
    $(document).ready(function () {
        if ($('.portlet_age_verification').length) {
            $(".portlet_age_verification").vfHideForm();
        }
    });
})(jQuery);


// auto proceed inputs

(function ($) {
    /**
     * Plugin to move onto the next input in a series after a given number of characters
     *
     * Options:
     *      length
     *          default     1
     *          The number of characters before proceeding to the next element
     *      exact
     *          default     true
     *          Only move on if the number of characters matches exactly, if false, will move on only if greater than
     */
    $.fn.vfAutoProceedInput = function (opt) {
        var defaults = {
            length: 1,
            exact: true
        }

        var options = $.extend(defaults, opt);

        this.data("vfAutoProceedInput", options);

        return $.each(this, function (index, el) {
            var $this = $(this);

            $this.on("keyup", function (e) {
                var opts = $this.data("vfAutoProceedInput"),
                    val = $this.val();

                if(e.which >= 48 && e.which <= 90) {
                    if (val.length >= opts.length && opts.exact) {
                        $this.nextAll("input").first().focus();
                        $this.val(val.substr(0, opts.length));
                    }
                    else if (val.length > opts.length && !opts.exact) {
                        $this.nextAll("input").first().focus();
                    }
                }
            });
        });
    }

    $.fn.vfInputMerger = function (opts) {
        var defaults = {
            target: "input:hidden",
            inputs: "input:visible"
        }

        var options = $.extend(defaults, opts);

        return $.each(this, function () {
            var $this = $(this);
            var opts = $this.data("vfInputMerger", options);
            var inputs = $this.children(options.inputs);

            inputs.on("keyup", function (e) {
                var $this = $(this),
                    opts = $this.parent().data("vfInputMerger"),
                    parent = $this.parent();

                var newVal = "";
                for (var i = 0; i < parent.children(opts.inputs).length; i++) {
                    newVal += parent.children(opts.inputs)[i].value;
                }

                parent.children(opts.target).val(newVal);
            });
        });
    }
})(jQuery)


$(document).ready(function () {
    $("input.singleDigit").vfAutoProceedInput({ length: 1 });
    $("input.fourDigit").vfAutoProceedInput({ length: 5 });

    $(".formContainer.luhnPass .formRow").vfInputMerger();  // for SIM swap


    var index = $(".regCrumbTrail li").index($(".regCrumbTrail li.current"));
    var steps =  $(".regCrumbTrail li");

    for(var x = 0; x < index; x++) {
        steps.eq(x).append('<span class="icon success"></span>');
    }
});

