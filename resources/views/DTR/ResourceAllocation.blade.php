@extends('layout')
@section('title', 'Resource Allocation')

@section('content')
    <div class="container">
        <div class="row my-4">
            <!-- Resources Section -->
            <div class="col-md-12 d-flex justify-content-between align-items-center  mb-4">
                <h5>Resources</h5>
                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#resourceModal">Add Resource</button>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered" id="resourceTable">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamically added resources will appear here -->
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="resourceModal" tabindex="-1" aria-labelledby="resourceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="resourceModalLabel">Add Resource</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="modalItemName" class="form-label">Item Name</label>
                                <input type="text" class="form-control" id="modalItemName" placeholder="Enter item name">
                            </div>
                            <div class="mb-3">
                                <label for="modalQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="modalQuantity" placeholder="Enter quantity">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addResourceBtn">Add Resource</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Buttons (Aligned to the right) -->
            <div class="col-md-12 d-flex justify-content-end mt-4">
                <button class="btn btn-secondary me-2">Back</button>
                <button class="btn btn-primary">Finish</button>
            </div>
        </div>
    </div>

    <script>
        // Script to handle adding resources from the modal
        document.getElementById('addResourceBtn').addEventListener('click', function() {
            // Get the item name and quantity from the modal inputs
            const itemName = document.getElementById('modalItemName').value;
            const itemQuantity = document.getElementById('modalQuantity').value;

            // Simple validation
            if(itemName && itemQuantity) {
                // Add a new row to the resource table
                const resourceTable = document.getElementById('resourceTable').getElementsByTagName('tbody')[0];
                const newRow = resourceTable.insertRow();

                // Create the cells for the new row
                const itemCell = newRow.insertCell(0);
                const quantityCell = newRow.insertCell(1);
                const actionCell = newRow.insertCell(2);

                // Fill the cells
                itemCell.innerText = itemName;
                quantityCell.innerText = itemQuantity;
                actionCell.innerHTML = '<button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button>';

                // Close the modal
                const modal = document.getElementById('resourceModal');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                // Clear modal inputs for next use
                document.getElementById('modalItemName').value = '';
                document.getElementById('modalQuantity').value = '';
            } else {
                alert('Please fill in both fields');
            }
        });

        // Function to remove a row from the table
        function removeRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }
    </script>
@endsection
