<?php 

session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: Login.Admin.php");
    exit;
}

require_once '../../../app/controller/ProductController.php';
require_once '../../../app/controller/AdminController.php';

// Create an instance of AdminController
$adminController = new AdminController();
$productCount = $adminController->getProductCount();
$userCount = $adminController->getUserCount();

// Create an instance of the controller
$controller = new ProductController();
$products = $controller->index();
$controller->create();

//Delete Product
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
  $productID = $_GET['id'];
  $controller->delete($productID);
  header('Location: AdminDashboard.php');
  exit;
}

//Update Product
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Product_ID'])) {
  // Pass the Product_ID to the update method
  $controller->update($_POST['Product_ID']);
}

// Fetch product details for editing
if (isset($_GET['Product_ID'])) {
  $id = $_GET['Product_ID'];
  $products = $controller->index();
  $product = array_filter($products, fn($p) => $p['Product_ID'] == $id)[0];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../../favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="../../../favicon/favicon.svg" />
    <link rel="shortcut icon" href="../../../favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="../../../favicon/apple-touch-icon.png" />
    <link rel="manifest" href="../../../site.webmanifest" />
    <title>Admin Dashboard</title>
    <link href="/TailorHer/public/css/tailwind.css" rel="stylesheet">
    <link href="../../../public/css/home.css" rel="stylesheet">
    <style>
    @font-face {
      font-family: DM;
      src: url(Fonts/DMSerifDisplay-Regular.ttf);
    }

    * {
      font-family: DM;
    }

  .btn-fixed-width {
    width: 100px; 
    text-align: center;
  }

  .btn-edit {
    background-color: #dfa8a8; 
    color: white;
  }

  </style>
</head>
<body>
<body class="bg-gray-100">

<?php include '..\layout\AdminHeader.php';?>
  <!-- Tabs Section -->
  <div class="flex justify-center mb-6 mt-8">
    <nav class="flex">
      <button id="product-tab" class="px-6 py-2 bg-customPink text-white rounded-md focus:outline-none active-tab">Product</button>
      <a href="http://localhost/TailorHer/App/views/Admin/Customers.php"><button id="order-tab" class="px-6 py-2 bg-gray-200 text-gray-700 focus:outline-none">Customer</button></a>
      <a href="http://localhost/TailorHer/App/views/Admin/Order.php"><button id="customer-tab" class="px-6 py-2 bg-gray-200 text-gray-700 rounded-r-md focus:outline-none">Order</button></a>
    </nav>
  </div>
<div id="tab-content" class="w-4/5 mx-auto bg-white shadow-md rounded-md p-6">

  <h2 class="text-xl font-bold mb-4">Product Details</h2>
    
  <!--------------------------------------------------------------------- Product table -------------------------------------------------------------------------------->
<div class="bg-customGreen text-white p-4" style="max-height: 400px; overflow-y: auto;">
    <?php if (!empty($products)): ?>
        <table class="table-auto w-full bg-white text-black">
            <thead>
                <tr class=" admin-tableheader">
                    <th class="px-4 py-2 border">Product ID</th>
                    <th class="px-4 py-2 border">Product Name</th>
                    <th class="px-4 py-2 border">Fabric Options</th>
                    <th class="px-4 py-2 border">Color</th>
                    <th class="px-4 py-2 border">Size Options</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Category</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Product_ID']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Product_Name']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Fabric_Options']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Color']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Size']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Price']); ?></td>
                        <td class="px-4 py-2 border"><?php echo htmlspecialchars($product['Category']); ?></td>
                        <td class="px-4 py-2 border">
                          <img src="/<?php echo htmlspecialchars($product['Image']); ?>" alt="Product Image" class="w-30 h-30">
                      </td>

                        <td class="px-4 py-2 border">
                        <!-- View Button -->
                          <button class="btn-view px-6 py-2 ml-10 bg-[#dfa8a8] text-white rounded-md btn-fixed-width">View</button>

                          <!-- Edit Button -->
                          <button class="btn-edit px-6 py-2 ml-10 bg-[#dfa8a8] text-white mt-4 rounded-md btn-fixed-width" onclick="openEditModal(
                            '<?php echo $product['Product_ID']; ?>',
                            '<?php echo addslashes($product['Product_Name']); ?>',
                            '<?php echo addslashes($product['Fabric_Options']); ?>',
                            '<?php echo addslashes($product['Color']); ?>',
                            '<?php echo addslashes($product['Size']); ?>',
                            '<?php echo $product['Price']; ?>',
                            '<?php echo addslashes($product['Category']); ?>'
                          )">Edit</button>

                          <!-- Delete Button -->
                          <a href="AdminDashboard.php?action=delete&id=<?php echo $product['Product_ID']; ?>" 
                            class="inline-block px-6 py-2 bg-[#dfa8a8] ml-10 mt-4 text-white rounded-md btn-fixed-width"
                            onclick="return confirm('Are you sure you want to delete this Product?');">
                            Delete
                          </a>

                      </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-lg">No products found.</p>
    <?php endif; ?>
