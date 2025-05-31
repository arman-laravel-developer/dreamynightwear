@extends('front.master')

@section('title')
{{$generalSettingView->site_name}} - Track My Order
@endsection

@section('body')
    <style>
        .progress {
            height: 20px;
            border-radius: 10px;
        }
        .progress-bar {
            border-radius: 10px;
        }
        .tracking-step {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .tracking-step div {
            text-align: center;
        }
        .tracking-icon {
            font-size: 24px;
            color: #007bff;
        }
        .payment-card {
            margin-top: 20px;
        }
    </style>
    <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Track My Order</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Track My Order</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-right: -6%">
                    <!-- Order Tracking Form -->
                    <div class="card">
                        <div class="card-body">
                            <form id="orderForm" action="{{route('show.track-result')}}" method="GET">
                                <div class="form-group">
                                    <label for="order-id">Order Code</label>
                                    <input type="text" class="form-control" name="order_code" id="order-id" placeholder="xxxxxx-xxxxxx-xxxxx" maxlength="19">
                                    <small id="error-message" style="color: red; display: none;">Order Code must be exactly 17 digits.</small>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Track Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const orderInput = document.getElementById('order-id');
        const form = document.getElementById('orderForm');
        const errorMessage = document.getElementById('error-message');

        orderInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove non-numeric characters

            // Ensure the value doesn't exceed 17 numeric characters
            if (value.length > 17) {
                value = value.slice(0, 17);
            }

            // Insert hyphens after 6 and 12 numeric characters
            if (value.length > 6) {
                value = value.replace(/(\d{6})(\d{1,6})/, '$1-$2');
            }
            if (value.length > 12) {
                value = value.replace(/(\d{6})-(\d{6})(\d{1,5})/, '$1-$2-$3');
            }

            e.target.value = value;
        });

        // Form submission validation
        form.addEventListener('submit', function(e) {
            const inputVal = orderInput.value.replace(/\D/g, ''); // Get numeric value only

            // Check if numeric value is exactly 17 digits
            if (inputVal.length !== 17) {
                e.preventDefault(); // Prevent form submission
                errorMessage.style.display = 'block'; // Show error message
            } else {
                errorMessage.style.display = 'none'; // Hide error message if valid
            }
        });
    </script>

@endsection
