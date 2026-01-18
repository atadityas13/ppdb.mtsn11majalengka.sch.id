/**
 * MOBILE OPTIMIZATION SCRIPTS
 * Untuk PPDB System - Sidebar & Table Enhancement
 */

(function($) {
    'use strict';

    // ========== SIDEBAR MOBILE TOGGLE (ENHANCED) ==========
    
    function initMobileSidebar() {
        // Buat overlay jika belum ada
        if (!$('.sidebar-overlay').length) {
            $('body').append('<div class="sidebar-overlay"></div>');
        }
        
        // Force hide sidebar on mobile on page load
        if ($(window).width() <= 768) {
            $('body').removeClass('sidebar-show');
            $('.main-sidebar').css('margin-left', '-280px');
        }
        
        // Toggle sidebar saat klik hamburger atau toggle button
        $(document).on('click', '.navbar-toggler, [data-toggle="sidebar"], .sidebar-toggle-btn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $body = $('body');
            
            if ($body.hasClass('sidebar-show')) {
                // Hide sidebar
                $body.removeClass('sidebar-show');
                $('.main-sidebar').css('margin-left', '-280px');
            } else {
                // Show sidebar
                $body.addClass('sidebar-show');
                $('.main-sidebar').css('margin-left', '0');
            }
        });
        
        // Tutup sidebar saat klik overlay
        $(document).on('click', '.sidebar-overlay', function() {
            $('body').removeClass('sidebar-show');
            $('.main-sidebar').css('margin-left', '-280px');
        });
        
        // Tutup sidebar saat klik link (kecuali dropdown)
        $(document).on('click', '.sidebar-menu a:not(.has-dropdown)', function() {
            if ($(window).width() <= 768) {
                setTimeout(function() {
                    $('body').removeClass('sidebar-show');
                    $('.main-sidebar').css('margin-left', '-280px');
                }, 300);
            }
        });
        
        // Auto-hide sidebar saat resize ke desktop
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('body').removeClass('sidebar-show');
                $('.main-sidebar').css('margin-left', '');
            } else {
                // Force hide on mobile
                if (!$('body').hasClass('sidebar-show')) {
                    $('.main-sidebar').css('margin-left', '-280px');
                }
            }
        });
        
        // Handle dropdown toggle di sidebar
        $(document).on('click', '.sidebar-menu .has-dropdown', function(e) {
            if ($(window).width() <= 768) {
                e.preventDefault();
                var $parent = $(this).parent();
                var $dropdown = $parent.find('.dropdown-menu');
                
                // Toggle dropdown
                $dropdown.slideToggle(300);
                $parent.toggleClass('active');
                
                // Close other dropdowns
                $('.sidebar-menu li').not($parent).find('.dropdown-menu').slideUp(300);
                $('.sidebar-menu li').not($parent).removeClass('active');
            }
        });
        
        // Add ripple effect to buttons
        $('.sidebar-toggle-btn, .navbar-toggler').on('click', function(e) {
            var $btn = $(this);
            var $ripple = $('<span class="ripple"></span>');
            
            $btn.append($ripple);
            
            setTimeout(function() {
                $ripple.remove();
            }, 600);
        });
        
        console.log('Mobile sidebar initialized');
    }
    
    // ========== TABLE SCROLL DETECTION ==========
    
    function initTableScrollIndicator() {
        $('.table-responsive').each(function() {
            var $container = $(this);
            var $table = $container.find('table');
            
            // Cek apakah table perlu scroll
            if ($table.width() > $container.width()) {
                $container.addClass('has-scroll');
                
                // Detect scroll
                $container.on('scroll', function() {
                    var scrollLeft = $container.scrollLeft();
                    var maxScroll = $table.width() - $container.width();
                    
                    if (scrollLeft > 10) {
                        $container.addClass('scrolled');
                    } else {
                        $container.removeClass('scrolled');
                    }
                    
                    if (scrollLeft >= maxScroll - 10) {
                        $container.addClass('scrolled-end');
                    } else {
                        $container.removeClass('scrolled-end');
                    }
                });
            }
        });
    }
    
    // ========== MOBILE CARD TABLE (Optional Enhancement) ==========
    
    function initMobileCardTable() {
        // Auto-convert table to card view di mobile
        if ($(window).width() <= 768) {
            $('.table-auto-mobile').each(function() {
                var $table = $(this);
                
                // Tambahkan data-label dari header ke setiap cell
                var headers = [];
                $table.find('thead th').each(function() {
                    headers.push($(this).text().trim());
                });
                
                $table.find('tbody tr').each(function() {
                    $(this).find('td').each(function(index) {
                        if (headers[index]) {
                            $(this).attr('data-label', headers[index]);
                        }
                    });
                });
                
                $table.addClass('table-mobile-cards');
            });
        }
    }
    
    // ========== TOUCH SCROLL HINT ==========
    
    function initTouchScrollHint() {
        $('.table-responsive').on('touchstart', function() {
            $(this).addClass('scrolled'); // Hide hint on first touch
        });
    }
    
    // ========== RESPONSIVE BUTTON TEXT ==========
    
    function initResponsiveButtons() {
        if ($(window).width() <= 576) {
            // Hide button text, keep icon only di mobile kecil
            $('.btn-icon-mobile').each(function() {
                var $btn = $(this);
                var text = $btn.text().trim();
                var icon = $btn.find('i').clone();
                
                $btn.data('original-text', text);
                $btn.html('').append(icon);
            });
        }
    }
    
    // ========== MODAL KEYBOARD CLOSE ==========
    
    function initModalKeyboard() {
        // Tutup modal dengan ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape') {
                $('.modal').modal('hide');
            }
        });
    }
    
    // ========== DROPDOWN AUTO-CLOSE ==========
    
    function initDropdownClose() {
        // Auto-close dropdown saat klik item di mobile
        if ($(window).width() <= 768) {
            $('.dropdown-menu .dropdown-item').on('click', function() {
                $(this).closest('.dropdown').find('.dropdown-toggle').dropdown('hide');
            });
        }
    }
    
    // ========== STICKY HEADER (Optional) ==========
    
    function initStickyHeader() {
        var $navbar = $('.navbar');
        var navbarHeight = $navbar.outerHeight();
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > navbarHeight) {
                $navbar.addClass('navbar-sticky');
            } else {
                $navbar.removeClass('navbar-sticky');
            }
        });
    }
    
    // ========== FORM VALIDATION HELPER ==========
    
    function initFormValidation() {
        // Scroll to first error di mobile
        $('form').on('submit', function(e) {
            var $form = $(this);
            setTimeout(function() {
                var $firstError = $form.find('.is-invalid:first, .error:first');
                if ($firstError.length && $(window).width() <= 768) {
                    $('html, body').animate({
                        scrollTop: $firstError.offset().top - 100
                    }, 300);
                }
            }, 100);
        });
    }
    
    // ========== BACK TO TOP BUTTON ==========
    
    function initBackToTop() {
        // Add back to top button
        if (!$('.btn-back-to-top').length) {
            $('body').append('<button class="btn btn-primary btn-back-to-top" style="display:none;"><i class="fas fa-arrow-up"></i></button>');
        }
        
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $('.btn-back-to-top').fadeIn();
            } else {
                $('.btn-back-to-top').fadeOut();
            }
        });
        
        $('.btn-back-to-top').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 400);
        });
    }
    
    // ========== PULL TO REFRESH (Optional) ==========
    
    function initPullToRefresh() {
        var startY = 0;
        var pulling = false;
        
        $(document).on('touchstart', function(e) {
            if ($(window).scrollTop() === 0) {
                startY = e.touches[0].pageY;
                pulling = true;
            }
        });
        
        $(document).on('touchmove', function(e) {
            if (pulling) {
                var currentY = e.touches[0].pageY;
                var diff = currentY - startY;
                
                if (diff > 100) {
                    // Show refresh indicator
                    $('.main-content').css('padding-top', diff + 'px');
                }
            }
        });
        
        $(document).on('touchend', function(e) {
            if (pulling) {
                $('.main-content').css('padding-top', '');
                
                var currentY = e.changedTouches[0].pageY;
                var diff = currentY - startY;
                
                if (diff > 150) {
                    // Trigger refresh
                    location.reload();
                }
            }
            pulling = false;
        });
    }
    
    // ========== INITIALIZE ALL ==========
    
    $(document).ready(function() {
        initMobileSidebar();
        initTableScrollIndicator();
        initTouchScrollHint();
        initModalKeyboard();
        initDropdownClose();
        initFormValidation();
        
        // Optional enhancements (comment out if not needed)
        // initMobileCardTable();
        // initResponsiveButtons();
        // initStickyHeader();
        // initBackToTop();
        // initPullToRefresh();
        
        // Re-initialize on window resize
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                initTableScrollIndicator();
            }, 250);
        });
        
        // Log for debugging
        console.log('Mobile optimization scripts loaded');
    });
    
    // ========== CSS UNTUK BACK TO TOP BUTTON ==========
    
    $('<style>')
        .text(`
            .btn-back-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 999;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                border: none;
            }
            
            .btn-back-to-top:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 16px rgba(0,0,0,0.2);
            }
            
            .navbar-sticky {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 1000;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            
            @media (max-width: 768px) {
                .btn-back-to-top {
                    bottom: 15px;
                    right: 15px;
                    width: 44px;
                    height: 44px;
                }
            }
        `)
        .appendTo('head');

})(jQuery);
