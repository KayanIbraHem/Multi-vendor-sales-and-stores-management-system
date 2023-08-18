@php
    $alerts = [
        'success' => ['color' => 'success', 'icon' => 'fas fa-thumbs-up'],
        'status'  => ['color' => 'success', 'icon' => 'fas fa-thumbs-up'],
        'failed'  => ['color' => 'danger', 'icon' => 'fas fa-thumbs-down'],
        'info'    => ['color' => 'info', 'icon' => 'fas fa-info-circle'],
        'warning' => ['color' => 'warning', 'icon' => 'fas fa-warning'],
    ];
@endphp

@foreach ($alerts as $alert_type => $info)
    @if (session()->has($alert_type))
        <div class="alert alert-{{ $info['color'] }} alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <span class="alert-icon"><i class="{{ $info['icon'] }}"></i></span>
                </div>
                <div>
                    <div class="text-muted">{!! session()->get($alert_type) !!}</div>
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endif
@endforeach
