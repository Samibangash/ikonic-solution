@extends('layouts.app',['page_title' => 'dashboard'])
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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">User</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="" class="text-muted text-hover-primary">User</a>
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
                            <span class="card-label fw-bold fs-3 mb-1">User</span>
                            <span class="text-muted mt-1 fw-semibold fs-7"></span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_2">Add User</a>
                            <!--end::Menu-->
                        </div>
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
                                    <th class=" min-w-125px rounded-start">Name</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-200px text-center rounded-end">Action</th>
                                </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>
                                @foreach($user as $data)
                                    <tr>
                                        <td>
                                            <a href="#" data-user-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 ps-4 edit-user">{{ $data->id ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" data-user-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->name ?? '' }}</a>
                                        </td>
                                        <td>
                                            <a href="#" data-user-id="{{  $data->id }}" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6 edit-user">{{ $data->email ?? '' }}</a>
                                        </td>
                                        <td>
                                            @if($data->status == 1)
                                                <span class="badge badge-light-primary">Active</span>
                                            @else
                                                <span class="badge badge-light-danger">Inactive</span>
                                            @endif


                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-user-id="{{  $data->id }}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 me-2 delete-user">Delete</a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modalEdit" data-user-id="{{  $data->id }}" class="btn btn-bg-light btn-color-muted btn-active-color-primary btn-sm px-4 edit-user">Edit</a>
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

    <!--begin::Modal -User- add-->
    <div class="modal fade" id="kt_modal_2" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" method="Post"  action="{{ route('user.store') }}">
                    @csrf
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add User</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">


                            <div class="row g-9 mb-7">
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2"> Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" id="name" required placeholder="Name" name="name"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">
                                        <span class="required" > Email</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid" id="email" required placeholder=" Email" name="email"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">
                                        <span class="required" > Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="User Password"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-solid" id="password" required placeholder="Email" name="password"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <label class="form-check-label status_name mb-4" for="flexSwitchChecked">
                                        Status
                                    </label>
                                    <div class="form-check form-switch form-check-custom form-check-solid ">
                                        <input class="form-check-input doctor_active btn_status" type="checkbox" value="1" name="active" id="flexSwitchChecked" checked="checked" />

                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>


                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">OK</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - User - add-->
    <!--begin::Modal -User- Edit-->
    <div class="modal fade" id="kt_modalEdit" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Form-->
                <form class="form" method="Post" onsubmit="return setAction(this)">
                    @csrf
                    @method('PUT')
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Add User</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">


                            <div class="row g-9 mb-7">
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2"> Name</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid name" id="name" required placeholder="Name" name="name"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">
                                        <span class="required" > Email</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-solid email" id="email" required placeholder=" Email" name="email"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-semibold mb-2">
                                        <span class="required" > Password</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="User Password"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-solid" id="password" required placeholder="Email" name="password"  />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="col-md-6 fv-row mb-7">
                                    <label class="form-check-label status_name mb-4" for="flexSwitchChecked">
                                        Status
                                    </label>
                                    <div class="form-check form-switch form-check-custom form-check-solid ">
                                        <input class="form-check-input user_status btn_status" type="checkbox" value="1" name="active" id="flexSwitchChecked" checked="checked" />

                                    </div>
                                </div>
                                <!--end::Input group-->
                            </div>


                        </div>
                        <!--end::Scroll-->
                    </div>
                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="reset" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>
                        <!--end::Button-->
                        <input type="hidden" id="user_id" name="user_id" value="">
                        <!--begin::Button-->
                        <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary">
                            <span class="indicator-label">OK</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->
                </form>
                <!--end::Form-->
            </div>
        </div>
    </div>
    <!--end::Modal - User - Edit-->
@endsection

@push('vendor-styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('vendor-scripts')
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>

@endpush

@push('scripts')
    <script type="text/javascript">

        function setAction(form) {

            const userID = $('#user_id').val();
            form.action = "{{ route('user.update',['user' => ':userID']) }}".replace(':userID' , userID);
            return true;
        }

        $("#kt_user_table").on('click', '.edit-user', function () {
            const userID = $(this).attr("data-user-id");
            const method = 'get';
            const url = "{{ route('user.edit',['user' => ':userID']) }}".replace(':userID', userID);
            const headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            const data = {};
            $.ajax({ method, url, headers, data, dataType: 'json',
                success: function (data) {

                $("#user_id").val(data.id);
                $(".name").val(data.name);
                $(".email").val(data.email);
                    (data.status === 1)
                        ? $(".user_status").prop('checked', true)
                        : $(".user_status").prop('checked', false);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });



        $("#kt_user_table").on('click', '.delete-user', function () {
            const userID = $(this).attr("data-user-id");
            const method = 'get';
            const url = "{{ route('user.delete',['user' => ':userID']) }}".replace(':userID', userID);
            const headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
            const data = {};

            $.ajax({
                method,
                url,
                headers,
                data,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if (data.success === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'User Deleted',
                            text: 'The user has been successfully deleted.',
                        }).then((result) => {
                            if (result.isConfirmed || result.isDismissed) {
                                window.location.reload(true);
                            }
                        });
                    }
                },

                error: function (data) {
                    console.log(data);
                }
            });
        });
    </script>
    <x-flash :type="session()->get('type')" :title="session()->get('title')" :message="session()->get('message')" />
@endpush
