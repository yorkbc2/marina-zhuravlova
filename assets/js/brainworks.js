"use strict";

(function(w, d, $, ajax) {
    $(function() {
        console.info("The site developed by BRAIN WORKS digital agency");
        console.info("Сайт разработан маркетинговым агентством BRAIN WORKS");
        var w = $(w);
        var d = $(d);
        var html = $("html");
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        if (isMobile) {
            html.addClass("is-mobile");
        }
        html.removeClass("no-js").addClass("js");
        scrollToElement();
        sidebarAccordion();
        reviews(".js-reviews");
        scrollTop(".js-scroll-top");
        wrapHighlightedElements(".highlighted");
        if (ajax) {
            ajaxLoadMorePosts(".js-load-more", ".js-ajax-posts");
        }
        stickFooter(".js-footer", ".js-container");
        waypoint("#stats", 400).then(function() {
            $("#stats").find(".counter").each(function(_, el) {
                el = $(el);
                var val = 1 * el.text(), c = 0;
                el.text(c).animate({
                    opacity: 1
                }, 500);
                var i = setInterval(function() {
                    c++;
                    el.text(c);
                    if (c >= val) {
                        clearInterval(i);
                    }
                }, 50);
            });
        });
        anotherHamburgerMenu(".js-menu", ".js-hamburger", ".js-menu-close");
        buyOneClick(".one-click", '[data-field-id="field7"]', "h1.page-name");
        d.on("copy", addLink);
        w.on("resize", function() {
            if (w.innerWidth >= 630) {
                removeAllStyles($(".js-menu"));
            }
        });
        createTabs(".tabs");
    });
    var stickFooter = function stickFooter(footer, container) {
        var el = $(footer);
        var height = el.outerHeight() + 20 + "px";
        $(container).css("paddingBottom", height);
    };
    var reviews = function reviews(container) {
        var element = $(container);
        if (element.children().length > 1 && typeof $.fn.slick === "function") {
            element.slick({
                adaptiveHeight: false,
                autoplay: false,
                autoplaySpeed: 3e3,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev">&lsaquo;</button>',
                nextArrow: '<button type="button" class="slick-next">&rsaquo;</button>',
                dots: false,
                dotsClass: "slick-dots",
                draggable: true,
                fade: false,
                infinite: true,
                responsive: [ {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                } ],
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 300,
                swipe: true,
                zIndex: 10
            });
        }
    };
    var anotherHamburgerMenu = function anotherHamburgerMenu(menuElement, hamburgerElement, closeTrigger) {
        var Elements = {
            menu: $(menuElement),
            button: $(hamburgerElement),
            close: $(closeTrigger)
        };
        Elements.button.add(Elements.close).on("click", function() {
            Elements.menu.toggleClass("is-active");
        });
        Elements.menu.find("a").on("click", function() {
            Elements.menu.removeClass("is-active");
        });
        var arrowOpener = function arrowOpener(parent) {
            var activeArrowClass = "menu-item-has-children-arrow-active";
            return $("<button />").addClass("menu-item-has-children-arrow").on("click", function() {
                parent.children(".sub-menu").eq(0).slideToggle(300);
                if ($(this).hasClass(activeArrowClass)) {
                    $(this).removeClass(activeArrowClass);
                } else {
                    $(this).addClass(activeArrowClass);
                }
            });
        };
        var items = Elements.menu.find(".menu-item-has-children, .sub-menu-item-has-children");
        for (var i = 0; i < items.length; i++) {
            items.eq(i).append(arrowOpener(items.eq(i)));
        }
    };
    var removeAllStyles = function removeAllStyles(elementParent) {
        elementParent.find(".sub-menu").removeAttr("style");
    };
    var wrapHighlightedElements = function wrapHighlightedElements(elements) {
        elements = $(elements);
        var i, highlightedHeader;
        for (i = 0; i < elements.length; i++) {
            highlightedHeader = elements.eq(i);
            highlightedHeader.wrap('<div style="display: block;"></div>');
        }
    };
    var buyOneClick = function buyOneClick(button, field, headline) {
        var btn = $(button);
        if (btn.length) {
            btn.on("click", function() {
                $(field).prop("disabled", true).val($(headline).text());
            });
        }
    };
    var scrollTop = function scrollTop(element) {
        var el = $(element);
        el.on("click touchend", function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });
        var scrollPosition;
        $(window).on("scroll", function() {
            scrollPosition = $(this).scrollTop();
            if (scrollPosition > 200) {
                if (!el.hasClass("is-visible")) {
                    el.addClass("is-visible");
                }
            } else {
                el.removeClass("is-visible");
            }
        });
    };
    var addLink = function addLink() {
        var body = document.body || document.getElementsByTagName("body")[0];
        var selection = window.getSelection();
        var page_link = "\n Источник: " + document.location.href;
        var copy_text = selection + page_link;
        var div = document.createElement("div");
        div.style.position = "absolute";
        div.style.left = "-9999px";
        body.appendChild(div);
        div.innerText = copy_text;
        selection.selectAllChildren(div);
        window.setTimeout(function() {
            body.removeChild(div);
        }, 0);
    };
    var scrollToElement = function scrollToElement() {
        var animationSpeed = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 400;
        var links = $("a");
        links.each(function(index, element) {
            var $element = $(element), href = $element.attr("href");
            if (href[0] === "#") {
                $element.on("click", function(e) {
                    e.preventDefault();
                    var el = $(href);
                    if (el.length) {
                        $("html, body").animate({
                            scrollTop: $(href).offset().top
                        }, animationSpeed);
                    }
                });
            }
        });
    };
    var sidebarAccordion = function sidebarAccordion() {
        var sidebarMenu = $(".sidebar .widget_nav_menu");
        var items = sidebarMenu.find("li");
        var subMenu = items.find(".sub-menu");
        if (subMenu.length) {
            subMenu.each(function(index, value) {
                $(value).parent().first().append('<i class="trigger"></i>');
            });
        }
        var classAction = "is-opened";
        var trigger = items.find(".trigger");
        trigger.on("click", function() {
            var el = $(this), parent = el.parent();
            if (parent.hasClass(classAction)) {
                parent.removeClass(classAction);
            } else {
                parent.addClass(classAction);
            }
        });
    };
    var ajaxLoadMorePosts = function ajaxLoadMorePosts(selector, container) {
        var btn = $(selector);
        var storage = $(container);
        if (!btn.length && !storage.length) return;
        var data, ajaxStart;
        data = {
            action: ajax.action,
            nonce: ajax.nonce,
            paged: 1
        };
        btn.on("click", function() {
            if (ajaxStart) return;
            ajaxStart = true;
            btn.addClass("is-loading");
            $.ajax({
                url: ajax.url,
                method: "POST",
                dataType: "json",
                data: data
            }).done(function(response) {
                var posts = response.data;
                storage.append(response.data);
                data.paged += 1;
                ajaxStart = false;
                btn.removeClass("is-loading");
                if (posts === "") {
                    btn.remove();
                }
            }).fail(function(jqXHR, textStatus, errorThrown) {
                ajaxStart = false;
                throw new Error("Handling Ajax request loading posts has caused an ".concat(textStatus, " - ").concat(errorThrown));
            });
        });
    };
    var createTabs = function createTabs(selector) {
        if (!selector) return;
        $(selector).each(function(index, tabs) {
            var $tabs = $(tabs), $triggers = $tabs.find("h3"), $content = $tabs.find("div").hide();
            var sliding = false;
            $triggers.each(function(triggerIndex, trigger) {
                var $trigger = $(trigger);
                $trigger.on("click", function(e) {
                    if (!sliding) {
                        $triggers.removeClass("active").eq(triggerIndex).addClass("active");
                        var currentElement = $content.eq(triggerIndex);
                        sliding = true;
                        if (currentElement.is(":visible")) {
                            currentElement.slideUp(300, function() {
                                return sliding = false;
                            });
                        } else {
                            $content.slideUp(300).eq(triggerIndex).slideDown(300, function() {
                                return sliding = false;
                            });
                        }
                    }
                });
            });
        });
    };
    var waypoint = function waypoint(block, offset) {
        return new Promise(function(resolve) {
            var blockY = $(block).offset().top;
            $(window).on("scroll", function(e) {
                console.log("scroll");
                var scroll = document.scrollingElement.scrollTop;
                if (scroll >= blockY - offset) {
                    $(window).off("scroll");
                    resolve();
                }
            });
        });
    };
})(window, document, jQuery, window.jpAjax);