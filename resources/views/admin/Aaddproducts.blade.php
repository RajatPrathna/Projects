<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add New Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .admin-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6c5ce7, #a29bfe, #fd79a8);
            animation: shimmer 3s ease-in-out infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-title {
            color: #333;
            font-size: 32px;
            font-weight: 700;
        }

        .breadcrumb {
            color: #666;
            font-size: 14px;
            margin-top: 8px;
        }

        .breadcrumb a {
            color: #6c5ce7;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #a29bfe;
        }

        .back-btn {
            padding: 12px 20px;
            background: linear-gradient(135deg, #6c5ce7 0%, #a29bfe 100%);
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(108, 92, 231, 0.3);
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            color: #555;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .required {
            color: #fd79a8;
        }

        .input-container {
            position: relative;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #6c5ce7;
            background: white;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 40px 20px;
            border: 2px dashed #e1e5e9;
            border-radius: 12px;
            background: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s ease;
            color: #666;
            font-weight: 600;
        }

        .file-upload:hover .file-upload-label,
        .file-upload.dragover .file-upload-label {
            border-color: #6c5ce7;
            background: rgba(108, 92, 231, 0.05);
            color: #6c5ce7;
        }

        .image-preview {
            margin-top: 15px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .preview-item {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #fd79a8;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .checkbox-group label {
            margin: 0;
            text-transform: none;
            letter-spacing: normal;
            font-weight: 500;
            cursor: pointer;
        }

        .tag-input {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            background: #f8f9fa;
            min-height: 50px;
            align-items: center;
        }

        .tag-input:focus-within {
            border-color: #6c5ce7;
            background: white;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
        }

        .tag {
            background: linear-gradient(135deg, #6c5ce7, #a29bfe);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .tag-remove {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 14px;
            padding: 0;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .tag-remove:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .tag-input input {
            border: none;
            background: none;
            outline: none;
            flex: 1;
            min-width: 100px;
            padding: 8px 0;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e1e5e9;
        }

        .btn {
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #fd79a8 0%, #fdcb6e 100%);
            color: white;
        }

        .btn-secondary {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e1e5e9;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            box-shadow: 0 10px 25px rgba(253, 121, 168, 0.3);
        }

        .help-text {
            font-size: 12px;
            color: #999;
            margin-top: 5px;
            line-height: 1.4;
        }

        .status-toggle {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .toggle-option {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .toggle-option input[type="radio"] {
            width: auto;
            margin: 0;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header-top {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        .floating-elements {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
            z-index: -1;
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s ease-in-out infinite;
        }

        .floating-circle:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-circle:nth-child(2) {
            width: 60px;
            height: 60px;
            top: 70%;
            right: 10%;
            animation-delay: 3s;
        }

        .floating-circle:nth-child(3) {
            width: 100px;
            height: 100px;
            bottom: 10%;
            left: 15%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.3;
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 0.6;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
        <div class="floating-circle"></div>
    </div>

    <div class="admin-container">
        @if(session('success'))
            <script>alert("{{ session('success') }}");</script>
        @endif
        <div class="header">
            <div class="header-top">
                <div>
                    <h1 class="admin-title">Add New Product</h1>
                    <div class="breadcrumb">
                        <a href="#">Dashboard</a> / <a href="#">Products</a> / Add Product
                    </div>
                </div>
                <a href="Aproducts" class="back-btn">
                    ← Back to Products
                </a>
            </div>
        </div>

        <div class="form-container">
            <form id="addProductForm" method="POST" action="{{url('/Aaddproducts')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="productName">Product Name <span class="required">*</span></label>
                        <input type="text" id="productName" name="productName" placeholder="Enter product name">
                        <div class="help-text">Enter a clear, descriptive product name</div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="category">Category <span class="required">*</span></label>
                        <select id="category" name="category" >
                            <option value="">Select Category</option>
                            <option value="software">Software</option>
                            <option value="hardware">Hardware</option>
                            <option value="services">Services</option>
                            <option value="analytics">Analytics</option>
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="category">Category <span class="required">*</span></label>
                        <select id="category" name="category" >
                            <optgroup label="Books">
                                <option value="">Null</option>
                                <option value="Text books">Text books</option>
                                <option value="Note books">Note books</option>
                                <option value="Story books">Story books</option>                                
                            </optgroup>
                            <optgroup label="Stationery items">
                                <option value="pens">pens</option>
                                <option value="pencils">pencils</option>
                                <option value="erasers">erasers</option>
                                <option value="sharpners">sharpners</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price">Price <span class="required">*</span></label>
                        <input type="number" id="price" name="price" placeholder="0.00" step="0.01" min="0">
                        <div class="help-text">Enter price</div>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock Quantity</label>
                        <input type="number" id="stock" name="stock" placeholder="0" min="0">
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight (kg)</label>
                        <input type="number" id="weight" name="weight" placeholder="0.00" step="0.01" min="0">
                        <div class="help-text">For shipping calculations</div>
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Product Description <span class="required">*</span></label>
                        <textarea id="description" name="description"  placeholder="Enter detailed product description..."></textarea>
                        <div class="help-text">Provide a comprehensive description of your product</div>
                    </div>

                    <div class="form-group full-width">
                        <label for="productImages">Product Images</label>
                        <div class="file-upload">
                            <input type="file" id="productImages" name="productImages[]" multiple accept="image/*">
                            <div class="file-upload-label">
                                <span>📷</span>
                                <span>Click to upload images or drag and drop</span>
                            </div>
                        </div>
                        <div class="help-text">Upload multiple product images (JPG, PNG, GIF)</div>
                        <div class="image-preview" id="imagePreview"></div>
                    </div>

                    <div class="form-group">
                        <div>Product Status <span class="required">*</span></div>
                        <div class="status-toggle">
                            <div class="toggle-option">
                                <input type="radio" id="active" name="status" value="1" checked>
                                <label for="active">Active</label>
                            </div>
                            <div class="toggle-option">
                                <input type="radio" id="inactive" name="status" value="0">
                                <label for="inactive" >Inactive</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="featured" name="type" value="featured">
                            <label for="featured">Featured Product</label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="newProduct" name="type" value="newproducts">
                            <label for="newProduct">New Product</label>
                        </div>
                        <div class="checkbox-group">
                            <input type="checkbox" id="onSale" name="type" value="sale">
                            <label for="onSale">On Sale</label>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    {{-- <button type="button" class="btn btn-secondary">
                        💾 Save as Draft
                    </button> --}}
                    <button type="submit" class="btn btn-primary">
                        ✅ Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image upload preview
        const imageInput = document.getElementById('productImages');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            imagePreview.innerHTML = '';
            
            Array.from(this.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    previewItem.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}">
                        <button type="button" class="remove-image" onclick="removeImage(${index})">×</button>
                    `;
                    imagePreview.appendChild(previewItem);
                };
                reader.readAsDataURL(file);
            });
        });

        // Remove image function
        function removeImage(index) {
            const dt = new DataTransfer();
            const files = Array.from(imageInput.files);
            
            files.forEach((file, i) => {
                if (i !== index) {
                    dt.items.add(file);
                }
            });
            
            imageInput.files = dt.files;
            imageInput.dispatchEvent(new Event('change'));
        }

        // Tag input functionality
        const tagInput = document.getElementById('tagInput');
        const tagInputField = tagInput.querySelector('input');
        const tags = [];

        tagInputField.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const tagValue = this.value.trim();
                
                if (tagValue && !tags.includes(tagValue)) {
                    tags.push(tagValue);
                    addTagElement(tagValue);
                    this.value = '';
                }
            }
        });

        function addTagElement(tagText) {
            const tagElement = document.createElement('div');
            tagElement.className = 'tag';
            tagElement.innerHTML = `
                ${tagText}
                <button type="button" class="tag-remove" onclick="removeTag('${tagText}', this)">×</button>
            `;
            tagInput.insertBefore(tagElement, tagInputField);
        }

        function removeTag(tagText, element) {
            const index = tags.indexOf(tagText);
            if (index > -1) {
                tags.splice(index, 1);
            }
            element.parentElement.remove();
        }

        // Drag and drop for file upload
        const fileUpload = document.querySelector('.file-upload');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            fileUpload.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            fileUpload.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            fileUpload.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            fileUpload.classList.add('dragover');
        }

        function unhighlight() {
            fileUpload.classList.remove('dragover');
        }

        fileUpload.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            imageInput.files = files;
            imageInput.dispatchEvent(new Event('change'));
        }

        // // Form submission
        // document.getElementById('addProductForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     // Get form data
        //     const formData = new FormData(this);
        //     formData.append('tags', JSON.stringify(tags));
            
        //     // Show success message
        //     const submitBtn = document.querySelector('.btn-primary');
        //     const originalText = submitBtn.innerHTML;
            
        //     submitBtn.innerHTML = '⏳ Adding Product...';
        //     submitBtn.disabled = true;
            
        //     setTimeout(() => {
        //         submitBtn.innerHTML = '✅ Product Added!';
        //         setTimeout(() => {
        //             alert('Product added successfully!');
        //             // Reset form or redirect
        //             this.reset();
        //             imagePreview.innerHTML = '';
        //             tags.length = 0;
        //             tagInput.querySelectorAll('.tag').forEach(tag => tag.remove());
        //             submitBtn.innerHTML = originalText;
        //             submitBtn.disabled = false;
        //         }, 1000);
        //     }, 2000);
        // });


        document.getElementById('addProductForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            formData.append('tags', JSON.stringify(tags));
            
            // Show loading state
            const submitBtn = document.querySelector('.btn-primary');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '⏳ Adding Product...';
            submitBtn.disabled = true;
            
            // Directly show success message
            submitBtn.innerHTML = '✅ Product Added!';
            alert('Product added successfully!');
            
            // Reset form
            this.reset();
            imagePreview.innerHTML = '';
            tags.length = 0;
            tagInput.querySelectorAll('.tag').forEach(tag => tag.remove());
            
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });


        // Auto-generate SKU from product name
        document.getElementById('productName').addEventListener('input', function() {
            const sku = this.value
                .toLowerCase()
                .replace(/[^a-z0-9]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '')
                .toUpperCase();
            
            if (sku && !document.getElementById('sku').value) {
                document.getElementById('sku').value = sku + '-' + Math.random().toString(36).substr(2, 4).toUpperCase();
            }
        });
    </script>
</body>
</html>