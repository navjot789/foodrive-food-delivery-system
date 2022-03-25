"use strict";
/*!
 * AdminLTE v3.1.0-pre (https://adminlte.io)
 * Copyright 2014-2020 Colorlib <https://colorlib.com>
 * Licensed under MIT (https://github.com/ColorlibHQ/AdminLTE/blob/master/LICENSE)
 */
(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('jquery')) :
  typeof define === 'function' && define.amd ? define(['exports', 'jquery'], factory) :
  (global = global || self, factory(global.adminlte = {}, global.jQuery));
}(this, (function (exports, $) { 'use strict';

  $ = $ && Object.prototype.hasOwnProperty.call($, 'default') ? $['default'] : $;

  /**
   * --------------------------------------------
   * AdminLTE CardRefresh.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME = 'CardRefresh';
  var DATA_KEY = 'lte.cardrefresh';
  var EVENT_KEY = "." + DATA_KEY;
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    LOADED: "loaded" + EVENT_KEY,
    OVERLAY_ADDED: "overlay.added" + EVENT_KEY,
    OVERLAY_REMOVED: "overlay.removed" + EVENT_KEY
  };
  var ClassName = {
    CARD: 'card'
  };
  var Selector = {
    CARD: "." + ClassName.CARD,
    DATA_REFRESH: '[data-card-widget="card-refresh"]'
  };
  var Default = {
    source: '',
    sourceSelector: '',
    params: {},
    trigger: Selector.DATA_REFRESH,
    content: '.card-body',
    loadInContent: true,
    loadOnInit: true,
    responseType: '',
    overlayTemplate: '<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>',
    onLoadStart: function onLoadStart() {},
    onLoadDone: function onLoadDone(response) {
      return response;
    }
  };

  var CardRefresh = /*#__PURE__*/function () {
    function CardRefresh(element, settings) {
      this._element = element;
      this._parent = element.parents(Selector.CARD).first();
      this._settings = $.extend({}, Default, settings);
      this._overlay = $(this._settings.overlayTemplate);

      if (element.hasClass(ClassName.CARD)) {
        this._parent = element;
      }

      if (this._settings.source === '') {
        throw new Error('Source url was not defined. Please specify a url in your CardRefresh source option.');
      }
    }

    var _proto = CardRefresh.prototype;

    _proto.load = function load() {
      var _this = this;

      this._addOverlay();

      this._settings.onLoadStart.call($(this));

      $.get(this._settings.source, this._settings.params, function (response) {
        if (_this._settings.loadInContent) {
          if (_this._settings.sourceSelector !== '') {
            response = $(response).find(_this._settings.sourceSelector).html();
          }

          _this._parent.find(_this._settings.content).html(response);
        }

        _this._settings.onLoadDone.call($(_this), response);

        _this._removeOverlay();
      }, this._settings.responseType !== '' && this._settings.responseType);
      $(this._element).trigger($.Event(Event.LOADED));
    };

    _proto._addOverlay = function _addOverlay() {
      this._parent.append(this._overlay);

      $(this._element).trigger($.Event(Event.OVERLAY_ADDED));
    };

    _proto._removeOverlay = function _removeOverlay() {
      this._parent.find(this._overlay).remove();

      $(this._element).trigger($.Event(Event.OVERLAY_REMOVED));
    } // Private
    ;

    _proto._init = function _init() {
      var _this2 = this;

      $(this).find(this._settings.trigger).on('click', function () {
        _this2.load();
      });

      if (this._settings.loadOnInit) {
        this.load();
      }
    } // Static
    ;

    CardRefresh._jQueryInterface = function _jQueryInterface(config) {
      var data = $(this).data(DATA_KEY);

      var _options = $.extend({}, Default, $(this).data());

      if (!data) {
        data = new CardRefresh($(this), _options);
        $(this).data(DATA_KEY, typeof config === 'string' ? data : config);
      }

      if (typeof config === 'string' && config.match(/load/)) {
        data[config]();
      } else {
        data._init($(this));
      }
    };

    return CardRefresh;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(document).on('click', Selector.DATA_REFRESH, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardRefresh._jQueryInterface.call($(this), 'load');
  });
  $(function () {
    $(Selector.DATA_REFRESH).each(function () {
      CardRefresh._jQueryInterface.call($(this));
    });
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = CardRefresh._jQueryInterface;
  $.fn[NAME].Constructor = CardRefresh;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return CardRefresh._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE CardWidget.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$1 = 'CardWidget';
  var DATA_KEY$1 = 'lte.cardwidget';
  var EVENT_KEY$1 = "." + DATA_KEY$1;
  var JQUERY_NO_CONFLICT$1 = $.fn[NAME$1];
  var Event$1 = {
    EXPANDED: "expanded" + EVENT_KEY$1,
    COLLAPSED: "collapsed" + EVENT_KEY$1,
    MAXIMIZED: "maximized" + EVENT_KEY$1,
    MINIMIZED: "minimized" + EVENT_KEY$1,
    REMOVED: "removed" + EVENT_KEY$1
  };
  var ClassName$1 = {
    CARD: 'card',
    COLLAPSED: 'collapsed-card',
    COLLAPSING: 'collapsing-card',
    EXPANDING: 'expanding-card',
    WAS_COLLAPSED: 'was-collapsed',
    MAXIMIZED: 'maximized-card'
  };
  var Selector$1 = {
    DATA_REMOVE: '[data-card-widget="remove"]',
    DATA_COLLAPSE: '[data-card-widget="collapse"]',
    DATA_MAXIMIZE: '[data-card-widget="maximize"]',
    CARD: "." + ClassName$1.CARD,
    CARD_HEADER: '.card-header',
    CARD_BODY: '.card-body',
    CARD_FOOTER: '.card-footer'
  };
  var Default$1 = {
    animationSpeed: 'normal',
    collapseTrigger: Selector$1.DATA_COLLAPSE,
    removeTrigger: Selector$1.DATA_REMOVE,
    maximizeTrigger: Selector$1.DATA_MAXIMIZE,
    collapseIcon: 'fa-minus',
    expandIcon: 'fa-plus',
    maximizeIcon: 'fa-expand',
    minimizeIcon: 'fa-compress'
  };

  var CardWidget = /*#__PURE__*/function () {
    function CardWidget(element, settings) {
      this._element = element;
      this._parent = element.parents(Selector$1.CARD).first();

      if (element.hasClass(ClassName$1.CARD)) {
        this._parent = element;
      }

      this._settings = $.extend({}, Default$1, settings);
    }

    var _proto = CardWidget.prototype;

    _proto.collapse = function collapse() {
      var _this = this;

      this._parent.addClass(ClassName$1.COLLAPSING).children(Selector$1.CARD_BODY + ", " + Selector$1.CARD_FOOTER).slideUp(this._settings.animationSpeed, function () {
        _this._parent.addClass(ClassName$1.COLLAPSED).removeClass(ClassName$1.COLLAPSING);
      });

      this._parent.find('> ' + Selector$1.CARD_HEADER + ' ' + this._settings.collapseTrigger + ' .' + this._settings.collapseIcon).addClass(this._settings.expandIcon).removeClass(this._settings.collapseIcon);

      this._element.trigger($.Event(Event$1.COLLAPSED), this._parent);
    };

    _proto.expand = function expand() {
      var _this2 = this;

      this._parent.addClass(ClassName$1.EXPANDING).children(Selector$1.CARD_BODY + ", " + Selector$1.CARD_FOOTER).slideDown(this._settings.animationSpeed, function () {
        _this2._parent.removeClass(ClassName$1.COLLAPSED).removeClass(ClassName$1.EXPANDING);
      });

      this._parent.find('> ' + Selector$1.CARD_HEADER + ' ' + this._settings.collapseTrigger + ' .' + this._settings.expandIcon).addClass(this._settings.collapseIcon).removeClass(this._settings.expandIcon);

      this._element.trigger($.Event(Event$1.EXPANDED), this._parent);
    };

    _proto.remove = function remove() {
      this._parent.slideUp();

      this._element.trigger($.Event(Event$1.REMOVED), this._parent);
    };

    _proto.toggle = function toggle() {
      if (this._parent.hasClass(ClassName$1.COLLAPSED)) {
        this.expand();
        return;
      }

      this.collapse();
    };

    _proto.maximize = function maximize() {
      this._parent.find(this._settings.maximizeTrigger + ' .' + this._settings.maximizeIcon).addClass(this._settings.minimizeIcon).removeClass(this._settings.maximizeIcon);

      this._parent.css({
        height: this._parent.height(),
        width: this._parent.width(),
        transition: 'all .15s'
      }).delay(150).queue(function () {
        var $element = $(this);
        $element.addClass(ClassName$1.MAXIMIZED);
        $('html').addClass(ClassName$1.MAXIMIZED);

        if ($element.hasClass(ClassName$1.COLLAPSED)) {
          $element.addClass(ClassName$1.WAS_COLLAPSED);
        }

        $element.dequeue();
      });

      this._element.trigger($.Event(Event$1.MAXIMIZED), this._parent);
    };

    _proto.minimize = function minimize() {
      this._parent.find(this._settings.maximizeTrigger + ' .' + this._settings.minimizeIcon).addClass(this._settings.maximizeIcon).removeClass(this._settings.minimizeIcon);

      this._parent.css('cssText', 'height:' + this._parent[0].style.height + ' !important;' + 'width:' + this._parent[0].style.width + ' !important; transition: all .15s;').delay(10).queue(function () {
        var $element = $(this);
        $element.removeClass(ClassName$1.MAXIMIZED);
        $('html').removeClass(ClassName$1.MAXIMIZED);
        $element.css({
          height: 'inherit',
          width: 'inherit'
        });

        if ($element.hasClass(ClassName$1.WAS_COLLAPSED)) {
          $element.removeClass(ClassName$1.WAS_COLLAPSED);
        }

        $element.dequeue();
      });

      this._element.trigger($.Event(Event$1.MINIMIZED), this._parent);
    };

    _proto.toggleMaximize = function toggleMaximize() {
      if (this._parent.hasClass(ClassName$1.MAXIMIZED)) {
        this.minimize();
        return;
      }

      this.maximize();
    } // Private
    ;

    _proto._init = function _init(card) {
      var _this3 = this;

      this._parent = card;
      $(this).find(this._settings.collapseTrigger).click(function () {
        _this3.toggle();
      });
      $(this).find(this._settings.maximizeTrigger).click(function () {
        _this3.toggleMaximize();
      });
      $(this).find(this._settings.removeTrigger).click(function () {
        _this3.remove();
      });
    } // Static
    ;

    CardWidget._jQueryInterface = function _jQueryInterface(config) {
      var data = $(this).data(DATA_KEY$1);

      var _options = $.extend({}, Default$1, $(this).data());

      if (!data) {
        data = new CardWidget($(this), _options);
        $(this).data(DATA_KEY$1, typeof config === 'string' ? data : config);
      }

      if (typeof config === 'string' && config.match(/collapse|expand|remove|toggle|maximize|minimize|toggleMaximize/)) {
        data[config]();
      } else if (typeof config === 'object') {
        data._init($(this));
      }
    };

    return CardWidget;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(document).on('click', Selector$1.DATA_COLLAPSE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($(this), 'toggle');
  });
  $(document).on('click', Selector$1.DATA_REMOVE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($(this), 'remove');
  });
  $(document).on('click', Selector$1.DATA_MAXIMIZE, function (event) {
    if (event) {
      event.preventDefault();
    }

    CardWidget._jQueryInterface.call($(this), 'toggleMaximize');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$1] = CardWidget._jQueryInterface;
  $.fn[NAME$1].Constructor = CardWidget;

  $.fn[NAME$1].noConflict = function () {
    $.fn[NAME$1] = JQUERY_NO_CONFLICT$1;
    return CardWidget._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE ControlSidebar.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$2 = 'ControlSidebar';
  var DATA_KEY$2 = 'lte.controlsidebar';
  var EVENT_KEY$2 = "." + DATA_KEY$2;
  var JQUERY_NO_CONFLICT$2 = $.fn[NAME$2];
  var Event$2 = {
    COLLAPSED: "collapsed" + EVENT_KEY$2,
    EXPANDED: "expanded" + EVENT_KEY$2
  };
  var Selector$2 = {
    CONTROL_SIDEBAR: '.control-sidebar',
    CONTROL_SIDEBAR_CONTENT: '.control-sidebar-content',
    DATA_TOGGLE: '[data-widget="control-sidebar"]',
    HEADER: '.main-header',
    FOOTER: '.main-footer'
  };
  var ClassName$2 = {
    CONTROL_SIDEBAR_ANIMATE: 'control-sidebar-animate',
    CONTROL_SIDEBAR_OPEN: 'control-sidebar-open',
    CONTROL_SIDEBAR_SLIDE: 'control-sidebar-slide-open',
    LAYOUT_FIXED: 'layout-fixed',
    NAVBAR_FIXED: 'layout-navbar-fixed',
    NAVBAR_SM_FIXED: 'layout-sm-navbar-fixed',
    NAVBAR_MD_FIXED: 'layout-md-navbar-fixed',
    NAVBAR_LG_FIXED: 'layout-lg-navbar-fixed',
    NAVBAR_XL_FIXED: 'layout-xl-navbar-fixed',
    FOOTER_FIXED: 'layout-footer-fixed',
    FOOTER_SM_FIXED: 'layout-sm-footer-fixed',
    FOOTER_MD_FIXED: 'layout-md-footer-fixed',
    FOOTER_LG_FIXED: 'layout-lg-footer-fixed',
    FOOTER_XL_FIXED: 'layout-xl-footer-fixed'
  };
  var Default$2 = {
    controlsidebarSlide: true,
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'l'
  };
  /**
   * Class Definition
   * ====================================================
   */

  var ControlSidebar = /*#__PURE__*/function () {
    function ControlSidebar(element, config) {
      this._element = element;
      this._config = config;

      this._init();
    } // Public


    var _proto = ControlSidebar.prototype;

    _proto.collapse = function collapse() {
      var $body = $('body');
      var $html = $('html'); // Show the control sidebar

      if (this._config.controlsidebarSlide) {
        $html.addClass(ClassName$2.CONTROL_SIDEBAR_ANIMATE);
        $body.removeClass(ClassName$2.CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
          $(Selector$2.CONTROL_SIDEBAR).hide();
          $html.removeClass(ClassName$2.CONTROL_SIDEBAR_ANIMATE);
          $(this).dequeue();
        });
      } else {
        $body.removeClass(ClassName$2.CONTROL_SIDEBAR_OPEN);
      }

      $(this._element).trigger($.Event(Event$2.COLLAPSED));
    };

    _proto.show = function show() {
      var $body = $('body');
      var $html = $('html'); // Collapse the control sidebar

      if (this._config.controlsidebarSlide) {
        $html.addClass(ClassName$2.CONTROL_SIDEBAR_ANIMATE);
        $(Selector$2.CONTROL_SIDEBAR).show().delay(10).queue(function () {
          $body.addClass(ClassName$2.CONTROL_SIDEBAR_SLIDE).delay(300).queue(function () {
            $html.removeClass(ClassName$2.CONTROL_SIDEBAR_ANIMATE);
            $(this).dequeue();
          });
          $(this).dequeue();
        });
      } else {
        $body.addClass(ClassName$2.CONTROL_SIDEBAR_OPEN);
      }

      $(this._element).trigger($.Event(Event$2.EXPANDED));
    };

    _proto.toggle = function toggle() {
      var $body = $('body');
      var shouldClose = $body.hasClass(ClassName$2.CONTROL_SIDEBAR_OPEN) || $body.hasClass(ClassName$2.CONTROL_SIDEBAR_SLIDE);

      if (shouldClose) {
        // Close the control sidebar
        this.collapse();
      } else {
        // Open the control sidebar
        this.show();
      }
    } // Private
    ;

    _proto._init = function _init() {
      var _this = this;

      this._fixHeight();

      this._fixScrollHeight();

      $(window).resize(function () {
        _this._fixHeight();

        _this._fixScrollHeight();
      });
      $(window).scroll(function () {
        var $body = $('body');
        var shouldFixHeight = $body.hasClass(ClassName$2.CONTROL_SIDEBAR_OPEN) || $body.hasClass(ClassName$2.CONTROL_SIDEBAR_SLIDE);

        if (shouldFixHeight) {
          _this._fixScrollHeight();
        }
      });
    };

    _proto._fixScrollHeight = function _fixScrollHeight() {
      var $body = $('body');

      if (!$body.hasClass(ClassName$2.LAYOUT_FIXED)) {
        return;
      }

      var heights = {
        scroll: $(document).height(),
        window: $(window).height(),
        header: $(Selector$2.HEADER).outerHeight(),
        footer: $(Selector$2.FOOTER).outerHeight()
      };
      var positions = {
        bottom: Math.abs(heights.window + $(window).scrollTop() - heights.scroll),
        top: $(window).scrollTop()
      };
      var navbarFixed = false;
      var footerFixed = false;

      if ($body.hasClass(ClassName$2.NAVBAR_FIXED) || $body.hasClass(ClassName$2.NAVBAR_SM_FIXED) || $body.hasClass(ClassName$2.NAVBAR_MD_FIXED) || $body.hasClass(ClassName$2.NAVBAR_LG_FIXED) || $body.hasClass(ClassName$2.NAVBAR_XL_FIXED)) {
        if ($(Selector$2.HEADER).css('position') === 'fixed') {
          navbarFixed = true;
        }
      }

      if ($body.hasClass(ClassName$2.FOOTER_FIXED) || $body.hasClass(ClassName$2.FOOTER_SM_FIXED) || $body.hasClass(ClassName$2.FOOTER_MD_FIXED) || $body.hasClass(ClassName$2.FOOTER_LG_FIXED) || $body.hasClass(ClassName$2.FOOTER_XL_FIXED)) {
        if ($(Selector$2.FOOTER).css('position') === 'fixed') {
          footerFixed = true;
        }
      }

      var $controlSidebar = $(Selector$2.CONTROL_SIDEBAR);
      var $controlsidebarContent = $(Selector$2.CONTROL_SIDEBAR + ', ' + Selector$2.CONTROL_SIDEBAR + ' ' + Selector$2.CONTROL_SIDEBAR_CONTENT);

      if (positions.top === 0 && positions.bottom === 0) {
        $controlSidebar.css({
          bottom: heights.footer,
          top: heights.header
        });
        $controlsidebarContent.css('height', heights.window - (heights.header + heights.footer));
      } else if (positions.bottom <= heights.footer) {
        if (footerFixed === false) {
          $controlSidebar.css('bottom', heights.footer - positions.bottom);
          $controlsidebarContent.css('height', heights.window - (heights.footer - positions.bottom));
        } else {
          $controlSidebar.css('bottom', heights.footer);
        }
      } else if (positions.top <= heights.header) {
        if (navbarFixed === false) {
          $controlSidebar.css('top', heights.header - positions.top);
          $controlsidebarContent.css('height', heights.window - (heights.header - positions.top));
        } else {
          $controlSidebar.css('top', heights.header);
        }
      } else if (navbarFixed === false) {
        $controlSidebar.css('top', 0);
        $controlsidebarContent.css('height', heights.window);
      } else {
        $controlSidebar.css('top', heights.header);
      }
    };

    _proto._fixHeight = function _fixHeight() {
      var $body = $('body');

      if (!$body.hasClass(ClassName$2.LAYOUT_FIXED)) {
        return;
      }

      var heights = {
        window: $(window).height(),
        header: $(Selector$2.HEADER).outerHeight(),
        footer: $(Selector$2.FOOTER).outerHeight()
      };
      var sidebarHeight = heights.window - heights.header;

      if ($body.hasClass(ClassName$2.FOOTER_FIXED) || $body.hasClass(ClassName$2.FOOTER_SM_FIXED) || $body.hasClass(ClassName$2.FOOTER_MD_FIXED) || $body.hasClass(ClassName$2.FOOTER_LG_FIXED) || $body.hasClass(ClassName$2.FOOTER_XL_FIXED)) {
        if ($(Selector$2.FOOTER).css('position') === 'fixed') {
          sidebarHeight = heights.window - heights.header - heights.footer;
        }
      }

      var $controlSidebar = $(Selector$2.CONTROL_SIDEBAR + ' ' + Selector$2.CONTROL_SIDEBAR_CONTENT);
      $controlSidebar.css('height', sidebarHeight);

      if (typeof $.fn.overlayScrollbars !== 'undefined') {
        $controlSidebar.overlayScrollbars({
          className: this._config.scrollbarTheme,
          sizeAutoCapable: true,
          scrollbars: {
            autoHide: this._config.scrollbarAutoHide,
            clickScrolling: true
          }
        });
      }
    } // Static
    ;

    ControlSidebar._jQueryInterface = function _jQueryInterface(operation) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$2);

        var _options = $.extend({}, Default$2, $(this).data());

        if (!data) {
          data = new ControlSidebar(this, _options);
          $(this).data(DATA_KEY$2, data);
        }

        if (data[operation] === 'undefined') {
          throw new Error(operation + " is not a function");
        }

        data[operation]();
      });
    };

    return ControlSidebar;
  }();
  /**
   *
   * Data Api implementation
   * ====================================================
   */


  $(document).on('click', Selector$2.DATA_TOGGLE, function (event) {
    event.preventDefault();

    ControlSidebar._jQueryInterface.call($(this), 'toggle');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$2] = ControlSidebar._jQueryInterface;
  $.fn[NAME$2].Constructor = ControlSidebar;

  $.fn[NAME$2].noConflict = function () {
    $.fn[NAME$2] = JQUERY_NO_CONFLICT$2;
    return ControlSidebar._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE DirectChat.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$3 = 'DirectChat';
  var DATA_KEY$3 = 'lte.directchat';
  var JQUERY_NO_CONFLICT$3 = $.fn[NAME$3];
  var Event$3 = {
    TOGGLED: 'toggled{EVENT_KEY}'
  };
  var Selector$3 = {
    DATA_TOGGLE: '[data-widget="chat-pane-toggle"]',
    DIRECT_CHAT: '.direct-chat'
  };
  var ClassName$3 = {
    DIRECT_CHAT_OPEN: 'direct-chat-contacts-open'
  };
  /**
   * Class Definition
   * ====================================================
   */

  var DirectChat = /*#__PURE__*/function () {
    function DirectChat(element) {
      this._element = element;
    }

    var _proto = DirectChat.prototype;

    _proto.toggle = function toggle() {
      $(this._element).parents(Selector$3.DIRECT_CHAT).first().toggleClass(ClassName$3.DIRECT_CHAT_OPEN);
      $(this._element).trigger($.Event(Event$3.TOGGLED));
    } // Static
    ;

    DirectChat._jQueryInterface = function _jQueryInterface(config) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$3);

        if (!data) {
          data = new DirectChat($(this));
          $(this).data(DATA_KEY$3, data);
        }

        data[config]();
      });
    };

    return DirectChat;
  }();
  /**
   *
   * Data Api implementation
   * ====================================================
   */


  $(document).on('click', Selector$3.DATA_TOGGLE, function (event) {
    if (event) {
      event.preventDefault();
    }

    DirectChat._jQueryInterface.call($(this), 'toggle');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$3] = DirectChat._jQueryInterface;
  $.fn[NAME$3].Constructor = DirectChat;

  $.fn[NAME$3].noConflict = function () {
    $.fn[NAME$3] = JQUERY_NO_CONFLICT$3;
    return DirectChat._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE Dropdown.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$4 = 'Dropdown';
  var DATA_KEY$4 = 'lte.dropdown';
  var JQUERY_NO_CONFLICT$4 = $.fn[NAME$4];
  var Selector$4 = {
    NAVBAR: '.navbar',
    DROPDOWN_MENU: '.dropdown-menu',
    DROPDOWN_MENU_ACTIVE: '.dropdown-menu.show',
    DROPDOWN_TOGGLE: '[data-toggle="dropdown"]'
  };
  var ClassName$4 = {
    DROPDOWN_RIGHT: 'dropdown-menu-right'
  };
  var Default$3 = {};
  /**
   * Class Definition
   * ====================================================
   */

  var Dropdown = /*#__PURE__*/function () {
    function Dropdown(element, config) {
      this._config = config;
      this._element = element;
    } // Public


    var _proto = Dropdown.prototype;

    _proto.toggleSubmenu = function toggleSubmenu() {
      this._element.siblings().show().toggleClass('show');

      if (!this._element.next().hasClass('show')) {
        this._element.parents(Selector$4.DROPDOWN_MENU).first().find('.show').removeClass('show').hide();
      }

      this._element.parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function () {
        $('.dropdown-submenu .show').removeClass('show').hide();
      });
    };

    _proto.fixPosition = function fixPosition() {
      var $element = $(Selector$4.DROPDOWN_MENU_ACTIVE);

      if ($element.length === 0) {
        return;
      }

      if ($element.hasClass(ClassName$4.DROPDOWN_RIGHT)) {
        $element.css({
          left: 'inherit',
          right: 0
        });
      } else {
        $element.css({
          left: 0,
          right: 'inherit'
        });
      }

      var offset = $element.offset();
      var width = $element.width();
      var visiblePart = $(window).width() - offset.left;

      if (offset.left < 0) {
        $element.css({
          left: 'inherit',
          right: offset.left - 5
        });
      } else if (visiblePart < width) {
        $element.css({
          left: 'inherit',
          right: 0
        });
      }
    } // Static
    ;

    Dropdown._jQueryInterface = function _jQueryInterface(config) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$4);

        var _config = $.extend({}, Default$3, $(this).data());

        if (!data) {
          data = new Dropdown($(this), _config);
          $(this).data(DATA_KEY$4, data);
        }

        if (config === 'toggleSubmenu' || config === 'fixPosition') {
          data[config]();
        }
      });
    };

    return Dropdown;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(Selector$4.DROPDOWN_MENU + ' ' + Selector$4.DROPDOWN_TOGGLE).on('click', function (event) {
    event.preventDefault();
    event.stopPropagation();

    Dropdown._jQueryInterface.call($(this), 'toggleSubmenu');
  });
  $(Selector$4.NAVBAR + ' ' + Selector$4.DROPDOWN_TOGGLE).on('click', function (event) {
    event.preventDefault();
    setTimeout(function () {
      Dropdown._jQueryInterface.call($(this), 'fixPosition');
    }, 1);
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$4] = Dropdown._jQueryInterface;
  $.fn[NAME$4].Constructor = Dropdown;

  $.fn[NAME$4].noConflict = function () {
    $.fn[NAME$4] = JQUERY_NO_CONFLICT$4;
    return Dropdown._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE ExpandableTable.js
   * License MIT
   * --------------------------------------------
   */
  /**
    * Constants
    * ====================================================
    */

  var NAME$5 = 'ExpandableTable';
  var DATA_KEY$5 = 'lte.expandableTable';
  var EVENT_KEY$3 = "." + DATA_KEY$5;
  var JQUERY_NO_CONFLICT$5 = $.fn[NAME$5];
  var Event$4 = {
    EXPANDED: "expanded" + EVENT_KEY$3,
    COLLAPSED: "collapsed" + EVENT_KEY$3
  };
  var ClassName$5 = {
    HEADER: 'expandable-header'
  };
  var Selector$5 = {
    HEADER: "." + ClassName$5.HEADER,
    DATA_SELECTOR: 'data-expandable-table',
    EXPANDED: 'expanded',
    COLLAPSED: 'collapsed'
  };
  /**
    * Class Definition
    * ====================================================
    */

  var ExpandableTable = /*#__PURE__*/function () {
    function ExpandableTable(element, config) {
      this._config = config;
      this._element = element;
    } // Public


    var _proto = ExpandableTable.prototype;

    _proto.init = function init() {
      $(Selector$5.HEADER).each(function (_, $header) {
        // Next Child to the header will have the same column span as header
        $($header).next().children().first().attr('colSpan', $($header).children().length); // Setting up table design for the first time

        var $type = $($header).next().attr(Selector$5.DATA_SELECTOR);
        var $body = $($header).next().children().first().children();

        if ($type === Selector$5.EXPANDED) {
          $body.show();
        } else if ($type === Selector$5.COLLAPSED) {
          $body.hide();
          $body.parent().parent().addClass('d-none');
        }
      });
    };

    _proto.toggleRow = function toggleRow() {
      var $element = this._element;
      var time = 500;
      var $type = $element.next().attr(Selector$5.DATA_SELECTOR);
      var $body = $element.next().children().first().children();
      $body.stop();

      if ($type === Selector$5.EXPANDED) {
        $body.slideUp(time, function () {
          $element.next().addClass('d-none');
        });
        $element.next().attr(Selector$5.DATA_SELECTOR, Selector$5.COLLAPSED);
        $element.trigger($.Event(Event$4.COLLAPSED));
      } else if ($type === Selector$5.COLLAPSED) {
        $element.next().removeClass('d-none');
        $body.slideDown(time);
        $element.next().attr(Selector$5.DATA_SELECTOR, Selector$5.EXPANDED);
        $element.trigger($.Event(Event$4.EXPANDED));
      }
    } // Static
    ;

    ExpandableTable._jQueryInterface = function _jQueryInterface(config) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$5);

        if (!data) {
          data = new ExpandableTable($(this));
          $(this).data(DATA_KEY$5, data);
        }

        if (config === 'init' || config === 'toggleRow') {
          data[config]();
        }
      });
    };

    return ExpandableTable;
  }();
  /**
    * Data API
    * ====================================================
    */


  $(ClassName$5.TABLE).ready(function () {
    ExpandableTable._jQueryInterface.call($(this), 'init');
  });
  $(document).on('click', Selector$5.HEADER, function () {
    ExpandableTable._jQueryInterface.call($(this), 'toggleRow');
  });
  /**
    * jQuery API
    * ====================================================
    */

  $.fn[NAME$5] = ExpandableTable._jQueryInterface;
  $.fn[NAME$5].Constructor = ExpandableTable;

  $.fn[NAME$5].noConflict = function () {
    $.fn[NAME$5] = JQUERY_NO_CONFLICT$5;
    return ExpandableTable._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE Layout.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$6 = 'Layout';
  var DATA_KEY$6 = 'lte.layout';
  var JQUERY_NO_CONFLICT$6 = $.fn[NAME$6];
  var Selector$6 = {
    HEADER: '.main-header',
    MAIN_SIDEBAR: '.main-sidebar',
    SIDEBAR: '.main-sidebar .sidebar',
    CONTENT: '.content-wrapper',
    CONTROL_SIDEBAR_CONTENT: '.control-sidebar-content',
    CONTROL_SIDEBAR_BTN: '[data-widget="control-sidebar"]',
    FOOTER: '.main-footer',
    PUSHMENU_BTN: '[data-widget="pushmenu"]',
    LOGIN_BOX: '.login-box',
    REGISTER_BOX: '.register-box'
  };
  var ClassName$6 = {
    SIDEBAR_FOCUSED: 'sidebar-focused',
    LAYOUT_FIXED: 'layout-fixed',
    CONTROL_SIDEBAR_SLIDE_OPEN: 'control-sidebar-slide-open',
    CONTROL_SIDEBAR_OPEN: 'control-sidebar-open'
  };
  var Default$4 = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'l',
    panelAutoHeight: true,
    loginRegisterAutoHeight: true
  };
  /**
   * Class Definition
   * ====================================================
   */

  var Layout = /*#__PURE__*/function () {
    function Layout(element, config) {
      this._config = config;
      this._element = element;

      this._init();
    } // Public


    var _proto = Layout.prototype;

    _proto.fixLayoutHeight = function fixLayoutHeight(extra) {
      if (extra === void 0) {
        extra = null;
      }

      var $body = $('body');
      var controlSidebar = 0;

      if ($body.hasClass(ClassName$6.CONTROL_SIDEBAR_SLIDE_OPEN) || $body.hasClass(ClassName$6.CONTROL_SIDEBAR_OPEN) || extra === 'control_sidebar') {
        controlSidebar = $(Selector$6.CONTROL_SIDEBAR_CONTENT).height();
      }

      var heights = {
        window: $(window).height(),
        header: $(Selector$6.HEADER).length !== 0 ? $(Selector$6.HEADER).outerHeight() : 0,
        footer: $(Selector$6.FOOTER).length !== 0 ? $(Selector$6.FOOTER).outerHeight() : 0,
        sidebar: $(Selector$6.SIDEBAR).length !== 0 ? $(Selector$6.SIDEBAR).height() : 0,
        controlSidebar: controlSidebar
      };

      var max = this._max(heights);

      var offset = this._config.panelAutoHeight;

      if (offset === true) {
        offset = 0;
      }

      var $contentSelector = $(Selector$6.CONTENT);

      if (offset !== false) {
        if (max === heights.controlSidebar) {
          $contentSelector.css('min-height', max + offset);
        } else if (max === heights.window) {
          $contentSelector.css('min-height', max + offset - heights.header - heights.footer);
        } else {
          $contentSelector.css('min-height', max + offset - heights.header);
        }

        if (this._isFooterFixed()) {
          $contentSelector.css('min-height', parseFloat($contentSelector.css('min-height')) + heights.footer);
        }
      }

      if (!$body.hasClass(ClassName$6.LAYOUT_FIXED)) {
        return;
      }

      if (offset !== false) {
        $contentSelector.css('min-height', max + offset - heights.header - heights.footer);
      }

      if (typeof $.fn.overlayScrollbars !== 'undefined') {
        $(Selector$6.SIDEBAR).overlayScrollbars({
          className: this._config.scrollbarTheme,
          sizeAutoCapable: true,
          scrollbars: {
            autoHide: this._config.scrollbarAutoHide,
            clickScrolling: true
          }
        });
      }
    };

    _proto.fixLoginRegisterHeight = function fixLoginRegisterHeight() {
      var $body = $('body');
      var $selector = $(Selector$6.LOGIN_BOX + ', ' + Selector$6.REGISTER_BOX);

      if ($selector.length === 0) {
        $body.css('height', 'auto');
        $('html').css('height', 'auto');
      } else {
        var boxHeight = $selector.height();

        if ($body.css('min-height') !== boxHeight) {
          $body.css('min-height', boxHeight);
        }
      }
    } // Private
    ;

    _proto._init = function _init() {
      var _this = this;

      // Activate layout height watcher
      this.fixLayoutHeight();

      if (this._config.loginRegisterAutoHeight === true) {
        this.fixLoginRegisterHeight();
      } else if (this._config.loginRegisterAutoHeight === parseInt(this._config.loginRegisterAutoHeight, 10)) {
        setInterval(this.fixLoginRegisterHeight, this._config.loginRegisterAutoHeight);
      }

      $(Selector$6.SIDEBAR).on('collapsed.lte.treeview expanded.lte.treeview', function () {
        _this.fixLayoutHeight();
      });
      $(Selector$6.PUSHMENU_BTN).on('collapsed.lte.pushmenu shown.lte.pushmenu', function () {
        _this.fixLayoutHeight();
      });
      $(Selector$6.CONTROL_SIDEBAR_BTN).on('collapsed.lte.controlsidebar', function () {
        _this.fixLayoutHeight();
      }).on('expanded.lte.controlsidebar', function () {
        _this.fixLayoutHeight('control_sidebar');
      });
      $(window).resize(function () {
        _this.fixLayoutHeight();
      });
      setTimeout(function () {
        $('body.hold-transition').removeClass('hold-transition');
      }, 50);
    };

    _proto._max = function _max(numbers) {
      // Calculate the maximum number in a list
      var max = 0;
      Object.keys(numbers).forEach(function (key) {
        if (numbers[key] > max) {
          max = numbers[key];
        }
      });
      return max;
    };

    _proto._isFooterFixed = function _isFooterFixed() {
      return $(Selector$6.FOOTER).css('position') === 'fixed';
    } // Static
    ;

    Layout._jQueryInterface = function _jQueryInterface(config) {
      if (config === void 0) {
        config = '';
      }

      return this.each(function () {
        var data = $(this).data(DATA_KEY$6);

        var _options = $.extend({}, Default$4, $(this).data());

        if (!data) {
          data = new Layout($(this), _options);
          $(this).data(DATA_KEY$6, data);
        }

        if (config === 'init' || config === '') {
          data._init();
        } else if (config === 'fixLayoutHeight' || config === 'fixLoginRegisterHeight') {
          data[config]();
        }
      });
    };

    return Layout;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(window).on('load', function () {
    Layout._jQueryInterface.call($('body'));
  });
  $(Selector$6.SIDEBAR + ' a').on('focusin', function () {
    $(Selector$6.MAIN_SIDEBAR).addClass(ClassName$6.SIDEBAR_FOCUSED);
  });
  $(Selector$6.SIDEBAR + ' a').on('focusout', function () {
    $(Selector$6.MAIN_SIDEBAR).removeClass(ClassName$6.SIDEBAR_FOCUSED);
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$6] = Layout._jQueryInterface;
  $.fn[NAME$6].Constructor = Layout;

  $.fn[NAME$6].noConflict = function () {
    $.fn[NAME$6] = JQUERY_NO_CONFLICT$6;
    return Layout._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE PushMenu.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$7 = 'PushMenu';
  var DATA_KEY$7 = 'lte.pushmenu';
  var EVENT_KEY$4 = "." + DATA_KEY$7;
  var JQUERY_NO_CONFLICT$7 = $.fn[NAME$7];
  var Event$5 = {
    COLLAPSED: "collapsed" + EVENT_KEY$4,
    SHOWN: "shown" + EVENT_KEY$4
  };
  var Default$5 = {
    autoCollapseSize: 992,
    enableRemember: false,
    noTransitionAfterReload: true
  };
  var Selector$7 = {
    TOGGLE_BUTTON: '[data-widget="pushmenu"]',
    BODY: 'body',
    OVERLAY: '#sidebar-overlay',
    WRAPPER: '.wrapper'
  };
  var ClassName$7 = {
    COLLAPSED: 'sidebar-collapse',
    OPEN: 'sidebar-open',
    IS_OPENING: 'sidebar-is-opening',
    CLOSED: 'sidebar-closed'
  };
  /**
   * Class Definition
   * ====================================================
   */

  var PushMenu = /*#__PURE__*/function () {
    function PushMenu(element, options) {
      this._element = element;
      this._options = $.extend({}, Default$5, options);

      if ($(Selector$7.OVERLAY).length === 0) {
        this._addOverlay();
      }

      this._init();
    } // Public


    var _proto = PushMenu.prototype;

    _proto.expand = function expand() {
      var $bodySelector = $(Selector$7.BODY);

      if (this._options.autoCollapseSize) {
        if ($(window).width() <= this._options.autoCollapseSize) {
          $bodySelector.addClass(ClassName$7.OPEN);
        }
      }

      $bodySelector.addClass(ClassName$7.IS_OPENING).removeClass(ClassName$7.COLLAPSED + " " + ClassName$7.CLOSED);

      if (this._options.enableRemember) {
        localStorage.setItem("remember" + EVENT_KEY$4, ClassName$7.OPEN);
      }

      $(this._element).trigger($.Event(Event$5.SHOWN));
    };

    _proto.collapse = function collapse() {
      var $bodySelector = $(Selector$7.BODY);

      if (this._options.autoCollapseSize) {
        if ($(window).width() <= this._options.autoCollapseSize) {
          $bodySelector.removeClass(ClassName$7.OPEN).addClass(ClassName$7.CLOSED);
        }
      }

      $bodySelector.removeClass(ClassName$7.IS_OPENING).addClass(ClassName$7.COLLAPSED);

      if (this._options.enableRemember) {
        localStorage.setItem("remember" + EVENT_KEY$4, ClassName$7.COLLAPSED);
      }

      $(this._element).trigger($.Event(Event$5.COLLAPSED));
    };

    _proto.toggle = function toggle() {
      if ($(Selector$7.BODY).hasClass(ClassName$7.COLLAPSED)) {
        this.expand();
      } else {
        this.collapse();
      }
    };

    _proto.autoCollapse = function autoCollapse(resize) {
      if (resize === void 0) {
        resize = false;
      }

      if (!this._options.autoCollapseSize) {
        return;
      }

      var $bodySelector = $(Selector$7.BODY);

      if ($(window).width() <= this._options.autoCollapseSize) {
        if (!$bodySelector.hasClass(ClassName$7.OPEN)) {
          this.collapse();
        }
      } else if (resize === true) {
        if ($bodySelector.hasClass(ClassName$7.OPEN)) {
          $bodySelector.removeClass(ClassName$7.OPEN);
        } else if ($bodySelector.hasClass(ClassName$7.CLOSED)) {
          this.expand();
        }
      }
    };

    _proto.remember = function remember() {
      if (!this._options.enableRemember) {
        return;
      }

      var $body = $('body');
      var toggleState = localStorage.getItem("remember" + EVENT_KEY$4);

      if (toggleState === ClassName$7.COLLAPSED) {
        if (this._options.noTransitionAfterReload) {
          $body.addClass('hold-transition').addClass(ClassName$7.COLLAPSED).delay(50).queue(function () {
            $(this).removeClass('hold-transition');
            $(this).dequeue();
          });
        } else {
          $body.addClass(ClassName$7.COLLAPSED);
        }
      } else if (this._options.noTransitionAfterReload) {
        $body.addClass('hold-transition').removeClass(ClassName$7.COLLAPSED).delay(50).queue(function () {
          $(this).removeClass('hold-transition');
          $(this).dequeue();
        });
      } else {
        $body.removeClass(ClassName$7.COLLAPSED);
      }
    } // Private
    ;

    _proto._init = function _init() {
      var _this = this;

      this.remember();
      this.autoCollapse();
      $(window).resize(function () {
        _this.autoCollapse(true);
      });
    };

    _proto._addOverlay = function _addOverlay() {
      var _this2 = this;

      var overlay = $('<div />', {
        id: 'sidebar-overlay'
      });
      overlay.on('click', function () {
        _this2.collapse();
      });
      $(Selector$7.WRAPPER).append(overlay);
    } // Static
    ;

    PushMenu._jQueryInterface = function _jQueryInterface(operation) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$7);

        var _options = $.extend({}, Default$5, $(this).data());

        if (!data) {
          data = new PushMenu(this, _options);
          $(this).data(DATA_KEY$7, data);
        }

        if (typeof operation === 'string' && operation.match(/collapse|expand|toggle/)) {
          data[operation]();
        }
      });
    };

    return PushMenu;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(document).on('click', Selector$7.TOGGLE_BUTTON, function (event) {
    event.preventDefault();
    var button = event.currentTarget;

    if ($(button).data('widget') !== 'pushmenu') {
      button = $(button).closest(Selector$7.TOGGLE_BUTTON);
    }

    PushMenu._jQueryInterface.call($(button), 'toggle');
  });
  $(window).on('load', function () {
    PushMenu._jQueryInterface.call($(Selector$7.TOGGLE_BUTTON));
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$7] = PushMenu._jQueryInterface;
  $.fn[NAME$7].Constructor = PushMenu;

  $.fn[NAME$7].noConflict = function () {
    $.fn[NAME$7] = JQUERY_NO_CONFLICT$7;
    return PushMenu._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE Toasts.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$8 = 'Toasts';
  var DATA_KEY$8 = 'lte.toasts';
  var EVENT_KEY$5 = "." + DATA_KEY$8;
  var JQUERY_NO_CONFLICT$8 = $.fn[NAME$8];
  var Event$6 = {
    INIT: "init" + EVENT_KEY$5,
    CREATED: "created" + EVENT_KEY$5,
    REMOVED: "removed" + EVENT_KEY$5
  };
  var Selector$8 = {
    CONTAINER_TOP_RIGHT: '#toastsContainerTopRight',
    CONTAINER_TOP_LEFT: '#toastsContainerTopLeft',
    CONTAINER_BOTTOM_RIGHT: '#toastsContainerBottomRight',
    CONTAINER_BOTTOM_LEFT: '#toastsContainerBottomLeft'
  };
  var ClassName$8 = {
    TOP_RIGHT: 'toasts-top-right',
    TOP_LEFT: 'toasts-top-left',
    BOTTOM_RIGHT: 'toasts-bottom-right',
    BOTTOM_LEFT: 'toasts-bottom-left'
  };
  var Position = {
    TOP_RIGHT: 'topRight',
    TOP_LEFT: 'topLeft',
    BOTTOM_RIGHT: 'bottomRight',
    BOTTOM_LEFT: 'bottomLeft'
  };
  var Default$6 = {
    position: Position.TOP_RIGHT,
    fixed: true,
    autohide: false,
    autoremove: true,
    delay: 1000,
    fade: true,
    icon: null,
    image: null,
    imageAlt: null,
    imageHeight: '25px',
    title: null,
    subtitle: null,
    close: true,
    body: null,
    class: null
  };
  /**
   * Class Definition
   * ====================================================
   */

  var Toasts = /*#__PURE__*/function () {
    function Toasts(element, config) {
      this._config = config;

      this._prepareContainer();

      $('body').trigger($.Event(Event$6.INIT));
    } // Public


    var _proto = Toasts.prototype;

    _proto.create = function create() {
      var toast = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true"/>');
      toast.data('autohide', this._config.autohide);
      toast.data('animation', this._config.fade);

      if (this._config.class) {
        toast.addClass(this._config.class);
      }

      if (this._config.delay && this._config.delay != 500) {
        toast.data('delay', this._config.delay);
      }

      var toastHeader = $('<div class="toast-header">');

      if (this._config.image != null) {
        var toastImage = $('<img />').addClass('rounded mr-2').attr('src', this._config.image).attr('alt', this._config.imageAlt);

        if (this._config.imageHeight != null) {
          toastImage.height(this._config.imageHeight).width('auto');
        }

        toastHeader.append(toastImage);
      }

      if (this._config.icon != null) {
        toastHeader.append($('<i />').addClass('mr-2').addClass(this._config.icon));
      }

      if (this._config.title != null) {
        toastHeader.append($('<strong />').addClass('mr-auto').html(this._config.title));
      }

      if (this._config.subtitle != null) {
        toastHeader.append($('<small />').html(this._config.subtitle));
      }

      if (this._config.close == true) {
        var toastClose = $('<button data-dismiss="toast" />').attr('type', 'button').addClass('ml-2 mb-1 close').attr('aria-label', 'Close').append('<span aria-hidden="true">&times;</span>');

        if (this._config.title == null) {
          toastClose.toggleClass('ml-2 ml-auto');
        }

        toastHeader.append(toastClose);
      }

      toast.append(toastHeader);

      if (this._config.body != null) {
        toast.append($('<div class="toast-body" />').html(this._config.body));
      }

      $(this._getContainerId()).prepend(toast);
      var $body = $('body');
      $body.trigger($.Event(Event$6.CREATED));
      toast.toast('show');

      if (this._config.autoremove) {
        toast.on('hidden.bs.toast', function () {
          $(this).delay(200).remove();
          $body.trigger($.Event(Event$6.REMOVED));
        });
      }
    } // Static
    ;

    _proto._getContainerId = function _getContainerId() {
      if (this._config.position == Position.TOP_RIGHT) {
        return Selector$8.CONTAINER_TOP_RIGHT;
      }

      if (this._config.position == Position.TOP_LEFT) {
        return Selector$8.CONTAINER_TOP_LEFT;
      }

      if (this._config.position == Position.BOTTOM_RIGHT) {
        return Selector$8.CONTAINER_BOTTOM_RIGHT;
      }

      if (this._config.position == Position.BOTTOM_LEFT) {
        return Selector$8.CONTAINER_BOTTOM_LEFT;
      }
    };

    _proto._prepareContainer = function _prepareContainer() {
      if ($(this._getContainerId()).length === 0) {
        var container = $('<div />').attr('id', this._getContainerId().replace('#', ''));

        if (this._config.position == Position.TOP_RIGHT) {
          container.addClass(ClassName$8.TOP_RIGHT);
        } else if (this._config.position == Position.TOP_LEFT) {
          container.addClass(ClassName$8.TOP_LEFT);
        } else if (this._config.position == Position.BOTTOM_RIGHT) {
          container.addClass(ClassName$8.BOTTOM_RIGHT);
        } else if (this._config.position == Position.BOTTOM_LEFT) {
          container.addClass(ClassName$8.BOTTOM_LEFT);
        }

        $('body').append(container);
      }

      if (this._config.fixed) {
        $(this._getContainerId()).addClass('fixed');
      } else {
        $(this._getContainerId()).removeClass('fixed');
      }
    } // Static
    ;

    Toasts._jQueryInterface = function _jQueryInterface(option, config) {
      return this.each(function () {
        var _options = $.extend({}, Default$6, config);

        var toast = new Toasts($(this), _options);

        if (option === 'create') {
          toast[option]();
        }
      });
    };

    return Toasts;
  }();
  /**
   * jQuery API
   * ====================================================
   */


  $.fn[NAME$8] = Toasts._jQueryInterface;
  $.fn[NAME$8].Constructor = Toasts;

  $.fn[NAME$8].noConflict = function () {
    $.fn[NAME$8] = JQUERY_NO_CONFLICT$8;
    return Toasts._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE TodoList.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$9 = 'TodoList';
  var DATA_KEY$9 = 'lte.todolist';
  var JQUERY_NO_CONFLICT$9 = $.fn[NAME$9];
  var Selector$9 = {
    DATA_TOGGLE: '[data-widget="todo-list"]'
  };
  var ClassName$9 = {
    TODO_LIST_DONE: 'done'
  };
  var Default$7 = {
    onCheck: function onCheck(item) {
      return item;
    },
    onUnCheck: function onUnCheck(item) {
      return item;
    }
  };
  /**
   * Class Definition
   * ====================================================
   */

  var TodoList = /*#__PURE__*/function () {
    function TodoList(element, config) {
      this._config = config;
      this._element = element;

      this._init();
    } // Public


    var _proto = TodoList.prototype;

    _proto.toggle = function toggle(item) {
      item.parents('li').toggleClass(ClassName$9.TODO_LIST_DONE);

      if (!$(item).prop('checked')) {
        this.unCheck($(item));
        return;
      }

      this.check(item);
    };

    _proto.check = function check(item) {
      this._config.onCheck.call(item);
    };

    _proto.unCheck = function unCheck(item) {
      this._config.onUnCheck.call(item);
    } // Private
    ;

    _proto._init = function _init() {
      var _this = this;

      var $toggleSelector = $(Selector$9.DATA_TOGGLE);
      $toggleSelector.find('input:checkbox:checked').parents('li').toggleClass(ClassName$9.TODO_LIST_DONE);
      $toggleSelector.on('change', 'input:checkbox', function (event) {
        _this.toggle($(event.target));
      });
    } // Static
    ;

    TodoList._jQueryInterface = function _jQueryInterface(config) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$9);

        var _options = $.extend({}, Default$7, $(this).data());

        if (!data) {
          data = new TodoList($(this), _options);
          $(this).data(DATA_KEY$9, data);
        }

        if (config === 'init') {
          data[config]();
        }
      });
    };

    return TodoList;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(window).on('load', function () {
    TodoList._jQueryInterface.call($(Selector$9.DATA_TOGGLE));
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$9] = TodoList._jQueryInterface;
  $.fn[NAME$9].Constructor = TodoList;

  $.fn[NAME$9].noConflict = function () {
    $.fn[NAME$9] = JQUERY_NO_CONFLICT$9;
    return TodoList._jQueryInterface;
  };

  /**
   * --------------------------------------------
   * AdminLTE Treeview.js
   * License MIT
   * --------------------------------------------
   */
  /**
   * Constants
   * ====================================================
   */

  var NAME$a = 'Treeview';
  var DATA_KEY$a = 'lte.treeview';
  var EVENT_KEY$6 = "." + DATA_KEY$a;
  var JQUERY_NO_CONFLICT$a = $.fn[NAME$a];
  var Event$7 = {
    EXPANDED: "expanded" + EVENT_KEY$6,
    COLLAPSED: "collapsed" + EVENT_KEY$6,
    LOAD_DATA_API: "load" + EVENT_KEY$6
  };
  var Selector$a = {
    LI: '.nav-item',
    LINK: '.nav-link',
    TREEVIEW_MENU: '.nav-treeview',
    OPEN: '.menu-open',
    DATA_WIDGET: '[data-widget="treeview"]'
  };
  var ClassName$a = {
    OPEN: 'menu-open',
    IS_OPENING: 'menu-is-opening',
    SIDEBAR_COLLAPSED: 'sidebar-collapse'
  };
  var Default$8 = {
    trigger: Selector$a.DATA_WIDGET + " " + Selector$a.LINK,
    animationSpeed: 300,
    accordion: true,
    expandSidebar: false,
    sidebarButtonSelector: '[data-widget="pushmenu"]'
  };
  /**
   * Class Definition
   * ====================================================
   */

  var Treeview = /*#__PURE__*/function () {
    function Treeview(element, config) {
      this._config = config;
      this._element = element;
    } // Public


    var _proto = Treeview.prototype;

    _proto.init = function init() {
      $("" + Selector$a.LI + Selector$a.OPEN + " " + Selector$a.TREEVIEW_MENU).css('display', 'block');

      this._setupListeners();
    };

    _proto.expand = function expand(treeviewMenu, parentLi) {
      var _this = this;

      var expandedEvent = $.Event(Event$7.EXPANDED);

      if (this._config.accordion) {
        var openMenuLi = parentLi.siblings(Selector$a.OPEN).first();
        var openTreeview = openMenuLi.find(Selector$a.TREEVIEW_MENU).first();
        this.collapse(openTreeview, openMenuLi);
      }

      parentLi.addClass(ClassName$a.IS_OPENING);
      treeviewMenu.stop().slideDown(this._config.animationSpeed, function () {
        parentLi.addClass(ClassName$a.OPEN);
        $(_this._element).trigger(expandedEvent);
      });

      if (this._config.expandSidebar) {
        this._expandSidebar();
      }
    };

    _proto.collapse = function collapse(treeviewMenu, parentLi) {
      var _this2 = this;

      var collapsedEvent = $.Event(Event$7.COLLAPSED);
      parentLi.removeClass(ClassName$a.IS_OPENING + " " + ClassName$a.OPEN);
      treeviewMenu.stop().slideUp(this._config.animationSpeed, function () {
        $(_this2._element).trigger(collapsedEvent);
        treeviewMenu.find(Selector$a.OPEN + " > " + Selector$a.TREEVIEW_MENU).slideUp();
        treeviewMenu.find(Selector$a.OPEN).removeClass(ClassName$a.OPEN);
      });
    };

    _proto.toggle = function toggle(event) {
      var $relativeTarget = $(event.currentTarget);
      var $parent = $relativeTarget.parent();
      var treeviewMenu = $parent.find('> ' + Selector$a.TREEVIEW_MENU);

      if (!treeviewMenu.is(Selector$a.TREEVIEW_MENU)) {
        if (!$parent.is(Selector$a.LI)) {
          treeviewMenu = $parent.parent().find('> ' + Selector$a.TREEVIEW_MENU);
        }

        if (!treeviewMenu.is(Selector$a.TREEVIEW_MENU)) {
          return;
        }
      }

      event.preventDefault();
      var parentLi = $relativeTarget.parents(Selector$a.LI).first();
      var isOpen = parentLi.hasClass(ClassName$a.OPEN);

      if (isOpen) {
        this.collapse($(treeviewMenu), parentLi);
      } else {
        this.expand($(treeviewMenu), parentLi);
      }
    } // Private
    ;

    _proto._setupListeners = function _setupListeners() {
      var _this3 = this;

      $(document).on('click', this._config.trigger, function (event) {
        _this3.toggle(event);
      });
    };

    _proto._expandSidebar = function _expandSidebar() {
      if ($('body').hasClass(ClassName$a.SIDEBAR_COLLAPSED)) {
        $(this._config.sidebarButtonSelector).PushMenu('expand');
      }
    } // Static
    ;

    Treeview._jQueryInterface = function _jQueryInterface(config) {
      return this.each(function () {
        var data = $(this).data(DATA_KEY$a);

        var _options = $.extend({}, Default$8, $(this).data());

        if (!data) {
          data = new Treeview($(this), _options);
          $(this).data(DATA_KEY$a, data);
        }

        if (config === 'init') {
          data[config]();
        }
      });
    };

    return Treeview;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(window).on(Event$7.LOAD_DATA_API, function () {
    $(Selector$a.DATA_WIDGET).each(function () {
      Treeview._jQueryInterface.call($(this), 'init');
    });
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME$a] = Treeview._jQueryInterface;
  $.fn[NAME$a].Constructor = Treeview;

  $.fn[NAME$a].noConflict = function () {
    $.fn[NAME$a] = JQUERY_NO_CONFLICT$a;
    return Treeview._jQueryInterface;
  };

  exports.CardRefresh = CardRefresh;
  exports.CardWidget = CardWidget;
  exports.ControlSidebar = ControlSidebar;
  exports.DirectChat = DirectChat;
  exports.Dropdown = Dropdown;
  exports.ExpandableTable = ExpandableTable;
  exports.Layout = Layout;
  exports.PushMenu = PushMenu;
  exports.Toasts = Toasts;
  exports.TodoList = TodoList;
  exports.Treeview = Treeview;

  Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=adminlte.js.map
