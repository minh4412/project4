<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'White Dashboard') }}</title>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('white') }}/img/apple-icon.png">
        <link rel="icon" type="image/png" href="{{ asset('white') }}/img/favicon.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/my-css.css" rel="stylesheet" />
    </head>
    <body class="white-content {{ $class ?? '' }}">
        @if (Session::exists('id'))
            <div class="wrapper">
                    @include('layouts.navbars.sidebar')
                <div class="main-panel">
                    @include('layouts.navbars.navbar')

                    <div class="content">
                        @yield('content')
                    </div>

                    @include('layouts.footer')
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            @include('layouts.navbars.navbar')
            <div class="wrapper wrapper-full-page">
                <div class="full-page {{ $contentClass ?? '' }}">
                    <div class="content">
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                    @include('layouts.footer')
                </div>
            </div>
        @endif
        {{-- @auth()
            
        @else
            
        @endauth --}}
        {{-- <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
                <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
                </a>
                <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors text-center">
                        <span class="badge filter badge-primary active" data-color="primary"></span>
                        <span class="badge filter badge-info" data-color="blue"></span>
                        <span class="badge filter badge-success" data-color="green"></span>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </li>
                <li class="button-container">
                    <a href="https://www.creative-tim.com/product/white-dashboard-laravel" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
                    <a href="https://white-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block btn-round">
                    Documentation
                    </a>
                </li>
                <li class="header-title">Thank you for 95 shares!</li>
                <li class="button-container text-center">
                    <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
                    <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
                    <br>
                    <br>
                    <a class="github-button" href="https://github.com/creativetimofficial/white-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
                </li>
                </ul>
            </div>
        </div> --}}
        <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
        <!-- Chart JS -->
        {{-- <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script> --}}
        <!--  Notifications Plugin    -->
        <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>

        <script src="{{ asset('white') }}/js/white-dashboard.min.js?v=1.0.0"></script>
        <script src="{{ asset('white') }}/js/theme.js"></script>

        @stack('js')

        <script>
            $(document).ready(function() {
                $().ready(function() {
                    $sidebar = $('.sidebar');
                    $navbar = $('.navbar');
                    $main_panel = $('.main-panel');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');
                    sidebar_mini_active = true;
                    white_color = false;

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    $('.fixed-plugin a').click(function(event) {
                        if ($(this).hasClass('switch-trigger')) {
                            if (event.stopPropagation) {
                                event.stopPropagation();
                            } else if (window.event) {
                                window.event.cancelBubble = true;
                            }
                        }
                    });

                    $('.fixed-plugin .background-color span').click(function() {
                        $(this).siblings().removeClass('active');
                        $(this).addClass('active');

                        var new_color = $(this).data('color');

                        if ($sidebar.length != 0) {
                            $sidebar.attr('data', new_color);
                        }

                        if ($main_panel.length != 0) {
                            $main_panel.attr('data', new_color);
                        }

                        if ($full_page.length != 0) {
                            $full_page.attr('filter-color', new_color);
                        }

                        if ($sidebar_responsive.length != 0) {
                            $sidebar_responsive.attr('data', new_color);
                        }
                    });

                    $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (sidebar_mini_active == true) {
                            $('body').removeClass('sidebar-mini');
                            sidebar_mini_active = false;
                            whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                        } else {
                            $('body').addClass('sidebar-mini');
                            sidebar_mini_active = true;
                            whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                        }

                        // we simulate the window Resize so the charts will get updated in realtime.
                        var simulateWindowResize = setInterval(function() {
                            window.dispatchEvent(new Event('resize'));
                        }, 180);

                        // we stop the simulation of Window Resize after the animations are completed
                        setTimeout(function() {
                            clearInterval(simulateWindowResize);
                        }, 1000);
                    });

                    $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                            var $btn = $(this);

                            if (white_color == true) {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').removeClass('white-content');
                                }, 900);
                                white_color = false;
                            } else {
                                $('body').addClass('change-background');
                                setTimeout(function() {
                                    $('body').removeClass('change-background');
                                    $('body').addClass('white-content');
                                }, 900);

                                white_color = true;
                            }
                    });

                    $('.light-badge').click(function() {
                        $('body').addClass('white-content');
                    });

                    $('.dark-badge').click(function() {
                        $('body').removeClass('white-content');
                    });
                });
            });
            
            function AddToCart(id){
                $.ajax({
                    url: "/AddCart/"+id,
                    type: "GET",
                }).done(function(response) {
                    $(".notification").removeClass('d_hidden');
                    demo.showNotification('top','center','Add Cart successful.')
                });
            }
            $('.plus').click(function(){
                var a = $(this).parent().find('.input-qty').val()
                var b = Number(a) + 1;
                $(this).parent().find('.input-qty').val(b)
            })
            
            $('.minus').click(function(){
                var a = $(this).parent().find('.input-qty').val()
                var b = Number(a) - 1;
                if(b < 1){
                    b = 1;
                }
                $(this).parent().find('.input-qty').val(b)
            })
            function DeleteItemCart(id){
                $.ajax({
                    url: "/DeleteItemCart/"+id,
                    type: "GET",
                }).done(function(response) {
                    RenderListCart(response)
                    demo.showNotification('top','center','Delete successful.')
                });
            }
            function UpdateItemCart(id){
                if($("#input-qty-"+id).val() > 0 ){
                    $.ajax({
                        url: "/UpdateItemCart/"+id+"/"+$("#input-qty-"+id).val(),
                        type: "GET",
                    }).done(function(response) {
                        RenderListCart(response)
                        demo.showNotification('top','center','Update successful.')
                    });
                }else{
                    $.ajax({
                        url: "/UpdateItemCart/"+id+"/"+1,
                        type: "GET",
                    }).done(function(response) {
                        RenderListCart(response)
                        demo.showNotification('top','center','Update successful.')
                    });
                }
            }
            function Order(url){
                demo.showNotification('top','center','I am creating an order, please wait a moment.')
                $.ajax({
                    url: "/Order",
                    type: "GET",
                }).done(function(response) {
                    RenderListCart(response)
                    demo.showNotification('top','center','Order confirmation successful.')
                    $(".notification").addClass('d_hidden');
                });
            }
            $(".editall").on("click",function(){
                var list = [];
                $("table tbody tr td").each(function(){
                    $(this).find(".input-qty").each(function(){
                        if($(this).val() > 0){
                            var element = { 
                                key : $(this).data("id"),
                                value : $(this).val()
                            }
                        }else{
                            var element = { 
                                key : $(this).data("id"),
                                value : 1
                            }
                        }
                        list.push(element)
                    })
                })
                $.ajax({
                    url: "EditAll",
                    type: "POST",
                    data: {
                        "_token" : "{{ csrf_token() }}",
                        "data" : list
                    }
                }).done(function(response) {
                    RenderListCart(response)
                    demo.showNotification('top','center','Update successful.')
                });
            })
            $(".deleteall").on("click",function(){
                $.ajax({
                    url: "DeleteAll",
                    type: "GET",
                }).done(function(response) {
                    RenderListCart(response)
                    demo.showNotification('top','center','Delete successful.')
                });
            })
            function CancelOrder(id){
                $.ajax({
                    url: "/CancelOrder/"+id,
                    type: "GET",
                }).done(function(response) {
                    $("#btn-cancel"+id).remove();
                    if(response == 2){
                        $("#status"+id).text("Cancelled");
                        demo.showNotification('top','center','Cancel order successful.')
                    }else if(response == 1){
                        $("#status"+id).text("Approved");
                        demo.showNotification('top','center','This order has been approved by admin.')
                    }else if(response == 3){
                        $("#status"+id).text("Cancelled");
                        demo.showNotification('top','center','This order has been cancelled by admin.')
                    }
                });
            }
            function CancelOrder2(id){
                $.ajax({
                    url: "/CancelOrder/"+id,
                    type: "GET",
                }).done(function(response) {
                    $(".btn-now").prop('disabled', true);
                    if(response == 2){
                        $(".btn-now").text("This order has been cancelled");
                        demo.showNotification('top','center','Cancel order successful.')
                    }else{
                        $(".btn-now").text("This order has been approved by admin");
                        demo.showNotification('top','center','This order has been approved by admin.')
                    }
                });
            }
            $(".order").submit(function(event) {
                event.preventDefault();
                let post_url = $(this).attr("action");
                let request_method = $(this).attr("method");
                let form_data = $(this).serialize();
                $.ajax({
                    url: post_url,
                    type: request_method,
                    data: form_data
                }).done(function(response) {
                    $(".dis-after").remove();
                    $(".btn-after").prop('disabled', true);
                    if(response[0] == 1){
                        $(".btn-after").text("This order has been approved");
                        $("#stt"+response[1]).text("Approved")
                        demo.showNotification('top','center','Approve order successful.')
                    }else if(response[0] == 2){
                        $(".btn-after").text("This order has been cancelled");
                        $("#stt"+response[1]).text("Cancelled")
                        demo.showNotification('top','center','Cancel order successful.')
                    }else if(response[0] == 3){
                        $(".btn-after").text("This order has been approved");
                        $("#stt"+response[1]).text("Approved")
                        demo.showNotification('top','center','This order has been approved by other person.')
                    }else if(response[0] == 4){
                        $(".btn-after").text("This order has been cancelled");
                        $("#stt"+response[1]).text("Cancelled")
                        demo.showNotification('top','center','This order has been cancelled by other person.')
                    }else if(response[0] == 5){
                        $(".btn-after").text("No more books in stock");
                        demo.showNotification('top','center','No more books in stock.')
                    }
                });
            });
            function RenderListCart(response){
                $("#list-cart").empty();
                $("#list-cart").html(response);
                $('.plus').click(function(){
                    var a = $(this).parent().find('.input-qty').val()
                    var b = Number(a) + 1;
                    $(this).parent().find('.input-qty').val(b)
                })
                
                $('.minus').click(function(){
                    var a = $(this).parent().find('.input-qty').val()
                    var b = Number(a) - 1;
                    if(b < 1){
                        b = 1;
                    }
                    $(this).parent().find('.input-qty').val(b)
                })
            }
            var value = $("#hdnSession").data('value');
            if(value == 0){
                demo.showNotification('top','center','Payment success.')
            }else if(value == 1 ){
                demo.showNotification('top','center','Payment failed.')
            }
            var editclass = $("#editclass").data('value');
            if(editclass == 1){
                demo.showNotification('top','center','Edit class success.')
            }
            var editcourse = $("#editcourse").data('value');
            if(editcourse == 1){
                demo.showNotification('top','center','Edit course success.')
            }
            var editstudent = $("#editstudent").data('value');
            if(editstudent == 1){
                demo.showNotification('top','center','Edit student success.')
            }
            var editbook = $("#editbook").data('value');
            if(editbook == 1){
                demo.showNotification('top','center','Edit book success.')
            }
            var addbook = $("#addbook").data('value');
            if(addbook == 1){
                demo.showNotification('top','center','Create book success.')
            }
        </script>
        @stack('js')
    </body>
</html>
