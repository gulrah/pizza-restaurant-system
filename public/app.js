import '../resources/js/bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

public function index(Request $request)
{
    // Retrieve search query
    $query = $request->get('search');
    
    // Retrieve menu items with search filtering
    $menuItems = MenuItem::when($query, function ($queryBuilder) use ($query) {
        $queryBuilder->where('name', 'like', "%{$query}%")
                     ->orWhere('description', 'like', "%{$query}%");
    })->get();

    // Pass filtered menu items to the view
    return view('menu.index', compact('menuItems'));
}
const container = document.querySelector('.container');
const tables = document.querySelectorAll('.row .table:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const tableSelect = document.getElementById('table-type');

populateUI();
let tablePrice = +tableSelect.value;

// Save selected table type and price
function setTableData(tableType, tablePrice) {
    localStorage.setItem('selectedTableType', tableType);
    localStorage.setItem('selectedTablePrice', tablePrice);
}

// Update total and count
function updateSelectedCount() {
    const selectedTables = document.querySelectorAll('.row .table.selected');

    const tablesIndex = [...selectedTables].map((table) => [...tables].indexOf(table));

    localStorage.setItem('selectedTables', JSON.stringify(tablesIndex));

    const selectedTablesCount = selectedTables.length;

    count.innerText = selectedTablesCount;
    total.innerText = selectedTablesCount * tablePrice;
}

// Get data from localStorage and populate UI
function populateUI() {
    const selectedTables = JSON.parse(localStorage.getItem('selectedTables'));
    if (selectedTables !== null && selectedTables.length > 0) {
        tables.forEach((table, index) => {
            if (selectedTables.indexOf(index) > -1) {
                table.classList.add('selected');
            }
        });
    }

    const selectedTableType = localStorage.getItem('selectedTableType');
    if (selectedTableType !== null) {
        tableSelect.selectedIndex = selectedTableType;
    }
}

// Table select event
tableSelect.addEventListener('change', (e) => {
    tablePrice = +e.target.value;
    setTableData(e.target.selectedIndex, e.target.value);
    updateSelectedCount();
});

// Table click event
container.addEventListener('click', (e) => {
    if (e.target.classList.contains('table') && !e.target.classList.contains('occupied')) {
        e.target.classList.toggle('selected');
        updateSelectedCount();
    }
});

// Initial count and total
updateSelectedCount();
