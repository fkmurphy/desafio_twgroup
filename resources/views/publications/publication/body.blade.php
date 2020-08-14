<div class="card-body">
    <h5 class="card-title"> {{ $pub->title }}</h5>
    <p class="card-text">{{ $pub->content }}</p>
    @if(isset($canComment) && !$canComment) 
        <small>{{ __('publications.already_commented') }}</small> 
    @endif
</div>
