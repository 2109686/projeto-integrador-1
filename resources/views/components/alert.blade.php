<div class="alert alert-danger">
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    @if ($errors->any)
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
</div>
