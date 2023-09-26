/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: invoive list  Js File
*/



// Basic Table
new gridjs.Grid({
    columns:
      [
        {
          name: '#',
          sort: {
            enabled: false
        },
          formatter: (function (cell) {
            return gridjs.html('<div class="form-check font-size-16"><input class="form-check-input" type="checkbox" id="orderidcheck01"><label class="form-check-label" for="orderidcheck01"></label></div>');
          })
        },
        {
          name: 'Order ID',
          formatter: (function (cell) {
            return gridjs.html('<span class="fw-semibold">' + cell + '</span>');
          })
        },
         "Date", "Billing Name", "Amount", 
        {
          name: 'Status',
          formatter: (function (cell) {
            switch (cell) {
              case "Paid":
                return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + cell + '</span>');
  
              case "Pending":
                return gridjs.html('<span class="badge badge-pill badge-soft-warning font-size-12">' + cell + '</span>');
  
              default:
                return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + cell + '</span>');
            }
          })
        },
        {
          name: "Action",
          sort: {
            enabled: false
        },
          formatter: (function (cell) {
            return gridjs.html('<div class="dropdown"><button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></button><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="#">Edit</a></li><li><a class="dropdown-item" href="#">Print</a></li><li><a class="dropdown-item" href="#">Delete</a></li></ul></div>');
          })
        }
      ],
    pagination: {
      limit: 10
    },
    sort: true,
    search: true,
    data: [
      ["", "#DS0215",  "07 Oct, 2021",  "Connie Franco",    "$26.30",  "Paid",      "View Details" ],
      ["", "#DS0214",  "05 Oct, 2021",  "Paul Reynolds",    "$24.20",  "Paid",      "View Details"],
      ["", "#DS0214",  "06 Oct, 2021",  "Ronald Patterson", "$65.32",  "Pending",   "View Details"],
      ["", "#DS0212",  "07 Oct, 2021",  "Adella Perez",     "$53.32",  "Paid",      "View Details"],
      ["", "#DS0211",  "07 Oct, 2021",  "Theresa Mayers",   "$13.21",  "Paid",      "View Details" ],
      ["", "#DS0210",  "06 Oct, 2021",  "Michael Wallace",  "$23.41",  "Pending",   "View Details"],
      ["", "#DS0209",  "07 Oct, 2021",  "Oliver Gonzales",  "$41.23",  "Pending",   "View Details"],
      ["", "#DS0208",  "08 Oct, 2021",  "David Burke",      "$32.25",  "Paid",      "View Details"],
      ["", "#DS0207",  "09 Oct, 2021",  "Willie Verner",    "$53.21",  "Pending",   "View Details"],
      ["", "#DS0206",  "07 Oct, 2021",  "Felix Perry",      "$63.21",  "Paid",      "View Details" ],
      ["", "#SK4526",  "05 Oct, 2021",  "Stacie Parker",    "$63.85",  "Pending",   "View Details"],
      ["", "#SK8522",  "06 Oct, 2021",  "Betty Wilson",     "$32.12",  "Pending",   "View Details"],
      ["", "#SK4545",  "07 Oct, 2021",  "Roman Crabtree",   "$45.62",  "Paid",      "View Details"],
      ["", "#SK9652",  "07 Oct, 2021",  "Marisela Butler",  "$62.35",  "Pending",   "View Details" ],
      ["", "#SK4256",  "06 Oct, 2021",  "Roger Slayton",    "$45.62",  "Paid",      "View Details"],
      ["", "#SK4125",  "07 Oct, 2021",  "Barbara Torres",   "$42.63",  "Paid",      "View Details"],
      ["", "#SK6523",  "08 Oct, 2021",  "Daniel Rigney",    "$32.54",  "Pending",   "View Details"],
      ["", "#SK6563",  "09 Oct, 2021",  "Kenneth Linck",    "$52.62",  "Pending",   "View Details"],
  
    ]
  }).render(document.getElementById("table-invoices-list"));
  

// Range datepicker
flatpickr('#datepicker-range', {
    mode: "range"
});

// Invoice date

flatpickr('#datepicker-invoice');
    
// form step wizard
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("wizard-tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Add";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("wizard-tab");

    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        currentTab = currentTab - n;
        x[currentTab].style.display = "block";
    }
    // Otherwise, display the correct tab:
    showTab(currentTab)
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("list-item");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