</div>
<!--------------------------------------------------------------------------- Add Product ---------------------------------------------------------------------------->
    <form class="space-y-4" method="POST" action="http://localhost/TailorHer/App/views/Admin/AdminDashboard.php" enctype="multipart/form-data">
  <!-- Add hidden field to indicate the form action -->
  <input type="hidden" name="action" value="add">

  <!------------------------------------------------------------------------- Product Name --------------------------------------------------------------------------->
  <div>
    <label class="block mb-1 font-medium">Product Name</label>
    <input type="text" id="Product_Name" name="Product_Name" class="w-full px-4 py-2 border rounded-md" required>
  </div>
  <!---------------------------------------------------------------------------- Price --------------------------------------------------------------------------------->
  <div>
    <label class="block mb-1 font-medium">Price</label>
    <input type="number" id="Price" name="Price" class="w-full px-4 py-2 border rounded-md" required>
  </div>

  <!---------------------------------------------------------------------------- Category ----------------------------------------------------------------------------->
<div>
  <label for="Category" class="block mb-1 font-medium">Category</label>
  <select id="Category" name="Category" class="border rounded p-2 w-full" required>
    <option value="" disabled selected>Select Category</option> 
    <option value="Dress">Dress</option>
    <option value="Skirt">Skirt</option>
    <option value="Top">Top</option>
    <option value="Bottom">Bottom</option>
  </select>
</div>
<!------------------------------------------------------------------------ Fabric Options ---------------------------------------------------------------------------->
  <div>
    <label class="block mb-1 font-medium">Fabric Options</label>
    <div class="flex gap-2 flex-wrap mb-2">
      <button type="button" onclick="toggleOption('fabric', 'Satin')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Satin</button>
      <button type="button" onclick="toggleOption('fabric', 'Cotton')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Cotton</button>
      <button type="button" onclick="toggleOption('fabric', 'Linen')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Linen</button>
      <button type="button" onclick="toggleOption('fabric', 'Maza')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Maza</button>
      <button type="button" onclick="toggleOption('fabric', 'Custom')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Custom</button>

    </div>
<!--------------------------------------------------------------------- Selected Fabric Options ----------------------------------------------------------------------->
    <div id="selected-fabric" class="flex gap-2 flex-wrap"></div>
    <input type="hidden" id="fabric-options" name="Fabric_Options">
  </div>

<!------------------------------------------------------------------------------ Color -------------------------------------------------------------------------------->
  <div>
    <label for="Color" class="block mb-1 font-medium">Color</label>
    <input type="text" id="Color" name="Color" class="border rounded p-2 w-full" required>
  </div>

<!---------------------------------------------------------------------------- Size Options --------------------------------------------------------------------------->
  <div>
    <label class="block mb-1 font-medium">Size Options</label>
    <div class="flex gap-2 flex-wrap mb-2">
      <button type="button" onclick="toggleOption('size', 'Small')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Small</button>
      <button type="button" onclick="toggleOption('size', 'Medium')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Medium</button>
      <button type="button" onclick="toggleOption('size', 'Large')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Large</button>
      <button type="button" onclick="toggleOption('size', 'XL')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ XL</button>
      <button type="button" onclick="toggleOption('size', 'Custom')" class="px-4 py-1 bg-gray-200 text-gray-700 rounded-md">+ Custom</button>

    </div>
