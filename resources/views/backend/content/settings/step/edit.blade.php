@extends('backend.layouts.app')

@section('title', 'Edit Application Step')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 font-weight-bold" style="color: #1e293b;">
                        <i class="fas fa-edit text-primary mr-2"></i>Edit Step #{{ $step->step_num }} — {{ $step->title }}
                    </h5>
                    <a href="{{ route('admin.setting.step') }}" class="btn btn-sm btn-secondary" style="border-radius: 6px;">
                        <i class="fas fa-arrow-left mr-1"></i> Back to List
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.step.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $step->id }}">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Step Number <span class="text-danger">*</span></label>
                                    <input type="text" name="step_num" value="{{ $step->step_num }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Step Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $step->title }}" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Row Position <span class="text-danger">*</span></label>
                            <select class="form-control" name="row_position" required>
                                <option value="1" @if ($step->row_position == 1) selected @endif>Row 1 (Icon Top, Steps 01–05 Left-to-Right)</option>
                                <option value="2" @if ($step->row_position == 2) selected @endif>Row 2 (Card Top, Steps 06–10 Right-to-Left)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">FontAwesome Icon Class <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white" id="iconPreview">
                                        <i class="{{ $step->icon }} text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="icon" id="iconInput" class="form-control"
                                       value="{{ $step->icon }}" required>
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

                        <div class="form-group mb-3">
                            <label class="font-weight-600 text-dark">Icon Background Gradient</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text p-1 bg-white" style="width: 42px; display: flex; align-items: center; justify-content: center;">
                                        <span id="gradPreview" style="width: 24px; height: 24px; border-radius: 50%; display: inline-block; background: {{ $step->color_gradient ?: 'linear-gradient(135deg,#e07a5f,#f4a261)' }};"></span>
                                    </span>
                                </div>
                                <input type="text" name="color_gradient" id="gradInput" class="form-control"
                                       value="{{ $step->color_gradient }}">
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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Sort Order</label>
                                    <input type="number" name="order" class="form-control" value="{{ $step->order }}" min="0">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="font-weight-600 text-dark">Status</label>
                                    <select class="form-control" name="is_active">
                                        <option value="1" @if ($step->is_active == 1) selected @endif>Active</option>
                                        <option value="0" @if ($step->is_active == 0) selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('admin.setting.step') }}" class="btn btn-light border px-4 font-weight-bold" style="border-radius: 8px;">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4 font-weight-bold" style="border-radius: 8px;">
                                <i class="fas fa-check-circle mr-1"></i> Update Application Step
                            </button>
                        </div>
                    </form>
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
