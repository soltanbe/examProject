@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Height</th>
                                <th>Mass</th>
                                <th>Hair color</th>
                                <th>Skin color</th>
                                <th>Eye color</th>
                                <th>Birth year</th>
                                <th>Created</th>
                                <th>Edited</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {

            var table=$('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": {
                    method:'GET',
                    url:'getPeopleList'
                },
                "drawCallback": function(settings, json) {

                    $('.people_click').on('click',function () {

                        $.ajax({
                            url: "deletePeopleFromList",
                            data:{
                              id:$(this).attr('people_id')
                            }
                        }).done(function() {
                            table.ajax.reload();
                        });
                    })
                }
            } );
        });
    </script>
@endsection