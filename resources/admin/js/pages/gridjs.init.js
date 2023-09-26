/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: grid Js File
*/

// Basic Table
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    pagination: {
        limit: 5
    },
    sort: true,
    search: true,
    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-gridjs"));

// pagination Table
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    pagination: {
        limit: 5
    },

    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-pagination"));

// search Table
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    pagination: {
        limit: 5
    },
    search: true,
    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-search"));

// Sorting Table
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    pagination: {
        limit: 5
    },
    sort: true,
    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-sorting"));


// Loading State Table
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    pagination: {
        limit: 5
    },
    sort: true,
    data: function() {
        return new Promise(function(resolve) {
        setTimeout(function() {
            resolve([
                ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
                ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
                ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
                ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
                ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
                ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
                ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
                ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
                ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
                ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"]
            ])}, 2000);
        });
    }
}).render(document.getElementById("table-loading-state"));


// Fixed Header
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", "Country"],
    sort: true,
    pagination: true,
    fixedHeader: true,
    height: '400px',
    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-fixed-header"));


// Hidden Columns
new gridjs.Grid({
    columns: ["Name", "Email", "Position", "Company", 
    { 
        name: 'Country',
        hidden: true
    },],
    pagination: {
        limit: 5
    },
    sort: true,
    data: [
        ["Jonathan", "jonathan@example.com", "Senior Implementation Architect", "Hauck Inc", "Holy See"],
        ["Harold", "harold@example.com", "Forward Creative Coordinator", "Metz Inc", "Iran"],
        ["Shannon", "shannon@example.com", "Legacy Functionality Associate", "Zemlak Group", "South Georgia"],
        ["Robert", "robert@example.com", "Product Accounts Technician", "Hoeger", "San Marino"],
        ["Noel", "noel@example.com", "Customer Data Director", "Howell - Rippin", "Germany"],
        ["Traci", "traci@example.com", "Corporate Identity Director", "Koelpin - Goldner", "Vanuatu"],
        ["Kerry", "kerry@example.com", "Lead Applications Associate", "Feeney, Langworth and Tremblay", "Niger"],
        ["Patsy", "patsy@example.com", "Dynamic Assurance Director", "Streich Group", "Niue"],
        ["Cathy", "cathy@example.com", "Customer Data Director", "Ebert, Schamberger and Johnston", "Mexico"],
        ["Tyrone", "tyrone@example.com", "Senior Response Liaison", "Raynor, Rolfson and Daugherty", "Qatar"],
    ]
}).render(document.getElementById("table-hidden-column"));
