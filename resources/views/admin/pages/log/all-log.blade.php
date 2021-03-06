@include('admin.layouts.header')
@include('admin.layouts.navbar')
@include('admin.layouts.sidebar')


<div class="content-wrapper">
    <nav aria-label="breadcrumb" class="m-3">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin"> <img src="{{ asset('icons/dashboard.png') }}" alt="dashboard-icon">&nbsp; Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"> <i class="fas fa-history"></i> &nbsp;Logs</li>
        </ol>
      </nav>
    <div class="m-3">
        <div class="table-responsive">
            <table class="table table-striped table-bordered mr-3" id="table" style="width:100%">
                <thead>
                    <tr class="">
                        <th class="font-weignt-bold">Id</th>
                        <th class="font-weignt-bold">Table Name</th>
                        <th class="font-weignt-bold">description</th>
                        <th class="font-weignt-bold">Subject</th>
                        <th class="font-weignt-bold">User Email</th>
                        <th class="font-weignt-bold">Properties</th>
                        <th class="font-weignt-bold">Time</th>
                        <th class="font-weignt-bold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loges as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->log_name }}</td>
                        <td> {{ $item->description }} </td>
                        <td> {{ $item->subject_id }} </td>
                        <td> {{ $item->causer->email }} </td>
                        <td> {{ $item->properties  ?? ''}} </td>
                        <td> {{ $item->created_at }} </td>
                       <td> <button type="btn" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Table Name</th>
                        <th>description</th>
                        <th>Subject</th>
                        <th>User Email</th>
                        <th>Properties</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            </div>
    </div>
</div>


@include('admin.layouts.footer')

<script>
$(document).ready(function() {
    // $('#table').DataTable();

  $('#table').DataTable({
    "columnDefs": [
        { "searchable": false, "targets": 7 },
        { "orderable": false, "targets": 7}
    ]
   });
} );

</script>