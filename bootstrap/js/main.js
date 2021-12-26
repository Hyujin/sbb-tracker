var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    var siteEditor = new $.fn.dataTable.Editor( {
        ajax: '../php/sitesNested.php',
        fields: [ {
                label: 'City:',
                name: 'name'
            }, {
                label: 'Continent:',
                name: 'continent',
                type: 'datatable',
                options: [
                    { label: 'Africa', value: 'Africa' },
                    { label: 'Asia', value: 'Asia' },
                    { label: 'Australia', value: 'Australia' },
                    { label: 'Europe', value: 'Europe' },
                    { label: 'North America', value: 'North America' },
                    { label: 'South America', value: 'South America' }
                ]
            }
        ]
    } );
 
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/joinNested.php",
        table: "#example",
        fields: [ {
                label: "First name:",
                name: "users.first_name"
            }, {
                label: "Last name:",
                name: "users.last_name"
            }, {
                label: "Phone #:",
                name: "users.phone"
            }, {
                label: 'Site:',
                name: 'users.site',
                type: 'datatable',
                editor: siteEditor,
                optionsPair: {
                    value: 'id',
                },
                config: {
                    ajax: '../php/sitesNested.php',
                    buttons: [
                        { extend: 'create', className: 'btn-light', editor: siteEditor },
                        { extend: 'edit',   className: 'btn-light', editor: siteEditor },
                        { extend: 'remove', className: 'btn-light', editor: siteEditor }
                    ],
                    columns: [
                        {
                            title: 'Name',
                            data: 'name'
                        },
                        {
                            title: 'Continent',
                            data: 'continent'
                        }
                    ]
                }
            }
        ]
    } );
 
    var table = $('#example').DataTable( {
        lengthChange: false,
        ajax: {
            url: "../php/joinNested.php",
            type: 'POST'
        },
        columns: [
            { data: "users.first_name" },
            { data: "users.last_name" },
            { data: "users.phone" },
            { data: "sites.name" }
        ],
        select: true
    } );
 
    // Display the buttons
    new $.fn.dataTable.Buttons( table, [
        { extend: "create", editor: editor },
        { extend: "edit",   editor: editor },
        { extend: "remove", editor: editor }
    ] );
 
    table.buttons().container()
        .appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
} );