<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP | Shopee Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .otp-input:focus { border-color: #4f46e5; box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1); }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">

    <header class="bg-white border-b border-gray-200 py-4 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold">S</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-gray-900">Shopee<span class="text-indigo-600">Clone</span></span>
            </div>
            <a href="/help" class="text-sm font-medium text-gray-500 hover:text-indigo-600">Need help?</a>
        </div>
    </header>

    <main class="min-h-[calc(100vh-73px)] flex flex-col items-center justify-center p-6">
        <div class="mb-8 flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-gray-400">
            <span>Register</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="text-indigo-600">Verification</span>
        </div>

        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl shadow-indigo-100/50 border border-gray-100 p-8 md:p-12">
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Two-Step Verification</h1>
                <p class="mt-3 text-gray-500 text-sm leading-relaxed">
                    Enter the 6-digit code sent to your mobile device ending in <span class="font-bold text-gray-800">****7890</span>
                </p>
            </div>

            <form action="{{url('/matchotp')}}" method="POST" class="mt-10">
                @csrf
                <div class="flex justify-between gap-2 mb-8" id="otp-container">
                    @for ($i = 0; $i < 6; $i++)
                        <input type="text" name="otp[]" maxlength="1" 
                            class="otp-field w-full h-14 text-center text-xl font-bold bg-gray-50 border border-gray-200 rounded-xl focus:bg-white outline-none transition-all" 
                            autocomplete="one-time-code" required>
                    @endfor
                </div>

                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-4 rounded-2xl shadow-lg shadow-indigo-200 transition-all transform active:scale-[0.98]">
                    Verify & Proceed
                </button>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500">
                    Didn't receive the code? 
                    <button id="resend-btn" class="font-bold text-indigo-600 hover:underline disabled:text-gray-400 disabled:no-underline">
                        Resend Code <span id="timer"></span>
                    </button>
                </p>
            </div>
        </div>

        <p class="mt-8 text-sm text-gray-400">
            &copy; 2026 Shopee Clone Inc. Secure Verification.
        </p>
    </main>

    <script>
        const fields = document.querySelectorAll('.otp-field');
        
        fields.forEach((field, index) => {
            field.addEventListener('input', (e) => {
                if (e.target.value && index < fields.length - 1) {
                    fields[index + 1].focus();
                }
            });

            field.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    fields[index - 1].focus();
                }
            });
        });

        // Simple Resend Timer logic
        let timeLeft = 30;
        const timerElement = document.getElementById('timer');
        const resendBtn = document.getElementById('resend-btn');

        const countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.innerText = "";
                resendBtn.disabled = false;
            } else {
                resendBtn.disabled = true;
                timerElement.innerText = `(in ${timeLeft}s)`;
                timeLeft -= 1;
            }
        }, 1000);
    </script>
</body>
</html>