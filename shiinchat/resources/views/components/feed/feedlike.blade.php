@if (session('error'))
    <div id="alertLike-{{ $blog->id }}" class="alert alert-danger">{{ session('error') }}</div>
@endif

<p class="text-light">{{ count($blog->likes) }} likes</p>
<form action="{{ route('likes.store', $blog) }}" method="POST">
    @csrf
    @php
        $userId = auth()->user()->id;
        $like = $blog->likes->where('user_id', $userId)->first();
    @endphp
    <button type="submit" class="btn btn-primary btn-sm">
        <i onclick="myFunction(this)" class="fa {{ $like ? 'fa-thumbs-down' : 'fa-thumbs-up' }}"></i>
    </button>
</form>
















<script>
$(document).ready(function () {
    // get the alert element
    const alertEl = document.getElementById('alertLike-{{ $blog->id }}');

    if (alertEl) {
        // add transition to the alert
        alertEl.style.transition = 'opacity 0.5s ease-in-out';

        // set timeout to remove the alert after 2 seconds
        setTimeout(() => {
            alertEl.style.opacity = '0';
            setTimeout(() => {
                alertEl.remove();
            }, 500);
        }, 1000);
    }
});

function myFunction(x) {
    x.classList.toggle("fa-thumbs-down");
}
</script>
