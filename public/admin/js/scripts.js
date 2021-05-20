$.ajaxSetup({
    beforeSend: function(xhr, type) {
        if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
        }
    },
});

(function ($) {
    "use strict"; // Start of use strict

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Close any open menu accordions when window is resized below 768px
    $(window).resize(function () {
        if ($(window).width() < 768) {
            $('.sidebar .collapse').collapse('hide');
        };

        // Toggle the side navigation when window is resized below 480px
        if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
            $("body").addClass("sidebar-toggled");
            $(".sidebar").addClass("toggled");
            $('.sidebar .collapse').collapse('hide');
        };
    });

    // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
    $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
        if ($(window).width() > 768) {
            var e0 = e.originalEvent,
                delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
            e.preventDefault();
        }
    });

    // Scroll to top button appear
    $(document).on('scroll', function () {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    // Smooth scrolling using jQuery easing
    $(document).on('click', 'a.scroll-to-top', function (e) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top)
        }, 1000, 'easeInOutExpo');
        e.preventDefault();
    });

})(jQuery); // End of use strict

// Call the dataTables jQuery plugin
$(function () {
    $('#dataTable').DataTable({
        "language": {
            "search": "Buscar:",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontró ningún registro",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Ningún resultado",
            "infoFiltered": "(filtrado desde un total de _MAX_ registros)",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente"
            }
        }
    });
});

// Calendar
$(document).ready(function () {

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        eventSources: [
            // eventos personales que añade el estudiante
            {
                url: '/event/load',
                method: 'POST',
                failure: function () {
                    alert('there was an error while fetching events!');
                },
                color: 'pink', // a non-ajax option
                textColor: 'black' // a non-ajax option
            },
            // horarios oficiales de las clases del estudiante 
            {
                url: '/schedule/load',
                method: 'POST',
                failure: function () {
                    alert('there was an error while fetching schedule!');
                },
                color: 'lightblue', // a non-ajax option
                textColor: 'black' // a non-ajax option
            }
        ],
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt("Enter Event Title");
            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: '/event/insert',
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end
                    },
                    success: function () {
                        calendar.fullCalendar('refetchEvents');
                        alert("Added Successfully");
                    }
                })
            }
        },
        editable: true,
        eventResize: function (event) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            var type = event.type;
            if(type == "event"){
                $.ajax({
                    url: '/event/update',
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },
                    success: function () {
                        calendar.fullCalendar('refetchEvents');
                        alert('Event Update');
                    }
                })
            }
            else{
                alert("No puedes modificar los horarios de las clases")
                calendar.fullCalendar('refetchEvents');
            }
        },
        eventDrop: function (event) {
            var type = event.type;
            console.log("type", type)
            if(type == "event"){
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;
           
                $.ajax({
                    url: '/event/update',
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },
                    success: function () {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Updated");
                    }
                });
            }

            else{
                alert("No puedes modificar los horarios de las clases")
                calendar.fullCalendar('refetchEvents');
            }
            
        },
        eventClick: function (event) {
            var type = event.type;
            console.log("type es", type);
            if (type == "event") {
                if (confirm("Are you sure you want to remove it?")) {
                    var id = event.id;
                    var type = event.type;
                    $.ajax({
                        url: '/event/delete',
                        type: "POST",
                        data: {
                            id: id
                        },
                        success: function () {
                            calendar.fullCalendar('refetchEvents');
                            alert("Event Removed");
                        }
                    })
                }
            }
        }
    });
});
