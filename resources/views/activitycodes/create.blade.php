ss
@extends('layouts.main')

@section('content')

<div class="page-content">


    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">اضافة كود نشاط ضريبى</div>


    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-2">


        <div class="col-md-9">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">


                    <form class="row g-3" method="post" action="{{ route('storeactivitycode') }}"
                        @method('post')
                        @csrf



                        <div class="col-md-6">
                            <label for="inputFirstName" class="form-label">كود النشاط</label>
                            <input type="text" required class="form-control" id="inputFirstName" name="code">
                        </div>


                        <div class="col-md-6">
                            <label for="inputLastName" class="form-label">وصف كود النشاط</label>
                            <input type="text" class="form-control" id="inputLastName" name="Desc_ar" required>
                        </div>




                        <div class="col-12">
                            <button type="submit" id="submit" class="btn btn-primary px-5">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


</div>

@endsection

@push('js')
<script>
    $("#gpc-button").on('click', function () {

        var code = $("#gpc-input").val();

        $.ajax({

            type: 'POST',
            url: '{{ route("getcategory")}}',

            data: {
                "_token": "{{ csrf_token() }}",
                "code": code,
              },

            success: function(data) {



                if (!$.trim(data)){

                    $("#category-title").text('No Category');

                    $("#gpc-input").css('border-color', 'red');

                    $("#submit").attr("disabled", "disabled").button('refresh');


                }
                else{

                    $("#category-title").text(data['title']);
                    $("#category-excludes").text(data['excludes']);
                    $("#category-includes").text(data['includes']);
                    $("#gpc-input").css('border-color', 'green');
                    $("#submit").removeAttr("disabled").button('refresh');


                }



            },

            error : function(err) {

                console.log(err.responseText);
            },
        });
    });

</script>

@endpush
