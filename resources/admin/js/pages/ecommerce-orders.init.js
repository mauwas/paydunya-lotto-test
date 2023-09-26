/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce order Js File
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
      "Billing Name", "Date", "Total",
      {
        name: 'Payment Status',
        formatter: (function (cell) {
          switch (cell) {
            case "Paid":
              return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + cell + '</span>');

            case "Chargeback":
              return gridjs.html('<span class="badge badge-pill badge-soft-danger font-size-12">' + cell + '</span>');

            case "Refund":
              return gridjs.html('<span class="badge badge-pill badge-soft-warning font-size-12">' + cell + '</span>');

            default:
              return gridjs.html('<span class="badge badge-pill badge-soft-success font-size-12">' + cell + '</span>');
          }
        })
      },
      {
        name: "Payment Method",
        formatter: (function (cell) {
          switch (cell) {
            case "Mastercard":
              return gridjs.html('<i class="fab fa-cc-mastercard me-2"></i>' + cell);
            case "Visa":
              return gridjs.html('<i class="fab fa-cc-visa me-2"></i>' + cell);
            case "Paypal":
              return gridjs.html('<i class="fab fa-cc-paypal me-2"></i>' + cell);
            case "COD":
              return gridjs.html('<i class="fas fa-money-bill-alt me-2"></i>' + cell);
          }
        })
      },
      {
        name: "View Details",
        formatter: (function (cell) {
          return gridjs.html('<button type="button" class="btn btn-primary btn-sm btn-rounded" data-bs-toggle="modal" data-bs-target=".orderdetailsModal">'+ cell + '</button>');
        })
      },
      {
        name: "Action",
        sort: {
          enabled: false
      },
        formatter: (function (cell) {
          return gridjs.html('<div class="d-flex gap-3"><a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a><a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a></div>');
        })
      }
    ],
  pagination: {
    limit: 8
  },
  sort: true,
  search: true,
  data: [
    ["", "#SK2540", "Neal Matthews", "07 Oct, 2021", "$400", "Paid", "Mastercard", "View Details" ],
    ["", "#SK5623", "Jamal Burnett", "05 Oct, 2021", "$452", "Chargeback", "Visa", "View Details"],
    ["", "#SK6263", "Juan Mitchell", "06 Oct, 2021", "$632", "Refund", "Paypal", "View Details"],
    ["", "#SK4521", "Barry Dick",    "07 Oct, 2021", "$521", "Refund", "COD", "View Details"],
    ["", "#SK5263", "Ronald Taylor", "07 Oct, 2021", "$521", "Paid", "Mastercard", "View Details" ],
    ["", "#SK4526", "Jacob Hunter",  "06 Oct, 2021", "$365", "Chargeback", "Visa", "View Details"],
    ["", "#SK8965", "William Cruz",  "07 Oct, 2021", "$452", "Paid", "Paypal", "View Details"],
    ["", "#SK9658", "Dustin Moser",  "08 Oct, 2021", "$365", "Paid", "COD", "View Details"],
    ["", "#SK7458", "Clark Benson",  "09 Oct, 2021", "$254", "Refund", "COD", "View Details"],
    ["", "#SK2685", "John Fane", "07 Oct, 2021", "$400", "Paid", "Mastercard", "View Details" ],
    ["", "#SK4526", "Stacie Parker", "05 Oct, 2021", "$452", "Chargeback", "Visa", "View Details"],
    ["", "#SK8522", "Betty Wilson", "06 Oct, 2021", "$632", "Refund", "Paypal", "View Details"],
    ["", "#SK4545", "Roman Crabtree",    "07 Oct, 2021", "$521", "Refund", "COD", "View Details"],
    ["", "#SK9652", "Marisela Butler", "07 Oct, 2021", "$521", "Paid", "Mastercard", "View Details" ],
    ["", "#SK4256", "Roger Slayton",  "06 Oct, 2021", "$365", "Chargeback", "Visa", "View Details"],
    ["", "#SK4125", "Barbara Torres",  "07 Oct, 2021", "$452", "Paid", "Paypal", "View Details"],
    ["", "#SK6523", "Daniel Rigney",  "08 Oct, 2021", "$365", "Paid", "COD", "View Details"],
    ["", "#SK6563", "Kenneth Linck",  "09 Oct, 2021", "$254", "Refund", "COD", "View Details"],

  ]
}).render(document.getElementById("table-ecommerce-orders"));



flatpickr('#order-date', {
  defaultDate: new Date(),
  dateFormat: "d M, Y",
});
