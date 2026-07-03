@extends('template_admin')
@section('content')

<script>
    model.masterModel = {
        id:"",
        bus_code: "",
        plate_number: "",
        capacity: "",
        status: "",
        SELECTFILTERVALUE: [
            { name: "bus_code", value: "bus_code" },
                { name: "plate_number", value: "plate_number" },
                { name: "capacity", value: "capacity" },
                { name: "status", value: "status" },
        ],
        MODE: "",
    };

    var buses = {
        Recordbuses: ko.mapping.fromJS(model.masterModel),
        Listbuses: ko.observableArray([]),
        Mode: ko.observable(""),
        status: ko.observable("Nothing"),
        FilterText: ko.observable(""),
        DataFilter: ko.observableArray(["bus_code", "plate_number", "capacity", "status"]),
        FilterValue: ko.observable("bus_code"),
        roleLists : ko.observableArray([]),
    };

    buses.back = function(tab){
        buses.Mode("");
        buses.grid.ajax.reload(null, true);
        ko.mapping.fromJS(model.masterModel, buses.Recordbuses);
        model.activetab(tab);
    };
    
    buses.selectdata = function(id){
        model.Processing(true);
        buses.back(0);
        buses.Mode("Update");
    
        $.get(model.role+"/buses/GetDataSelect", { id: id }, function(res){
            ko.mapping.fromJS(res, {}, buses.Recordbuses);
            model.Processing(false);
        }).fail(function(){
            model.Processing(false);
            alert("Gagal mengambil data");
        });
    };

    buses.save = function () {
    
        var val = ko.toJS(buses.Recordbuses); // penting jika pakai Knockout
    
        if (buses.Mode() === "Update") {
            // other logic on mode Update
        }
    
        var url = buses.Mode() === "Update"
            ? "/buses/update"
            : "/buses/insert";
    
        $.ajax({
            url: model.role+url,
            type: "POST",
            data: val,
            success: function (res) {
                buses.back(1);
            }
        });
    
    };
    
    buses.remove = function(id){
        if(!confirm("Yakin hapus data?")) return;

        $.ajax({
            url: model.role+"/buses/delete",
            method: "DELETE",
            data: { id: id },
            success: function(res){
                buses.back(1);
            }
        });
    };
</script>

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="card">
        <div class="card-body" data-bind="with: buses">

            <ul class="nav nav-tabs customtab" id="tabnavform" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="form-tab" data-bs-toggle="tab" data-bs-target="#tabform">Form</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="listdata-tab" data-bs-toggle="tab" data-bs-target="#tablist">List</button>
                </li>
            </ul>

            <div class="tab-content mt-3" id="tabnavform-content">
                <div class="tab-pane fade show active" id="tabform" role="tabpanel">
                
                            <div class="row p-t-23 margMin">
                                <div class="col-md-12 margMin">
                                    <div class="form-group">
                                        
                                        <button
                                            data-bind="click:function(){back(1);}, visible: Mode() == 'Update'"
                                            data-toggle="tooltip" data-placement="top" data-original-title="Kembali"
                                            class="btn btn-sm btn-outline-gray mr-1 mb-1">
                                            <span class="icon">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.3 12.2512L20.25 12.2512" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M11.2998 7.25024L3.3628 12.2512L11.2998 17.2522L11.2998 7.25024Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </button>
                                    
                                        <button data-bind="click:save, data-original-title:Mode" type="submit"
                                            data-toggle="tooltip" data-placement="top" data-original-title="simpan"
                                            class="btn btn-icon btn-outline-secondary mr-1 mb-1">
                                            <span class="icon">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14.7366 2.76175H8.08455C6.00455 2.75375 4.29955 4.41075 4.25055 6.49075V17.3397C4.21555 19.3897 5.84855 21.0807 7.89955 21.1167C7.96055 21.1167 8.02255 21.1167 8.08455 21.1147H16.0726C18.1416 21.0937 19.8056 19.4087 19.8026 17.3397V8.03975L14.7366 2.76175Z"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M14.4741 2.75V5.659C14.4741 7.079 15.6231 8.23 17.0431 8.234H19.7971"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M14.2936 12.9141H9.39355" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M11.8442 15.3639V10.4639" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                            Save
                                        </button>
                                        
                                        <button
                                            data-bind=" click:function(){remove(buses.Recordbuses.id());}, visible: Mode() == 'Update'"
                                            class="btn btn-icon btn-outline-danger mr-1 mb-1">
                                            <!-- <i class="bx bx-trash"></i> -->
                                            <span class="icon">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </span>
                                        </button>
                                        
                                        <button data-bind=" visible: Mode() == 'Update'" type="button"
                                            class="btn btn-icon btn-light mr-1 mb-1">
                                            no :
                                            <i class="bx" data-bind="text: buses.Recordbuses.id()"></i>
                                        </button>
                                        
                                    </div>
                                </div>
                            </div>
                
                    <div class="row" data-bind="with: Recordbuses">
                        <div class="col-md-6">
    <div class="form-group">
        <label>bus_code</label>
        <input type="text" class="form-control" data-bind="value: bus_code">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>plate_number</label>
        <input type="text" class="form-control" data-bind="value: plate_number">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>capacity</label>
        <input type="text" class="form-control" data-bind="value: capacity">
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>status</label>
        <input type="text" class="form-control" data-bind="value: status">
    </div>
</div>
                    </div>
              
                </div>

                <div class="tab-pane fade" id="tablist" role="tabpanel" aria-labelledby="profile-tab">
                   <div class="table-responsive animated fadeIn">
                        <table id="myTable" width="100%" class="table table-striped dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>bus_code</th>
                                    <th>plate_number</th>
                                    <th>capacity</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    // Load roleLists dari Laravel
    buses.loadRoles = function() {
        fetch('/api/roles')
            .then(response => response.json())
            .then(data => {
                buses.roleLists(data);
            })
            .catch(error => {
                console.error('Error loading roleLists:', error);
            });
    };
    
$(document).ready(function(){
    buses.grid = $("#myTable").DataTable({
        paging: true,
        retrieve: true,
        searching: false,
        processing: true,
        serverSide: true,
        ordering: false,
        bLengthChange: false,
        bInfo: true,
        ajax: {
            url: model.role+"/buses/getDataAll",
            type: "POST",
            data: function(d){
                d.filtervalue = buses.FilterValue();
                d.filtertext = buses.FilterText();
                return d;
            },
            dataSrc: function(json){
                json.recordsTotal = json.RecordsTotal;
                json.recordsFiltered = json.RecordsFiltered;
                return json.Data || [];
            }
        },
        columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                { data: "id" },
                { data: "plate_number" },
                { data: "capacity" },
                { data: "status" },
                {
                    data: "id",
                    render: function (data) {
                        return `
                            <button class="btn btn-sm btn-link text-gray pe-0" onclick="buses.selectdata('${data}')">
                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                            </button>
                            <button class="btn btn-sm btn-link text-secondary px-0" onclick="buses.remove('${data}')">
                                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                            </button>
                        `;
                    }
                }
            ]

    });
});
</script>

<style>
/* Default desktop */
div.dataTables_wrapper div.dataTables_paginate {
    display: flex;
    justify-content: flex-end;
}

/* Mobile */
@media (max-width: 768px) {
    div.dataTables_wrapper div.dataTables_paginate {
        justify-content: center;
        margin-top: 10px;
    }

    div.dataTables_wrapper div.dataTables_info {
        text-align: center;
        margin-bottom: 10px;
    }
}

</style>
@endsection
