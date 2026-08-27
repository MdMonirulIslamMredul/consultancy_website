@extends('backend.layouts.app')

@section('title', 'Application Steps Settings')

@section('content')
    <div class="row">
        <!-- Section Heading Settings -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-heading text-primary mr-2"></i>Section Heading Settings
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.step.heading') }}" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-9">
                                <div class="form-group mb-md-0">
                                    <label class="font-weight-600 text-dark">Section Heading (HTML Supported for colored span)</label>
                                    <input type="text" name="steps_section_heading" class="form-control"
                                           value="{{ get_setting('steps_section_heading', 'EASY STEPS TO <span>APPLY</span>') }}" required>
                                    <small class="text-muted">Example: <code>EASY STEPS TO &lt;span&gt;APPLY&lt;/span&gt;</code></small>
                                </div>
                            </div>
                            <div class="col-md-3 text-right">
                                <button type="submit" class="btn btn-secondary px-4 font-weight-bold" style="border-radius: 8px;">
                                    <i class="fas fa-save mr-1"></i> Update Heading
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Add New Application Step Form -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-plus-circle text-primary mr-2"></i>Add New Application Step
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.step.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Step Number <span class="text-danger">*</span></label>
                                    <input type="text" name="step_num" class="form-control" placeholder="e.g. 01, 02, 10" required>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Step Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="e.g. SELECT A COURSE" required>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Row Position <span class="text-danger">*</span></label>
                                    <select class="form-control" name="row_position" required>
                                        <option value="1">Row 1 (Icon Top, Steps 01–05 Left-to-Right)</option>
                                        <option value="2">Row 2 (Card Top, Steps 06–10 Right-to-Left)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">FontAwesome Icon Class <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white" id="iconPreview">
                                                <i class="fa-regular fa-file-lines text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="icon" id="iconInput" class="form-control"
                                               value="fa-regular fa-file-lines" placeholder="e.g. fa-regular fa-file-lines" required>
                                    </div>
                                    <small class="text-muted">
                                        Presets:
                                        <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-file-lines')">File</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-hand-pointer')">Pointer</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-file-alt')">Alt File</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-envelope-open')">Envelope</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-receipt')">Receipt</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-hand-holding-heart')">Heart</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-stethoscope')">Stethoscope</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-regular fa-folder-open')">Folder</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-fingerprint')">Fingerprint</a> |
                                        <a href="javascript:void(0)" onclick="setIcon('fa-solid fa-stamp')">Stamp</a>
                                    </small>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Icon Background Gradient</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text p-1 bg-white" style="width: 42px; display: flex; align-items: center; justify-content: center;">
                                                <span id="gradPreview" style="width: 24px; height: 24px; border-radius: 50%; display: inline-block; background: linear-gradient(135deg,#e07a5f,#f4a261);"></span>
                                            </span>
                                        </div>
                                        <input type="text" name="color_gradient" id="gradInput" class="form-control"
                                               value="linear-gradient(135deg,#e07a5f,#f4a261)" placeholder="e.g. linear-gradient(135deg,#e07a5f,#f4a261)">
                                    </div>
                                    <small class="text-muted">
                                        Palette Presets:
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#e07a5f,#f4a261)')">Orange</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#6c757d,#adb5bd)')">Gray</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#e63946,#f4845f)')">Coral</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#9b2335,#c0392b)')">Red</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#165b65,#1e8a98)')">Teal</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#7b2d8b,#ab47bc)')">Purple</a> |
                                        <a href="javascript:void(0)" onclick="setGrad('linear-gradient(135deg,#8bc34a,#558b2f)')">Green</a>
                                    </small>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Sort Order</label>
                                    <input type="number" name="order" class="form-control" value="0" min="0">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
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
                                <i class="fas fa-save mr-1"></i> Save Application Step
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Steps Table -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-list text-primary mr-2"></i>All Application Steps ({{ count($steps) }})
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0" style="width: 70px;">Step #</th>
                                    <th class="border-top-0" style="width: 70px;">Icon</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0" style="width: 140px;">Row</th>
                                    <th class="border-top-0" style="width: 80px;">Order</th>
                                    <th class="border-top-0" style="width: 100px;">Status</th>
                                    <th class="border-top-0 text-right" style="width: 150px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($steps as $item)
                                    <tr>
                                        <td>
                                            <span class="badge badge-secondary font-weight-bold" style="font-size: 14px; padding: 6px 10px;">
                                                {{ $item->step_num }}
                                            </span>
                                        </td>
                                        <td>
                                            <div style="width: 44px; height: 44px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 18px; background: {{ $item->color_gradient ?: '#e07a5f' }}; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
                                                <i class="{{ $item->icon }}"></i>
                                            </div>
                                        </td>
                                        <td class="font-weight-bold text-dark">{{ $item->title }}</td>
                                        <td>
                                            @if ($item->row_position == 1)
                                                <span class="badge badge-info px-2 py-1">Row 1 (01–05)</span>
                                            @else
                                                <span class="badge badge-warning px-2 py-1 text-dark">Row 2 (06–10)</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->order }}</td>
                                        <td>
                                            @if ($item->is_active == 1)
                                                <span class="badge badge-success px-2 py-1">Active</span>
                                            @else
                                                <span class="badge badge-danger px-2 py-1">Deactive</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.setting.step.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-primary mr-1"
                                               style="border-radius: 6px;" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('admin.setting.step.destroy', $item->id) }}"
                                               class="btn btn-sm btn-outline-danger"
                                               onclick="return confirm('Are you sure you want to delete this step?');"
                                               style="border-radius: 6px;" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">No steps found. Add one above.</td>
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

        function setGrad(grad) {
            document.getElementById('gradInput').value = grad;
            document.getElementById('gradPreview').style.background = grad;
        }

        document.getElementById('gradInput').addEventListener('input', function() {
            var val = this.value.trim();
            if(val) {
                document.getElementById('gradPreview').style.background = val;
            }
        });
    </script>
@endsection
