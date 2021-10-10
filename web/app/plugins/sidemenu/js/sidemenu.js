var sidemenuJS = function() {
    document.body.insertBefore(document.getElementsByClassName('sidemenu')[0], document.body.firstChild);
    var sidemenuCover = document.createElement('section');
    sidemenuCover.className = 'cover';
    document.body.insertBefore(sidemenuCover, document.body.firstChild);
    var sidemenuToggles = document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a');
    if ('dashicon' in sideMenu) {
        Array.prototype.forEach.call(sidemenuToggles, function(sidemenuToggle) {
            switch(sideMenu.dashiconlocation) {
              case 'before':
                sidemenuToggle.innerHTML = '<span alt="Menu" class="dashicons dashicons-dashicons dashicons-' + sideMenu.dashicon + '"></span> ' + sidemenuToggle.innerHTML;
                break;
              case 'after':
                sidemenuToggle.innerHTML = sidemenuToggle.innerHTML + ' <span alt="Menu" class="dashicons dashicons-dashicons dashicons-' + sideMenu.dashicon + '"></span>';
                break;
              default:
                sidemenuToggle.innerHTML = '<span alt="Menu" class="dashicons dashicons-dashicons dashicons-' + sideMenu.dashicon + '"></span>';
            }
        });
    }
    if (!sidemenuToggles.length && document.body.classList.contains('logged-in') && ('openbuttonhelp' in sideMenu)) {
        var sidemenuHelp = document.createElement('section');
        sidemenuHelp.innerHTML = sideMenu.openbuttonhelp;
        document.getElementsByClassName('close_sidemenu')[0].parentNode.insertBefore(sidemenuHelp, document.getElementsByClassName('close_sidemenu')[0].nextSibling);
        document.body.classList.add('sidemenu_open');
        document.querySelectorAll('body>.cover')[0].addEventListener('click',function() {
            document.body.classList.remove('sidemenu_open');
        },false);
        if (!('scrollclose' in sideMenu) || sideMenu.scrollclose === true) {
            var current_scroll = (document.documentElement.scrollTop);
            window.addEventListener('scroll', function() {
                if (Math.abs(window.pageYOffset - current_scroll) > 400) {
                    document.body.classList.remove('sidemenu_open');
                }
            });
        }
    }
    Array.prototype.forEach.call(document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a, .sidemenu .close_sidemenu'), function(sidemenuToggle) {
        sidemenuToggle.addEventListener('click', function(buttonEvent) {
            buttonEvent.preventDefault();
            buttonWrapper = buttonEvent.target.parentElement;
            if (buttonWrapper.classList[0] !== 'close_sidemenu' && buttonWrapper.classList[0] !== 'open_sidemenu') {
                buttonWrapper = buttonWrapper.parentElement;
            }
            if (buttonWrapper.classList[0] !== 'close_sidemenu' && buttonWrapper.classList[1] && buttonWrapper.classList[1] !== 'menu-item') {
                Array.prototype.forEach.call(document.getElementsByClassName('sidemenu')[0].getElementsByClassName('menu-item'), function(sidemenuItem) {
                    sidemenuItem.style.display = 'none';
                });
                Array.prototype.forEach.call(document.getElementsByClassName('sidemenu')[0].getElementsByClassName('widget'), function(sidemenuItem) {
                    if (sidemenuItem.getElementsByClassName(buttonWrapper.classList[1])[0]) {
                        sidemenuItem.style.display = 'block';
                    } else {
                        sidemenuItem.style.display = 'none';
                    }
                });
                Array.prototype.forEach.call(document.getElementsByClassName('sidemenu')[0].getElementsByClassName(buttonWrapper.classList[1]), function(sidemenuItem) {
                    sidemenuItem.style.display = 'block';
                });
            } else if (buttonWrapper.classList[0] !== 'close_sidemenu') {
                Array.prototype.forEach.call(document.getElementsByClassName('sidemenu')[0].getElementsByClassName('menu-item'), function(sidemenuItem) {
                    sidemenuItem.style.display = 'block';
                });
                Array.prototype.forEach.call(document.getElementsByClassName('sidemenu')[0].getElementsByClassName('widget'), function(sidemenuItem) {
                    sidemenuItem.style.display = 'block';
                });
            }
            if (this.classList.contains('open') || (!sidemenuToggles.length && document.body.classList.contains('logged-in'))) {
                Array.prototype.forEach.call(document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a, .sidemenu .close_sidemenu'), function(sidemenuToggle) {
                    sidemenuToggle.classList.remove('open');
                });
                document.body.classList.remove('sidemenu_open');
            } else {
                Array.prototype.forEach.call(document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a, .sidemenu .close_sidemenu'), function(sidemenuToggle) {
                    sidemenuToggle.classList.add('open');
                });
                document.body.classList.add('sidemenu_open');
                document.querySelectorAll('body>.cover')[0].addEventListener('click',function() {
                    Array.prototype.forEach.call(document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a, .sidemenu .close_sidemenu'), function(sidemenuToggle) {
                        sidemenuToggle.classList.remove('open');
                    });
                    document.body.classList.remove('sidemenu_open');
                },false);
                if (!('scrollclose' in sideMenu) || sideMenu.scrollclose == '1') {
                    var current_scroll = (document.documentElement.scrollTop);
                    window.addEventListener('scroll', function() {
                        if (Math.abs(window.pageYOffset - current_scroll) > 400) {
                            Array.prototype.forEach.call(document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a, .sidemenu .close_sidemenu'), function(sidemenuToggle) {
                                sidemenuToggle.classList.remove('open');
                            });
                            document.body.classList.remove('sidemenu_open');
                        }
                    });
                }
            }
        },false);
    });
    if (('hijacktoggle' in sideMenu) && sideMenu.hijacktoggle !== '') {
        Array.prototype.forEach.call(document.querySelectorAll(sideMenu.hijacktoggle), function(hijackToggle) {
            hijackToggle.addEventListener('click',function() {
				document.querySelectorAll('.open_sidemenu>a, .open_sidemenu>div>a')[0].click();
			});
        });
        var sidemenuHijackToggle = function() {
            setTimeout(function() {
                if (typeof jQuery !== 'undefined') {
                    jQuery('.sidemenu li').each(function() { jQuery(this).unbind(); });
                    jQuery(sideMenu.hijacktoggle).unbind();
                }
                if (typeof astraNavMenuToggle !== 'undefined') {
                    Array.prototype.forEach.call(document.querySelectorAll(sideMenu.hijacktoggle), function(hijackToggle) {
						hijackToggle.removeEventListener('click', astraNavMenuToggle, !1);
                    });
                } else {
                    Array.prototype.forEach.call(document.querySelectorAll(sideMenu.hijacktoggle), function(hijackToggle) {
						hijackToggle.onclick = '';
                    });
                }
            }, 500);
        }
        window.addEventListener('resize', sidemenuHijackToggle);
        sidemenuHijackToggle();
    }
    if ('dropdown' in sideMenu) {
		Array.prototype.forEach.call(document.querySelectorAll('.sidemenu .submenu-toggle'), function(submenuToggle) {
			submenuToggle.addEventListener('click', function(event) {
			    event.preventDefault();
				var sibling = submenuToggle.nextElementSibling;
				while (sibling) {
					if (sibling.matches('.sub-menu')) {
						if (!sibling.classList.contains('open')) {
							submenuToggle.classList.add('open');
							sibling.classList.add('open');
						} else {
							submenuToggle.classList.remove('open');
							sibling.classList.remove('open');
						}
						break;
					}
					sibling = sibling.nextElementSibling;
				}
			});
		});

	}
};
if (
    document.readyState === 'complete' ||
    (document.readyState !== 'loading' && !document.documentElement.doScroll)
) {
    sidemenuJS();
} else {
    document.addEventListener('DOMContentLoaded', sidemenuJS);
}
