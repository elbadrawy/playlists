@if(Session::has('flash_message'))
    <script>
        swal({
            title: "{{Session::get('flash_message')}}",
            text: "This message will disappear after 2 seconds",
            timer: 2000,
            showConfirmButton: false
        });
    </script>

    {{Session::forget('flash_message')}}

@endif