<!--------------------------------------------------------------------------- Selected Size Options ------------------------------------------------------------------->
    <div id="selected-size" class="flex gap-2 flex-wrap"></div>
    <input type="hidden" id="size-options" name="Size">
  </div>

  <div class="mb-4">
            <label for="Image" class="block text-gray-700">Product Image:</label>
            <input type="file" id="Image" name="Image" class="w-full px-4 py-2 border rounded-md" required>
        </div>

<!------------------------------------------------------------------------------ Add Button --------------------------------------------------------------------------->
  <div class="flex justify-end gap-3 mt-6">
    <button type="submit" name="action" value="add" class="px-6 py-2 bg-[#b17f7f] text-white rounded-md">ADD</button>
  </div>
</form>
<!------------------------------------------------------------------------------ View Pop-up --------------------------------------------------------------------------->
    <div id="viewModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white rounded-lg w-1/3">
            <div class="modal-header flex justify-between items-center p-4 border-b">
                <h5 class="text-lg font-semibold">Product Details</h5>
                
            </div>
            <div id="modal-body" class="p-4"> 
            </div>
            <div class="modal-footer flex justify-end p-4 border-t">
                <button type="button" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>
  </div>
<!--------------------------------------------------------------------------- Logout ---------------------------------------------------------------------------------->
  <div class="flex justify-center py-10">
    <a href="http://localhost/TailorHer/App/views/Admin/logout.php" class="px-6 py-2 bg-[#b17f7f] text-white rounded-md">Logout</a>
</div>


<!----------------------------------------------------------------------- Edit Product Modal --------------------------------------------------------------------------->
<div id="editModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
  <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
    <h2 class="text-xl font-bold mb-4">Edit Product</h2>
    <form id="editForm" method="POST" action="http://localhost/TailorHer/App/views/Admin/AdminDashboard.php" enctype="multipart/form-data">
      <input type="hidden" name="Product_ID" id="editProductID">
      <!-- Product Name -->
      <div>
        <label class="block mb-1 font-medium">Product Name</label>
        <input type="text" id="editProductName" name="Product_Name" class="w-full px-4 py-2 border rounded-md" required>
      </div>
      <!-- Fabric Options -->
      <div>
        <label class="block mb-1 font-medium">Fabric Options</label>
        <div class="flex space-x-4">
          <label class="flex items-center">
            <input type="checkbox" id="editFabricSatin" name="Fabric_Options[]" value="Satin" class="mr-2">
            Satin
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editFabricCotton" name="Fabric_Options[]" value="Cotton" class="mr-2">
            Cotton
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editFabricLinen" name="Fabric_Options[]" value="Linen" class="mr-2">
            Linen
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editFabricMaza" name="Fabric_Options[]" value="Maza" class="mr-2">
            Maza
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editFabricCustom" name="Fabric_Options[]" value="Custom" class="mr-2">
            Custom 
          </label>
        </div>
      </div>
      <!-- Color -->
      <div>
        <label class="block mb-1 font-medium">Color</label>
        <input type="text" id="editColor" name="Color" class="w-full px-4 py-2 border rounded-md" required>
      </div>
      <!-- Size Options -->
      <div>
        <label class="block mb-1 font-medium">Size Options</label>
        <div class="flex space-x-4">
          <label class="flex items-center">
            <input type="checkbox" id="editSizeSmall" name="Size[]" value="Small" class="mr-2">
            Small
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editSizeMedium" name="Size[]" value="Medium" class="mr-2">
            Medium
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editSizeLarge" name="Size[]" value="Large" class="mr-2">
            Large
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editSizeXL" name="Size[]" value="XL" class="mr-2">
            XL
          </label>
          <label class="flex items-center">
            <input type="checkbox" id="editSizeCustom" name="Size[]" value="Custom" class="mr-2">
            Custom
          </label>
        </div>
      </div>
      <!-- Price -->
      <div>
        <label class="block mb-1 font-medium">Price</label>
        <input type="number" id="editPrice" name="Price" class="w-full px-4 py-2 border rounded-md" required>
      </div>
      <!-- Category -->
      <div>
        <label for="editCategory" class="block mb-1 font-medium">Category</label>
        <select id="editCategory" name="Category" class="w-full px-4 py-2 border rounded-md" required>
          <option value="Dress">Dress</option>
          <option value="Skirt">Skirt</option>
          <option value="Top">Top</option>
          <option value="Bottom">Bottom</option>
        </select>
      </div>

      <!-- Image -->
      <div>
        <label class="block mb-1 font-medium">Select Image (optional)</label>
        <input type="file" id="editImage" name="Image" class="w-full px-4 py-2 border rounded-md">
      </div>

      <!-- Buttons -->
      <div class="mt-4 flex justify-end space-x-2">
        <button type="button" class="px-4 py-2 bg-gray-300 rounded-md" onclick="closeEditModal()">Cancel</button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openEditModal(id, name, fabric, color, size, price, category) {
    document.getElementById('editProductID').value = id;
    document.getElementById('editProductName').value = name;
    document.getElementById('editColor').value = color;
    document.getElementById('editPrice').value = price;
    document.getElementById('editCategory').value = category;
    const fabricCheckboxes = document.querySelectorAll('input[name="Fabric_Options[]"]');
    fabricCheckboxes.forEach(checkbox => {
      if (fabric.includes(checkbox.value)) {
        checkbox.checked = true;
      } else {
        checkbox.checked = false;
      }
    });
    const sizeCheckboxes = document.querySelectorAll('input[name="Size[]"]');
    sizeCheckboxes.forEach(checkbox => {
      if (size.includes(checkbox.value)) {
        checkbox.checked = true;
      } else {
        checkbox.checked = false;
      }
    });
    document.getElementById('editModal').classList.remove('hidden');
  }

  function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
  }
