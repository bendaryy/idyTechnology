@extends('layouts.main')

@section('content')


<div class="page-content">

    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-5">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">اكواد النشاط الضريبى</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('createactivitycode') }}" class="btn btn-outline-success px-5 radius-30">
                        <i class="bx bx-message-square-edit mr-1"></i>إضافة كود جديد</a>

                </div>
            </div>
        </div>

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">


                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                              <th># </th>
                                <th>كود النشاط</th>
                                <th>اسم الكود</th>
                                <th>تعديل</th>
                                <th>مسح</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($activityCodes as $index => $code)

                            <tr>
                                <td>{{ $index + 1}}</td>
                                <td>{{ $code->code}}</td>
                                <td>{{ $code->Desc_ar}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('editactivitycode',$code->id) }}">تعديل</a>
                                </td>
                                <td>
                                    <form action="{{ route('destroyactivitycode',$code->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">مسح</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach


                        </tbody>

                    </table>

            </div>
        </div>
    </div>
</div>



@endsection


@push('js')
<script>
    $("#product-submit").on('click', function () {

        $("#product-form").submit();

    });
</script>
<script src="{{ asset('main/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('main/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
    $(document).ready(function() {
			$('#example').DataTable();
		  } );
</script>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'print']
			} );

			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>



@endpush
