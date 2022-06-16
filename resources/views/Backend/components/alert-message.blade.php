<div class="toast position-fixed align-items-center text-white {{ Session::get('backgroundAlertMessage') ?? ' ' }} border-0 top-0 end-0 "
    role="alert" data-bs-delay="3000" aria-live="assertive" aria-atomic="true"
    style="z-index: 9785697856978 !important; top:20px !important; right:10px !important;width: max-content;">
    <div class="d-flex ">
        <div class="toast-body">
            {{ Session::has('alertMessage') ? Session::get('alertMessage') : '' }}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
    </div>
</div>

@if (Session::has('alertMessage'))
    @push('script')
        <script>
            let myAlert = document.querySelector('.toast');
            let bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();
            console.log(bsAlert, myAlert);
        </script>
    @endpush
@endif
@push('script')
    <script>
        window.addEventListener('showMessage', function(e) {
            let myAlert = document.querySelector('.toast');
            let toastBody = document.querySelector('.toast-body');

            let bsAlert = new bootstrap.Toast(myAlert);
            bsAlert.show();

            myAlert.classList.add(e.detail.backgroundAlertMessage)

            toastBody.textContent = e.detail.alertMessage;
        });
    </script>
@endpush
