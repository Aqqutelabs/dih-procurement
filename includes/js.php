
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // File upload functionality
        document.querySelectorAll('.quipdeck-file-upload input[type="file"]').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                const label = e.target.parentElement.querySelector('.quipdeck-file-upload-text');
                if (fileName) {
                    label.textContent = fileName;
                    e.target.parentElement.parentElement.style.borderColor = '#28a745';
                    e.target.parentElement.parentElement.style.backgroundColor = '#f8fff9';
                }
            });
        });

        // Drag and drop functionality
        document.querySelectorAll('.quipdeck-file-upload').forEach(upload => {
            upload.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = '#007bff';
                this.style.backgroundColor = '#f8f9fa';
            });

            upload.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.style.borderColor = '#dee2e6';
                this.style.backgroundColor = '#fff';
            });

            upload.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = '#28a745';
                this.style.backgroundColor = '#f8fff9';
                
                const files = e.dataTransfer.files;
                const input = this.querySelector('input[type="file"]');
                const label = this.querySelector('.quipdeck-file-upload-text');
                
                if (files.length > 0) {
                    input.files = files;
                    label.textContent = files[0].name;
                }
            });
        });
    </script>
</body>
</html>