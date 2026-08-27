@extends('backend.layouts.app')

@section('title', 'Home Service Cards Settings')

@section('content')
    <div class="row">
        <!-- Section Header & Side Image Settings -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-sliders-h text-primary mr-2"></i>Service Section General Settings
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.svc_section.header') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Section Title</label>
                                    <input type="text" name="svc_section_title" class="form-control"
                                           value="{{ get_setting('svc_section_title', 'OUR SERVICES') }}" placeholder="e.g. OUR SERVICES">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Button Text</label>
                                    <input type="text" name="svc_section_btn_text" class="form-control"
                                           value="{{ get_setting('svc_section_btn_text', 'VIEW SERVICES') }}" placeholder="e.g. VIEW SERVICES">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Button Link</label>
                                    <input type="text" name="svc_section_btn_link" class="form-control"
                                           value="{{ get_setting('svc_section_btn_link', '#') }}" placeholder="e.g. /service or #">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Right Side Photo</label>
                                    @if(get_setting('svc_section_image'))
                                        <div class="mb-2">
                                            <img src="{{ asset('/setting/banner/' . get_setting('svc_section_image')) }}"
                                                 alt="Service Side Photo"
                                                 style="max-width: 150px; max-height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid #cbd5e1;">
                                        </div>
                                    @endif
                                    <input type="file" name="svc_section_image" class="form-control-file border p-2 rounded" style="width: 100%;">
                                    <small class="text-muted">Upload replacement photo for the right side column (Recommended size: 600x600 or higher)</small>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-secondary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-save mr-1"></i> Update Section Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add New Service Card Form -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-plus-circle text-primary mr-2"></i>Add New Service Card
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.svc_section.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. INTERACTIVE STUDENT CONSULTATION" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">FontAwesome Icon Class <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white" id="iconPreview">
                                                <i class="fa-regular fa-lightbulb text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="icon" id="iconInput" class="form-control"
                                               value="fa-regular fa-lightbulb" placeholder="e.g. fa-solid fa-passport" required>
                                    </div>
                                    <small class="text-muted">
                                        Presets:
                                        <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-lightbulb')">Lightbulb</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-passport')">Passport</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-file-circle-check')">File Check</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-graduation-cap')">Graduation Cap</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-globe')">Globe</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-handshake')">Handshake</a>
                                    </small>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Enter short service description..." required></textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Display Order</label>
                                    <input type="number" name="order" class="form-control" value="0" min="0">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-save mr-1"></i> Save Service Card
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Service Cards Table -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-list text-primary mr-2"></i>All Service Cards ({{ count($services) }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" style="width: 70px;">Icon</th>
                                    <th class="border-top-0" style="width: 250px;">Title</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0" style="width: 80px;">Order</th>
                                    <th class="border-top-0" style="width: 100px;">Status</th>
                                    <th class="border-top-0 text-right" style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $item)
                                    <tr>
                                        <td>
                                            <div style="width: 44px; height: 44px; background: #fee2e2; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #c72027; font-size: 20px;">
                                                <i class="{{ $item->icon }}"></i>
                                            </div>
                                        </td>
                                        <td class="font-weight-bold text-dark">{{ $item->title }}</td>
                                        <td class="text-muted" style="font-size: 13.5px;">{{ $item->description }}</td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            @if ($item->is_active == 1)
                                                <span class="badge badge-success px-2 py-1">Active</span>
                                            @else
                                                <span class="badge badge-danger px-2 py-1">Deactive</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.setting.svc_section.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-primary mr-1"
                                               style="border-radius: 6px;" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.setting.svc_section.destroy', $item->id) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this service card?');"
                                               style="border-radius: 6px;" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">No service cards found. Add one above.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setIcon(iconClass) {
            document.getElementById('iconInput').value = iconClass;
            document.getElementById('iconPreview').innerHTML = '<i class="' + iconClass + ' text-primary"></i>';
        }

        document.getElementById('iconInput').addEventListener('input', function() {
            var val = this.value.trim();
            if(val) {
                document.getElementById('iconPreview').innerHTML = '<i class="' + val + ' text-primary"></i>';
            }
        });
    </script>
@endsection