</script>

<script>
    function toggleOption(type, value) {
    const selectedContainer = document.getElementById(`selected-${type}`);
    const hiddenField = document.getElementById(`${type}-options`);  
    
    if (!selectedContainer.querySelector(`[data-value="${value}"]`)) {
        const optionDiv = document.createElement('div');
        optionDiv.classList.add('px-4', 'py-1', 'bg-customPink', 'text-white', 'rounded-md', 'cursor-pointer', 'm-1');
        optionDiv.setAttribute('data-value', value);
        
        const textNode = document.createTextNode(value);
        optionDiv.appendChild(textNode);
        
        const closeButton = document.createElement('span');
        closeButton.textContent = '×';
        closeButton.classList.add('ml-2', 'cursor-pointer', 'text-white', 'hover:text-red-800');
        
        closeButton.addEventListener('click', (e) => {
            e.stopPropagation();
            optionDiv.remove();
            
            const buttons = document.querySelectorAll(`button[onclick*="${value}"]`);
            buttons.forEach(button => {
                button.classList.remove('bg-gray-400', 'text-white');
            });
            
            updateHiddenField();
        });
        
        optionDiv.appendChild(closeButton);
        selectedContainer.appendChild(optionDiv);
        const buttons = document.querySelectorAll(`button[onclick*="${value}"]`);
        buttons.forEach(button => {
            button.classList.add('bg-gray-400', 'text-white');
        });
        updateHiddenField();
    }
}

    function updateHiddenField() {
    const fabricOptions = Array.from(document.querySelectorAll('#selected-fabric div'))
        .map(option => option.getAttribute('data-value')).join(',');
    const sizeOptions = Array.from(document.querySelectorAll('#selected-size div'))
        .map(option => option.getAttribute('data-value')).join(',');
    
    document.getElementById('fabric-options').value = fabricOptions;
    document.getElementById('size-options').value = sizeOptions;
}
</script>

<script>
        document.addEventListener("DOMContentLoaded", function () {
            const viewButtons = document.querySelectorAll(".btn-view");

            viewButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const row = button.closest("tr");
                    let rowData = "";
                    row.querySelectorAll("td").forEach(function (cell, index) {
                        if (index < row.children.length - 1) {
                            const header = document.querySelectorAll("thead th")[index].innerText;
                            const cellData = cell.innerText;
                            rowData += `<p><strong>${header}:</strong> ${cellData}</p>`;
                        }
                    });
                    document.getElementById("modal-body").innerHTML = rowData;
                    document.getElementById("viewModal").classList.remove("hidden");
                });
            });
        });
        function closeModal() {
            document.getElementById("viewModal").classList.add("hidden");
        }
    </script>

</body>
</html>
