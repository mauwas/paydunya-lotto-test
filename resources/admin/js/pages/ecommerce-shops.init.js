/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Ecommerce customers Js File
*/

// Basic Table
new gridjs.Grid({
  columns:
    [
      

      {
        name: 'Brand',
        formatter: (function (cell) {
          switch (cell) {
            case "M":
              return gridjs.html('<div class="avatar"><span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle"> ' + cell + ' </span></div>');

            case "B":
              return gridjs.html('<div class="avatar"><span class="avatar-title bg-soft-warning text-warning font-size-16 rounded-circle"> ' + cell + ' </span></div>');

              case "K":
                return gridjs.html('<div class="avatar"><span class="avatar-title bg-soft-success text-success font-size-16 rounded-circle"> ' + cell + ' </span></div>');

            case "P":
              return gridjs.html('<div class="avatar"><span class="avatar-title bg-soft-danger text-danger font-size-16 rounded-circle"> ' + cell + ' </span></div>');

            default:
              return gridjs.html('<div class="avatar"><span class="avatar-title bg-soft-primary text-primary font-size-16 rounded-circle"> ' + cell + ' </span></div>');
          }
        })
      },

      {
        name: 'Name',
        formatter: (function (cell) {
          return gridjs.html('<h5 class="font-size-15">'+ cell[0] +'</h5><p class="text-muted mb-0"> <i class="mdi mdi-account me-1"></i>'+ cell[1] +'</p>');
        })
      },
      
      , "Email", "Date", "Product", "Current Balance",

      {
        name: "Action",
        formatter: (function (cell) {
          return gridjs.html('<div class="d-flex gap-3">' +
          '<a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Edit" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>' +
         ' <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Delete" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>' +
     '</div>');
        })
      }
    ],
  pagination: {
    limit: 7
  },
  sort: true,
  search:true,
  data: [
    [ "M",  ["Nedick's", "Wayne McClain"], "WayneMcclain@gmail.com", "07/10/2021", "86", "$12,456" ],
    [ "B",     ["Brendle's", "David Marshall"], "Davidmarshall@gmail.com",  "12/10/2021", "82", "$34,523"],
    [ "K",   ["Tech Hifi", "Katia Stapleton"], "Katiastapleton@gmail.com", "14/11/2021", "75", "$63,265"],
    [ "P", ["Packer", "Mae Rankin"], "Maerankingmail.com",  "14/11/2021", "62", "$42,652"],
    [ "L",  ["Lafayette", "Andrew Bivens"], "Andrewbivens@gmail.com",  "15/11/2021", "55", "$52,652" ],
    [ "B",   ["Tech Hifi", "John McLeroy"], "JohnmcLeroy@gmail.com",  "20/11/2021", "53", "$12,523"],
    [ "K",    ["Packer", "Katia Stapleton"], "Katiastapleton@gmail.com", "23/11/2021", "66", "63,523"],
    [ "P", ["Packer", "Mae Rankin"], "Maerankingmail.com",  "14/11/2021", "62", "$42,652"],
    [ "L",  ["Lafayette", "Andrew Bivens"], "Andrewbivens@gmail.com",  "15/11/2021", "55", "$52,652" ],
    [ "B",   ["Tech Hifi", "John McLeroy"], "JohnmcLeroy@gmail.com",  "20/11/2021", "53", "$12,523"],
    [ "K",    ["Packer", "Katia Stapleton"], "Katiastapleton@gmail.com", "23/11/2021", "66", "63,523"],

  ]
}).render(document.getElementById("table-ecommerce-shops"));

