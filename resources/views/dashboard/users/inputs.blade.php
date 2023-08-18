<div class="card-body">
    @csrf
    <div class="form-group">
        <label class="form-label required">User Name</label>
        <div class="input-icon mb-3">
            <input type="text" value="{{ $row->name ?? '' }}" name="name" class="form-control"
                placeholder="Username..." autofocus>
            <span class="input-icon-addon"> <i class="fas fa-user"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'name'])
    </div>
    <div class="form-group">
        <label class="form-label required">Email</label>
        <div class="input-icon mb-3">
            <input type="email" value="{{ $row->email ?? '' }}" name="email" class="form-control"
                placeholder="Email...">
            <span class="input-icon-addon"> <i class="fas fa-envelope"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'email'])
    </div>
    <div class="form-group">
        <label class="form-label required">Password</label>
        <div class="input-icon mb-3">
            <input type="password" value="" name="password" class="form-control" placeholder="Password...">
            <span class="input-icon-addon"> <i class="fas fa-lock"></i> </span>
        </div>
        @include('layouts.includes.dashboard.validation-error', ['input' => 'password'])
    </div>
</div>

<div class="card-footer text-center">
    <button type="submit" class="btn btn-info btn-sm"> حفظ <i class="fas fa-save mx-2"></i> </button>
</div>
