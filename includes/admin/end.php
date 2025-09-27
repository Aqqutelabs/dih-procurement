
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <?php if(basename($_SERVER['PHP_SELF']) == 'bids.php'){ ?>
    <script>
        $(document).ready(function() {
            $('.vertiqal-nav-tabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                console.log('Tab switched to: ' + $(e.target).text());
            });
            
            $('.vertiqal-search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                console.log('Searching for: ' + searchTerm);
            });
            
            $('.vertiqal-filter-select').on('change', function() {
                const filterType = $(this).find('option:first').text();
                const selectedValue = $(this).val();
                console.log('Filter changed - ' + filterType + ': ' + selectedValue);
            });
            
            $('.vertiqal-actions-menu .dropdown-item').on('click', function(e) {
                e.preventDefault();
                const action = $(this).text().trim();
                console.log('Action clicked: ' + action);
            });
        });
    </script>
    <?php } ?>

    <?php if(basename($_SERVER['PHP_SELF']) == 'add_bid.php'){ ?>
    <script>
        document.getElementById('vertiqal-file-input').addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                const uploadArea = document.querySelector('.vertiqal-upload-area');
                const fileNames = Array.from(files).map(file => file.name).join(', ');
                
                uploadArea.innerHTML = `
                    <div class="vertiqal-upload-icon">
                        <i class="fas fa-check-circle text-success"></i>
                    </div>
                    <div class="vertiqal-upload-title text-success">Files Selected</div>
                    <div class="vertiqal-upload-description">${fileNames}</div>
                    <button type="button" class="vertiqal-upload-button" onclick="document.getElementById('vertiqal-file-input').click()">Change Files</button>
                `;
            }
        });

        document.getElementById('vertiqal-bid-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const requiredFields = document.querySelectorAll('.vertiqal-form-control[required]');
            const checkboxes = document.querySelectorAll('.vertiqal-checkbox');
            
            let isValid = true;
            
            let checkedBoxes = 0;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) checkedBoxes++;
            });
            
            if (checkedBoxes < 2) {
                alert('Please confirm both agreement checkboxes before submitting.');
                isValid = false;
            }
            
            if (isValid) {
                alert('Bid submitted successfully!');
            }
        });
    </script>
    <?php } ?>
</body>
</html>