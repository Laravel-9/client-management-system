@if (session('success'))
    <div class="alert alert-success" role="alert" id="display_none">
        {{ session('success') }}
    </div>

@elseif (session('error'))
    <div class="alert alert-error" role="alert" id="display_none">
        {{ session('error') }}
    </div>

@elseif (session('info'))
    <div class="alert alert-info" role="alert" id="display_none">
        {{ session('info') }}
    </div>

@elseif (session('warning'))
    <div class="alert alert-warning" role="alert" id="display_none">
        {{ session('warning') }}
    </div>
@else
    <div class="alert alert-warning" role="alert" id="display_none" style="display: none">
        
    </div>
@endif

@section('script')
    <script>
        window.onload = function () {
            setTimeout(function() {
                document.getElementById("display_none").style.display = "none";
            }, 3000);
        }
    </script>
@endsection