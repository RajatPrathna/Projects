<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form Validation</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font */
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <script>
        // Function to check if required fields are empty
        function validateForm(event) {
            // Prevent the default form submission (which would cause a page reload)
            event.preventDefault(); 
            
            // Get the container for the error message
            const errorElement = document.getElementById('error-message');
            
            // Get all input elements marked with the 'required-field' class
            const requiredFields = document.querySelectorAll('.required-field');
            
            let isFormValid = true;
            let firstEmptyField = null;

            // Start by clearing any previous error messages
            errorElement.textContent = '';
            errorElement.classList.add('hidden');

            // Iterate through all required fields
            requiredFields.forEach(field => {
                // Trim the value to handle fields with only whitespace
                const value = field.value.trim();
                
                // Clear any previous error styling
                field.classList.remove('border-red-500', 'bg-red-50');

                if (value === "") {
                    // Validation failed for this field
                    isFormValid = false;
                    
                    // Apply error styling
                    field.classList.add('border-red-500', 'bg-red-50');
                    
                    // Store the first empty field to focus on it later
                    if (!firstEmptyField) {
                        firstEmptyField = field;
                    }
                }
            });

            if (!isFormValid) {
                // If validation failed, display the error message
                errorElement.textContent = 'Please fill out all required details to proceed to the next step.';
                errorElement.classList.remove('hidden');
                
                // Focus on the first empty field for better user experience
                if (firstEmptyField) {
                    firstEmptyField.focus();
                }
                
                // We return false conceptually, but event.preventDefault() already stopped the submission.
                return false; 
            } else {
                // If the form is valid, execute the "next step" logic
                const nextStepMessage = document.getElementById('next-step-message');
                nextStepMessage.textContent = 'Success! All fields are filled. Proceeding to the next part...';
                nextStepMessage.classList.remove('hidden');
                
                // You would typically submit the form here using fetch, or navigate to the next page
                console.log('Form is valid. Ready for submission or next step.');
                
                // Clear the success message after a few seconds
                setTimeout(() => {
                    nextStepMessage.classList.add('hidden');
                }, 3000);
            }
        }
        
        // Add the event listener once the window is loaded
        window.onload = function() {
            const form = document.getElementById('user-form');
            if (form) {
                form.addEventListener('submit', validateForm);
            }
        };
    </script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg bg-white p-8 rounded-xl shadow-2xl border border-gray-200">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">User Detail Setup</h1>
        <p class="text-gray-500 mb-8 text-center">All fields below are required to move to the next section.</p>

        <!-- Form Start -->
        <form id="user-form" action="#" method="POST">

            <!-- Global Error Message Box (Initially hidden) -->
            <div id="error-message" class="hidden bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md transition-all duration-300" role="alert">
                <!-- Error message will be inserted here -->
            </div>

            <!-- Success Message Box (Initially hidden) -->
            <div id="next-step-message" class="hidden bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md transition-all duration-300" role="alert">
                <!-- Success message will be inserted here -->
            </div>
            
            <div class="space-y-4">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="John Doe" class="required-field mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="john.doe@example.com" class="required-field mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                </div>

                <!-- Phone Field -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="(555) 123-4567" class="required-field mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8">
                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-lg text-lg font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-200">
                    Go to Next Step
                </button>
            </div>
        </form>
        <!-- Form End -->
    </div>

</body>
</html>
