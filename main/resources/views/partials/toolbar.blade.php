{{-- Velss-style top toolbar: phone (left), email (right). Desktop only. --}}
<div class="toolbar-top-area">
    <div class="auto-container">
        <div class="toolbar-inner">
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', setting('phone')) }}"><i class="fas fa-phone-alt"></i><span>Call Us {{ setting('phone_display', setting('phone')) }}</span></a>
            <a href="mailto:{{ setting('email') }}"><i class="far fa-envelope"></i><span>{{ setting('email') }}</span></a>
        </div>
    </div>
</div>
