@extends('admin.layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

@endsection
@section('content')

    <section class="section is-title-bar">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <ul>
                        <li>Admin</li>
                        <li>Customers</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="hero is-hero-bar">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item"><h1 class="title">
                            Customers
                        </h1>

                    </div>

                </div>
            </div>

            <br>
            <a class="button is-small is-primary" href="{{ route('admin.customers.create') }}">
                Create New Customer
            </a>

        </div>
    </section>

    <section class="section is-main-section">
        <div class="card">

            <div class="card-content">
                <div class="b-table has-pagination">

                    <form id="customer-form">

                        <button type="submit" class="button is-small is-danger mb-2">
                            Delete Selected Customers
                        </button>
                        <br>
                        <p class="help">*Select the customer you want to delete and click the delete button below</p>
                        <br>

                        <div class="table-wrapper has-mobile-cards">
                            <table class="table is-fullwidth is-striped is-hoverable is-sortable is-fullwidth" id="example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.customers') }}",
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'full_name', name: 'full_name'},
                    {data: 'email', name: 'email'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        function deleteRecord(id) {
                var customers = [];
                customers.push(id);

                customersDelete(customers);
        }

        // Delete customers
        $('#customer-form').submit(function (e) {

            e.preventDefault()

            var customers = [];
            $.each($("input[name='customer']:checked"), function(){
                customers.push($(this).val());
            });

            customersDelete(customers);

        });

        function customersDelete(customers){
            // delete records
            $.ajax({
                url: 'delete/customers',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "customers": customers,
                },
                success: function (response) {
                    $('#example').DataTable().draw();
                }
            });
        }

        function changeStatus(id){
            // delete records
            $.ajax({
                url: 'customer/change/status/' + id,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    // change only that  column value in datatable
                    $('#example').DataTable().draw();
                }
            });
        }

    </script>

@endsection
