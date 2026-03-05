<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
    .custom-toast {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 12px 18px;
        border-radius: 6px;
        color: white;
        z-index: 9999;
        font-weight: 500;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.4s ease;
    }

    .custom-toast.show {
        opacity: 1;
        transform: translateX(0);
    }

    .custom-toast.success {
        background-color: #28a745;
    }

    .custom-toast.error {
        background-color: #dc3545;
    }
</style>

</head>
<body>

    <script>
        function showNotification(type, message) {

            const notification = document.createElement('div');
            notification.classList.add('custom-toast', type);
            notification.textContent = message;

            document.body.appendChild(notification);

            // trigger animation
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);

            // remove after 3 seconds
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => notification.remove(), 400);
            }, 3000);
        }
    </script>
</body>
</html>