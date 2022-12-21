@extends('layouts.main')

@section('content')

<div class="page-content">


    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">@lang("site.settings")</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang("site.apisetting")</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('setting.index') }}" class="btn btn-outline-success px-5 radius-30">
                    <i class="bx bx-message-square-edit mr-1"></i>@lang('site.back') </a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-2">


        <div class="col-md-9">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">تعديل كود النشاط الضريبى</h5>
                    </div>
                    <hr>

                    <form class="row g-3" method="post" action="{{ route('updateactivitycode', $activitycode->id) }}">
                        @csrf
                         @method('PUT')

                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">كود النشاط</label>
                            <input type="text" required class="form-control" id="inputEmail" name="code"
                                value="{{ $activitycode->code }}">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">وصف كود النشاط</label>
                            <input type="text" required class="form-control" id="inputEmail" name="Desc_ar"
                                value="{{$activitycode->Desc_ar }}">
                        </div>




                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">@lang('site.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


</div>

@endsection
