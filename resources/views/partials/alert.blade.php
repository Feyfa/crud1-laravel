@if (session()->has('flash'))
    <div class="alert-{{ session('flash')['status'] }} shadow-lg text-white fixed top-0 left-0 right-0 text-xl py-3 px-5 flex justify-between items-center">
        <p>{{ session('flash')['message'] }}</p>
        <span class="silang-alert cursor-pointer">x</span>
    </div>

    <script>
    $(document).ready(function () {
        setTimeout(() => {
            $('.silang-alert').parent().remove('flex');
            $('.silang-alert').parent().addClass('hidden');
        }, 3000);
        $('.silang-alert').click(function (e) { 
            $(this).parent().remove('flex');
            $(this).parent().addClass('hidden');
        });
    });
    </script>
@endif
