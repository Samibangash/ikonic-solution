@extends('layouts.app',['page_title' => 'Feedback & comments'])
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Feedback & comments</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">Feedback & comments</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">List</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Tables Widget 12-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Feedback & comments</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-3">
                        <!--begin::Table container-->
                        <div class="table-responsive" id="kt_user_table">
                            <!--begin::Table-->
                            <table class="table align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                <tr class="fw-bold text-muted bg-light">
                                    <th class="ps-4 min-w-125px">Id</th>
                                    <th class=" min-w-125px rounded-start">Product Name</th>
                                    <th class="min-w-125px">User Name</th>
                                    <th class="min-w-125px">Title</th>
                                    <th class="min-w-125px">Category</th>
                                    <th class="min-w-200px text-center rounded-end">Vote</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($product_feedback as $data)
                                    <tr>
                                        <td>
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 ps-4 edit-user">{{ $data->id ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->getProduct->name ?? '' }}</a>
                                        </td>

                                        <td>
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->getUser->name ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->title ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">
                                               @if($data->category_id == 1)
                                                    Bug Report
                                                @elseif($data->category_id == 2)
                                                    Feature Request
                                                @elseif($data->category_id == 3)
                                                    Improvement
                                               @endif
                                            </a>

                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-product-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->title ?? '' }}</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
                <!--end::Tables Widget 12-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@push('vendor-styles')
@endpush

@push('vendor-scripts')
@endpush

@push('custom-scripts')

@endpush

@push('scripts')
    <script type="text/javascript">
    </script>
    <x-flash :type="session()->get('type')" :title="session()->get('title')" :message="session()->get('message')" />
@endpush
